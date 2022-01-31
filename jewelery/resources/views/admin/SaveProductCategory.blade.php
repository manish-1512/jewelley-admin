@extends('admin.layout')
   
@section('content')

<div class="w-50 offset-2" >

  <form  action="{{ route('product_category.create')}}" method="POST">
  
    <div class="form-group">
      <label for="name">Category Name</label>
      <input type="text" class="form-control" placeholder="Enter category" name="name" id="name">
    </div>
    
    <div class="form-group">
      <label for="pwd">Is Active</label>
  
      <select class="form-control" id="" name="is_active">
        <option value="1">Yes</option>
        <option value="2">NO</option>          
      </select>
     
    </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>




@endsection