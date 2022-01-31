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
    <input type="number" class="form-control"  placeholder="enter weight in grams" name="weight">
    </div>

    <div class="form-group col-md-4">
        <label for="">Discountt</label>
        <input type="number" class="form-control"  placeholder="enter discount" name="discount">
    </div>

    <div class="form-group col-md-4">
        <label for="">Product Category</label>

        <select id="inputState" class="form-control" name="product_category">
        <option selected>Choose...</option>
        <option value="man">Man</option>
        <option value="woman"> Woman/option>
        <option value="abc"> abc </option>
        <option value="earing"> earing</option>
      </select>
       
    </div>


  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">Product Type</label>

      <select id="inputState" class="form-control" name="product_type">
        <option selected>Choose...</option>
        <option value="earing"> earing</option>
        <option value="abc"> abc/option>
        <option value="asas"> asas </option>
        <option value="aela"> earing</option>
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