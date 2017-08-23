@extends('admin.layouts.master')
@section('content')

<h2>Answer: Comment</h2>

@include ('admin.layouts.errors')

<form action="{{url('/admin/comments')}}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    {{ Form::label('Name') }}
    <input type="text" class="form-control" name="name" placeholder="Name">
  </div>
  <div class="form-group">
    {{ Form::label('Email address') }}
    {{ Form::email('email', null,
        array('type'=>'email',
              'class'=>'form-control',
              'placeholder'=>'Email',
              'required')) }}
  </div>
  <div class="form-group">
  {{ Form::label('Answer') }}
  {{ Form::textarea('comment', null, ['class' => 'form-control']) }}
  </div>
  {{ Form::submit('Post',array('class'=>'btn btn-primary')) }}
</form>
@stop
