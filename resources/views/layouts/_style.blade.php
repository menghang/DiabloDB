<?php
$styles = [
        'jquery-ui.structure.min',
        'jquery-ui.theme.min',
        'font-awesome.min',
        'diablodb',
];
?>
@foreach($styles as $css)
    <link rel="stylesheet" href="{{ asset('assets/css/'.$css.'.css') }}" />
@endforeach