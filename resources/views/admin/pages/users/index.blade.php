@extends('admin.layouts.master')
@section('content')
<h2>Users</h2>
@include ('admin.layouts.errors')

<table class="table table-hover col-md-8">
<thead>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>e-Mail</th>
    <th>Manage</th>
  </tr>
</thead>
<tbody>
  @foreach($users as $user)
  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}} {{$user->lname}}</td>
    <td>{{$user->email}}</td>
    <td>
      <a href="/admin/users/{{$user->id}}/edit" class="btn btn-warning btn-xs">Edit</a> | <form action="{{ url('/admin/users/'.$user->id) }}" method="POST" class="hiddenblank">
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
{{ $users->render() }}
@stop
