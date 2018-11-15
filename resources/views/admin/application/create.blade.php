@extends('layout.masterAdmin')
@section('content')

<h2 class="title-admin">Create applications</h2>


@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $error)
        <ul class="list-error">
            <li>{{ $error }}</li>
        </ul>
    @endforeach
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


<div class="contact-form">
    {!! Form::open(['action'=>['ApplicationsController@store'], 'method' => 'post', 'class' => 'form', 'files' => true]) !!}


    <div class="form-group">
        <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Name:</label>
        <div class="col-xl-12">
            {!! Form::text('name', NULL, ['class' => 'form-control', 'placeholder' => 'name', 'required']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Phone:</label>
        <div class="col-xl-12">
            {!! Form::text('phone', NULL, ['class' => 'form-control', 'placeholder' => 'phone', 'required']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Email:</label>
        <div class="col-xl-12">
            {!! Form::email('email', NULL, ['class' => 'form-control', 'placeholder' => 'email', 'required']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Job title:</label>
        <div class="col-xl-12">
            {!! Form::text('job_title', NULL, ['class' => 'form-control', 'placeholder' => 'job title', 'required']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Company name:</label>
        <div class="col-xl-12">
            {!! Form::text('company_name', NULL, ['class' => 'form-control', 'placeholder' => 'company name', 'required']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Location:</label>
        <div class="col-xl-12">
            {!! Form::text('location', NULL, ['class' => 'form-control', 'placeholder' => 'location', 'required']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Type salary:</label>
        <div class="col-xl-12">
            {!! Form::number('type_salary', NULL, ['class' => 'form-control', 'placeholder' => 'type salary', 'required']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Start date:</label>
        <div class="col-xl-12">
            {!! Form::date('start_date', NULL, ['class' => 'form-control', 'placeholder' => 'start date', 'required']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Percent work:</label>
        <div class="col-xl-12">
            {!! Form::number('percent_work', NULL, ['class' => 'form-control', 'placeholder' => 'remote possible']) !!}
        </div>
    </div>
    <div class="form-group">
      <div class="col-xl-12">
        <label for="">File upload:</label>
        <div><input type="file" name="upload_file"></div>
        <div>Allowed file format: jpg, jpeg, png, pdf, doc, docx, xlsx, txt.</div>
      </div>
    </div>
    <div class="form-group">
       <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Must have:</label>
      <div class="col-xl-12">
        {!! Form::text('must_have', NULL, ['class' => 'form-control', 'placeholder' => 'must have', 'required']) !!}
      </div>
    </div>
    <div class="form-group">
       <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Nice have:</label>
      <div class="col-xl-12">
        {!! Form::text('nice_have', NULL, ['class' => 'form-control', 'placeholder' => 'nice have', 'required']) !!}
      </div>
    </div>
    <div class="form-group">
       <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Languages:</label>
      <div class="col-xl-12">
        {!! Form::text('languages', NULL, ['class' => 'form-control', 'placeholder' => 'languages', 'required']) !!}
      </div>
    </div>
    <div class="form-group">
        <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Type of Employment:</label>
        <div class="col-xl-12">
            <input type="checkbox" class="checkbox-form" name="type_work" id="checkboxBtn-btb" value="1">
            <label for="checkboxBtn-btb">B2B</label>
            <input type="checkbox" class="checkbox-form" name="type_work" id="checkboxBtn-coe" value="2">
            <label for="checkboxBtn-coe">Contract of employment</label>
            <input type="checkbox" class="checkbox-form" name="type_work" id="checkboxBtn-otoe" value="3">
            <label for="checkboxBtn-otoe">Other types of employments</label>
      </div>
    </div>
    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Project industry:</label>
      <div class="col-xl-12">
        {!! Form::text('project_industry', NULL, ['class' => 'form-control', 'placeholder' => 'project industry']) !!}
      </div>
    </div>
    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Company size:</label>
      <div class="col-xl-12">
        {!! Form::number('company_size', NULL, ['class' => 'form-control', 'placeholder' => 'company size']) !!}
      </div>
    </div>
    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Project team size:</label>
      <div class="col-xl-12">
        {!! Form::number('project_team_size', NULL, ['class' => 'form-control', 'placeholder' => 'project team size']) !!}
      </div>
    </div>
    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Percent workload:</label>
      <div class="col-xl-12">
        {!! Form::number('percent_workload', NULL, ['class' => 'form-control', 'placeholder' => 'percent workload']) !!}
      </div>
    </div>
    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Day holiday:</label>
      <div class="col-xl-12">
        {!! Form::number('day_holiday', NULL, ['class' => 'form-control', 'placeholder' => 'day holiday']) !!}
      </div>
    </div>
    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Office hours from:</label>
      <div class="col-xl-12">
        <div><input type="time" name="office_hours_from" class="form-control"/></div>
      </div>
    </div>
    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Office hours to:</label>
      <div class="col-xl-12">
        <div><input type="time" name="office_hours_to" class="form-control"/></div>   
      </div>
    </div>
    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Day travel:</label>
      <div class="col-xl-12">
        {!! Form::number('day_travel', NULL, ['class' => 'form-control', 'placeholder' => 'day travel']) !!}
      </div>
    </div>
    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Day relocation:</label>
      <div class="col-xl-12">
        {!! Form::number('day_relocation', NULL, ['class' => 'form-control', 'placeholder' => 'day relocation']) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-xl-offset-2 col-xl-12">
        {!! Form::submit('Save', ['class' => 'btn btn-success']); !!}
        {!! link_to('admin/application', $title = 'Anuluj', ['class' => 'btn btn-danger']) !!}
      </div>
    </div>
  {!! Form::close() !!}
</div>


@stop