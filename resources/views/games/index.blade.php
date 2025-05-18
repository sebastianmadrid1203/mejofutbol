@extends('layouts.app')

@section('title', 'Juegos')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Listado de Juegos</h2>
        <a href="{{ route('games.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nuevo Juego
        </a>
    </div>

    @if ($games->isEmpty())
        <div class="alert alert-info">No hay juegos registrados aún.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Goles Local</th>
                        <th>Goles Visitante</th>
                        <th>Equipos Participantes</th>
                        <th class="text-end">Acciones</th>
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
                            <td>{{ $game->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($game->date)->format('d/m/Y') }}</td>
                            <td>{{ $game->local_goals }}</td>
                            <td>{{ $game->away_goals }}</td>
                            <td>
                                <form action="{{ route('games.update_teams', $game->id) }}" method="POST" class="d-flex gap-2 align-items-center">
                                    @csrf
                                    @method('PUT')

                                    {{-- Select Equipo Local --}}
                                    <select name="team_local" class="form-select form-select-sm @error('team_local') is-invalid @enderror" required>
                                        <option value="">-- Equipo Local --</option>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}" {{ $team->id == old('team_local', $localTeamId) ? 'selected' : '' }}>
                                                {{ $team->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    {{-- Select Equipo Visitante --}}
                                    <select name="team_away" class="form-select form-select-sm @error('team_away') is-invalid @enderror" required>
                                        <option value="">-- Equipo Visitante --</option>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}" {{ $team->id == old('team_away', $awayTeamId) ? 'selected' : '' }}>
                                                {{ $team->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <button type="submit" class="btn btn-sm btn-success" title="Guardar Equipos">
                                        <i class="bi bi-save"></i>
                                    </button>
                                </form>

                                @error('team_local')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                @error('team_away')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="text-end">
                                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-sm btn-warning me-1" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Estás seguro de eliminar este juego?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" title="Eliminar">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Paginación si la usas --}}
        {{-- {{ $games->links() }} --}}
    @endif
</div>
@endsection
