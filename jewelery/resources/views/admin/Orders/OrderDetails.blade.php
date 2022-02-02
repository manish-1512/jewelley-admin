@extends('admin.layout')
   
@section('content')





<!--table start here  -->

<div class="row">

    <div class="table-responsive offset-1 col-5">

        <div class="col-12 text-center  btn btn-outline-danger"> Order Detail </div>

                    <table class="table table-hover mt-2 table-bordered table-sm table-dark border-light">
                            <thead class="bg-info">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Value</th>
                            
                            </tr>
                            </thead>
                            
                            @if($order_details)
                            <tbody>
                            @foreach($order_details as $key => $value )
                                <tr>
                                    <th >{{ $key }}</th>
                                    <td>{{$value}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif

                    </table>
       </div>

<div class="table-responsive col-5 offset-1">

<div class="col-12 text-center  btn btn-outline-danger"> Delivery Details </div>

  <table class="table table-hover mt-2 table-bordered table-sm table-dark border-light">
    <thead class="bg-info">
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Value</th>
     
      </tr>
    </thead>
        @if($address_details)
    <tbody>
    @foreach($address_details as $key => $value )
        <tr>
            <th >{{ $key }}</th>
            <td>{{$value}}</td>
        </tr>
    @endforeach
    </tbody>
    @endif
  </table>

</div>



<div class="table-responsive col-5 offset-1">

<div class="col-12 text-center  btn btn-outline-danger"> User Details </div>

  <table class="table table-hover mt-2 table-bordered table-sm table-dark border-light">
    <thead class="bg-info">
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Value</th>
     
      </tr>
    </thead>
        @if($user_details)
    <tbody>
    @foreach($user_details as $key => $value )
        <tr>
            <th >{{ $key }}</th>
            <td>{{$value}}</td>
        </tr>
    @endforeach
    </tbody>
    @endif
  </table>
</div>


<div class="table-responsive col-10 offset-1">

<div class="col-12 text-center  btn btn-outline-danger"> Orderd Products </div>

  
        @if($orderd_product)
   
    @foreach($orderd_product as $key => $value )


    <table class="table table-hover mt-2 table-bordered table-sm table-dark border-light">

    <thead class="bg-info">
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Value</th>
      </tr>
    </thead>

            <tbody>
                
                @foreach($orderd_product[$key] as $field  => $field_value)

                 <tr>
                    <th >{{ $field }}</th>
                    <td>{{$field_value}}</td>
                 </tr>

                @endforeach                
            </tbody>
         </table>  
         
    @endforeach
    
    @endif

</div>


</div>

  @endsection