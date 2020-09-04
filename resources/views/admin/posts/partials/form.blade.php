
{{ Form::hidden('user_id', auth()->user()->id ) }}

<div class="form-group">
    {{ Form::label('category_id', 'Categorías') }}
    {{ Form::select('category_id', $categories, null, [ 'class' => 'form-control'])}}
</div>
<div class="form-group">
    {{ Form::label('title', 'Nombre de la entrada')}}
    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title'] ) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'URL Amigable')}}
    {{ Form::text('slug', null, ['class' => 'form-control','disabled' => 'disabled', 'id' => 'slug'] ) }}
</div>
<div class="form-group">
    {{ Form::label('body', 'Descripción')}}
    {{ Form::textarea('body', null, ['class' => 'form-control'] ) }}
</div>
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