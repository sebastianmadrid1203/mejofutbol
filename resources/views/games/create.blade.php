@extends('layouts.app')

@section('title', 'Nuevo Juego')

@section('content')
<div class="container mt-4">
    <h2>Registrar Nuevo Juego</h2>

    <form action="{{ route('games.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror"
                   value="{{ old('date') }}" required>
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="local_goals" class="form-label">Goles Local</label>
                <input type="number" id="local_goals" name="local_goals" class="form-control @error('local_goals') is-invalid @enderror"
                       value="{{ old('local_goals', 0) }}" min="0" required>
                @error('local_goals')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="away_goals" class="form-label">Goles Visitante</label>
                <input type="number" id="away_goals" name="away_goals" class="form-control @error('away_goals') is-invalid @enderror"
                       value="{{ old('away_goals', 0) }}" min="0" required>
                @error('away_goals')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="teams" class="form-label">Equipos Participantes (mínimo 2)</label>
            <select name="teams[]" id="teams" class="form-select @error('teams') is-invalid @enderror" multiple required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ in_array($team->id, old('teams', [])) ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
            @error('teams')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Usa Ctrl (Cmd en Mac) para seleccionar varios equipos.</small>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Guardar
        </button>
        <a href="{{ route('games.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
