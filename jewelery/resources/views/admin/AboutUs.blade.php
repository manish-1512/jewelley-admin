@extends('admin.layout')
   


@section('content')

<form action="{{ route('about_us.update')}}"  method="POST">
  <div class="form-group">
    <label for="email">Title</label>
    <input type="text" class="form-control" value="<?php echo  isset($about_us_data->title) ? $about_us_data->title : '' ?>" name="title" >
  </div>
  <label for="email">Descirption</label>
  <textarea name="description" class="form-control" id="myTextarea"><?php echo  isset($about_us_data->description) ?$about_us_data->description : ''; ?> </textarea>
  <br>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

   
@endsection