
{{-- field to relate the post to the authenticated user --}}
{{ Form::hidden('user_id', auth()->user()->id ) }}

{{-- Category select --}}
<div class="form-group">
    {{ Form::label('category_id', 'Categorías') }}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control'])}}
</div>

{{-- Post field --}}
<div class="form-group">
    {{ Form::label('title', 'Nombre de la entrada')}}
    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title'] ) }}
</div>

{{-- Slug field --}}
<div class="form-group">
    {{ Form::label('slug', 'URL Amigable')}}
    {{ Form::text('slug', null, ['class' => 'form-control','disabled' => 'disabled', 'id' => 'slug'] ) }}
</div>

{{-- Img field --}}
<div class="form-group">
    {{ Form::label('image', 'Imagen')}}
    {{ Form::file('image', null, ['class' => 'form-control', 'id' => 'image'] ) }}
</div>

{{-- Radio Buttons --}}
<div class="form-group">
    {{ Form::label('status', 'Estado', ['class' => 'mr-3'])}}
    <label class="mr-3">
        {{ Form::radio('status','PUBLISHED') }} Publicado
    </label>
    <label >
        {{ Form::radio('status','DRAFT') }} Borrador
    </label>
</div>

{{-- Checkboxs --}}
<div class="form-group">
    {{ Form::label('tags', 'Etiquetas') }}

    <div class="container">
        @foreach ($tags as $tag)
            <label >
                {{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->title }}
            </label>
        @endforeach
    </div>
</div>

{{-- Excerpt field --}}
<div class="form-group">
    {{ Form::label('excerpt', 'Extracto')}}
    {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '2'] ) }}
</div>

{{-- Body field --}}
<div class="form-group">
    {{ Form::label('body', 'Descripción')}}
    {{ Form::textarea('body', null, ['class' => 'form-control'] ) }}
</div>

{{-- Save button --}}
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary'])}}
</div>

@section('scripts')
    <script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#title, #slug').stringToSlug({
                callback: function (text) {
                    $('#slug').val(text);
                }
            });
        });
    </script>
@endsection