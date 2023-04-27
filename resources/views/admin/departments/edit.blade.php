@extends('home')
@section('content')
   <!-- Content Header (Page header) -->
   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Department Form</h1>
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
        <form action="{{route('departments.update' , $department->id)}}" method="POST" id="quickForm">
         @csrf
         @method('PUT')
         <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Department</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  id="exampleInputEmail1"  value="{{$department->name}}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Level</label>
                <select type="text" name="level_id" class="form-control @error('level_id') is-invalid @enderror" id="exampleInputEmail1">
                    @foreach ($level as $level )
                    <option @if( $level->id == $department->level_id ) selected @endif value="{{$level->id}}"> {{$level->name}}</option>
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




