<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{   

 
    public function view(){ 

        return view('admin.System.Banner');
           
    }

    public function update(Request $req){

                  $data =   json_encode($req->all());

                  Storage::disk('local')->put('aboutus.txt',$data);
                                  
                  return redirect()->route('about_us.view');

    }



    
}
