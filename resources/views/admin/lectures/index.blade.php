@extends('home')
@section('content')
<div class="card">
    <div class="row justify-content-end p-2">
        <a href="{{route('lectures.create')}}" type="button" class="btn btn-block btn-info col-1 m-1">Add</a>
    </div>
    <div class="card-header">
      <h3 class="card-title">Lecture Database</h3>
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
    @include('partials.messages')
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Link</th>
          <th>Image</th>
          <th>Course</th>
          <th>Date</th>
          <th> </th>
        </tr>
        </thead>
        <tbody>
        @forelse ($lectures as $lecture)   
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$lecture->title}}</td>
            <td>{{$lecture->link}}</td>
            <td>
                <a href="{{asset($lecture->image)}}" target="_blank">
                    <img src="{{asset($lecture->image)}}" alt="{{$lecture->title}}" title="{{$lecture->title}}" width="100" height="100">
                </a>
            </td>
            <td>{{$lecture->course->title}}</td>
            <td>{{$lecture->created_at}}</td>
            <td>
                <div class="row  justify-content-center">
                 <a href="{{route('lectures.edit',$lecture->id)}}" type="button" class="btn  btn-warning ml-1 ">Update</a>
                 <form action="{{route('lectures.destroy',$lecture->id)}}" method="POST">
                 @csrf
                 @method('DELETE')   
                 <button type="submit" class="btn btn-danger ml-1 ">Delete</button>
                </form>
                 </div>
            </td>
        </tr>
        @empty
        <tr>
        <td colspan="7">no data yet </td> 
        </tr>
        @endforelse 
        </tbody>
      </table>
      {{$lectures->links();}}
    </div>
    <!-- /.card-body -->
  </div>
@endsection

