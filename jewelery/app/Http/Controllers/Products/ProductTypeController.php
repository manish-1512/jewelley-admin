<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\ProductTypeModel;
use Illuminate\Http\Request;

class ProductTypeController extends Controller{

    public $product_type_model;

    public function __construct()
    {   
        $this->product_type_model = new ProductTypeModel();

        }

    
    public function index(){    

        
        $product_type_data =  $this->product_type_model::orderBy('created_at', 'DESC')->get();
      
        return view('admin.ProductType',compact('product_type_data'));

  }

  public function viewProduct(){
    

  }

  public function ChangeStatus(Request $req){

                     
              $data =  $this->product_type_model::select('is_active')->where('id',$req->id)->first()->toArray();

              $status =($data['is_active'] == '1')?'0':'1';
                   
            $this->product_type_model::where('id',$req->id)->update(['is_active'=>$status ]);

            return redirect()->back();

  } 




  public function create(Request $req){

        

      if($req->validate([

        'name' => "required",
        'is_active' => "required|digits_between:0,1"

      ])){

          
                 $this->product_type_model->name = $req->name;
                 $this->product_type_model->is_active = $req->is_active;

                 $this->product_type_model->save();
                             
                  return redirect()->route('product_type.list');

             }
                  
        
       

  }


  public function edit(Request $req){

        $id =  $req->id;
        
       $data_for_edit  = $this->product_type_model::where('id', $id)->first()->toArray();

     

        return view('admin.EditProductType',['data_for_edit' => $data_for_edit]);     
      
  }

  public function update(Request $req){

      $response = $this->product_type_model->where('id',$req->id)->update($req->all());

      return redirect()->route('product_type.list');
  }

  public function delete(Request $req){

       $this->product_type_model->where('id',$req->id)->delete();
       
       return redirect()->back()->with('status','Student Deleted Successfully');
  }


}