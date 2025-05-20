
@extends('layouts.app')

@section('title', 'Lista de Equipos')

@section('content')
<div class="card mb-4 border-0 shadow-lg bg-gradient-header animate__animated animate__fadeInDown">
    <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="d-flex align-items-center mb-3 mb-md-0">
            <i class="bi bi-people-fill display-4 text-white me-3"></i>
            <div>
                <h2>Equipos registrados</h2>
                <small class="text-light">Gestión y administración de equipos</small>
            </div>
        </div>
        <a href="{{ route('teams.create') }}" class="btn btn-lg btn-custom shadow animate__animated animate__pulse animate__infinite">
            <i class="bi bi-plus-circle me-1"></i> Nuevo Equipo
        </a>
    </div>
</div>

@if($teams->isEmpty())
    <div class="alert alert-info animate__animated animate__fadeInDown">
        <i class="bi bi-info-circle me-2"></i>
        No hay equipos registrados aún.
    </div>
@else
    <div class="table-responsive animate__animated animate__fadeInUp rounded shadow">
        <table class="table table-hover align-middle mb-0 tabla-equipos">
            <thead class="table-primary">
                <tr>
                    <th><i class="bi bi-hash"></i> ID</th>
                    <th><i class="bi bi-shield-fill"></i> Nombre</th>
                    <th><i class="bi bi-geo-alt-fill"></i> Ciudad</th>
                    <th><i class="bi bi-building"></i> Estadio</th>
                    <th><i class="bi bi-people"></i> Capacidad</th>
                    <th><i class="bi bi-calendar-event"></i> Año</th>
                    <th><i class="bi bi-person-badge"></i> Presidente</th>
                    <th><i class="bi bi-gear"></i> Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td><span class="badge bg-secondary">{{ $team->id }}</span></td>
                        <td class="fw-semibold">{{ $team->name }}</td>
                        <td><span class="badge bg-info text-dark">{{ $team->city }}</span></td>
                        <td>{{ $team->stadium }}</td>
                        <td><span class="badge bg-success">{{ $team->capacity }}</span></td>
                        <td><span class="badge bg-light text-dark">{{ $team->year_of_foundation }}</span></td>
                        <td>
                            <span class="badge bg-warning text-dark">
                                {{ $team->president->name ?? 'Sin presidente' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-edit me-2" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete" title="Eliminar" onclick="return confirm('¿Eliminar este equipo?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection