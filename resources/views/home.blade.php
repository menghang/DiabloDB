@extends('layouts/master')

@section('content')
    @if(isset($characters))
        <table class="table table-responsive sortable">
        <thead>
            <tr>
                <th>Character</th>
                <th>Class</th>
                <th>Level</th>
                <th><abbr title="Hardcore!">HC</abbr></th>
                <th>Seasonal</th>
                <th class="hidden-xs">Damage</th>
                <th class="hidden-xs">Owner</th>
            </tr>
        </thead>
        @foreach($characters as $c)
            <tr class="{{ $ClassHelper->getClassName($c->class, false) }}">
                <td>{{ $c->name }}</td>
                <td>{{ $ClassHelper->getClassName($c->class) }}</td>
                <td>{{ $c->level }}</td>

                <?php if ($c->hardcore == 1) {
                    echo '<td sorttable_customkey="1"><span class="fa fa-h-square"></span></td>';
                } else {
                    echo '<td sorttable_customkey="0"></td>';
                }
                ?>

                <?php if ($c->season == 1) {
                    echo '<td sorttable_customkey="1"><span class="fa fa-leaf"></span></td>';
                } else {
                    echo '<td sorttable_customkey="0"></td>';
                }
                ?>
                <td class="hidden-xs">{{ number_format($c->stats->damage) }}</td>
                <td class="hidden-xs">{{ $c->member->name }}</td>
            </tr>
        @endforeach
        </table>
    @endif
@endsection
