@extends('admin.layout')
   
@section('content')

<div class="row">
<div class="col-lg-12 margin-tb">
   
    <h2>Contact US</h2>    

</div>
</div>
<!--table start here  -->

<table class="table table-striped  table-bordered table-dark">
<thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Subject</th>
              <th>Message</th>
              <th>Action</th>
              
            </tr>
          </thead>
          @if ($contact_us_data)
          <!--Table body-->
          <tbody>
         
           <?php $i=0; ?>

          @foreach ($contact_us_data as $contact_us)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $contact_us['name'] }}</td>
            <td>{{ $contact_us['email'] }}</td>
            <td>{{ $contact_us['phone'] }}</td>
            <td>{{ $contact_us['subject'] }}</td>
            <td>
                  <div class="row">
                <div class="col-6 text-truncate">
                    Praeterea iter est quasdam res quas ex communi.
                </div>
                </div>

       
        </td>
            <td>{{ $contact_us['created_at'] }}</td>
   
            <td>

            
                <form action="" method="POST">
      
                <a class="btn btn-primary btn-sm" href="{{route('contact_us.view',$contact_us['id'])}}">View</a>
                <a class="btn btn-primary btn-sm" href="{{route('contact_us.view',$contact_us['id'])}}">Reply</a>

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