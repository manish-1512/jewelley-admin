<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\AboutUSModel;
use Illuminate\Http\Request;

class AboutUSController extends Controller
{   
    public $about_us;

    public function __construct()
    {
        $this->about_us = new AboutUSModel();
    }  
   
    public function create(Request $req){

        $req->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $this->about_us->title = $req->title;
        $this->about_us->description = $req->description;
        
           $id =  $this->about_us->save();

            return $id;


    }

}
