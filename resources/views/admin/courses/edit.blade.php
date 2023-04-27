@extends('home')
@section('content')
   <!-- Content Header (Page header) -->
   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Course Form</h1>
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
        <form action="{{route('Courses.update',$course->id)}}" method="POST" id="quickForm" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" value="{{$course->title}}" name="title" class="form-control @error('title') is-invalid @enderror"  id="exampleInputEmail1" placeholder="Enter title">
                @error('title')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input  @error('image') is-invalid @enderror" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                <a href="{{asset($course->image)}}" target="_blank">
                    <img src="{{asset($course->image)}}" alt="{{$course->title}}" title="{{$course->title}}" width="100" height="100">
                </a>
                @error('image')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" value="{{$course->description}}" name="description" class="form-control @error('description') is-invalid @enderror"  id="exampleInputEmail1" placeholder="Enter description">
                @error('description')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" value="{{$course->price}}" name="price" class="form-control @error('price') is-invalid @enderror"  id="exampleInputEmail1" placeholder="Enter price">
                @error('price')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Level</label>
                <select type="text" name="level_id" class="form-control @error('level_id') is-invalid @enderror" id="exampleInputEmail1">
                    @foreach ($level as $level )
                    <option @if( $level->id == $course->level_id ) selected @endif value="{{$level->id}}"> {{$level->name}}</option>
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
                    @foreach ($department as  $department)
                    <option @if( $department->id == $course->department_id ) selected @endif value="{{$department->id}}"> {{$department->name}}</option>
                    @endforeach
                </select>
                @error('department_id')
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







