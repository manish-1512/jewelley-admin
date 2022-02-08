@extends('admin.layout')
   
@section('content')

<div class="container ">
  <h2> User details </h2>
  
  
  
  @if($user_data)
   
  


   <table class="table table-hover mt-2 table-bordered table-sm table-dark border-light">

   <thead class="bg-info">
     <tr>
       <th scope="col">Title</th>
       <th scope="col">Value</th>
     </tr>
   </thead>

           <tbody>
               
               @foreach($user_data as  $key => $value)

                <tr>
                   <th >{{ $key }}</th>
                   <td>{{$value}}</td>
                </tr>

               @endforeach                
           </tbody>
        </table>  
        
  
   
   @endif


</div>


@endsection