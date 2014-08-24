@extends('layout')

@section('content')


<div id="madrid">
    @if(isset($project->image_or_logo) && strlen($project->image_or_logo))
    <img class="img-responsive" src="{{ asset($project->image_or_logo) }}" />
    @else
    <img class="img-responsive" src="{{ asset('assets/img/madrid.png') }}" />
    @endif
</div>

@include('research')

<div id="list" class="container">
    <div id="results">

        <div id="no_match" class="row">
            <div class="col-xs-12">
                NO HAY NINgÚN PROYECTO. ¿borrado? ¿inexistente?
            </div>
        </div>

    </div>
</div>
@stop