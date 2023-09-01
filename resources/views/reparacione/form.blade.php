<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('start') }}
            {{ Form::text('start', $reparacione->start, ['class' => 'form-control' . ($errors->has('start') ? ' is-invalid' : ''), 'placeholder' => 'Start']) }}
            {!! $errors->first('start', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('end') }}
            {{ Form::text('end', $reparacione->end, ['class' => 'form-control' . ($errors->has('end') ? ' is-invalid' : ''), 'placeholder' => 'End']) }}
            {!! $errors->first('end', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tecnico_id') }}
            {{ Form::select('tecnico_id',$tecnicos, $reparacione->tecnico_id, ['class' => 'form-control' . ($errors->has('tecnico_id') ? ' is-invalid' : ''), 'placeholder' => 'Tecnico Id']) }}
            {!! $errors->first('tecnico_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('maquina_id') }}
            {{ Form::select('maquina_id',$maquinas, $reparacione->maquina_id, ['class' => 'form-control' . ($errors->has('maquina_id') ? ' is-invalid' : ''), 'placeholder' => 'Maquina Id']) }}
            {!! $errors->first('maquina_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>