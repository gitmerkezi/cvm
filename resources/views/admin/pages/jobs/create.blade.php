@extends('admin.layouts.master')
@section('content')

<h2>Create Announcement</h2>

@include ('admin.layouts.errors')

<form action="{{url('/admin/jobs')}}" method="post">
  {{ csrf_field() }}
  <div class="form-group col-md-6">
    <label for="name">Position</label>
    <input type="text" class="form-control" name="job_position" placeholder="Position">
  </div>
  <div class="form-group col-md-6">
    <label for="">Location</label>
    <input type="text" class="form-control" name="job_location" placeholder="Location">
  </div>
  <div class="form-group col-md-12">
    <label for="">Details</label>
    <textarea type="text" rows="9" name="job_details" class="form-control" rows="5"></textarea>
  </div>
  <div class="btn-group">
    <button type="submit" name="published" class="btn btn-primary" value="0">Save Draft</button>
    <button type="submit" name="published" class="btn btn-warning" value="1">Create</button>
  </div>
</form>
@stop
