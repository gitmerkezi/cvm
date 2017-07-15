@extends('layouts.app')

@section('content')
<div class="container">

  @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">#{{$job->job_id}} - <b>{{$job->job_position}}</b> | {{$job->job_location}} <a href="/jobs/{{$job->job_id}}/create" class="btn btn-success btn-xs ">Apply</a></div>
                <div class="panel-body">
                {!! nl2br(e($job->job_details)) !!}
                </div>



            </div>

            <h3 class="text-center">Comments</h3>
            @foreach($comments as $comment)
            <hr>
            <div class="panel-body">
              <h4>
                <strong class="text-capitalize">{{$comment->sender_name}}</strong>
                <small> [{{$comment->sender_email}}] | <em>{{$comment->ip_address}}</em></small></h4>

              {{$comment->comment}}
            </div>
            @endforeach


            {{ $comments->render() }}
        </div>







      <div class="col-md-6 col-md-offset-4">
        <hr>
        <h4>Add Comment</h4>
            <form action="{{url('/jobs/'.$job->job_id.'/new')}}" method="post">
              {{ csrf_field() }}

              @if (Auth::check())
                  <div class="form-group">
                    <label for="">Comment by <em>{{ Auth::user()->name }}</em> </label>
                    <textarea type="text" row="5" name="comment" class="form-control" rows="4"></textarea>
                  </div>
                  <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                  <input type="hidden" name="email" value="{{ Auth::user()->email }}">
              @else
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="mail">e-Mail</label>
                    <input type="text" class="form-control" name="email" placeholder="e-Mail">
                  </div>
                  <div class="form-group">
                    <label for="">Comment</label>
                    <textarea type="text" row="5" name="comment" class="form-control" rows="4"></textarea>
                  </div>
              @endif


              <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
  </div>
  <br><br>
@endsection
