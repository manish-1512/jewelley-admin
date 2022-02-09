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

                      @if($key == "image")

                      @continue

                      @endif
                     <tr> 
                        <th >{{ $key }}</th>
                        <td>{{$value}}</td>
                     </tr>
                   
                    @endforeach                
                </tbody>
             </table>  
             
    </div>




    <div class="col-6">

          @if($product_data['image'])

              @foreach($product_data['image'] as $image)

           <img src="/image/product/{{$image}}" alt="{{$image}}"  width="300px">

            @endforeach
          @endif
    </div>

    </div>


   
   @endif


</div>


@endsection