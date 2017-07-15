@extends('layouts.app')
@section('content')



<div class="container">
    <div class="row">
        <h2 class="text-center">Job Openings</h2><br>
      @foreach($jobs as $job)
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
              <div class="panel-heading">
                <a href="/jobs/{{$job->job_id}}" class="text-capitalize">
                #{{$job->job_id}} - <b>{{$job->job_position}}</b> | {{$job->job_location}}
                </a>
              </div>
            </div>
        </div>
    @endforeach
    </div>

    <div class="text-center">
    {{ $jobs->render() }}
    </div>

</div>
@endsection
