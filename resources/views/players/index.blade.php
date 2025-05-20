
@extends('layouts.app')

@section('title', 'Lista de Jugadores')

@section('content')
    <div class="card mb-4 border-0 shadow-lg bg-gradient-header animate__animated animate__fadeInDown">
        <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <i class="bi bi-person-lines-fill display-4 text-white me-3"></i>
                <div>
                    <h2>Jugadores registrados</h2>
                    <small class="text-light">Gestión y administración de jugadores</small>
                </div>
            </div>
            <a href="{{ route('players.create') }}" class="btn btn-lg btn-custom shadow animate__animated animate__pulse animate__infinite">
                <i class="bi bi-plus-circle me-1"></i> Nuevo Jugador
            </a>
        </div>
    </div>

    @if($players->isEmpty())
        <div class="alert alert-info text-center animate__animated animate__fadeInDown">
            <i class="bi bi-info-circle me-2"></i>
            No hay jugadores registrados aún.
        </div>
    @else
        <div class="table-responsive animate__animated animate__fadeInUp rounded shadow">
            <table class="table table-hover align-middle mb-0 tabla-jugadores">
                <thead class="table-success">
                    <tr>
                        <th><i class="bi bi-hash"></i> ID</th>
                        <th><i class="bi bi-person-fill"></i> Nombre</th>
                        <th><i class="bi bi-joystick"></i> Posición</th>
                        <th><i class="bi bi-people-fill"></i> Equipo</th>
                        <th><i class="bi bi-gear"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($players as $player)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $player->id }}</span></td>
                            <td class="fw-semibold">{{ $player->name }}</td>
                            <td><span class="badge bg-info text-dark">{{ $player->position }}</span></td>
                            <td>
                                <span class="badge bg-success">
                                    {{ $player->team->name ?? 'Sin equipo' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('players.edit', $player->id) }}" class="btn btn-edit me-2" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('players.destroy', $player->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete" title="Eliminar" onclick="return confirm('¿Eliminar este jugador?')">
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