<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\ProductCategoryModel;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller{

    public $product_category_model;

    public function __construct()
    {   
        $this->product_category_model = new ProductCategoryModel();

        }

    
    public function index(){    

        
        $product_category_data =  $this->product_category_model::orderBy('created_at', 'DESC')->get();
      
        return view('admin.ProductCategories',compact('product_category_data'));

  }

  public function viewProduct(){
    

  }

  public function ChangeStatus(Request $req){

                     
              $data =  $this->product_category_model::select('is_active')->where('id',$req->id)->first()->toArray();

              $status =($data['is_active'] == '1')?'0':'1';
                   
            $this->product_category_model::where('id',$req->id)->update(['is_active'=>$status ]);

            return redirect()->back();

  } 




  public function create(Request $req){

        

      if($req->validate([

        'name' => "required",
        'is_active' => "required|digits_between:0,1"

      ])){

          
                 $this->product_category_model->name = $req->name;
                 $this->product_category_model->is_active = $req->is_active;
                  $status =  $this->product_category_model->save();

                  if($status){

                    return redirect()->route('product_category.list');
             }
                  
         }else{

            

         }

       

  }


  public function edit(Request $req){

        $id =  $req->id;
        
       $data_for_edit  = $this->product_category_model::where('id', $id)->get();
     
      //  return view('products',compact('data_for_edit'));     
      
  }

  public function update(Request $req){

    //  $response = $this->product_category_model->where('id',$req->id)->update($req->all());

     //send back 

  }

  public function delete(Request $req){

    //   $student = $this->product_category_model->where('id',$req->id)->delete();
    //   //send back
    //   return redirect()->back()->with('status','Student Deleted Successfully');
  }


}