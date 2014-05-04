<div class="col-sm-2 select-idioma">
    {{ Form::select('idioma', $idiomas, Input::get('idioma', null), array('class' => 'form-control input-sm')) }}
    {{ Form::errors($errors->get('nombre')) }}
</div>
<div class="col-sm-1 text-right select-idioma">
    {{ Form::submit('Cambiar', array( 'class' => "btn btn-success btn-sm")) }}
</div>