@extends('home')
@section('content')
<div class="card">
    <div class="row justify-content-end p-2">
        <a href="{{route('students.courses.create',$user->id)}}" class="btn btn-block btn-info col-2 m-1">Add Course</a>
    </div>
    <div class="card-header">
      <h3 class="card-title">Courses of Student : {{$user->name}}</h3>
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
            <th>Name</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
         @forelse ( $studentCourses as $studentCourse)
         <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$studentCourse->course->title}}</td>
            <td>
             <div class="row  justify-content-center">
              <form action="{{route('students.courses.destroy', $studentCourse->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger ml-1">Delete</button>
              </form>
              </div>
            </td>
        </tr>
         @empty
         <tr>
            <td colspan="3">no data yet</td>
        </tr>
         @endforelse
        </tbody>
      </table>
      {{$studentCourses->links()}}
    </div>
    <!-- /.card-body -->
  </div>
@endsection

