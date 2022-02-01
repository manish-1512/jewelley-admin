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

<h1>Update Product Type </h1>

<div class="w-50 offset-2" >

  <form  action="{{ route('product_type.update')}}" method="POST">
  
    <div class="form-group">
      <label for="name">Type Name</label>
      <input type="hidden" name="id" value="{{$data_for_edit['id']}}">
      <input type="text" class="form-control" placeholder="Enter category" name="name" value="{{$data_for_edit['name']}}" id="name">
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