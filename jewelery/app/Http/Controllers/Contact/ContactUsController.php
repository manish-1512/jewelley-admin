<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\ContactUSModel;
use Illuminate\Http\Request;
use App\Mail\MyTestMail;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $contact_us_data =  ContactUSModel::orderBy('created_at','desc')->get()->toArray();
      
        return view('admin.Contact.ContactUs',['contact_us_data' => $contact_us_data]);
        
    }

   public function view($id){
    
    $contact_us =  ContactUSModel::where('id',$id)->first()->toArray();

  

        return view('admin.Contact.ContactUsView',['view_contact_us' => $contact_us]);

   }
       

   public function replyMail(Request $req){


        $details = [
            "title" => "bbbbbbbbbbbb",
            "body" => $req->message
        ];


        \Mail::to($req->email)->send( new MyTestMail($details));

   }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUSModel  $contactUSModel
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
            ContactUSModel::where('id',$id)->delete();
            //send back
            return redirect()->back()->with('status','Student Deleted Successfully');
        
    }
}
