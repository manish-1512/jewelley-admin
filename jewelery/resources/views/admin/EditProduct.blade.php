@extends('admin.layout')  

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<h2>edit product</h2>

<form class="m-5" method="post" action="{{route('product.update')}}" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="title">Name</label>
      <input type="hidden" value="{{$data_to_edit['id']}}" name="id">
      <input type="text" class="form-control" name="title" value="{{$data_to_edit['title']}}">
    </div>
    <div class="form-group col-md-6">
      <label for="price">Price</label>
      <input type="number" class="form-control" name="price" value="{{$data_to_edit['price'] }}">
    </div>
  </div>
  <div class="form-group">
    <label for="description">Product Description</label>
    <input type="text" class="form-control" name="description" value="{{$data_to_edit['description'] }}" placeholder=" this item is....">
  </div>

  <div class="form-row">

    <div class="form-group col-md-4">
    <label for="weight">Weight</label>
    <input type="number" class="form-control" value="{{$data_to_edit['weight'] }}"  placeholder="enter weight in grams" name="weight">
    </div>

    <div class="form-group col-md-4">
        <label for="">Discount</label>
        <input type="number" class="form-control" value="{{$data_to_edit['discount'] }}"  placeholder="enter discount" name="discount">
    </div>

    <div class="form-group col-md-4">
        <label for="">Product Category</label>

        <select id="inputState" class="form-control" name="product_category">
        @if($categories)

      @foreach($categories as $category)

      <option value="{{$category['id']}}"> {{$category['name']}}</option>

        @endforeach
      @endif


      </select>
       
    </div>


  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">Product Type</label>

      <select id="inputState" class="form-control" name="product_type" >
        @if($product_types)
      @foreach($product_types as $type)
      
         <option value="{{$type['id']}}"> {{$type['name']}}</option>

        @endforeach
      @endif
      </select>

    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Product Matrial</label>

      <select id="inputState" class="form-control" name="product_matrial">  
        <option value="gold">gold</option>
        <option value="silver">silver</option>
      
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">IS Active</label>
      <select id="inputState" class="form-control" name="is_active">
        <option value="1">Yes</option>
        <option value="0">No</option>
      
        </select>

    </div>

    <div class="form-group col-md-2">
      <label for="inputZip">IS New</label>
      <select id="inputState" class="form-control" name="is_new">
        <option value="1">Yes</option>
        <option value="0">No</option>
      
        </select>

    </div>

    <div class="form-group col-md-2">
      <label for="inputZip">IS Popular</label>
      <select id="inputState" class="form-control" name="is_popular">
        <option value="1">Yes</option>
        <option value="0">No</option>
      
        </select>

    </div>

    <div class="form-group col-md-2">
      <label for="inputZip">IS Best seller</label>
      <select id="inputState" class="form-control" name="is_best_seller">
        <option value="1">Yes</option>
        <option value="0">No</option>
      
        </select>

    </div>

  </div>
 
  <button type="submit" class="btn btn-primary"> Submit </button>
</form>


@endsection