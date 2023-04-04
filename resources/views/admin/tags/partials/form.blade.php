<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la etiqueta']) !!}

    @error('name')
        <span class="text-danger text-small">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::label('info', 'El Slug es la dirección que aparecerá en la Url', ['class' => 'badge badge-secondary']) !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Nombre del slug', 'readonly']) !!}

    @error('slug')
        <span class="text-danger text-small">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('color', 'Color') !!}
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}
</div>

@error('color')
        <span class="text-danger text-small">{{ $message }}</span>
@enderror