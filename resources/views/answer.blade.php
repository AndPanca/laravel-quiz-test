@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">Result Test</div>
                <?php $no=0 ?>
                <div class="card-body">
                  <?php $no=0 ?>
                  @foreach($answers as $a)
                    <?php $no++ ?>
                    <div class="mt-4">
                      <h3>No {{ $no }}. {{ $a->question->name }}</h3>
                      @if ($a->option->is_correct == 1)
                      <h4 class="text-success">
                        Answer: {{ $a->option->name }} (True)
                      </h4>
                      @else
                        <h4 class="text-danger">
                          Answer: {{ $a->option->name }} (False)
                        </h4>
                      @endif
                    </div>
                    <?php @$count += $a->option->is_correct ?>
                  @endforeach
                  <h2 class="mt-5 text-primary">Total Nilai : {{($count/($answers->count()))*100}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
