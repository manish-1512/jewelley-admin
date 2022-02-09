<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
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


            public function searchProduct(Request $req){

                       $input =  $req->input();
                       
                     $data =  $this->product_model::orderBy('created_at','DESC');

                     if($input['product_category']){

                        $data = $this->product_model::where('product_category',$input['product_category']);
                     }

                     if($input['product_type']){

                        $data = $this->product_model::where('product_type',$input['product_type']);
                     }
                     if($input['query']){

                        $data = $this->product_model::where('title','LIKE', "%" . $input['query'] . "%");
                     }
                     
                     $product_data = $data->get();
                     
                     
                     $product_categories = ProductCategoryModel::SELECT("id","name")->get()->toArray();

                     $product_type =  ProductTypeModel::select("id","name")->get()->toArray();   
                     
                   
                     return view('admin.products',compact('product_data','product_categories','product_type'));


            }    



    
    public function index($search_for = null){
        
        if(!empty($search_for)){

            $product_data =  $this->product_model::where($search_for,'1')->orderBy('created_at', 'DESC')->get();

        }else{
            
            $product_data =  $this->product_model::orderBy('created_at', 'DESC')->get();
        }

        $product_categories = ProductCategoryModel::SELECT("id","name")->get()->toArray();

        $product_type =  ProductTypeModel::select("id","name")->get()->toArray();   
        
      
        return view('admin.products',compact('product_data','product_categories','product_type'));
  }

  public function viewProduct($id){

      $product_data =  $this->product_model::where('id',$id)->first()->toArray();
           $product_data['image']  =  json_decode($product_data['image']);   

              return view('admin.ShowProduct',['product_data' =>  $product_data] );

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
                'image' => 'required',
                'image.*' => 'mimes:png|max:2048',

                "short_description"=> "required",
                "description" => "required" ,
                "price" => "required|numeric|min:1" ,
                "weight" => "required|numeric" ,
                "discount" => "Sometimes|required|numeric", 
                "product_category" => "required|numeric", 
                "product_type" => "required|numeric" ,
                "product_matrial" => "required", 
                "is_active" => "required|numeric|min:0|max:1" ,
                "is_new" => "required|numeric|min:0|max:1" ,
                "is_popular" => "required|numeric|min:0|max:1", 
                "is_best_seller" => "required|numeric|min:0|max:1" 
               
             ])){

             
               
                //save method called    

                $this->product_model->title =$req->title ;
                $this->product_model->description = $req->description;
                $this->product_model->short_description = $req->short_description;
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

                if ($req->file('image')) {

                    foreach($req->file('image') as $file){

                    


                            $destinationPath = 'image/product/';
                            $productImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
                            $file->move($destinationPath, $productImage);

                            $image_data[] = "$productImage";

                    }
                    $this->product_model->image = json_encode($image_data);
                }



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


            $input = $req->all();

                $input = $req->except(['_token']);
        
            $response = $this->product_model->where('id',$req->id)->update($input);

            return redirect()->route('product.list')->with('update','updated succesfully');
         }
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