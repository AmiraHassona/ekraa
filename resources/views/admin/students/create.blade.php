@extends('home')
@section('content')
   <!-- Content Header (Page header) -->
   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Student Form</h1>
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
          <div class="card card-primary">
            <!-- form start -->
        <form action="{{route('students.store')}}" method="POST" id="quickForm">
         @csrf
         <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Student Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  id="exampleInputEmail1"  placeholder="Enter name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Student Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"  id="exampleInputEmail1"  placeholder="Enter email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"  id="exampleInputEmail1"  placeholder="Enter password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Level</label>
                <select type="text" name="level_id" class="form-control @error('level_id') is-invalid @enderror" id="exampleInputEmail1">
                    <option selected >Enter level </option>
                    @foreach ($levels as $level)
                    <option value="{{$level->id}}"> {{$level->name}}</option>
                    @endforeach
                </select>
                @error('level_id')
                  <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Department</label>
                <select type="text" name="department_id" class="form-control @error('department_id') is-invalid @enderror" id="exampleInputEmail1">
                    <option selected >Enter department </option>
                    @foreach ($departments as $department)
                    <option value="{{$department->id}}"> {{$department->name}}</option>
                    @endforeach
                </select>
                @error('level_id')
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




