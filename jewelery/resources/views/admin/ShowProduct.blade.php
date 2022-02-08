@extends('admin.layout')
   
@section('content')

<div class="container-fluid ">
  <h2> User details </h2>
  
  
  
  @if($product_data)
   
  <div class="row ">

    <div class="col-6">
        
        <table class="table table-hover mt-2 table-bordered table-sm table-dark border-light">
      
        <thead class="bg-info">
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Value</th>
          </tr>
        </thead>
      
                <tbody>
                    
                    @foreach($product_data as  $key => $value)
      
                     <tr>
                        <th >{{ $key }}</th>
                        <td>{{$value}}</td>
                     </tr>
      
                    @endforeach                
                </tbody>
             </table>  
             
    </div>




    <div class="col-6">

        <img src="/image/product/{{$product_data['image']}}" alt="{{$product_data['image']}}"  width="300px">
    </div>

    </div>


   
   @endif


</div>


@endsection