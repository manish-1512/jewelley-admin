@extends('admin.layout')
   
@section('content')

<div class="row">
<div class="col-lg-12 margin-tb">
   
    <div class="pull-left m-3">
        <a class="btn btn-success" href=""> Add New User</a>
    </div>
</div>
</div>
<!--table start here  -->

<table class="table table-striped  table-bordered table-dark">
<thead>
            <tr>
              <th>#</th>
              <th>First Name</th>
              <th>last Name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Gender</th>
              <th>Pincode</th>
              <th>Country</th>
              <th>State</th>
              <th>City</th>
              
              <th>Action</th>
            </tr>
          </thead>
          @if ($user_data)
          <!--Table body-->
          <tbody>
         
           <?php $i=0; ?>

          @foreach ($user_data as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->mobile }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->pincode }}</td>
            <td>{{ $user->country }}</td>
            <td>{{ $user->state }}</td>
            <td>{{ $user->city }}</td>

            <td>

            
                <form action="" method="POST">
      
                <a class="btn btn-primary btn-sm" href="">Status</a>
                <a class="btn btn-primary btn-sm" href="{{ route('orders.list',$user->id) }}">Orders</a>

                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
            
        </tr>
        @endforeach
           
          </tbody>
          <!--Table body-->
  @endif
</table>

  @endsection