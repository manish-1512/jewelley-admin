<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    

    public function list(Request $req){


         
            if(ANDROID_APP_KEY == $req->key){

                
                              $validator = Validator::make($req->all(), [   

                                'category_id' => 'sometimes|required|category_id|numeric', 
                                'keyword' => 'sometimes|required', 
                              
                                
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

                                $data = $req->json()->all();
                                    

                                

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