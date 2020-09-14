@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Question</h1>
    <script src="ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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

    <form action="{{ url('dashboard/options/create',$question->id) }}" method="POST">
      @csrf
      <div class="form-group">
        <b>Question</b>
        <h4>{{$question->name}}</h4>
      </div>

      <table class="table table-bordered table-striped" id="dynamicTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Option</th>
            <th>Correct</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td><input type="text" name="addmore[0][name]" placeholder="Enter your Option" class="form-control" /></td>
            <td>
              <select class="custom-select mr-sm-2" name="addmore[0][is_correct]">
                <option selected>Pick Option</option>
                <option value="1">True</option>
                <option value="0">False</option>
              </select>
            </td>
            <td>
              <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
            </td>
          </tr>
        </tbody>
      </table>
      <input type="submit" value="Upload" class="btn btn-primary">
    </form>

    <h4 class="text-center my-3">Answer Option</h4>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Option</th>
          <th>Correct</th>
          <th>Action</th>
        </tr>
      </thead>
      
      <tbody>
        <?php $no=0;?>
        @foreach($option as $o)
        <?php $no++;?>
        <tr>
          <td>{{$no}}</td>
          <td>{{$o->name}}</td>
          @if ($o->is_correct == 1)
          <td>True</td>
          @else
          <td>False</td>
          @endif
          <td>
            <a class="btn btn-danger" href="/dashboard/options/destroy/{{ $o->id }}">Delete</a>
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
<script type="text/javascript">
  var i = 0;
  var no = 1;
  $("#add").click(function(){
    ++i;
    ++no;
    $("#dynamicTable").append('<tr><td><p>'+no+'</p></td><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Option" class="form-control" /></td><td><select class="custom-select mr-sm-2" name="addmore['+i+'][is_correct]"><option selected>Pick Option</option><option value="1">True</option><option value="0">False</option></select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
  });
  
  $(document).on('click', '.remove-tr', function(){  
    $(this).parents('tr').remove();
  });  
</script>
@stop