@extends('layouts.app')

@section('title', 'Lista de Jugadores')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Jugadores registrados</h2>
        <a href="{{ route('players.create') }}" class="btn btn-primary">Nuevo Jugador</a>
    </div>

    @if($players->isEmpty())
        <div class="alert alert-info">No hay jugadores registrados aún.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Posición</th>
                    <th>Equipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                    <tr>
                        <td>{{ $player->id }}</td>
                        <td>{{ $player->name }}</td>
                        <td>{{ $player->position }}</td>
                        <td>{{ $player->team->name ?? 'Sin equipo' }}</td>
                        <td>
                            <a href="{{ route('players.edit', $player->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('players.destroy', $player->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este jugador?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
