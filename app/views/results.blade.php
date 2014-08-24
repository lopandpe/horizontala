<div id="list" class="container">
    <div id="results">
        <img id="mariquita" class="hidden-sm img-responsive" src="{{ asset('assets/img/mariquita.png') }}" />

        <?php
        $lang = Session::get('locale');
        $short_desc = 'short_description_' . $lang;
        $resources = "resources_" . $lang;
        $long_desc = "description_" . $lang;
        ?>
        @foreach ($projects as $project)

        <div class="project">
            <div class="row">
                <div class="col-md-8 col-sm-10">
                    <div class="data_project row">
                        <div class="col-sm-6">
                            <div class="row project_name"><p>{{ $project->name }}</p></div>
                            <div class="row"><p>{{ $project->$resources }}</p></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row"><p>{{ $project->$short_desc }}</p></div>
                            <div class="row"><p>{{ $project->base_address }}</p></div>
                        </div>

                        <div class="col-sm-12 more_info">
                            <div class="col-sm-8">
                                <div class="row"><p><strong>{{ trans('commonTexts.description') }}</strong>:<br /> {{ $project->$long_desc }}</p></div>
                                
                            </div>
                            <div class="col-sm-4">
                                <div class="row"><p><strong>{{ trans('commonTexts.addresses') }}</strong>:<br /> {{ $project->addresses }}</p></div>  
                                <div class="row"><p><strong>{{ trans('commonTexts.contact') }}</strong>:<br /> {{ $project->contact }}</p></div>
                            </div>
                            <div class="col-sm-12">
                                <a class="see_much_more btn btn-danger" href="{{ URL::route('viewProject', array('id' => $project->id)) }}">Ver mucho más (FT)</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-2 hidden-xs">
                    @if ((isset($project->image_or_logo)) && (strlen($project->image_or_logo) > 1))
                    <img class="img-responsive project-image img-circle" src="{{ asset($project->image_or_logo) }}"/>
                    @else
                    <img class="img-responsive project-image img-circle" src="{{ asset('assets/img/no-foto.png') }}"/>
                    @endif
                </div>
                <a class="see_more btn btn-info" href="#">Ver más (FT)</a>
            </div>
        </div>

        @endforeach
    </div>
    <div id='pagination'>{{ $projects->appends(array('a' => $parameters))->links() }}</div>