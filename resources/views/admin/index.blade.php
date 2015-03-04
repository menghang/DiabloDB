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
        <div class="widget col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="widget-inner">
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <?php
                        switch ($widget['title']) {
                            case 'Users':
                                $widget_icon = 'fa-user-secret';
                                break;
                            case 'Members':
                                $widget_icon = 'fa-user';
                                break;
                            default:
                                $widget_icon = 'fa-users';
                                break;
                        }
                        ?>
                        <span class="fa {{ $widget_icon }} fa-3x"></span>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <span class="widget-title">{{ $widget['title'] }}</span>
                        <span class="widget-value">{{ $widget['value'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection