@extends('layouts.app')

@section('title', 'Lista de Goles')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Goles registrados</h2>
        <a href="{{ route('goals.create') }}" class="btn btn-primary">Nuevo Gol</a>
    </div>

    @if($goals->isEmpty())
        <div class="alert alert-info">No hay goles registrados aún.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Jugador</th>
                    <th>Juego</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($goals as $goal)
                    <tr>
                        <td>{{ $goal->id }}</td>
                        <td>{{ $goal->name }}</td>
                        <td>{{ $goal->description }}</td>
                        <td>{{ $goal->player->name ?? 'N/A' }}</td>
                        <td>{{ $goal->game->date->format('Y-m-d') ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('goals.edit', $goal->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este gol?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
