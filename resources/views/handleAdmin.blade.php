@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">Question</div>
                <?php $no=0 ?>
                <div class="card-body">
                    <form action="{{ url('home/answers/test') }}" method="POST">
                    @csrf
                        @foreach($question as $q)
                        <?php $no++ ?>
                        <h3 class="mt-4">No.{{$no}} {{$q->name}}</h3>
                        <img width="200px" src="{{ url('/images/'.$q->image) }}">
                        <div class="form-group">
                            <div class="row-cols-2 mt-2">
                                @foreach($q->options as $option)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[{{ $q->id }}]" value="{{ $option->id }}">
                                    <h5>{{ $option->name }}</h5>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        <!-- <input type="submit" value="Submit" class="btn btn-primary"> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
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