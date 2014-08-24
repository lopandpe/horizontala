@extends ('admin.layout')

@section ('title') {{ trans('commonTexts.add_project') }} @stop

@section ('content')
<div id="new_project">

    <h2>{{ $success or '' }}</h2>
    <h1>{{ trans('commonTexts.add_project') }}</h1>


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

    {{ Form::model($project, array('route' => array('post_edit_project', $project->id), 'method' => 'PUT', 'role' => 'form', 'files' => true)) }}

    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="form-group col-md-4">
                    {{ Form::label('name', trans("commonTexts.name") ) }}
                    {{ Form::text('name', isset($data['name'])? $data['name'] : null , array('placeholder' => 'Introduce el nombre del proyecto', 'class' => 'form-control')) }}
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('short_description_es', trans("commonTexts.short_description_es") ) }}
                    {{ Form::text('short_description_es', isset($data['short_description_es'])? $data['short_description_es'] : null, array('class' => 'form-control')) }}
                    {{ Form::label('short_description_en', trans("commonTexts.short_description_en") ) }}
                    {{ Form::text('short_description_en', isset($data['short_description_en'])? $data['short_description_en'] : null, array('class' => 'form-control')) }}

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="form-group col-md-4">
                    {{ Form::label('addresses', trans("commonTexts.addresses") ) }}
                    {{ Form::textarea('addresses', isset($data['addresses'])? $data['addresses'] : null, array('placeholder' => 'Introduce la dirección', 'class' => 'form-control')) }} 
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('resources_es', trans("commonTexts.resources_es") ) }}
                    {{ Form::text('resources_es', isset($data['resources_es'])? $data['resources_es'] : null, array('class' => 'form-control')) }}

                    {{ Form::label('resources_en', trans("commonTexts.resources_en") ) }}
                    {{ Form::text('resources_en', isset($data['resources_en'])? $data['resources_en'] : null, array('class' => 'form-control')) }}


                    {{ Form::label('base_address', trans("commonTexts.base_address")) }}
                    {{ Form::text('base_address', isset($data['base_address'])? $data['base_address'] : null, array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="form-group col-md-4">
                    {{ Form::label('description_es', trans("commonTexts.description_es") ) }}
                    {{ Form::textarea('description_es', isset($data['description_es'])? $data['description_es'] : null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('description_en', trans("commonTexts.description_en") ) }}
                    {{ Form::textarea('description_en', isset($data['description_en'])? $data['description_en'] : null, array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="form-group col-md-4">
                    {{ Form::label('about_es', trans("commonTexts.about_es") ) }}
                    {{ Form::textarea('about_es', isset($data['about_es'])? $data['about_es'] : null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('about_en', trans("commonTexts.about_en") ) }}
                    {{ Form::textarea('about_en', isset($data['about_en'])? $data['about_en'] : null, array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="form-group col-md-4">
                    {{ Form::label('structure_es', trans("commonTexts.structure_es") ) }}
                    {{ Form::textarea('structure_es', isset($data['structure_es'])? $data['structure_es'] : null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('structure_en', trans("commonTexts.structure_en") ) }}
                    {{ Form::textarea('structure_en', isset($data['structure_en'])? $data['structure_en'] : null, array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="form-group col-md-4">
                    {{ Form::label('objectives_es', trans("commonTexts.objectives_es") ) }}
                    {{ Form::textarea('objectives_es', isset($data['objectives_es'])? $data['objectives_es'] : null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('objectives_en', trans("commonTexts.objectives_en") ) }}
                    {{ Form::textarea('objectives_en', isset($data['objectives_en'])? $data['objectives_en'] : null, array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="form-group col-md-4">
                    {{ Form::label('lines_of_work_es', trans("commonTexts.lines_of_work_es") ) }}
                    {{ Form::textarea('lines_of_work_es', isset($data['lines_of_work_es'])? $data['lines_of_work_es'] : null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('lines_of_work_en', trans("commonTexts.lines_of_work_en") ) }}
                    {{ Form::textarea('lines_of_work_en', isset($data['lines_of_work_en'])? $data['lines_of_work_en'] : null, array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="form-group col-md-4">
                    {{ Form::label('contact', trans("commonTexts.contact")) }}
                    {{ Form::textarea('contact', isset($data['contact'])? $data['contact'] : null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('email', trans("commonTexts.email")) }}
                    {{ Form::text('email', isset($data['email'])? $data['email'] : null, array('class' => 'form-control')) }}
                    {{ Form::label('geo_coordinates', trans("commonTexts.geo_coordinates")) }}
                    {{ Form::text('geo_coordinates', isset($data['geo_coordinates'])? $data['geo_coordinates'] : null, array('placeholder' => '40.4124;-3.7001', 'class' => 'form-control')) }}
                    {{ Form::label('revised', trans("commonTexts.revised")) }}
                    {{ Form::text('revised', isset($data['revised'])? $data['revised'] : null, array('class' => 'form-control', 'class' => 'datepicker')) }}
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            language: "{{ trans('commonTexts.lang') }}"
        });
    </script>

    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="form-group col-md-3">
                    {{ Form::label('sefmanaged', trans("commonTexts.selfmanaged")) }}
                    {{ Form::checkbox('selfmanaged') }}
                </div>
                <div class="form-group col-md-3">
                    {{ Form::label('vegan', trans("commonTexts.vegan")) }}
                    {{ Form::checkbox('vegan') }}
                </div>
                <div class="form-group col-md-3">
                    {{ Form::label('released', trans("commonTexts.released")) }}
                    {{ Form::checkbox('released') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            {{ Form::button('Go!', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
        </div>
    </div>
    {{ Form::close() }}
</div>
@stop