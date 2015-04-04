@extends('layouts/master')

@section('content')

<h1>Characters</h1>

@if(isset($characters))
    <table class="table">
    <thead>
        <tr>
            <th>Character</th>
            <th>Level</th>
            <th>Hardcore</th>
            <th>Seasonal</th>
            <th>Owner</th>
        </tr>
    </thead>
    <tbody>
    @foreach($characters as $char)
        <tr>
            <td>{{ $char->name }}</td>
            <td>{{ $char->level }}</td>
            <?php if ($char->hardcore == 1) {
                echo '<td sorttable_customkey="1"><span class="fa fa-h-square"></span></td>';
            } else {
                echo '<td sorttable_customkey="0"></td>';
            }
            ?>

            <?php if ($char->season == 1) {
                echo '<td sorttable_customkey="1"><span class="fa fa-leaf"></span></td>';
            } else {
                echo '<td sorttable_customkey="0"></td>';
            }
            ?>
            <td>{{ $char->member->name }}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
@endif

@endsection
