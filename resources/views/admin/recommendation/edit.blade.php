@extends('layout.masterAdmin')
@section('content')

<h2 class="title-admin">Edit recommendation</h2>


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
    {!! Form::model($recommendation, ['method'=>'PATCH','class'=>'form-horizontal','action'=>['RecommendationsController@update', $recommendation->id]]) !!}

    <div class="form-group">
        <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Select worker:</label>
        <div class="col-xl-12">
            {!! Form::select('worker_id', $listWorker, null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>

    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Recommendation:</label>
      <div class="col-xl-12">
        {!! Form::textarea('recommendation', NULL, ['class' => 'form-control', 'placeholder' => 'Mateusz is a person of many talents...', 'required']) !!}
      </div>
    </div>

    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Author:</label>
      <div class="col-xl-12">
        {!! Form::text('author', NULL, ['class' => 'form-control', 'placeholder' => 'Marek Neubauer', 'required']) !!}
      </div>
    </div>

    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Work author:</label>
      <div class="col-xl-12">
        {!! Form::text('work_author', NULL, ['class' => 'form-control', 'placeholder' => 'IT Recruitment Specialist/Team Leader', 'required']) !!}
      </div>
    </div>

    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Profile author:</label>
      <div class="col-xl-12">
        {!! Form::text('profile_author', NULL, ['class' => 'form-control', 'placeholder' => 'https://www.linkedin.com/in/m-neubauer', 'required']) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-xl-offset-2 col-xl-12">
        {!! Form::submit('Save', ['class' => 'btn btn-success']); !!}
        {!! link_to('admin/worker', $title = 'Anuluj', ['class' => 'btn btn-danger']) !!}
      </div>
    </div>
  {!! Form::close() !!}
</div>


@stop