<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;

use App\Models\ProductCategoryModel;
use App\Models\ProductModel;
use App\Models\ProductTypeModel;
use Illuminate\Http\Request;

class ProductController extends Controller{

    public $product_model;

    public function __construct()
    {   
        $this->product_model = new ProductModel();

        }

    
    public function index(){    
      
        $product_data =  $this->product_model::get();

        return view('admin.products',compact('product_data'));
  }

  public function viewProduct(){
    
  }

  public function Changestatus(Request $req){

                       $data =  $this->product_model::select('is_active')->where('id',$req->id)->first()->toArray();;

                      $status =($data['is_active'] == '1')?'0':'1';

                $this->product_model::where('id',$req->id)->update(['is_active'=> $status ]);

                return redirect()->back();

  } 

        public function saveProductView(){

            $category_model = new ProductCategoryModel();
            $product_type_model = new ProductTypeModel();
            
            $categories = $category_model::all()->toArray();

            $product_type = $product_type_model::all()->toArray();


            return view('admin.SaveProduct',['categories' =>$categories ,'product_types' =>$product_type]);
        
        }



  public function create(Request $req){

               if($req->validate([
              
                 
                "title" => "required",
                "description" => "required" ,
                "price" => "required" ,
                "weight" => "required" ,
                "discount" => "required", 
                "product_category" => "required", 
                "product_type" => "required" ,
                "product_matrial" => "required", 
                "is_active" => "required" ,
                "is_new" => "required" ,
                "is_popular" => "required", 
                "is_best_seller" => "required" 
               
             ])){

             
               
                //save method called    

                $this->product_model->title =$req->title ;
                $this->product_model->description = $req->description;
                $this->product_model->price =$req->price;
                $this->product_model->weight =$req->weight;
                $this->product_model->discount =$req->discount; 
                $this->product_model->product_category = $req->product_category; 
                $this->product_model->product_type = $req->product_type ;
                $this->product_model->product_matrial =$req->product_matrial ; 
                $this->product_model->is_active = $req->is_active ;
                $this->product_model->is_new = $req->is_new;
                $this->product_model->is_popular = $req->is_popular; 
                $this->product_model->is_best_seller = $req->is_best_seller; 

                if($req->id){   
                                       

                    $this->product_model->update();

                }else{

                    $this->product_model->save();
                }

                return redirect()->back()->with('status','Successfully');


      }


  }


  public function edit(Request $req){

      $id =  $req->id;
  
      $data_to_edit  = $this->product_model::where('id', $id)->first()->toArray();


      $category_model = new ProductCategoryModel();
            $product_type_model = new ProductTypeModel();
            
            $categories = $category_model::all()->toArray();

            $product_type = $product_type_model::all()->toArray();
       
     return view('admin.EditProduct',['data_to_edit' => $data_to_edit,'categories' => $categories,'product_types' => $product_type] );
      
  }

      public function update(Request $req){

           
     $response = $this->product_model->where('id',$req->id)->update($req->all());

     return redirect()->route('product.list')->with('update','updated succesfully');
  }


  
  public function delete(Request $req){

      $student = $this->product_model->where('id',$req->id)->delete();
      //send back
      return redirect()->back()->with('status','Student Deleted Successfully');
  }


  //change product status to new 

  public function changeStatusNew($id){

    $data =  $this->product_model::select('is_new')->where('id',$id)->first()->toArray();;

    $status =($data['is_new'] == '1')?'0':'1';

        $this->product_model::where('id',$id)->update(['is_new'=> $status ]);

        return redirect()->back();
  }

  //change product status to popular 
  public function changeStatusPopular($id){

    $data =  $this->product_model::select('is_popular')->where('id',$id)->first()->toArray();;

    $status =($data['is_popular'] == '1')?'0':'1';

        $this->product_model::where('id',$id)->update(['is_popular'=> $status ]);

        return redirect()->back();
  }

  //change product status to bestseller

  public function changeStatusBestSeller($id){

    $data =  $this->product_model::select('is_best_seller')->where('id',$id)->first()->toArray();;

    $status =($data['is_best_seller'] == '1')?'0':'1';

        $this->product_model::where('id',$id)->update(['is_best_seller'=> $status ]);

        return redirect()->back();
  }




}