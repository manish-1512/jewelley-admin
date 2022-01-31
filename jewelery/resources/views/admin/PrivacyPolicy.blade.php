@extends('admin.layout')
   


@section('content')

<form action="{{ route('privacy_policy.update')}}"  method="POST">
  <div class="form-group">
    <label for="email">Title</label>
    <input type="text" class="form-control" value="<?php echo  isset($privacy_policy_data->title) ? $privacy_policy_data->title : '' ?>" name="title" >
  </div>
  <label for="email">Descirption</label>
  <textarea name="description" class="form-control" id="myTextarea"><?php echo  isset($privacy_policy_data->description) ?$privacy_policy_data->description : ''; ?> </textarea>
  <br>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

   
@endsection