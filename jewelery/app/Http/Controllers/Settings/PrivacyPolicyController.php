<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicyModel;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{   
    public $privacy_policy;

    public function __construct()
    {
        $this->privacy_policy = new PrivacyPolicyModel();
    }


    //error 
    public function create(Request $req){

        $req->validate([
            'title' => 'required',
            'description' => 'required'
        ]);


        $this->privacy_policy->title = $req->title;
        $this->privacy_policy->description = $req->description;
        
          $this->privacy_policy->save();

           

    }
    
}
