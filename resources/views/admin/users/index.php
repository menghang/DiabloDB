@extends('layouts/master')

@section('content')

<h1>Users</h1>

@if(isset($users))
    <table class="table">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
@endif

@endsection
