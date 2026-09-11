@extends('base')

@section('title', '✏️ Show Game')

@section('content')
<table class="table">
    <tr>
        <th>Game Name:</th>
        <td>{{ $game->game_name }}</td>
    </tr>
    <tr>
        <th>Platform:</th>
        <td>{{ $game->platform }}</td>
    </tr>
    <tr>
        <th>Genre:</th>
        <td>{{ $game->genre }}</td>
    </tr>
    <tr>
        <th>Rating:</th>
        <td>{{ $game->rating }}</td>
    </tr>
</table>

<br>

<a href="/games">
    <button type="button" class="btn btn-primary">Back to Games</button>
</a>
@endsection