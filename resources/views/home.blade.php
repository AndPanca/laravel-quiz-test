@extends('layouts.app')

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
                            <div class="row-cols-2 mt-3">
                                @foreach($q->options as $option)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[{{ $q->id }}]" value="{{ $option->id }}">
                                    <h5>{{ $option->name }}</h5>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
