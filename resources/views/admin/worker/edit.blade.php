@extends('layout.masterAdmin')
@section('content')

<h2 class="title-admin">Edit worker</h2>


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
    {!! Form::model($worker, ['method'=>'PATCH','class'=>'form-horizontal', 'files' => true, 'action'=>['WorkersController@update', $worker->id]]) !!}

    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Name:</label>
      <div class="col-xl-12">
        {!! Form::text('name', NULL, ['class' => 'form-control', 'placeholder' => 'Mateusz Chomiczewski', 'required']) !!}
      </div>
    </div>

    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Photo:</label>
      <div class="col-xl-12">
          <input type="file"  name="photo" required="required">
        <div>Old photo:</div>
        <img src="{{asset('photo_linkedin/'.$worker->photo)}}" height="90px" width="auto">
        <input type="hidden" value="{{ $worker->photo }}" name="old_photo">
      </div>
    </div>

    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Description:</label>
      <div class="col-xl-12">
        {!! Form::text('description', NULL, ['class' => 'form-control', 'placeholder' => 'Web & mobile apps | ML & DL | Software | Stermedia | People | HR', 'required']) !!}
      </div>
    </div>

    <div class="form-group">
      <label for="title_slider" class="col-xl-12 control-label contact-contact-theme-form">Profile worker:</label>
      <div class="col-xl-12">
        {!! Form::text('profile_worker', NULL, ['class' => 'form-control', 'placeholder' => 'https://www.linkedin.com/in/mattchomiczewski/', 'required']) !!}
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