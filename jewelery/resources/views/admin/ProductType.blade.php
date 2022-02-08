@extends('admin.layout')
   
@section('content')

<div class="row">
<div class="col-lg-12 margin-tb">
   
    <div class="pull-left m-3">
        <a class="btn btn-success" href="{{ route('product_type.save')}}"> Add New Product Type</a>
    </div>

</div>
</div>
<!--table start here  -->



<table class="table table-striped  table-bordered table-dark">
<thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>status</th>
              <th>Action</th>
            </tr>
          </thead>
          @if ($product_type_data)
          <!--Table body-->
          <tbody>
         
           <?php $i=0; ?>

          @foreach ($product_type_data as $type)
        <tr>
            <td>{{  $type->id }}</td>
            <td>{{ $type->name }}</td>
            
            @if($type->is_active =='1')
            
            <td>  <span class="badge badge-success">Active</span> </td>
            
            @else
            <td><span class="badge badge-danger">Inactive</span></td>
            
            @endif          
            <td>

            
                <form action="" method="POST">
      
                <a class="btn btn-primary btn-sm" href="{{route('product_type.status',$type->id) }}">Status</a> 

                <a class="btn btn-primary btn-sm" href="{{route('product_type.edit',$type->id) }}">Edit</a> 
                <a class="btn btn-primary btn-sm" href="{{route('product_type.delete',$type->id) }}">Delete</a> 

                </form>
            </td>
            
        </tr>
        @endforeach
           
          </tbody>
          <!--Table body-->
  @endif
</table>

  @endsection