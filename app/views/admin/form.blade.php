@extends ('layout')

@section ('title') Crear Usuarios @stop

@section ('content')

<h1>Crear Usuarios</h1>

{{ Form::open(array('route' => 'admin.store', 'method' => 'POST', 'role' => 'form')) }}

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('name', 'Dirección de E-mail') }}
      {{ Form::text('name', null, array('placeholder' => 'Introduce el nombre del proyecto', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Dirección', 'Dirección del espacio') }}
      {{ Form::text('address', null, array('placeholder' => 'Introduce la dirección', 'class' => 'form-control')) }}        
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('short_description', 'Descripción corta') }}
      {{ Form::text('short_description', array('class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('long_description', 'Descripción larga') }}
      {{ Form::text('long_description', array('class' => 'form-control')) }}
    </div>
  </div>
  {{ Form::button('Crear proyecto', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop