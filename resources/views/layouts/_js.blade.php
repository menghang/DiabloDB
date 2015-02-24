<?php
$scripts = [
    'jquery-2.1.1.min',
    'jquery-ui-1.11.2.min'
];
foreach($scripts as $js)
{
    echo '';
}
?>
@foreach($scripts as $js)
    <script src="assets/js/{{ $js }}.js"></script>
@endforeach