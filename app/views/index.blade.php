@extends('layout')
@section ('title') Horizontala @stop

@section('content')
<div class="clearfix"></div>
<div id="searcher">
    <div id="mobile"></div>
    {{ Form::model(null, array('route' => 'search', 'method' => 'get', 'id' => 'searcher_form')) }}
    
    {{ Form::text('a', null, array('placeholder' => trans("commonTexts.placeholder"), 'id' => 'searcher_input', 'required')) }}
    {{ Form::submit(trans("commonTexts.search")) }}
    
    {{ Form::close() }}
</div>
@stop