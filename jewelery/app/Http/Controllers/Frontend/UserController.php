<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

      // this function for edit and save user profile   


    public function editProfileDetails(Request $req){
        

            if(!empty($req->key)){

                $data = $req->json()->all();   

                if(ANDROID_APP_KEY == $data['key'] ){                
                    
                    //now we will check vALIDATION 

                        
                        $validator = Validator::make($req->all(), [   
                            'id' => 'required|numeric',       
                            'first_name' => 'required', 
                            'last_name' => 'required',
                            'mobile' => 'required|numeric',
                            'email' => 'required|email',
                            'gender' => 'required',
                            'pincode' => 'required|numeric',
                            'country' => 'required',
                            'state' => 'required',
                            'city' => 'required',
                            'address' => 'required',      
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
            
                                    unset($data['key']);
                                    
                                if(UserModel::where('id',$data['id'])->update($data) ){

                                    return response()->json([
                                        
                                        'status' => "success",
                                        'message'=> "data updated " ,
                                        "data" =>  []                      
                                        
                                        ]);
                                }else{

                                    return response()->json([

                                        'status' => "failed",
                                        'message'=> "data not  updated " ,
                                        "data" =>  []                      
                                        
                                        ]);
                                }
            
                        }       


                }else{
                    return response()->json([
                        "status" => "failed",
                        "message" => "Unauthorised User ! ",
                        "data" => []
                            ],400);
                }

            }else{
                return response()->json([
                    "status" => "failed",
                    "message" => "Unauthorised User ! ",
                    "data" => []
                        ],400);
            }



    }

    //this function for user details  

            public function ProfileDetails(Request $req){
                

                    
        if(!empty($req->key)){

                                $data = $req->json()->all();   

                                if(ANDROID_APP_KEY == $data['key'] ){                
                                    
                                    //now we will check vALIDATION 

                                            
                                            $validator = Validator::make($req->all(), [   
                                                'id' => 'required|numeric',                                     
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
                                
                                                if($user_data =  UserModel::where('id',$data['id'])->first()){

                                                    return response()->json([

                                                        'status' => "success",
                                                        'message'=> "data is here " ,
                                                        "data" =>  [ 
                                                                    $user_data
                                                          ]
                                                    
                                                         ],200);    
                                                    
                                                }

                                                       
                                
                                            }       


                                }else{
                                    return response()->json([
                                        "status" => "failed",
                                        "message" => "Unauthorised User ! ",
                                        "data" => []
                                            ],400);
                                }

                            }else{
                                return response()->json([
                                    "status" => "failed",
                                    "message" => "Unauthorised User ! ",
                                    "data" => []
                                        ],400);
                            }

    }





    //this function for update user profile image 

    public function updateUserImage(Request $req){


        if(!empty($req->key)){

            $data = $req->json()->all();   

            if(ANDROID_APP_KEY == $data['key'] ){                
                
                //now we will check vALIDATION 

                    
                    $validator = Validator::make($req->all(), [   
                        'id' => 'required|numeric',                                     
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
        

                                unset($data['key']);

                                if ($image = $req->file('image')) {
                                    $destinationPath = 'image/User';
                                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                                    $image->move($destinationPath, $profileImage);
                                    $input['image'] = "$profileImage";
                                }else{
                                    $input['image'] = null;
                                }   
                        

                                
                            if(UserModel::where('id',$data['id'])->update($data) ){

                                return response()->json([
                                    
                                    'status' => "success",
                                    'message'=> "data updated " ,
                                    "data" =>  []                      
                                    
                                    ]);
                            }else{

                                return response()->json([

                                    'status' => "failed",
                                    'message'=> "data not  updated " ,
                                    "data" =>  []                      
                                    
                                    ]);
                            }
        
                    }       


            }else{
                return response()->json([
                    "status" => "failed",
                    "message" => "Unauthorised User ! ",
                    "data" => []
                        ],400);
            }

        }else{
            return response()->json([
                "status" => "failed",
                "message" => "Unauthorised User ! ",
                "data" => []
                    ],400);
        }




    }





    
}
