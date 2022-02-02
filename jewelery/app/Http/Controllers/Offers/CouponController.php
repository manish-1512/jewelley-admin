<?php

namespace App\Http\Controllers\Offers;

use App\Http\Controllers\Controller;
use App\Models\CouponModel;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
            $coupans =  CouponModel::orderBy('created_at','desc')->get()->toArray();


        return view('admin.Offer.Coupon',['coupons' => $coupans]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CouponModel  $couponModel
     * @return \Illuminate\Http\Response
     */
    public function show(CouponModel $couponModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CouponModel  $couponModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CouponModel $couponModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CouponModel  $couponModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CouponModel $couponModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CouponModel  $couponModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CouponModel $couponModel)
    {
        //
    }
}
