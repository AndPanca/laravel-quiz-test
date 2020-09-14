@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Question</h1>
@stop

@section('content')
  <div class="col-lg-8 mx-auto my-5">	
    <h4 class="text-center my-3">Data Question</h4>
    <a class="btn btn-primary my-3" href="/dashboard/questions/create/">Add Questions</a>
    <table class="table table-bordered table-striped">

      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th width="1%">Image</th>
          <th>Action</th>
        </tr>
      </thead>
      
      <tbody>
        <?php $no=0;?>
        @foreach($questions as $q)
        <?php $no++;?>
        <tr>
          <td>{{$no}}</td>
          <td>{{$q->name}}</td>
          <td><img width="150px" src="{{ url('/images/'.$q->image) }}"></td>
          <td>
            <a class="btn btn-success" href="options/{{ $q->id }}">Add Option</a>
            <form action="{{ route('questions.destroy', $q->id) }}" method="POST">
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button ty="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
      
    </table>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hallow brok!'); 
</script>
@stop