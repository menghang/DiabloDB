<?php
function actions($id)
{
    echo '<button class="btn btn-xs btn-primary"><span class="fa fa-pencil"></span> Edit</button> <button class="btn btn-xs btn-danger"><span class="fa fa-times"></span> Delete!</button>';
}
?>

@extends('layouts/master')

@section('content')
    <h1>Administration</h1>

    <div class="row">
    @foreach($dashboard['counters'] as $widget)
        <div class="widget"></div>
    @endforeach
    </div>
@endsection