<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Categoria') }}
            {{ Form::select('cve_categoria', $categorias , $libro->cve_categoria, ['class' => 'form-control' . ($errors->has('cve_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Categoria']) }}
            {!! $errors->first('cve_categoria', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $libro->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>