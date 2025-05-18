@extends('layouts.app')

@section('title', 'Lista de Presidentes')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Presidentes registrados</h2>
        <a href="{{ route('presidents.create') }}" class="btn btn-primary">Nuevo Presidente</a>
    </div>

    @if($presidents->isEmpty())
        <div class="alert alert-info">No hay presidentes registrados aún.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($presidents as $president)
                    <tr>
                        <td>{{ $president->id }}</td>
                        <td>{{ $president->name }}</td>
                        <td>{{ $president->year }}</td>
                        <td>
                            <a href="{{ route('presidents.edit', $president->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('presidents.destroy', $president->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este presidente?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
