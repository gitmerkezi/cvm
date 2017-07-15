@extends('admin.layouts.master')
@section('content')

<h2>Edit User</h2>

<form action="{{url('/admin/users/'.$user->id)}}" method="post">
  {{ csrf_field() }}
  {{ method_field('put') }}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" value="{{$user->name}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" value="{{$user->email}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@stop
