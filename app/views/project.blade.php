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
<div id="individual_project">
{{ $project->description_es }}
</div>
<div id="back"><a href="{{ URL::previous() }}">Volver (FT)</a></div>
@stop