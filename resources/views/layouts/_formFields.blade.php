<form action="{{ $endpoint }}" method="POST">
@foreach ($fields as $field => $options)
    <input type="{{ $options['type'] }}" id="{{ $field }}" />
@endforeach
</form>