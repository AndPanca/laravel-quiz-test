@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard User</h1>
@stop

@section('content')
  <div class="col-lg-8 mx-auto my-5">	
    <h4 class="text-center my-5">Data Users</h4>
    <table class="table table-bordered table-striped">

      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Test</th>
          <th width="1%">OPSI</th>
        </tr>
      </thead>

      <tbody>
        <?php $no=0;?>
        @foreach($users as $u)
        <?php $no++;?>
        <tr>
          <td>{{$no}}</td>
          <td>{{$u->name}}</td>
          <td>{{$u->email}}</td>
          <td>{{$u->role}}</td>
          <td>{{$u->is_followed}}</td>
          <td>
            <form action="{{ route('users.destroy', $u->id) }}" method="POST">
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