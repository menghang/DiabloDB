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
                <button class="btn btn-xs btn-danger"
                        data-character-name="{{ $char->name }}"
                        data-character-hardcore="<?php if ($char->hardcore === 1) { echo 'Yes'; } else { echo 'No'; } ?>"
                        data-character-seasonal="{{ $char->season }}"
                        data-character-level="{{ $char->level }}"
                        data-character-id="{{ $char->id }}"
                        data-toggle="modal" data-target="#characterDeleteModal"><span class="fa fa-trash-o"></span> Delete!</button>
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
            ],
            'footer_content' => '
            <button id="deleteCharacter" class="btn btn-danger"><span class="fa fa-trash-o"></span> Delete!</button>
            '
        ];
    ?>
    @include('layouts.bootstrap._modal', $characterDeleteModal)

    <script>
        $('#characterDeleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            // Extract info from data-* attributes
            var charname = button.data('characterName')
            var charlevel = button.data('characterLevel')
            var charseasonal = button.data('characterSeasonal')
            var charhc = button.data('characterHardcore')
            var charid = button.data('characterId')
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#deleteName').text(charname)
            modal.find('#deleteLevel').text(charlevel)
            modal.find('#deleteSeasonal').text(charseasonal)
            modal.find('#deleteHardcore').text(charhc)
            modal.find('#deleteCharacter').on('click', function() {

                /* Delete the Character */
                $.post("/characters/" + charid, {"_method": "DELETE", "_token": "{{ csrf_token() }}"}, function(data) {
                    window.location.reload();
                });
            });
        });
    </script>
@endif

@endsection
