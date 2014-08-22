@extends('layout')

@section('content')

<div id="searcher">
    {{ Form::open(array('route' => 'search', 'method' => 'GET', 'role' => 'form', 'id' => 'searcher_input')) }}
    
    {{ Form::text('parameters', '', array('placeholder' => trans("commonTexts.placeholder"), 'id' => 'searcher_input')) }}
    
    {{ Form::close() }}
</div>
@stop