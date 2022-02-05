<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use DateInterval;
use DateTime;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class LoginController extends Controller
{

    protected $user_model;

    public $text_key = "123456789";
    
    public function __construct()
    {
        $this->user_model = new UserModel();
    }


    public function message(Request $req){

        $data = $req->json()->all();     

        if($this->text_key == $data['key'] && $data['mobile']){

                  $otp =rand(100000,999999);
            
                if( Nexmo::message()->send([
            
                        'to' => '91'.$data['mobile'],
                        'from' => '1234456',
                        'text' => 'your otp is '.$otp.'for verification'
            
                    ])){

                        $this->user_model->mobile = $data['mobile'];
                        $this->user_model->otp = $otp;
                        $this->user_model->otp_time =date("Y-m-d h:i:s");

                      

                        if($this->user_model::select('id','mobile')->where('mobile',$data['mobile'])->exists()){

                                $user_data =  $this->user_model::select('id','mobile')->where('mobile',$data['mobile'])->first();

                                    if($this->user_model::where('mobile',$data['mobile'])->update(['otp' => $otp ,'otp_time' => $this->user_model->otp_time])){

                                            return response()->json([
                    
                                                    "status" => "success",
                                                    "message" => "otp send to your mobile no ",
                                                    "data" => []
                    
                                            ]);
                                    }else{

                                        return response()->json([
                    
                                            "status" => "failed",
                                            "message" => " not updated ",
                                            "data" => []
            
                                    ],500);

                                    }
                            
                            
                           
                        }else{

                                if($status = $this->user_model->save()){

                                            return response()->json([
                                        
                                                "status" => "success",
                                                "message" => "otp send to your mobile no ",
                                                "data" => []
                                        ]);

                                    }else{

                                                return response()->json([
                                
                                                    "status" => "failed",
                                                    "message" => " not updated ",
                                                    "data" => []

                                            ],500);
                                    }



                        }        
                        
                    }
          
                    
        }else{

           return response()->json([
                                       "status" => "failed",
                                       "message" => " validation error ",
                                       "data" => []
                                           ],401);
        }

           
    }   


    public function verifyOtp(Request $req){

        $data = $req->json()->all();    

            if( $this->text_key == $data['key'] ){

               $user_data =  $this->user_model::select('id','mobile','otp','otp_time')->where('mobile',$data['mobile'])->first()->toArray();

                if($data['otp'] == $user_data['otp']){
                                 

                    $time = new DateTime($user_data['otp_time']);
                    $minute = 1;
                    $time->add(new DateInterval('PT'.$minute.'M'));
                    $stamp = $time->format('Y-m-d H:i:s');


                    $current_time =date("Y-m-d h:i:s");

                    if($current_time < $stamp ){


                            //null the otp and otp time 
                            $this->user_model::where('mobile',$data['mobile'])->update(['otp' => null ,'otp_time' => null]);

                        //please save data in to session 

                        $req->Session()->put('login_id',$user_data['id']);

                    // Session::put('variableName', $value);

                            return response()->json([
                                            
                                "status" => "success",
                                "message" => "you are now log in ! ",
                                "data" => []
                        ]);

                    }else{

                        return response()->json([
                                            
                            "status" => "failed",
                            "message" => "otp expire ! ",
                            "data" => []
                    ]);
                    }
                    
                }else{

                    return response()->json([
                                            
                        "status" => "failed",
                        "message" => "invalid otp ! ",
                        "data" => []
                 ]);

                }                  


            }else{
                
                return response()->json([
                                            
                    "status" => "failed",
                    "message" => "you are not a  valid mamber ! ",
                    "data" => []
             ]);
            }


        }   



    }
