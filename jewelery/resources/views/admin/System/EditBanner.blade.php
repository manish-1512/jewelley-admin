@extends('admin.layout')
    
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit  Banner </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('banner.list') }}"> Back</a>
            </div>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    

    <form action="{{ route('banner.update') }}" method="POST" enctype="multipart/form-data"> 
        
       
     
         <div class="row col-6">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>

                    <input type="hidden" name="id" value="{{$data_for_edit['id']}}">
                    <input type="text" name="name" value="{{$data_for_edit['name']}}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>IS active</strong>
                    <select name="is_active" id="" class="form-control">
                       <option value="1"<?php echo($data_for_edit['is_active'] == "1")?"selected" : "" ?> >Yes</option> 
                       <option value="0" <?php echo($data_for_edit['is_active'] == "0")?"selected" : "" ?>>No</option> 
                    </select>
                   
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{$data_for_edit['image']}}" width="300px">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Order by</strong>
                    <input type="number" name="order_by" value="{{$data_for_edit['order_by']}}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     
    </form>
@endsection


