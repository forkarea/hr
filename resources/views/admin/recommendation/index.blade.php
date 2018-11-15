@extends('layout.masterAdmin')
@section('content')



<h2 class="title-admin">Recommendations</h2>
<a href="{{ url('admin/recommendation/create') }}" class="btn btn-primary btn-position">Add recommendation</a>

@if(count($recommendations) > 0)
<div class="table-responsive">
    <table class="table table-hover table-bordered" id="example">

    <thead>
        <tr>
        <th style='text-align:center;vertical-align:middle;'>Added</th>
        <th style='text-align:center;vertical-align:middle;'>Worker</th>
        <th style='text-align:center;vertical-align:middle;'>Recommendation</th>
        <th style='text-align:center;vertical-align:middle;'>Author</th>
        <th style='text-align:center;vertical-align:middle;'>Work author</th>
        <th style='text-align:center;vertical-align:middle;'>Profile author</th>
        <th style='text-align:center;vertical-align:middle;' colspan="2">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($recommendations as $recommendation)

        <tr>
            <td style="text-align:center;vertical-align:middle;">{{ $recommendation->user_name }}</td>
            <td style="text-align:center;vertical-align:middle;">{{ $recommendation->worker_name }}</td>
            <td style="text-align:center;vertical-align:middle;">{{ $recommendation->recommendation }}</td>
            <td style="text-align:center;vertical-align:middle;">{{ $recommendation->author }}</td>
            <td style="text-align:center;vertical-align:middle;">{{ $recommendation->work_author }}</td>
            <td style="text-align:center;vertical-align:middle;"><a href="{{ $recommendation->profile_author }}" target="_blank"><img src="{{asset('img/linkedin.png')}}" height="auto" width="auto"></a></td>
            <td style="text-align:center;vertical-align:middle;"><a href="{{ url('admin/recommendation/'.$recommendation->id. '/edit') }}"><span class="btn btn-primary">Edit</span></a></td>
            <td style="text-align:center;vertical-align:middle;">
            {{Form::open(['method'  => 'DELETE', 'action' => ['RecommendationsController@destroy', $recommendation->id]])}}
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