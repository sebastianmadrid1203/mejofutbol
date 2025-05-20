
@extends('layouts.app')

@section('title', 'Juegos')

@section('content')
<div class="container mt-4">
    <div class="card mb-4 border-0 shadow-lg bg-gradient-header animate__animated animate__fadeInDown">
        <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <i class="bi bi-controller display-4 text-white me-3"></i>
                <div>
                    <h2>Listado de Juegos</h2>
                    <small class="text-light">Gestión y resultados de partidos</small>
                </div>
            </div>
            <a href="{{ route('games.create') }}" class="btn btn-lg btn-custom shadow animate__animated animate__pulse animate__infinite">
                <i class="bi bi-plus-circle me-1"></i> Nuevo Juego
            </a>
        </div>
    </div>

    @if ($games->isEmpty())
        <div class="alert alert-info text-center animate__animated animate__fadeInDown">
            <i class="bi bi-info-circle me-2"></i>
            No hay juegos registrados aún.
        </div>
    @else
        <div class="table-responsive animate__animated animate__fadeInUp rounded shadow">
            <table class="table table-hover align-middle mb-0 tabla-juegos">
                <thead class="table-dark">
                    <tr>
                        <th><i class="bi bi-hash"></i> ID</th>
                        <th><i class="bi bi-calendar-event"></i> Fecha</th>
                        <th><i class="bi bi-trophy"></i> Goles Local</th>
                        <th><i class="bi bi-trophy"></i> Goles Visitante</th>
                        <th><i class="bi bi-people"></i> Equipos Participantes</th>
                        <th class="text-end"><i class="bi bi-gear"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                        @php
                            $teamIds = $game->teams->pluck('id')->toArray();
                            $localTeamId = $teamIds[0] ?? null;
                            $awayTeamId = $teamIds[1] ?? null;
                        @endphp
                        <tr>
                            <td><span class="badge bg-secondary">{{ $game->id }}</span></td>
                            <td><span class="badge bg-info text-dark">{{ \Carbon\Carbon::parse($game->date)->format('d/m/Y') }}</span></td>
                            <td><span class="badge bg-success">{{ $game->local_goals }}</span></td>
                            <td><span class="badge bg-danger">{{ $game->away_goals }}</span></td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $game->teams->get(0)->name ?? 'N/A' }}
                                </span>
                                <span class="fw-bold text-dark mx-1">vs</span>
                                <span class="badge bg-warning text-dark">
                                    {{ $game->teams->get(1)->name ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-edit me-2" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Estás seguro de eliminar este juego?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete" title="Eliminar">
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
</div>
@endsection