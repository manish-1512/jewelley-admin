@extends('admin.layout')  

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

<form class="m-5" method="POST" action="{{route('product.create')}}">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="title">Name</label>
      <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group col-md-6">
      <label for="price">Price</label>
      <input type="number" class="form-control" name="price">
    </div>
  </div>
  <div class="form-group">
    <label for="description">Product Description</label>
    <input type="text" class="form-control" name="description" placeholder=" this item is....">
  </div>

  <div class="form-row">

    <div class="form-group col-md-4">
    <label for="weight">Weight</label>
    <input type="text" class="form-control"  placeholder="enter weight in grams" name="weight">
    </div>

    <div class="form-group col-md-4">
        <label for="">Discount</label>
        <input type="text" class="form-control"  placeholder="enter discount" name="discount">
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

      <select class="form-control" name="product_type">

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

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection