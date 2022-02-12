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

                                'category_id' => 'sometimes|required|numeric', 
                                'offset' => 'sometimes|required|integer', 
                                
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

                                    $products_data = ProductModel::select('id',"title","short_description","price","discount")
                                                                    ->where('is_active',1)
                                                                    ->orderBy('created_at','desc')
                                                                    ->get()
                                                                    ->toArray();
                                    
                                if(isset($data['category_id'])){

                                    $products_data =    ProductModel::select('id',"title","short_description","price","discount")
                                                                    ->where('is_active',1)
                                                                    ->where('product_category',$data['category_id'])
                                                                    ->get()
                                                                    ->toArray();
                                }   
                                

                                return response()->json([

                                    "data" => $products_data
                                ]);



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
