@extends('layouts.app')

@section('title', 'Editar Jugador')

@section('content')
    <h2>Editar jugador</h2>

    <form action="{{ route('players.update', $player->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('players._form', ['player' => $player])
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('players.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
