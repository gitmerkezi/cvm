@extends('admin.layouts.master')
@section('content')

<h2>Create User</h2>

@include ('admin.layouts.errors')

<div class="col-lg-6">
<form action="{{url('/admin/users')}}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    {!! Form::label('Name') !!}
    {{ Form::text('first_name', null,
      array('type'=>'text',
            'name'=>'name',
            'class'=>'form-control',
            'placeholder'=>'Name')) }}
  </div>
  <div class="form-group">
    {!! Form::label('Email address') !!}
    {!! Form::email('email', null,
        array('type'=>'email',
              'class'=>'form-control',
              'placeholder'=>'Email',
              'required')) !!}
  </div>
  <div class="form-group">
    {!! Form::label('Password') !!}
    {!! Form::password('password',
        array('type'=>'password',
              'class'=>'form-control',
              'placeholder'=>'Password',
              'required')) !!}
  </div>
  {!! Form::submit('Create',array('class'=>'btn btn-primary'))!!}
</form>
  </div>
@stop
