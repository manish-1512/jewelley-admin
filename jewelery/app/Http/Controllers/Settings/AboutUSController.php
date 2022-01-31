<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUSController extends Controller
{   

 
    public function view(){ 

        $file= Storage::disk('local')->get('aboutus.txt');
  
           if($file){

               $about_us_data =  json_decode($file);
    
           return view('admin.AboutUS',compact('about_us_data'));          
           }
           
           return view('admin.AboutUS');
           
    }

    public function update(Request $req){

                  $data =   json_encode($req->all());

                  Storage::disk('local')->put('aboutus.txt',$data);
                                  
                  return redirect()->route('about_us.view');

    }



    
}
