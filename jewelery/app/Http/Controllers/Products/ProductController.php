<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller{

    public $product_model;

    public function __construct()
    {   
        $this->product_model = new ProductModel();

        }

    
    public function index($message = null){    

        
        $product_data =  $this->product_model::get();

        $product_data->message = $message;  
      
        return view('admin.products',compact('product_data'));

  }

  public function viewProduct(){
    
  }

  public function Changestatus(Request $req){

                       $data =  $this->product_model::select('is_active')->where('id',$req->id)->get();

                       $data =  json_decode(json_encode($data), true);
                        $status =  $data[0]['is_active'];

            $this->product_model::where('id',$req->id)->update(['is_active'=> 1- $status ]);

            return redirect()->back();

  } 

  public function create(Request $req){

        
      $req->validate([
         


      ]);


      $this->product_model->first_name = $req->first_name;
      $this->product_model->last_name = $req->last_name;
      $this->product_model->email = $req->email;
      $this->product_model->gender = $req->gender;
      $this->product_model->mobile = $req->mobile;
      $this->product_model->pincode = $req->pincode;
      $this->product_model->country = $req->country;
      $this->product_model->state = $req->state;
      $this->product_model->city = $req->city;
      $this->product_model->address = $req->address;
      $this->product_model->is_verified = $req->is_verified;
      $this->product_model->is_active = $req->is_active;
      
      
        $this->product_model->save();

  }


  public function edit(Request $req){

      $id =  $req->id;
      $data  = $this->product_model::where('id', $id)->get();
      
     //return data to view   
      
  }

  public function update(Request $req){

     $response = $this->product_model->where('id',$req->id)->update($req->all());

     //send back 

  }

  public function delete(Request $req){

      $student = $this->product_model->where('id',$req->id)->delete();
      //send back
      return redirect()->back()->with('status','Student Deleted Successfully');
  }


}