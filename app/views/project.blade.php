@extends('layout')

@section('content')

<?php
$lang = Session::get('locale');
$about = 'about_' . $lang;
$resources = "resources_" . $lang;
$long_desc = "description_" . $lang;
$structure = 'structure_' . $lang;
$objectives = 'objectives_' . $lang;
$lines_of_work = 'lines_of_work_' . $lang;
?>

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
        <div id="individual_project">
            <div class="row">
                <h1>{{ $project->name }}</h1>

                @if(strlen($project->$long_desc))
                <div class="col-sm-6"><p><strong>{{ trans('commonTexts.description') }}</strong>:<br />{{ $project->$long_desc }}</p></div>
                @endif            

                @if(strlen($project->$about))
                <div class="col-sm-6"><p><strong>{{ trans('commonTexts.about') }}</strong>:<br />{{ $project->$about }}</p></div>
                @endif

                @if(strlen($project->$structure))
                <div class="col-sm-6"><p><strong>{{ trans('commonTexts.structure') }}</strong>:<br />{{ $project->$structure }}</p></div>
                @endif

                @if(strlen($project->$objectives))
                <div class="col-sm-6"><p><strong>{{ trans('commonTexts.objectives') }}</strong>:<br />{{ $project->$objectives }}</p></div>
                @endif

                @if(strlen($project->$lines_of_work))
                <div class="col-sm-6"><p><strong>{{ trans('commonTexts.lines_of_work') }}</strong>:<br />{{ $project->$lines_of_work }}</p></div>
                @endif

                @if(strlen($project->addresses))
                <div class="col-sm-6"><p><strong>{{ trans('commonTexts.addresses') }}</strong>:<br />{{ $project->addresses }}</p></div>
                @endif

                @if(strlen($project->contact))
                <div class="col-sm-6"><p><strong>{{ trans('commonTexts.contact') }}</strong>:<br />{{ $project->contact }}</p></div>
                @endif

                @if($project->revised != "0000-00-00")
                <div class="col-sm-6"><p><strong>{{ trans('commonTexts.revised') }}</strong>:<br />{{ date("d/m/Y", strtotime($project->revised)) }}</p></div>
                @endif
                <div class="iconed col-sm-6">
                    @if($project->vegan == 1)
                    <div class="col-xs-6"><img src="{{ asset('assets/img/vegan.png') }}" alt="vegan icon" /> {{ trans('commonTexts.vegan') }}</div>
                    @endif
                    @if($project->selfmanaged == 1)
                    <div class="col-xs-6"><img src="{{ asset('assets/img/selfmanaged.png') }}" alt="selfmanaged icon" /> {{ trans('commonTexts.selfmanaged') }}</div>
                    @endif
                </div>





                @if(strlen($project->geo_coordinates))
                <?php
                    $coordenates = $project->geo_coordinates;
                    $coords = explode(';', $coordenates);
                    $lat = (float)$coords[0];
                    $long = (float)$coords[1];
                    $lesslat = $lat - 0.002;
                    $lesslong = $long - 0.002;
                    $morelat = $lat + 0.002;
                    $morelong = $long + 0.002;
                ?>
                    <div  class="col-sm-6">
                    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openstreetmap.org/export/embed.html?bbox={{ $lesslong }}%2C{{ $lesslat }}%2C{{ $morelong }}%2C{{ $morelat }}&amp;layer=mapnik&amp;marker={{ $lat }}%2C{{ $long }}" style="border: 1px solid black"></iframe><br/><small><a href="http://www.openstreetmap.org/?mlat={{ $lat }}&amp;mlon={{ $long }}#map=19/{{ $lat }}/{{ $long }}">{{ trans('commonTexts.higherMap') }}</a></small>
                    </div>
                @endif
                
                
                
                <div class="col-sm-6 share">
                    <p>{{ trans('commonTexts.share') }}</p>
                    <a href="{{ Share::load(Request::url() , $project->name)->facebook() }}" ><img src="{{ asset('assets/img/social/facebook.png') }}" alt="facebook icon" /></a>
                    <a href="{{ Share::load(Request::url() , $project->name)->twitter() }}" ><img src="{{ asset('assets/img/social/twitter.png') }}" alt="twitter icon" /></a>
                    <a href="{{ Share::load(Request::url() , $project->name)->linkedin() }}" ><img src="{{ asset('assets/img/social/linkedin.png') }}" alt="linkedin icon" /></a>
                    
                </div>
                
                
            </div>
            <div id="back"><a class="btn btn-lg btn-danger" href="{{ URL::previous() }}">{{ trans('commonTexts.goBack') }}</a></div>
        </div>

    </div>
</div>
@stop