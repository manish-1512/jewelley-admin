<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $BannerModels = BannerModel::latest()->paginate(5);
    
        return view('admin.System.Banner',compact('BannerModels'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.System.BannerCreate');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',       
            'image' => 'required|image|mimes:png|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        BannerModel::create($input);
     
        return redirect()->route('banner.list')
                        ->with('success','BannerModel created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\BannerModel  $BannerModel
     * @return \Illuminate\Http\Response
     */
    public function show(BannerModel $BannerModel)
    {
        return view('BannerModels.show',compact('BannerModel'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BannerModel  $BannerModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {   

                 
       $data_for_edit  = BannerModel::where('id', $req->id)->first()->toArray();
   

        return view('admin.System.EditBanner',['data_for_edit' => $data_for_edit]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BannerModel  $BannerModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'is_active' => 'required'
        ]);
  
       
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }   

        $banner_model = new BannerModel();
          
         $banner_model->where('id',$input['id'])->update($input);
    
        return redirect()->route('banner.list')
                        ->with('success','BannerModel updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BannerModel  $BannerModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        BannerModel::where('id',$req->id)->delete();
     
        return redirect()->route('banner.list')
                        ->with('delete','BannerModel deleted successfully');
    }

    public function changeStatus($id){

           
        $data =  BannerModel::select('is_active')->where('id',$id)->first()->toArray();

        $status =($data['is_active'] == '1')?'0':'1';
             
        BannerModel::where('id',$id)->update(['is_active'=>$status ]);

      return redirect()->back();



    }


}
