@extends('layouts.app')

@section('title', 'Nuevo Presidente')

@section('content')
    <h2>Registrar nuevo presidente</h2>

    <form action="{{ route('presidents.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Año</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('presidents.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
