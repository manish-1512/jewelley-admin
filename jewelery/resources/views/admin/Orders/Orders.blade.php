@extends('admin.layout')
    
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Banner Image Upload </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href=""> Create New Banner </a>
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
            <th>Order No</th>
            <th> User Name</th>
            <th>Amount </th>
            <th>Order Status</th>
            <th>Order Date </th>
            <th width="280px">Action</th>
        </tr>
  
        @foreach ($OrderModels as $orders)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{$orders->id}}</td>
            
            <td>{{ $orders->f_name }}</td>

            <td>{{ $orders->total_payment}}</td>
            <td>{{$orders->status}}</td>
            <td>{{$orders->created_at}}</td>   
             
            
        </tr>
        @endforeach
      
    </table>
    
     {{--!! $products->links() !!--}}
        
        
@endsection