<?php
function actions($id)
{
    echo '<button class="btn btn-xs btn-primary"><span class="fa fa-pencil"></span> Edit</button> <button class="btn btn-xs btn-danger"><span class="fa fa-trash-o"></span> Delete!</button>';
}
?>

@extends('layouts/master')

@section('content')
    <h1>Administration</h1>

    <h2>Members<span class="pull-right"><button id="{{ $button }}" class="btn btn-primary"><span class="fa fa-plus"></span> Add Member</button></span></h2>
    @include('layouts/_modalForm')
    @if(isset($members) && count($members) > 0)
        <table class="table">
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->battletag }}</td>
                    <td>{{ actions($member->id) }}</td>
                </tr>
            @endforeach
        </table>
    @else
        You do not have any users at present, please use the create button to add some.
    @endif
@endsection