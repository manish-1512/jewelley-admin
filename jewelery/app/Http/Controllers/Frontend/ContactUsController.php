<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUSModel;
use App\Models\ContactUsModel as ModelsContactUsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    

    public function create(Request $req){


         
            if(ANDROID_APP_KEY == $req->key){

                
                              $validator = Validator::make($req->all(), [           
                                'email' => 'required|email', 
                                'name' => 'required',
                                'phone' => 'required|numeric|min:13',
                                'subject' => 'required',
                                'message' => 'required'
                            ]);
                
                         
                            if ($validator->fails()) {
                                
                                return response()->json([

                                    'status' => "failed",
                                     'message'=> "validation error" ,
                                      "data" =>  [ 
                                                     'errors'=>$validator->errors()
                                                 ]
                                
                                ],401);
                
                            }else{
                
                                    $contact_model = new ModelsContactUsModel();
                                    $contact_model->name = $req->name;
                                    $contact_model->email = $req->email;
                                    $contact_model->phone = $req->phone;
                                    $contact_model->subject = $req->subject;
                                    $contact_model->message = $req->message;
                                           
                                    if($contact_model->save()){
                                        return response()->json([
                                            
                                            'status' => "success",
                                            'message'=> "Thanks for contacting us! We will be in touch with you shortly." ,
                                            "data" =>  []                      
                                            
                                            ]);
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

}
