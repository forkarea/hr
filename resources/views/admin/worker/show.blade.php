@extends('layout.masterAdmin')
@section('content')

<h2 class="title-admin">{{ $worker->name }}</h2>

<p class="recommendation-user">Recommendations:</p>
<a href="{{ url('admin/recommendation/create/'.$worker->id) }}" class="btn btn-primary btn-position">Add recommendation</a>


@if(Session::has('recommendationSaveOk'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('recommendationSaveOk') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(count($recommendations) > 0)
<table class="table table-hover table-bordered" id="example">

  <thead>
    <tr>
      <th style='text-align:center'>Added</th>
      <th style='text-align:center'>Recommendation</th>
      <th style='text-align:center'>Author</th>
      <th style='text-align:center'>Work author</th>
      <th style='text-align:center'>Profile author</th>
      <th style='text-align:center' colspan="2">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($recommendations as $recommendations)
    <tr>
        <td align='center'>{{ $recommendations->user_name }}</td>
        <td align='center'>{{ $recommendations->recommendation }}</td>
        <td align='center'>{{ $recommendations->author }}</td>
        <td align='center'>{{ $recommendations->work_author }}</td>
        <td align='center'><a href="{{ $recommendations->profile_author }}" target="_blank"><img src="{{asset('img/linkedin.png')}}" height="auto" width="auto"></a></td>
        <td align='center'><a href="{{ url('admin/recommendation/'.$recommendations->recommendation_id. '/edit') }}"><span class="btn btn-primary">Edit</span></a></td>
        <td align='center'>
          {{Form::open(['method'  => 'DELETE', 'action' => ['RecommendationsController@destroy', $recommendations->recommendation_id]])}}
            {!! Form::submit('Remove', ['class' => 'btn btn-success']); !!}
          {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
  </tbody>

</table>
@else
  <div class="alert alert-info" role="alert">
    First add recommendation: <a href="{{ url('admin/recommendation/create') }}" >Add recommendation</a>
  </div>
@endif

@stop