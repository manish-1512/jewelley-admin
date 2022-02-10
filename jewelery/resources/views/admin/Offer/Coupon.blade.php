@extends('admin.layout')
   
@section('content')

<div class="row">
<div class="col-lg-12 margin-tb">
   
    <div class="pull-left m-3">
        <a class="btn btn-success" href="{{route('coupon_code.save')}}"> Add New Coupan</a>
    </div>
</div>
</div>
<!--table start here  -->

@if(session()->has('insert'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
 .{{session()->get('insert')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

</div>
@endif


<table class="table table-striped  table-bordered table-dark">
<thead>
            <tr>
              <th>ID</th>
              <th>Coupon Name</th>
              <th>Coupon Code</th>
              <th>Discount Type</th>
              <th>Coupon Value</th>
              <th>Start Date Time </th>
              <th>End Date Time</th>
              <th>Max Discount </th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>

          @if($coupons)

            <tbody>

              @foreach($coupons as $value)
              
              <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    
                    <td>{{$value->coupon_code}}</td>
                    <td>{{$value->discount_type}}</td>
                    <td>{{$value->discount_value}}</td>
                    <td>{{$value->start_date_time}}</td>
                    <td>{{$value->end_date_time}}</td>
                    <td>{{$value->max_discount_amount}}</td>

                    @if($value->is_active =='1')
            
                      <td>  <span class="badge badge-success">Active</span> </td>
                      
                  @else
                    <td><span class="badge badge-danger">Inactive</span></td>
                  
                  @endif 

                    <td>

                  <a class="btn btn-sm btn-primary" href="{{route('coupon_code.edit',$value->id)}}">Edit</a>
                  <a class=" btn btn-sm  btn-primary" href="">Status</a>
                  <a class="btn btn-sm btn-danger" href="">Delete</a>


                    </td>

              </tr>
              @endforeach
            </tbody>

          @endif
           
</table>

  @endsection