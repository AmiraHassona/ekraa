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
        <form action="{{route('Courses.store')}}" method="POST" id="quickForm" enctype="multipart/form-data">
         @csrf
         <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"  id="exampleInputEmail1" placeholder="Enter title">
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
                @error('image')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"  id="exampleInputEmail1" placeholder="Enter description">
                @error('description')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"  id="exampleInputEmail1" placeholder="Enter price">
                @error('price')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Level</label>
                <select type="text" name="level_id" class="form-control @error('level_id') is-invalid @enderror" id="exampleInputEmail1">
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
                    @foreach ($departments as  $department)
                    <option value="{{$department->id}}"> {{$department->name}}</option>
                    @endforeach
                </select>
                {{-- <select class="form-control @error('department_id') is-invalid @enderror" id="exampleInputEmail1"  name="department_id">
                    <option value=""> -- Select One --</option>
                    @inject('departments', 'App\Models\Department')
                    @foreach ($departments::all() as $department)
                    <option value="{{$department->id}}"> {{$department->name}}</option>
                    @endforeach
                </select> --}}

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







