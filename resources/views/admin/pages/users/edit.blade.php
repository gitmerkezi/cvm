@extends('admin.layouts.master')
@section('content')

<h2>Edit User</h2>

<form action="{{url('/admin/users/'.$user->id)}}" method="post">
  {{ csrf_field() }}
  {{ method_field('put') }}
  <div class="form-group">
    {!! Form::label('Name') !!}
    {{ Form::text('first_name', $user->name,
      array('type'=>'text',
            'name'=>'name',
            'class'=>'form-control')) }}
  </div>
  <div class="form-group">
    {!! Form::label('Email address') !!}
    {!! Form::email('email', $user->email,
        array('type'=>'email',
              'class'=>'form-control')) !!}
  </div>
  <div class="form-group">
    {!! Form::label('Password') !!}
    {!! Form::password('password',
        array('type'=>'password',
              'class'=>'form-control',
              'placeholder'=>'Password')) !!}
  </div>
  {!! Form::submit('Update',array('class'=>'btn btn-primary'))!!}
</form>
@stop
