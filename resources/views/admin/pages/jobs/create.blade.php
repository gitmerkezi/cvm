@extends('admin.layouts.master')
@section('content')

<h2>Create Announcement</h2>

@include ('admin.layouts.errors')

<form action="{{url('/admin/jobs')}}" method="post" class="col-lg-11">
  {{ csrf_field() }}
  <div class="form-group col-md-6">
    {{ Form::label('Position') }}
    {{ Form::text('job_position', null,
      array('type'=>'text',
            'class'=>'form-control',
            'placeholder'=>'Position')) }}
  </div>
  <div class="form-group col-md-6">
    {{ Form::label('Location') }}
    {{ Form::text('job_location', null,
      array('type'=>'text',
            'class'=>'form-control',
            'placeholder'=>'Location')) }}
  </div>
  <div class="form-group col-md-12">
    {{ Form::label('Details') }}
    {{ Form::textarea('job_details', null,
        array('type'=>'text',
              'class'=>'form-control',
              'rows'=>'9',
              'cols'=>'10')) }}
  </div>
  <div class="btn-group col-lg-11">
    <button type="submit" name="published" class="btn btn-primary" value="0">Save Draft</button>
    <button type="submit" name="published" class="btn btn-warning" value="1">Create</button>
  </div>
</form>

@stop
