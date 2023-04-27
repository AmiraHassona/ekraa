@extends('home')
@section('content')
<div class="card">
    <div class="row justify-content-end p-2">
        <button type="button" class="btn btn-block btn-info col-1 m-1">Add</button>
    </div>
    <div class="card-header">
      <h3 class="card-title">User Database</h3>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>User Name</th>
          <th>Role</th>
          <th>Email</th>
          <th>Password</th>
          <th>Admin</th>
          <th>Date</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>sama ehab</td>
            <td>student</td>
            <td>sama@yahoo.com</td>
            <td>123</td>
            <td>amira</td>
            <td>24/10/2022</td>
            <td>
                <div class="row  justify-content-center">
                 <button type="button" class="btn  btn-warning ml-1 ">Update</button>
                 <button type="button" class="btn btn-danger ml-1 ">Delete</button>
                 </div>
            </td>
        </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
