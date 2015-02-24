<?php
function actions($id)
{
    echo '<button class="btn btn-info">Edit</button> <button class="btn btn-danger">Delete!</button>';
}
?>

@extends('layouts/master')

@section('content')
    <h1>Administration</h1>

    <h2>Members<span class="pull-right"><button id="{{ $button }}" class="btn btn-primary">Add Member</button></span></h2>
    @include('layouts/_modalForm')
    @if(isset($members) && !empty($members))
        <table class="table">
        @foreach($members as $member)
            <tr><td>{{ $member->name }}</td><td>{{ $member->battletag }}</td><td>{{ actions($member->id) }}</td></tr>
        @endforeach
        </table>
    @else
        You do not have any users at present, please use the create button to add some.
    @endif

@endsection