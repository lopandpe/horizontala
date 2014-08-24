<div id='research' class="container well">
    {{ Form::model(null, array('route' => 'search', 'method' => 'get', 'id' => 'researcher_form')) }}
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