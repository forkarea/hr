@extends('layout.masterAdmin')
@section('content')

<h2 class="title-admin">Worker</h2>
<a href="{{ url('admin/worker/create') }}" class="btn btn-primary btn-position">Add worker</a>


@if(Session::has('workerSaveOk'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('workerSaveOk') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::has('workerUpdateOk'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('workerUpdateOk') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::has('workerDestroyOk'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('workerDestroyOk') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::has('recommendationDestroyOk'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('recommendationDestroyOk') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(count($workers) > 0)
<div class="table-responsive">
    <table class="table table-hover table-bordered" id="example">

    <thead>
        <tr>
        <th style='text-align:center;vertical-align:middle;'>Added</th>
        <th style='text-align:center;vertical-align:middle;'>Name</th>
        <th style='text-align:center;vertical-align:middle;'>Photo</th>
        <th style='text-align:center;vertical-align:middle;'>Description</th>
        <th style='text-align:center;vertical-align:middle;'>Profile</th>
        <th style='text-align:center;vertical-align:middle;' colspan="4">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($workers as $worker)
        <tr>
            <td align='center' style="vertical-align:middle;">{{ $worker->user_name }}</td>
            <td align='center' style="vertical-align:middle;">{{ $worker->name }}</td>
            <td align='center' style="vertical-align:middle;"><img src="{{asset('photo_linkedin/'.$worker->photo)}}" height="90px" width="auto"></td>
            <td align='center' style="vertical-align:middle;">{{ $worker->description }}</td>
            <td align='center' style="vertical-align:middle;"><a href="{{ $worker->profile_worker }}" target="_blank"><img src="{{asset('img/linkedin.png')}}" height="auto" width="auto"></a></td>
            <td align='center' style="vertical-align:middle;"><a href="{{ url('admin/worker/'.$worker->id. '/edit') }}"><span class="btn btn-primary">Edit</span></a></td>
            <td align='center' style="vertical-align:middle;"><a href="{{ url('admin/worker/'.$worker->id) }}"><span class="btn btn-info">Show</span></a></td>
            <td align='center' style="vertical-align:middle;"><a href="{{ url('admin/recommendation/create/'.$worker->id) }}"><span class="btn btn-warning">Add recommendation</span></a></td>
            <td align='center' style="vertical-align:middle;">
            {{Form::open(['method'  => 'DELETE', 'action' => ['WorkersController@destroy', $worker->id]])}}
                {!! Form::submit('Remove', ['class' => 'btn btn-success']); !!}
            {!! Form::close() !!}
            </td>
            
        </tr>
        @endforeach
    </tbody>

    </table>
</div>
@else
  <div class="alert alert-info" role="alert">
    First add worker: <a href="{{ url('admin/worker/create') }}" >Add worker</a>.
  </div>
@endif

@stop