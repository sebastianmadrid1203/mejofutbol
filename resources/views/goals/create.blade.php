@extends('layouts.app')

@section('title', 'Nuevo Gol')

@section('content')
    <h2>Registrar nuevo gol</h2>

    <form action="{{ route('goals.store') }}" method="POST">
        @csrf

        @include('goals._form', ['goal' => null])

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('goals.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
