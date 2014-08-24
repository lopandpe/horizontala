@extends('layout')
@section ('title') Horizontala @stop
@section('content')

<div id="madrid"><img class="img-responsive" src="{{ asset('assets/img/madrid.png') }}" /></div>


@include('research')

@if($projects->isEmpty())

    <div id="list" class="container">
        <div id="results">
            <div id="no_match" class="row">
                <div class="col-xs-12">
                    <h3>{{ trans('commonTexts.no_results') }}</h3>
                </div>
            </div>
        </div>
    </div>

@else

    @include('results')

@endif

</div>
@stop