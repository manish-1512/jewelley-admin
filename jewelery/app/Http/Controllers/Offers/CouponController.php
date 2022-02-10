<?php

namespace App\Http\Controllers\Offers;

use App\Http\Controllers\Controller;
use App\Models\CouponModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductModel;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
            $coupans =  CouponModel::select("id","name","coupon_code","discount_type","discount_value","start_date_time","end_date_time","is_active","max_discount_amount")->orderBy('created_at','desc')->get();

      
        return view('admin.Offer.Coupon',['coupons' => $coupans]);

    }


        public function saveCoupan(){

            $products = ProductModel::select("id","title")->get();
            $categories = ProductCategoryModel::select("id","name")->get();


            return view("admin.Offer.SaveCoupan",["products" => $products,"categories" => $categories]);

        }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
            
        if($req->validate([                        
            "name" => "required",
            'coupon_code' => 'required',
            'discount_type' => "required",
            "discount_value"=> "required|numeric",
            "product_ids" => "required|Array" ,
            "category_ids" => "required|Array" ,
            "min_order_value" => "required|numeric" ,
            "max_discount_amount" => "required|numeric", 
            "start_date_time" => "required", 
            "end_date_time" => "required" ,
            "is_active" => "required", 
                    
         ])){

            $coupon = new CouponModel();
              
            $coupon->name  =  $req->name;
            $coupon->coupon_code = $req->coupon_code;
            $coupon->discount_type = $req->discount_type;
            $coupon->discount_value = $req->discount_value;
            $coupon->product_ids = json_encode($req->product_ids);
            $coupon->category_ids = json_encode($req->category_ids);
            $coupon->min_order_value = $req->min_order_value;
            $coupon->max_discount_amount = $req->max_discount_amount;
            $coupon->start_date_time = $req->start_date_time;
            $coupon->end_date_time = $req->end_date_time;
            $coupon->is_active = $req->is_active;

         $coupon->save();

            if(!empty($coupon->id)){
                return redirect()->route('coupon_code.list')->with('insert','Successfully inserted ');
            }else{

                return redirect()->route('coupon_code.list')->with('insert','Data not inserted ');
            }



        }
    }
   
    

    


    public function edit($id)
    {
        
            $coupon_data = CouponModel::where('id',$id)->first()->toArray();

          
            $products = ProductModel::select("id","title")->get()->toArray();
            $categories = ProductCategoryModel::select("id","name")->get()->toArray();

            $coupon_data['product_ids'] = json_decode($coupon_data['product_ids']);
            $coupon_data['category_ids'] = json_decode($coupon_data['category_ids']);


            return View('admin.Offer.EditCoupon',['coupon_data' => $coupon_data,'categories' =>$categories  ,'product'  =>$products]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CouponModel  $couponModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {

        if($req->validate([                        
            "name" => "required",
            'coupon_code' => 'required',
            'discount_type' => "required",
            "discount_value"=> "required|numeric",
            "product_ids" => "required|Array" ,
            "category_ids" => "required|Array" ,
            "min_order_value" => "required|numeric" ,
            "max_discount_amount" => "required|numeric", 
            "start_date_time" => "required", 
            "end_date_time" => "required" ,
            "is_active" => "required", 
                    
         ])){


            $coupon = new CouponModel();

            $coupon->name  =  $req->name;
            $coupon->coupon_code = $req->coupon_code;
            $coupon->discount_type = $req->discount_type;
            $coupon->discount_value = $req->discount_value;
            $coupon->product_ids = json_encode($req->product_ids);
            $coupon->category_ids = json_encode($req->category_ids);
            $coupon->min_order_value = $req->min_order_value;
            $coupon->max_discount_amount = $req->max_discount_amount;
            $coupon->start_date_time = $req->start_date_time;
            $coupon->end_date_time = $req->end_date_time;
            $coupon->is_active = $req->is_active;



            $input = $req->all();
            $input = $req->except(['_token']);
    
        $response = $coupon->where('id',$req->id)->update($input);

         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CouponModel  $couponModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CouponModel $couponModel)
    {
        //
    }
}
