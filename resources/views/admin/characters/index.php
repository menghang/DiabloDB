@extends('layouts/master')

@section('content')

<h1>Characters</h1>

@if(isset($characters))
    <table class="table">
    <thead>
        <tr>
            <th>Character</th>
            <th>Level</th>
        </tr>
    </thead>
    <tbody>
    @foreach($characters as $char)
        <tr>
            <td>{{ $char->name }}</td>
            <td>{{ $char->level }}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
@endif

@endsection
