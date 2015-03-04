@extends('layouts/master')

@section('content')
    @if(isset($characters))
        <table class="table table-responsive">
        <thead>
            <tr><th>Character</th><th>Level</th><th>Class</th></tr>
        </thead>
        @foreach($characters as $c)
            <tr><td>{{ $c->name }}</td><td>{{ $c->level }}</td><td>{{ $c->class }}</td><td>{{ $c }}</td></tr>
        @endforeach
        </table>
    @endif
@endsection
