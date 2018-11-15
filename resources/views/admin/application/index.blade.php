@extends('layout.masterAdmin')
@section('content')

<h2 class="title-admin">Applications</h2>
<a href="{{ url('admin/application/create') }}" class="btn btn-primary btn-position">Add application</a>


@if(Session::has('workerSaveOk'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('workerSaveOk') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::has('ApplicationDestroyOk'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('ApplicationDestroyOk') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::has('applicationSaveOk'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('applicationSaveOk') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(count($applications) > 0)
<div class="table-responsive">
    <table class="table table-hover table-bordered" id="example">
        <thead>
            <tr>
            <th style="text-align:center;vertical-align:middle;">Added</th>
            <th style="text-align:center;vertical-align:middle;">Name</th>
            <th style="text-align:center;vertical-align:middle;">Phone</th>
            <th style="text-align:center;vertical-align:middle;">Email</th>
            <th style="text-align:center;vertical-align:middle;">Job title</th>
            <th style="text-align:center;vertical-align:middle;">Company name</th>
            <th style="text-align:center;vertical-align:middle;">Location</th>
            <th style="text-align:center;vertical-align:middle;">Created/update</th>
            <th style="text-align:center;vertical-align:middle;" colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
            <tr>
            <td align='center' style="text-align:center;vertical-align:middle;">{{ $application->user_name }}</td>
            <td align='center' style="text-align:center;vertical-align:middle;">{{ $application->name }}</td>
            <td align='center' style="text-align:center;vertical-align:middle;">{{ $application->phone }}</td>
            <td align='center' style="text-align:center;vertical-align:middle;">{{ $application->email }}</td>
            <td align='center' style="text-align:center;vertical-align:middle;">{{ $application->job_title }}</td>
            <td align='center' style="text-align:center;vertical-align:middle;">{{ $application->company_name }}</td>
            <td align='center' style="text-align:center;vertical-align:middle;">{{ $application->location }}</td>
                @if($application->updated_at == null)
                <td align='center' style="text-align:center;vertical-align:middle;">{{ $application->created_at }}</td>
                @else
                <td align='center' style="text-align:center;vertical-align:middle;">{{ $application->updated_at }}</td>
                @endif
            <td align='center' style="text-align:center;vertical-align:middle;"><a href="{{ url('admin/application/'.$application->id. '/edit') }}"><span class="btn btn-primary">Edit</span></a></td>
            <td align='center' style="text-align:center;vertical-align:middle;"><a href="{{ url('admin/application/'.$application->id) }}"><span class="btn btn-info">Show</span></a></td>
            <td align='center' style="text-align:center;vertical-align:middle;">
                {{Form::open(['method'  => 'DELETE', 'action' => ['ApplicationsController@destroy', $application->id]])}}
                    {!! Form::submit('Remove', ['class' => 'btn btn-success']); !!}
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="pagination-pos">
    {{ $applications->links() }}
</div>

@else
  <div class="alert alert-info" role="alert">
    First add application: <a href="{{ url('admin/application/create') }}" >Add application</a>.
  </div>
@endif

@stop