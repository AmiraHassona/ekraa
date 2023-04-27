@extends('home')
@section('content')
   <!-- Content Header (Page header) -->
   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Course Form</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->

          @include('partials.messages')

          <div class="card card-primary">
            <!-- form start -->
        <form action="{{route('students.courses.store',$user->id)}}" method="POST" id="quickForm">
         @csrf
            <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Courses</label>
                <select type="text" name="course_id" class="form-control @error('course_id') is-invalid @enderror" id="exampleInputEmail1">
                    <option selected >Enter Course </option>
                    @foreach ($courses as $course)
                    <option value="{{$course->id}}"> {{$course->title}}</option>
                    @endforeach
                </select>
                @error('course_id')
                  <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
             <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection




