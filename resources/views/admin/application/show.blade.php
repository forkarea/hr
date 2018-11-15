@extends('layout.masterAdmin')
@section('content')

<h2 class="title-admin">Applications</h2>


@if(Session::has('workerSaveOk'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('workerSaveOk') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        @if($applications->user_id != null)
            <tr><td><b>Added:</b> {{ $applications->user->name }}</td></tr>
        @endif
        @if($applications->name != null)
            <tr><td><b>Name:</b> {{ $applications->name }}</td></tr>
        @endif
        @if($applications->phone != null)
            <tr><td><b>Phone:</b> {{ $applications->phone }}</td></tr>
        @endif
        @if($applications->email != null)
            <tr><td><b>Email:</b> {{ $applications->email }}</td></tr>
        @endif
        @if($applications->job_title != null)
            <tr><td><b>Job title:</b> {{ $applications->job_title }}</td></tr>
        @endif
        @if($applications->company_name != null)
            <tr><td><b>Company name:</b> {{ $applications->company_name }}</td></tr>
        @endif
        @if($applications->location != null)
            <tr><td><b>Location:</b> {{ $applications->location }}</td></tr>
        @endif
        @if($applications->type_salary != null)
            <tr><td><b>Type salary:</b> {{ $applications->type_salary }}</td></tr>
        @endif
        @if($applications->start_date != null)
            <tr><td><b>Start date:</b> {{ $applications->start_date }}</td></tr>
        @endif
        @if($applications->percent_work != null)
            <tr><td><b>Percent work:</b> {{ $applications->percent_work }}</td></tr>
        @endif
        @if($applications->must_have != null)
            <tr><td><b>Must have:</b> {{ $applications->must_have }}</td></tr>
        @endif
        @if($applications->nice_have != null)
            <tr><td><b>Nice have:</b> {{ $applications->nice_have }}</td></tr>
        @endif
        @if($applications->languages != null)
            <tr><td><b>Languages:</b> {{ $applications->languages }}</td></tr>
        @endif
        @if($applications->type_work != null)
            <tr><td><b>Type work:</b> {{ $applications->type_work }}</td></tr>
        @endif
        @if($applications->project_industhy != null)
            <tr><td><b>Project indusliy:</b> {{ $applications->project_industhy }}</td></tr>
        @endif
        @if($applications->company_size != null)
            <tr><td><b>Company size:</b> {{ $applications->company_size }}</td></tr>
        @endif
        @if($applications->project_team_size != null)
            <tr><td><b>Project team size:</b> {{ $applications->project_team_size }}
        </td></tr>
        @endif
        @if($applications->percent_workload != null)
            <tr><td><b>Percent workload:</b> {{ $applications->percent_workload }}</td></tr>
        @endif
        @if($applications->day_holiday != null)
            <tr><td><b>Day holiday:</b> {{ $applications->day_holiday }}</td></tr>
        @endif
        @if($applications->office_hours_from != null)
            <tr><td><b>Office hours from:</b> {{ $applications->office_hours_from }}
        </td></tr>
        @endif
        @if($applications->office_hours_to != null)
            <tr><td><b>Office hours to:</b> {{ $applications->office_hours_to }}</td></tr>
        @endif
        @if($applications->day_thavel != null)
            <tr><td><b>Day liavel:</b> {{ $applications->day_thavel }}</td></tr>
        @endif
        @if($applications->day_relocation != null)
            <tr><td><b>Day relocation:</b> {{ $applications->day_relocation }}</td></tr>
        @endif
        @if($formatFile !== null)
            <tr><td>
                <b>Upload file:</b>                 
                @switch($formatFile)
                    @case('pdf')
                        <a href="{{ url('applicationfile/'.$applications->upload_file) }}" target="_blank"><img src="{{asset('img/pdf.png')}}" height="32px" width="auto"></a>
                        @break
                    @case('doc')
                    @case('docx')
                        <a href="{{ url('applicationfile/'.$applications->upload_file) }}" target="_blank"><img src="{{asset('img/word.png')}}" height="32px" width="auto"></a>
                        @break
                    @case('xlsx')
                        <a href="{{ url('applicationfile/'.$applications->upload_file) }}" target="_blank"><img src="{{asset('img/excel.png')}}" height="32px" width="auto"></a>
                        @break
                    @case('txt')
                        <a href="{{ url('applicationfile/'.$applications->upload_file) }}" target="_blank"><img src="{{asset('img/txt.png')}}" height="32px" width="auto"></a>
                        @break
                    @default
                        <a href="{{ url('applicationfile/'.$applications->upload_file) }}" target="_blank"><img src="{{asset('img/picture.png')}}" height="32px" width="auto"></a>
                @endswitch
            </td></tr>
        @endif
        <tr><td><b>Created/update:</b>
            @if($applications->updated_at == null)
                {{ $applications->created_at }}
            @else
                {{ $applications->updated_at }}
            @endif
        </td></tr>
    </table>

    <div class="btn-pos">
        <a href="{{ url('admin/application/'.$applications->id. '/edit') }}"><span class="btn btn-info" data-toggle="tooltip" title="">Edit</span></a>
        {{Form::open(['method'  => 'DELETE', 'action' => ['ApplicationsController@destroy', $applications->id]])}}
            {!! Form::submit('Remove', ['class' => 'btn btn-success']); !!}
        {!! Form::close() !!}
    </div>
</div>
@stop