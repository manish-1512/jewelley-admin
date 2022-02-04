<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

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

        if($this->text_key == $data['key']){

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

                           $this->user_model::where('mobile',$data['mobile'])->update(['otp' => $otp ,'otp_time' => $this->user_model->otp_time]);
                            
                           return response()->json("otp send to your mobile no");
                            
                           
                        }else{

                            $status = $this->user_model->save();

                            return response()->json("otp send to your mobile no");
                        }        
                        
                    }
          
                    
        }else{

            return response()->json("not a mamber");
        }

           
    }   


    public function verifyOtp(Request $req){

        $data = $req->json()->all();    

            if( $this->text_key == $data['key'] ){

               $user_data =  $this->user_model::select('mobile','otp','otp_time')->where('mobile',$data['mobile'])->first()->toArray();

                if($data['otp'] == $user_data['otp']){
                                 

                    $time = new DateTime($user_data['otp_time']);
                    $minute = 1;
                    $time->add(new DateInterval('PT'.$minute.'M'));
                    $stamp = $time->format('Y-m-d H:i:s');


                    $current_time =date("Y-m-d h:i:s");

                    if($current_time < $stamp ){

                        return response()->json("you are log in " ,200);
                    }else{

                        return response()->json("otp expire");
                    }
                    
                }else{

                    return response()->json("invalid otp");
                }                  


            }else{
                
                return response()->json("not a valid  mamber");
            }


        }   



    }
