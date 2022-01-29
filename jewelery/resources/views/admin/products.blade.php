@extends('admin.layout')
   
@section('content')

<div class="row">
<div class="col-lg-12 margin-tb">
   
    <div class="pull-left m-3">
        <a class="btn btn-success" href="{{route('product.add_new')}}"> Add New Product</a>
    </div>
</div>
</div> 


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
              <th>Action</th>
            </tr>
          </thead>
          @if ($product_data)
          <!--Table body-->
          <tbody>
            
            @if($product_data->message)

            {{$message}}
            @endif
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

            
                <form action="" method="POST">
   
                    <a class="btn btn-info" href="{{ route('product.view_detail',$product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
                    <a class="btn btn-primary" href="{{ route('product.status',$product->id) }}">Status</a>
                    @csrf
                    @method('DELETE')   
                          
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            
        </tr>
        @endforeach
           
          </tbody>
          <!--Table body-->
  @endif
</table>

  @endsection