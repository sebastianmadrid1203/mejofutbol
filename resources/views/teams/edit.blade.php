@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
    <h2>Editar equipo</h2>

    <form action="{{ route('teams.update', $team->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('teams._form', ['team' => $team])
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('teams.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
