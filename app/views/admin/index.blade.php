@extends ('admin.layout')

@section ('title') {{ trans('commonTexts.add_project') }} @stop

@section ('content')

<div id="list" class="container admin">
    <div id="admin_search">
        {{ Form::model(null, array('route' => 'admin_search', 'method' => 'get', 'id' => 'researcher_form')) }}
        <div>
            {{ Form::text('a', null, array('placeholder' => trans("commonTexts.placeholder"), 'id' => 'researcher_input', 'required')) }}
        </div>
        <div>
            {{ Form::label('sefmanaged', trans("commonTexts.selfmanaged")) }}
            {{ Form::checkbox('selfmanaged') }}
        </div>
        <div>
            {{ Form::label('vegan', trans("commonTexts.vegan")) }}
            {{ Form::checkbox('vegan') }}
        </div>
        <div>
            {{ Form::submit(trans("commonTexts.search")) }}
        </div>
        {{ Form::close() }}
    </div>
    <div id="results">

        @if($errors->count() > 0)
        <div class="col-md-6 col-md-offset-3 errores">
            <p>{{ trans('commonTexts.errorValidation') }}</p>
            <ul>
                @foreach($errors->all() as $message)
                <li>{{$message}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <h2>{{ $success or '' }}</h2>

        <a href="{{ route('new_project') }}" class="new_project btn btn-info">NUEVO PROYECTO (FT)</a>
        @foreach ($projects as $project)
        <div class="admin_project">
            <div class="row">
                <div class="col-xs-3">
                    {{ trans('commonTexts.name') }}: <strong>{{ $project->name }}</strong>
                </div>
                <div class="col-xs-3">
                    <a class="btn btn-lg btn-success" href="{{ route('edit_project', array('id' => $project->id)) }}">{{ trans('commonTexts.edit') }}</a>
                    <a class="btn btn-lg btn-danger" href="">{{ trans('commonTexts.delete') }}</a>
                </div>
                <div class="col-xs-6">
                    <div class='col-xs-3'>
                        @if ((isset($project->image_or_logo)) && (strlen($project->image_or_logo) > 1))
                            <img class="img-responsive project-image img-circle" src="{{ asset($project->image_or_logo) }}"/>
                        @else
                            <img class="img-responsive project-image img-circle" src="{{ asset('assets/img/no-foto.png') }}"/>
                        @endif
                    </div>
                    <div class='col-xs-9'>
                        {{ Form::open(array('route' => array('edit_logo', $project->id), 'method' => 'PUT', 'files' => true)) }}
                        {{ Form::file('image_or_logo') }}
                        {{ Form::button(trans("commonTexts.changeLogo"), array('type' => 'submit', 'class' => 'btn  btn-sm btn-primary')) }}                    {{ Form::close() }}
                    </div>
                </div>

            </div>
        </div>
        @endforeach

    </div>
</div>

@stop