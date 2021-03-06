@extends('layouts.app')
@section('content')



<div class="container">
    <div class="row">
        <h2 class="text-center">Apply: #{{$job->id}} {{$job->job_position}} </h2><br>

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
              <div class="panel-heading">Application Form</div>
                <div class="panel-body">

              <form action="{{url('/jobs/'.$job->job_id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <fieldset disabled>
                  <div class="form-group col-md-6">
                    {{ Form::label('Name') }}
                    <input type="text" class="form-control" placeholder="{{ Auth::user()->name }}">
                  </div>
                  <div class="form-group col-md-6">
                    {{ Form::label('Position') }}
                    <input type="text" class="form-control" placeholder="{{$job->job_position}} / {{$job->job_location}}">
                  </div>
                </fieldset>
                <div class="form-group col-md-6">
                    {{ Form::label('Gender') }}
                    <select class="form-control" name="gender">
                        <option value="">Choose...</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                      </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="example-date-input" class="col-2 col-form-label">Birthday</label>
                    <input class="form-control" type="date" name="bday">
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('Phone') }}
                  <input class="form-control" placeholder="Phone" name="phone">
                </div>
                <div class="fileinput fileinput-new col-md-6" data-provides="fileinput">
                    {{ Form::label('Upload CV') }}
                      <span class="btn btn-default btn-file"><input type="file" /></span>
                 </div>
                <div class="form-group col-md-12">
                    {{ Form::label('Resume') }}
                  <textarea type="text" row="15" name="resume" class="form-control" rows="15"></textarea>
                </div>
                  <button type="submit" class="btn btn-success col-md-6 col-md-offset-3">Submit Application</button>
              </form>

              </div>
            </div>
        </div>

    </div>

</div>




@endsection
