<?php
$styles = [
        'jquery-ui.structure.min',
        'jquery-ui.theme.min',
        'font-awesome.min',
        'diablodb',
];
?>
@foreach($styles as $js)
    <link rel="stylesheet" href="assets/css/{{ $js }}.css" />
@endforeach