<form action="{{ $endpoint }}" method="POST">
@foreach ($fields as $field => $options)
    <div class="form-group">
        <label for="{{ $field }}">{{ ucwords($field) }}</label>
        <input type="{{ $options['type'] }}" class="form-control" id="{{ $field }}" />
    </div>
@endforeach
</form>