@extends('home')
@section('content')
<div class="card">
    <div class="row justify-content-end p-2">
        <a href="{{route('students.create')}}" class="btn btn-block btn-info col-1 m-1">Add</a>
    </div>
    <div class="card-header">
      <h3 class="card-title">Students Database</h3>
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
            <th>Email</th>
            <th>Level</th>
            <th>Department</th>
            {{-- <th>Date</th> --}}
            <th> </th>
        </tr>
        </thead>
        <tbody>
         @forelse ( $users as $user)
         <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->student->level->name}}</td>
            <td>{{$user->student->department->name}}</td>
            {{-- <td>{{$user->created_at}}</td> --}}
            <td>
             <div class="row  justify-content-center">
              <a href="{{route('students.courses',$user->id)}}" class="btn  btn-info ml-1 ">Courses</a>
              <a href="{{route('students.edit',$user->id)}}" class="btn  btn-warning ml-1 ">Edit</a>
              <form action="{{route('students.destroy',$user->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger ml-1">Delete</button>
              </form>
              </div>
            </td>
        </tr>
         @empty
         <tr>
            <td colspan="6">no data yet</td>
        </tr>
         @endforelse
        </tbody>
      </table>
      {{$users->links()}}
    </div>
    <!-- /.card-body -->
  </div>
@endsection

