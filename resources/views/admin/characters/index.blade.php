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
            <td>
                <button class="btn btn-xs btn-primary"><span class="fa fa-pencil"></span> Edit</button>
                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#characterDeleteModal"><span class="fa fa-trash-o"></span> Delete!</button>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>

    <?php
        $characterDeleteModal = [
            'div_name' => 'characterDeleteModal',
            'content' => '<p>Are you sure you wish to delete this character?</p>
            <p>Character: <span id="deleteName"></span>.</p>
            <p>Level: <span id="deleteLevel"></span>.</p>
            <p>Hardcore: <span id="deleteHardcore"></span>.</p>
            <p>Seasonal: <span id="deleteSeasonal"></span>.</p>
            ',
            'options' => [
                'hide_default_buttons' => true
            ]
        ];
    ?>
    @include('layouts.bootstrap._modal', $characterDeleteModal)
@endif

@endsection
