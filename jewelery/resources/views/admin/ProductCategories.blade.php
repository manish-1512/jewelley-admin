@extends('admin.layout')
   
@section('content')

<div class="row">
<div class="col-lg-12 margin-tb">
   
    <div class="pull-left m-3">
        <a class="btn btn-success" href="{{ route('product_category.save')}}"> Add New Category</a>
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
          @if ($product_category_data)
          <!--Table body-->
          <tbody>
         
           <?php $i=0; ?>

          @foreach ($product_category_data as $category)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $category->name }}</td>
            
            @if($category->is_active =='1')
            
            <td>  <span class="badge badge-success">Active</span> </td>
            
            @else
            <td><span class="badge badge-danger">Inactive</span></td>
            
            @endif          
            <td>

            
                <form action="" method="POST">
      
                <a class="btn btn-primary btn-sm" href="{{route('product_category.status',$category->id) }}">Status</a> 
                
                <a class="btn btn-primary btn-sm" href="">Edit</a>

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