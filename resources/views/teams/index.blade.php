@extends('layouts.app')

@section('title', 'Lista de Equipos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Equipos registrados</h2>
        <a href="{{ route('teams.create') }}" class="btn btn-primary">Nuevo Equipo</a>
    </div>

    @if($teams->isEmpty())
        <div class="alert alert-info">No hay equipos registrados aún.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>Estadio</th>
                    <th>Capacidad</th>
                    <th>Año</th>
                    <th>Presidente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td>{{ $team->id }}</td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->city }}</td>
                        <td>{{ $team->stadium }}</td>
                        <td>{{ $team->capacity }}</td>
                        <td>{{ $team->year_of_foundation }}</td>
                        <td>{{ $team->president->name ?? 'Sin presidente' }}</td>
                        <td>
                            <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este equipo?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
