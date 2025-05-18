@extends('layouts.app')

@section('title', 'Editar Gol')

@section('content')
    <h2>Editar gol</h2>

    <form action="{{ route('goals.update', $goal->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('goals._form', ['goal' => $goal])

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('goals.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
