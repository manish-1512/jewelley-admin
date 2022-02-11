@extends('admin.layout')  
<link href="https://www.jquery-az.com/jquery/css/jquery.multiselect.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="https://www.jquery-az.com/jquery/js/multiselect-checkbox/jquery.multiselect.js"></script>

@section('content')



<!-- save users -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h2 class="text-center"> ADD Discount Coupans  </h2>

<form class="m-5" method="POST" action="{{route('coupon_code.update')}}" >

  @csrf

  
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="title">Coupan Name</label>
      <input type="hidden" name="id" value="{{$coupon_data['id']}}">
      <input type="text" class="form-control" name="name" value="{{$coupon_data['name']}}">
    </div>

    <div class="form-group col-md-4">
      <label for="price">Coupan Code</label>
      <input type="text" class="form-control" name="coupon_code"  value="{{$coupon_data['coupon_code']}}">
    </div>

  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
    <label for="title">Discount Type</label>

        <select name="discount_type" id="" class="form-control" >

        <option value="" >Select </option>

        <option value="flat" <?php echo ($coupon_data['discount_type']== "flat")? "selected" :"" ;  ?>  >Flat</option>
        <option value="per" <?php echo ($coupon_data['discount_type']== "per")? "selected" :"" ;  ?>  >Per</option>    
        </select> 


    </div>
    <div class="form-group col-md-4">
      <label for="price">Discount Value</label>
      <input type="text" class="form-control" name="discount_value" value="{{$coupon_data['discount_value']}}" placeholder="if discount is % then enter 1 - 100">
    </div>
  </div>



  <div class="form-row">

    <div class="form-group col-md-4">
    <label for="weight">Select Products </label>

        
    <select name="product_ids[]" multiple="multiple" class="form-control">

       @foreach ($product as $key => $value)

        <option value="{{ $product[$key]['id'] }}"  <?php echo ( in_array($product[$key]['id'] ,$coupon_data['product_ids'])) ? "selected" : " " ; ?> > {{ $product[$key]['title'] }}</option>

        @endforeach
   
    </select>
        
    </select>
    </div>


    <div class="form-group col-md-4">
    <label for="weight">Select Products </label>

        
    <select name="category_ids[]" multiple="multiple" class="form-control">

    @foreach ($categories as $key => $value)

        <option value="{{ $categories[$key]['id'] }}"  <?php echo ( in_array($categories[$key]['id'] ,$coupon_data['category_ids'])) ? "selected" : " " ; ?> >{{ $categories[$key]['name'] }}</option>

    @endforeach
        


       
    </select>
    </div>



  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="">Min Order Value</label>

      <input type="text" class="form-control"  placeholder="enter min order value"  value="{{$coupon_data['min_order_value']}}" name="min_order_value">

    </div>


    <div class="form-group col-md-4">
      <label for="inputState">Max Discount Amount</label>
      <input type="text" class="form-control"  placeholder="enter max discount" value="{{$coupon_data['max_discount_amount']}}"  name="max_discount_amount">
    </div>  

  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="">Coupon Start Date & Time</label>
         
      <input type="date" name="start_date_time" class="form-control" value="{{$coupon_data['start_date_time']}}">    
    </div>


    <div class="form-group col-md-4">
      <label for="inputState">Coupon End Date & Time</label>
      <input type="date" class="form-control"   name="end_date_time" value="{{$coupon_data['end_date_time']}}">
    </div>  

  </div>
  <div class="form-row">

    <div class="form-group col-md-2">
        <label for="inputZip">IS Active</label>
        <select id="inputState" class="form-control" name="is_active" value="{{$coupon_data['is_active']}}" >
            <option value="1">Yes</option>
            <option value="0">No</option>
         </select>

        </div>

  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

  
</form>

<script>
$('select[multiple]').multiselect({
    columns: 2,
    placeholder: 'Select options'
});
</script>
@endsection