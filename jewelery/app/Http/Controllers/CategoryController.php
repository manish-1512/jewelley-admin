<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{   
    public $category;

    public function __construct()
    {
        $this->category = new CategoryModel();
    }

    public function index(){    

        
           return response()->json( $category_data =  $this->category::all(),200);

         
    }

    public function create(Request $req){

        $req->validate([
            'name' => 'required|unique:category,name,{$this->post->id}',
            'is_active' => 'required'
        ]);

        $this->category->name = $req->name;
        $this->category->is_active = $req->is_active;
        
        $this->category->save();

    }


    public function edit(Request $req){

        $id =  $req->id;
        $data  = $this->category::where('id', $id)->get();
        
        return response()->json($data,200);
        
        
    }

    public function update(Request $req){

            
           if($this->category->where('id',$req->id)->update($req->all())){
               return response()->json(200);
           }else{
               return response()->json(500);
           }

    }

    public function delete(Request $req){

        $student = $this->category->where('id',$req->id)->delete();
        
        return redirect()->back()->with('status','Student Deleted Successfully');
    }
}
