<form action="{{ isset($player) ? route('players.update', $player->id) : route('players.store') }}" method="POST">
    @csrf
    @if(isset($player))
        @method('PUT')
    @endif

    <!-- Nombre -->
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" id="name" class="form-control" 
               value="{{ old('name', $player->name ?? '') }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Posición -->
    <div class="mb-3">
        <label for="position" class="form-label">Posición</label>
        <input type="text" name="position" id="position" class="form-control" 
               value="{{ old('position', $player->position ?? '') }}" required>
        @error('position')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Equipo -->
    <div class="mb-3">
        <label for="team_id" class="form-label">Equipo</label>
        <select name="team_id" id="team_id" class="form-select" required>
            <option value="">Seleccione un equipo</option>
            @foreach($teams as $team)
                <option value="{{ $team->id }}" 
                    {{ (old('team_id', $player->team_id ?? '') == $team->id) ? 'selected' : '' }}>
                    {{ $team->name }}
                </option>
            @endforeach
        </select>
        @error('team_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Botón -->
    <button type="submit" class="btn btn-primary">
        {{ isset($player) ? 'Actualizar Jugador' : 'Crear Jugador' }}
    </button>
</form>
