
@extends('layouts.app')

@section('title', 'Lista de Presidentes')

@section('content')
<div class="card mb-4 border-0 shadow-lg bg-gradient-header animate__animated animate__fadeInDown">
    <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="d-flex align-items-center mb-3 mb-md-0">
            <i class="bi bi-person-badge display-4 text-white me-3"></i>
            <div>
                <h2 class="mb-0 text-white fw-bold">Presidentes registrados</h2>
                <small class="text-light">Gestión y administración de presidentes de equipos</small>
            </div>
        </div>
        <a href="{{ route('presidents.create') }}" class="btn btn-lg btn-custom shadow animate__animated animate__pulse animate__infinite">
            <i class="bi bi-plus-circle me-1"></i> Nuevo Presidente
        </a>
    </div>
</div>

@if($presidents->isEmpty())
    <div class="alert alert-info text-center animate__animated animate__fadeInDown">
        <i class="bi bi-info-circle me-2"></i>
        No hay presidentes registrados aún.
    </div>
@else
    <div class="table-responsive rounded shadow animate__animated animate__fadeInUp">
        <table class="table table-hover align-middle mb-0 tabla-presidentes">
            <thead class="table-success">
                <tr>
                    <th scope="col"><i class="bi bi-hash"></i> ID</th>
                    <th scope="col"><i class="bi bi-person-fill"></i> Nombre</th>
                    <th scope="col"><i class="bi bi-calendar-event"></i> Año</th>
                    <th scope="col"><i class="bi bi-gear"></i> Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($presidents as $president)
                    <tr>
                        <td><span class="badge bg-secondary">{{ $president->id }}</span></td>
                        <td class="fw-semibold">{{ $president->name }}</td>
                        <td><span class="badge bg-light text-dark">{{ $president->year }}</span></td>
                        <td>
                           <a href="{{ route('presidents.edit', $president->id) }}" 
       class="btn btn-edit me-2" title="Editar">
        <i class="bi bi-pencil-square"></i>
    </a>
    <form action="{{ route('presidents.destroy', $president->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-delete" title="Eliminar" onclick="return confirm('¿Eliminar este presidente?')">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection