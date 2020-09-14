@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Question</h1>
@stop

@section('content')
  <div class="col-lg-8 mx-auto my-5">	
    @if(count($errors) > 0)
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
      {{ $error }} <br/>
      @endforeach
    </div>
    @endif

    <form action="{{ url('dashboard/questions') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <b>Question</b>
        <textarea class="form-control" name="name"></textarea>
      </div>

      <div class="form-group">
        <b>Image</b><br/>
        <input type="file" name="image">
      </div>

      <input type="submit" value="Upload" class="btn btn-primary">
    </form>
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