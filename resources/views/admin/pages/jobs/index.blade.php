@extends('admin.layouts.master')
@section('content')
<h2>Announcements</h2>
@include ('admin.layouts.errors')

<table class="table table-hover col-lg-10">
<thead>
  <tr>
    <th>ID</th>
    <th>Position</th>
    <th>Location</th>
    <th>Manage</th>
  </tr>
</thead>
<tbody>
  @foreach($jobs as $job)
  <tr>
    <td>
        @if ($job->published==1)
          <button class="btn btn-success btn-xs">{{$job->id}}</button>
        @else
          <button class="btn btn-danger btn-xs">{{$job->id}}</button>
        @endif
    </td>
    <td>{{$job->job_position}}</td>
    <td>{{$job->job_location}}</td>
    <td>
      <a href="/admin/jobs/{{$job->id}}/edit" class="btn btn-warning btn-xs">Edit</a> | <form action="{{ url('/admin/jobs/'.$job->id) }}" method="POST" class="hiddenblank">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">
            Delete
          </button>
      </form>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
{{ $jobs->render() }}
@stop
