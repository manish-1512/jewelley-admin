@extends('admin.layout')
   
@section('content')

<div class="row">
<div class="col-lg-12 margin-tb">
   
    <div class="pull-left m-3">
        <a class="btn btn-success" href=""> Add New Coupan</a>
    </div>
</div>
</div>
<!--table start here  -->

<table class="table table-striped  table-bordered table-dark">
<thead>
            <tr>
              <th>#</th>
              <th>Coupan Name</th>
              <th>Coupan Code</th>
              <th>Coupan Value</th>
              <th>Created ON </th>
              <th>Status</th>
              <th>Action</th>
              
            </tr>
          </thead>
        

           
</table>

  @endsection