@extends('admin.layouts.master')
@section('content')
<h2>Announcements</h2>
@include ('admin.layouts.errors')

<table class="table table-hover">
<thead>
  <tr>
    <th>Job</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Date</th>
  </tr>
</thead>
<tbody>
  @foreach($applies as $apply)
  <tr>
    <td>{{$apply->apply_id}}</td>
    <td>{{$apply->user_id}}</td>
    <td>{{$apply->phone}}</td>
    <td>{{$apply->created_at}}</td>
  </tr>
  @endforeach
</tbody>
</table>
{{ $applies->render() }}
@stop
