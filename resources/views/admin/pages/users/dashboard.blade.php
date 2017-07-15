@extends('admin.layouts.master')
@section('content')

<div class="panel-group">
  <div class="panel panel-warning">
    <div class="panel-heading"><h3>Total Announcement: <span>{{ \App\Job::count() }}</span></h3></div>
  </div>
  <div class="panel panel-warning">
    <div class="panel-heading"><h3>Total Users: <span>{{ \App\User::count() }}</span></h3></div>
  </div>
</div>
@stop
