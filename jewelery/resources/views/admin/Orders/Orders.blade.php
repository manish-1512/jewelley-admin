@extends('admin.layout')
    
@section('content')
   

    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Order Id</th>
            <th> User Name</th>
            <th>Amount </th>
            <th>Order Status</th>
            <th>Order Date </th>
            <th width="280px">Action</th>
        </tr>

        <?php $i =1 ; ?>

        @foreach ($OrderModels as $orders)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{$orders['order_id']}}</td>
            
            <td>{{ $orders['first_name'] }}</td>

            <td>{{ $orders['total_payment']}}</td>
            <td>{{$orders['status']}}</td>
            <td>{{$orders['created_at']}}</td>   
            <td>
            <a class="btn btn-primary" href="{{ route('orders.order_details',$orders['id']) }}">Show</a>
            <a class="btn btn-info" href="">Status</a>
            </td>

        </tr>
        @endforeach
      
    </table>
    
     {{--!! $products->links() !!--}}
        
        
@endsection