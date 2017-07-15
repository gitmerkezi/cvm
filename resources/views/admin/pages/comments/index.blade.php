@extends('admin.layouts.master')
@section('content')
<h2>Comments</h2>

@include ('admin.layouts.errors')

<table class="table table-hover">
<thead>
  <tr>
    <th>Name</th>
    <th>Job</th>
    <th>Comment</th>
    <th>Manage</th>
  </tr>
</thead>
<tbody>
  @foreach($comments as $comment)

    @if ($comment->approved==0)
        <tr class="bg-warning">
    @else
        <tr>
    @endif
    <td>{{$comment->sender_name}}</td>
    <td class="col-md-2">{{$comment->job_position}}</td>
    <td>{{$comment->comment}}</td>
    <td class="col-md-2">
      @if ($comment->approved==0)
          <a href="/admin/comments/{{$comment->id}}/edit" class="btn btn-success btn-xs">Approve</a>
      @else
          <a href="/admin/comments/{{$comment->id}}/edit" class="btn btn-primary btn-xs">Answer</a>
      @endif
      <form action="{{ url('/admin/comments/'.$comment->id) }}" method="POST" class="hiddenblank">
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
{{ $comments->render() }}
@stop
