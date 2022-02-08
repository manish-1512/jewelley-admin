<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller{

    public $user_model;

    public function __construct()
    {   
        $this->user_model = new UserModel();
    }

    
    public function index(Request $req){    

        $query = $req->input('query');

        if($query){
            
            $user_data =  $this->user_model::where('first_name', 'LIKE', '%'.$query.'%')
                    ->orWhere('last_name', 'LIKE', '%'.$query.'%')
                    ->orWhere('email', 'LIKE', '%'.$query.'%')   
                    ->orWhere('mobile', 'LIKE', '%'.$query.'%')->get();   

      }else{
        $user_data =  $this->user_model::get();
      }
     

        return view('admin.users',compact('user_data'));

    }


    public function changeStatus($id){

        
    $data =  $this->user_model::select('is_active')->where('id',$id)->first()->toArray();

    $status =($data['is_active'] == '1')?'0':'1';

        $this->user_model::where('id',$id)->update(['is_active'=> $status ]);

        return redirect()->back();

    }


    //this is for see user details 

    public function UserShow($user_id){

            $user_data =  $this->user_model::select('id','first_name','last_name','mobile','email','gender','country','state','city','address','image','is_active','created_at','updated_at')->first()->toArray();

            return view('admin.Showuser',['user_data' => $user_data]);

    }




// show user orders history

    // public function userOrders(Request $req){
        
    //     $user_orders =  OrderModel::where('user_id',$req->user_id)->get()->toArray();  

    //     return view('admin.UserOrders'  );
    // }



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