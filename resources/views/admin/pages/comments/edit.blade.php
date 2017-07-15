@extends('admin.layouts.master')
@section('content')

<h2>Edit Comment</h2>

<form action="{{url('/admin/comments/'.$comment->id)}}" method="post">
  {{ csrf_field() }}
  {{ method_field('put') }}
  <div class="form-group">
    <label for="">Position</label>
    <input type="text" class="form-control" name="job_position" value="{{$comment->sender_name}}">
  </div>
  <div class="form-group">
    <label for="">Location</label>
    <input type="text" class="form-control" name="job_location" value="{{$comment->sender_email}}">
  </div>
  <div class="form-group">
    <label for="">Details</label>
    <textarea type="text" row="5" class="form-control" name="job_details">{{$comment->comment}}</textarea>
  </div>

  <div class="btn-group">
    <button type="submit" name="published" class="btn btn-primary" value="0">Draft</button>
    <button type="submit" name="published" class="btn btn-warning" value="1">Publish</button>
  </div>
</form>
@stop
