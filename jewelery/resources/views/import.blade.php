@extends('admin.layout')
   
@section('content')


@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif



<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
                     Import Export Excel to database 
                            </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import product Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export product Data</a>
            </form>
        </div>
    </div>
</div>
   
@endsection