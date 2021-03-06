@extends('admin.layout')
   
@section('content')



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>Update Product Category </h1>

<div class="w-50 offset-2" >

  <form  action="{{ route('product_category.update')}}" method="POST" enctype="multipart/form-data">
  
    <div class="form-group">
      <label for="name">Type Name</label>
      <input type="hidden" name="id" value="{{$data_for_edit['id']}}">
      <input type="text" class="form-control" placeholder="Enter category" name="name" value="{{$data_for_edit['name']}}" id="name">
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image"  class="form-control" placeholder="image">
                    <img src="{{ PRODUCT_CATEGORY_IMAGE_PATH.$data_for_edit['image']}}" width="300px">
                </div>
            </div>

    
    <div class="form-group">
      <label for="pwd">Is Active</label>
  
      <select class="form-control" id="" name="is_active" value="{{$data_for_edit['name']}}">
        <option value="1">Yes</option>
        <option value="0">NO</option>          
      </select>
     
    </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>




@endsection