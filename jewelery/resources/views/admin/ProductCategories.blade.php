@extends('admin.layout')
   
@section('content')

<div class="row">
<div class="col-lg-12 margin-tb">
   
    <div class="pull-left m-3">
        <a class="btn btn-success" href="{{ route('product_category.save')}}"> Add New Category</a>
    </div>

</div>
</div>
<!--table start here  -->

@if(session()->has('delete'))

<div class="alert alert-warning alert-dismissible float-right w-25 fade show" role="alert">
   Your Data is deleted  .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

</div>
@endif





<table class="table table-striped  table-bordered table-dark">
<thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Image</th>
              <th>status</th>
              <th>Action</th>
            </tr>
          </thead>
          @if ($product_category_data)
          <!--Table body-->
          <tbody>
         
        

          @foreach ($product_category_data as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                @if($category->image)
                <img src="{{ PRODUCT_CATEGORY_IMAGE_PATH.$category->image }}" width="120px" >
                @else
                <img src="{{NO_IMAGE_PATH}}" width="120px" >
                @endif
            </td>


            @if($category->is_active =='1')
            
            <td>  <span class="badge badge-success">Active</span> </td>
            
            @else
            <td><span class="badge badge-danger">Inactive</span></td>
            
            @endif          
            <td>

            
                <form action="" method="POST">
      
                <a class="btn btn-primary btn-sm" href="{{route('product_category.status',$category->id) }}">Status</a> 
                
                <a class="btn btn-primary btn-sm" href="{{route('product_category.edit',$category->id) }}">Edit</a>
                <a class="btn btn-primary btn-sm" href="{{route('product_category.delete',$category->id) }}">Delete</a>

                </form>
            </td>
            
        </tr>
        @endforeach
           
          </tbody>
          <!--Table body-->
  @endif
</table>

  @endsection