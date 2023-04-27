@extends('home')
@section('content')
<div class="card">
    <div class="row justify-content-end p-2">
        <a href="{{route('levels.create')}}" class="btn btn-block btn-info col-1 m-1"> Create</a>
     </div>
    <div class="card-header">
      <h3 class="card-title">Levels Database</h3>
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
          <th>level</th>
          <th>Date</th>
          <th> </th>
        </tr>
        </thead>
        <tbody>
         @forelse ($levels as $level )
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$level->name}}</td>
            <td>{{$level->created_at}}</td>
            <td>
                <div class="row  justify-content-center">
                <a href="{{route('levels.edit', ['level' => $level->id])}}" class="btn btn-danger ml-1 "> Edit </a>
                <form action="{{route('levels.destroy',['level' => $level->id])}}"     method="post">
                  @csrf
                  @method('DELETE')
                 <button type="submit" class="btn  btn-warning ml-1 ">Delete</button>
                 </form>

                 </div>
            </td>
         </tr>
         @empty
         <tr>
            <td colspan="5"> no data </td>
         </tr>
         @endforelse
        {{ $levels->links();}}
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

