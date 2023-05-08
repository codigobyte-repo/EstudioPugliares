<div class="form-group">
    {!! Form::label('name', 'Nombre de la publicación') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la publicación']) !!}

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
    {!! Form::label('category_id', 'Categoría') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

    @error('category_id')
        <span class="text-danger text-small">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas:</p>

    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{ $tag->name }}
        </label>
    @endforeach

    @error('tags')
        <br>
        <span class="text-danger text-small">{{ $message }}</span>
    @enderror

</div>

<div class="form-group">
    <p class="font-weight-bold">Estado:</p>
    <label class="mr-2">
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
    <label class="mr-2">
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>

    @error('status')
        <br>
        <span class="text-danger text-small">{{ $message }}</span>
    @enderror
</div>

<div class="image-section">

    <div class="row mb-3">
        <div class="col">
            {!! Form::label('imagen', 'Imagen de la publicación') !!}
            <div class="image-wrapper">
                @isset ($post->image)
                    <img id="picture" src="{{ Storage::disk('public_images')->url($post->image->url) }}" alt="Imagen por defecto">
                @else
                    <img id="picture" src="{{ asset('images/background-default.png') }}" alt="Imagen por defecto">
                @endisset
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('file', 'Imagen portada de la publicación') !!}
                {{ Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) }}
                
                @error('file')
                    <br>
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror

            </div>
            
            <p>IMPORTANTE: Las imágenes en blanco no permiten que el título de la publicación se vea de forma clara. Utiliza imagenes con fondos oscuros. 
            El formato de las imágenes debe ser .JPG y/o .PNG.
            Si desea usar una imagen blanca la puede oscurecer con la siguiente herramienta Online: <a target="to_blank" href="https://pinetools.com/es/oscurecer-imagen">OSCURECER IMAGEN ONLINE</a>
            </p>

        </div>
    </div>
</div>

<div class="form-group">                
    {!! Form::label('extract', 'Breve descripción') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

    @error('extract')
        <span class="text-danger text-small">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">                
    {!! Form::label('body', 'Contenido de la descripción') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

    @error('body')
        <span class="text-danger text-small">{{ $message }}</span>
    @enderror
</div>