@extends('admin.layouts.master')
@section('content')

<h2>Edit Announcement</h2>

<form action="{{url('/admin/jobs/'.$job->id)}}" method="post">
  {{ csrf_field() }}
  {{ method_field('put') }}
  <div class="form-group col-md-6">
    <label for="">Position</label>
    <input type="text" class="form-control" name="job_position" value="{{$job->job_position}}">
  </div>
  <div class="form-group col-md-6">
    <label for="">Location</label>
    <input type="text" class="form-control" name="job_location" value="{{$job->job_location}}">
  </div>
  <div class="form-group col-md-12">
    <label for="">Details</label>
    <textarea type="text" rows="9" class="form-control" name="job_details">{{$job->job_details}}</textarea>
  </div>

  <div class="btn-group">
    <button type="submit" name="published" class="btn btn-primary" value="0">Draft</button>
    <button type="submit" name="published" class="btn btn-warning" value="1">Publish</button>
  </div>
</form>
@stop
