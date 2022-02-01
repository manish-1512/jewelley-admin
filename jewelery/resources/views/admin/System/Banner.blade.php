@extends('admin.layout')
    
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Banner Image Upload </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('banner.create')}}"> Create New Banner </a>
            </div>
        </div>
    </div>

    <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p> Banner created successfully  </p>
        </div>
    @endif
     
    @if ($message = Session::get('delete'))
        <div class="alert alert-success">
            <p> Banner deleted successfully  </p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Order By</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
  
        @foreach ($BannerModels as $banner)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $banner->image }}" width="100px"></td>
            <td>{{ $banner->name }}</td>
            <td>{{ $banner->order_by }}</td>
               
            @if($banner->is_active =='1')
            
            <td>  <span class="badge badge-success">Active</span> </td>
            
            @else
            <td><span class="badge badge-danger">Inactive</span></td>
            
            @endif      
            <td>

              
                    <a class="btn btn-info" href="{{ route('banner.show',$banner->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('banner.edit',$banner->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('banner.delete',$banner->id) }}">Delete</a>
                   
                 
            </td>
        </tr>
        @endforeach
      
    </table>

  
        
   
        
@endsection