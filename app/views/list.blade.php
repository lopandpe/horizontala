@extends('layout')

@section('content')
<div id='research'>
    {{ Form::model(null, array('route' => 'search', 'method' => 'get', 'id' => 'researcher_form')) }}
    
    {{ Form::text('a', null, array('placeholder' => trans("commonTexts.placeholder"), 'id' => 'researcher_input', 'required')) }}

    {{ Form::label('sefmanaged', trans("commonTexts.selfmanaged")) }}
    {{ Form::checkbox('selfmanaged') }}
    
    {{ Form::label('vegan', trans("commonTexts.vegan")) }}
    {{ Form::checkbox('vegan') }}
    
    {{ Form::submit(trans("commonTexts.search")) }}
    
    {{ Form::close() }}
</div>
<div id="list">
@foreach ($projects as $project)
    <p>{{ $project->name }} <a href="{{ URL::to('/', $project->id) }}">Ver más (FT)</a></p>
@endforeach
</div>
{{ $projects->appends(array('a' => $parameters))->links() }}
@stop