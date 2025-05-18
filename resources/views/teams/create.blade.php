@extends('layouts.app')

@section('title', 'Nuevo Equipo')

@section('content')
    <h2>Registrar nuevo equipo</h2>

    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        @include('teams._form', ['team' => null])
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('teams.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
