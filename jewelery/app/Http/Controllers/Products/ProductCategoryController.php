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

        'name' => "required|unique:product_categories,name,{$req->id}",
        'is_active' => "required|digits_between:0,1",
        'image' => 'required|image|mimes:png|max:2048'

      ])){

          $input = $req->all();

                 if ($image = $req->file('image')) {
                  $destinationPath = public_path().PRODUCT_CATEGORY_IMAGE_PATH;
                  $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                  $image->move($destinationPath, $profileImage);
                  $input['image'] = "$profileImage";
              }else{
                
                  $input['image'] = "no-image.png";
              }

            

                  $status =  $this->product_category_model::create($input);
                

                  if($status){

                    return redirect()->route('product_category.list');
             }
                  
         }

       

  }


  public function edit(Request $req){

               
       $data_for_edit  = $this->product_category_model::where('id', $req->id)->first()->toArray();
         
        return view('admin.EditProductCategory',['data_for_edit' => $data_for_edit]);     
      
  }

  public function update(Request $req){

    $validatedData = $req->validate([

      'name' => 'required',
      'is_active' => 'required',
    
    ]);

      $input =  $req->all();

    if ($image = $req->file('image')) {
      $destinationPath = public_path().PRODUCT_CATEGORY_IMAGE_PATH;
          $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

          $image->move($destinationPath, $profileImage);
          $input['image'] = "$profileImage";
      }else{
         
          $input['image'] = "no-image.png";
      }
        $response = $this->product_category_model->where('id',$input['id'])->update($input);

        return redirect()->route('product_category.list');

      }

  public function delete(Request $req){

       $this->product_category_model->where('id',$req->id)->delete();
    
      return redirect()->back()->with('delete','category  Deleted Successfully');
  }


}