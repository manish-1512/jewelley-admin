<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrivacyPolicyController extends Controller
{   
  

 
    public function view(){ 

        $file= Storage::disk('local')->get('filename.txt');
  
           if($file){

               $privacy_policy_data =  json_decode($file);
    
           return view('admin.PrivacyPolicy',compact('privacy_policy_data'));          
           }
           
           return view('admin.PrivacyPolicy');
           
    }

    public function update(Request $req){

                  $data =   json_encode($req->all());

                  Storage::disk('local')->put('filename.txt',$data);
                  
                    
                  return redirect()->route('privacy_policy.view');

    }



    
}
