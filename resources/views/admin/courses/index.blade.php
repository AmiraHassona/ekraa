@extends('home')
@section('content')
<div class="card">
    <div class="row justify-content-end p-2">
    <a href="{{route('Courses.create')}}" class="btn btn-block btn-info col-1 m-1">Add</a>
    </div>
    <div class="card-header">
      <h3 class="card-title">Courses Database</h3>
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
          <th>Image</th>
          <th>Description</th>
          <th>Price</th>
          <th>Level</th>
          <th>Department</th>
          <th>Date</th>
          <th> </th>
        </tr>
        </thead>
        @forelse ($courses as $course)
        <tbody>
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$course->title}}</td>
                <td>
                <a href="{{asset($course->image)}}" target="_blank">
                    <img src="{{asset($course->image)}}" alt="{{$course->title}}" title="{{$course->title}}" width="100" height="100">
                </a>
                </td>
                <td>{{$course->description}}</td>
                <td>{{$course->price}}</td>
                <td>{{$course->level->name}}</td>
                <td>{{$course->department->name}}</td>
                <td>{{$course->created_at}}</td>
                <td>
                    <div class="row  justify-content-center">
                        <a href="{{route('Courses.edit',['Course'=>$course->id])}}" class="btn  btn-warning ml-1 ">Edit</a>
                        <form action="{{route('Courses.destroy',['Course'=>$course->id])}}" method="post">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger ml-1"> Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            </tbody>
        @empty
        <tbody>
            <tr>
                <td colspan="9">no data yet...</td>
            </tr>
            </tbody>
        @endforelse
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

