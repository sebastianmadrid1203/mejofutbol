@extends('layouts.app')

@section('title', 'Editar Presidente')

@section('content')
    <h2>Editar presidente</h2>

    <form action="{{ route('presidents.update', $president->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $president->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Año</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $president->year) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('presidents.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
