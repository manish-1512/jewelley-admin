<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\ProductCategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function categoryList(){

             $category_data =  ProductCategoryModel::select('id','name','image')->where('is_active',"1")->orderBy('created_at','desc')->get();

             return response()->json([
                 
                "status" => "success",
                "message" => "listing get",
                "data" => $category_data

             ]);


    }



}
