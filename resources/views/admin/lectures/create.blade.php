@extends('home')
@section('content')
   <!-- Content Header (Page header) -->
   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Lecture Form</h1>
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
        <form method="POST" action="{{route('lectures.store')}}" enctype="multipart/form-data" id="quickForm">
        @csrf    
         <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter title">
                @error('title')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Link</label>
                <input type="text" name="link" class="form-control @error('link') is-invalid @enderror"  id="exampleInputEmail1" placeholder="Enter link">
                @error('link')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                @error('image')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="example">Course</label>
                <select type="text" name="course_id" class="form-control @error('course_id') is-invalid @enderror" id="example">
                    <option value="" selected></option>
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



