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


<div class="w-50 offset-2" >

  <form  action="{{ route('product_category.create')}}" method="POST" enctype="multipart/form-data">
  
    <div class="form-group">
      <label for="name">Category Name</label>
      <input type="text" class="form-control" placeholder="Enter category" name="name" id="name">
    </div>

    <div class="form-group">
      <label for="image">Category Image</label>
      <input type="file" class="form-control"  name="image" >
    </div>
    
    <div class="form-group">
      <label for="pwd">Is Active</label>
  
      <select class="form-control" id="" name="is_active">
        <option value="1">Yes</option>
        <option value="0">NO</option>          
      </select>
     
    </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>




@endsection