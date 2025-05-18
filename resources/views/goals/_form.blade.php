<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $goal->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Descripción</label>
    <textarea name="description" id="description" class="form-control">{{ old('description', $goal->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="player_id" class="form-label">Jugador</label>
    <select name="player_id" id="player_id" class="form-select" required>
        <option value="">Seleccione un jugador</option>
        @foreach($players as $player)
            <option value="{{ $player->id }}" {{ (old('player_id', $goal->player_id ?? '') == $player->id) ? 'selected' : '' }}>
                {{ $player->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="game_id" class="form-label">Juego</label>
    <select name="game_id" id="game_id" class="form-select" required>
        <option value="">Seleccione un juego</option>
        @foreach($games as $game)
            <option value="{{ $game->id }}" {{ (old('game_id', $goal->game_id ?? '') == $game->id) ? 'selected' : '' }}>
                {{ $game->date->format('Y-m-d') }}
            </option>
        @endforeach
    </select>
</div>
