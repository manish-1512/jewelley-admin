<?php
 
 namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\PaymentModel;
use Illuminate\Http\Request; 
 use Redirect,Response;
 
 class RazorpayController extends Controller
 {


     public function index()
     {  

       return view('razorpay');
     }
 
     public function razorPaySuccess(Request $request){

      $payment_model = new PaymentModel();

          echo "<pre>";
          print_r($request->all());

         $data = [
                    'user_id' => 1,
                   'product_id' => $request->product_id,
                   "payment_status" =>1, 
                   'payment_id' => $request->payment_id,
                   'amount' => $request->amount,
                ];
                

         $getId = $payment_model::insertGetId($data);  
 
          $arr = array('msg' => 'Payment successfully credited', 'status' => true);
 
          return Response()->json($arr);    
     }
 
     public function RazorThankYou()
     {
       return view('thankyou');
     }
 
 }