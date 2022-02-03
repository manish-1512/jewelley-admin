@extends('admin.layout')
   
@section('content')

<div class="row">
<div class="col-lg-6 margin-tb">
   
    <div class="pull-left m-3">
        <a class="btn btn-success" href="{{route('product.add_new')}}"> Add New Product</a>
    </div>
</div>

<div class="col-lg-6 margin-tb">
   
    <div class="pull-right float-right m-3">
        <a class="btn btn-danger" href="{{route('excel_input.view')}}"> Add New Product from csv file </a>
    </div>
</div>




</div> 

@if(session()->has('update'))

<div class="alert-success col-1 ">
  {{session('update')}}
</div>
@endif

<!--table start here  -->

<table class="table table-striped  table-bordered table-dark">
<thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Description</th>
              <th>Price</th>
              <th>Weight</th>
              <th>Discount</th>
              <th>Product Category</th>
              <th>Status</th>
              <th>Fetures</th>
              <th>Action</th>
            </tr>
          </thead>
          @if ($product_data)
          <!--Table body-->
          <tbody>
            
         
           <?php $i=0; ?>

          @foreach ($product_data as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->weight }}</td>
            <td>{{ $product->discount }}</td>
            <td>{{ $product->product_category }}</td>
                
               
            @if($product->is_active =='1')
            
            <td>  <span class="badge badge-success">Active</span> </td>
            
         @else
           <td><span class="badge badge-danger">Inactive</span></td>
         
         @endif              
                   
              <td>
              @if($product->is_new =='1')
              <span class="badge badge-danger">is new</span>
              @endif

              @if($product->is_popular =='1')
              <span class="badge badge-warning">Popular</span>
              @endif
              @if($product->is_best_seller =='1')
              <span class="badge badge-success">bast seller</span>
              @endif
              </td>

             
            <td class="row">

                    
              <div class="col-12"> 

                <a class="btn btn-sm btn-info" href="{{ route('product.view_detail',$product->id) }}">Show</a>  
                <a class="btn btn-sm btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
                <a class=" btn btn-sm  btn-primary" href="{{ route('product.status',$product->id) }}">Status</a>
                <a class="btn btn-sm btn-primary" href="{{ route('product.delete',$product->id) }}">Delete</a>

              </div>


              <div class="col-12 ">
                  
              <a class="badge badge-pill badge-danger" href="{{ route('product.new',$product->id) }}">New</a>
                    <a class="badge badge-pill badge-warning" href="{{ route('product.popular',$product->id) }}">Popular</a>
                    <a class="badge badge-pill badge-success" href="{{ route('product.best_seller',$product->id) }}">Best Seller</a>
              </div>


            </td>
            
        </tr>
        @endforeach
           
          </tbody>
          <!--Table body-->
  @endif
</table>

  @endsection