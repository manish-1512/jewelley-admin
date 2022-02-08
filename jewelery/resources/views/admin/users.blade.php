@extends('admin.layout')
   
@section('content')

<div class="row">
<div class="col-lg-4 margin-tb">
   
    <div class="pull-left m-3">
        <a class="btn btn-success" href=""> Add New User</a>
    </div>
</div>

<div class="col-lg-6">
  <form action="{{route('users.show')}}" method="Get" >

    <div class="input-group">
      <input type="search" class="form-control rounded mr-4" name="query" placeholder="Enter name, email,or mobile  " aria-label="Search"  />
      <button type="submit" class="btn btn-outline-primary">Search</button>

      <a type="reset" href="{{route('users.show')}}" class="btn mx-2 btn-outline-primary">Reset</a>

    </div>

  </form>
</div>

</div>
<!--table start here  -->
<div class="table-responsive">
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
              <th>Status</th>
              
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

            @if($user->is_active =='1')
            
            <td>  <span class="badge badge-success">Active</span> </td>
            
         @else
           <td><span class="badge badge-danger">Inactive</span></td>
         
         @endif 


            <td>

                  <form action="" method="GET">

                  <a class="btn btn-primary btn-sm" href="{{ route('user.status',$user->id) }}">Status</a>

                   <a class="btn btn-primary btn-sm" href="{{ route('orders.list',$user->id) }}">Orders</a>

                   <a class="btn btn-primary btn-sm" href="{{ route('user.show',$user->id) }}"> Show </a>



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
</div>
  @endsection