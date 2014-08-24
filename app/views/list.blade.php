@extends('layout')

@section('content')

<div id="madrid"><img class="img-responsive" src="{{ asset('assets/img/madrid.png') }}" /></div>


@include('research')

@if($projects->isEmpty())

    <div id="list" class="container">
        <div id="results">
            <div id="no_match" class="row">
                <div class="col-xs-12">
                    <h3>NO HAY RESULTADOS QUE COINCIDAN CON LA BÚSQUEDA (FT)</h3>
                </div>
            </div>
        </div>
    </div>

@else

    @include('results')

@endif

</div>
@stop