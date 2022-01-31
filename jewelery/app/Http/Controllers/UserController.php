<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller{

    public $user_model;

    public function __construct()
    {   
        $this->user_model = new UserModel();
    }

    
    public function index(){    

        $user_data =  $this->user_model::get();
       

        return view('admin.users',compact('user_data'));

    }

// show user orders history

    public function userOrders(Request $req){

        return view('admin.UserOrders'  );
    }



  public function create(Request $req){

        
      $req->validate([
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required',
          'gender' => 'required',
          'mobile' => 'required',
          'pincode' => 'required',
          'country' => 'required',
          'state' => 'required',
          'city' => 'required',
          'address' => 'required',
          'is_verified' => 'required',
          'is_active' => 'required',


      ]);


      $this->user_model->first_name = $req->first_name;
      $this->user_model->last_name = $req->last_name;
      $this->user_model->email = $req->email;
      $this->user_model->gender = $req->gender;
      $this->user_model->mobile = $req->mobile;
      $this->user_model->pincode = $req->pincode;
      $this->user_model->country = $req->country;
      $this->user_model->state = $req->state;
      $this->user_model->city = $req->city;
      $this->user_model->address = $req->address;
      $this->user_model->is_verified = $req->is_verified;
      $this->user_model->is_active = $req->is_active;
      
      
        $this->user_model->save();

  }


  public function edit(Request $req){

      $id =  $req->id;
      $data  = $this->user_model::where('id', $id)->get();
      
     //return data to view
      
      
  }

  public function update(Request $req){

     $response = $this->user_model->where('id',$req->id)->update($req->all());

     //send back 

  }

  public function delete(Request $req){

      $student = $this->user_model->where('id',$req->id)->delete();
      //send back
      return redirect()->back()->with('status','Student Deleted Successfully');
  }


}