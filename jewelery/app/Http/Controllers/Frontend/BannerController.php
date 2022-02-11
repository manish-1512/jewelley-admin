<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use GuzzleHttp\Psr7\Request;

class BannerController extends Controller
{
    
    public function bannerList(Request $req){


        if(ANDROID_APP_KEY == $req->key){


             $banner_data =  BannerModel::select('id','image')->where('is_active',"1")->orderBy('order_by')->get();

             return response()->json([
                 
                "status" => "success",
                "message" => "listing banner images",
                "data" => $banner_data

             ]);


    }else{

        return response()->json([
            "status" => "failed",
            "message" => " validation error ",
            "data" => []
                ],401);

    }

  }

}