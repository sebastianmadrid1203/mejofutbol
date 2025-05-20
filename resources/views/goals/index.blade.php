
@extends('layouts.app')

@section('title', 'Listado de Goles')

@section('content')
<div class="container my-5">
    <div class="card mb-4 border-0 shadow-lg bg-gradient-header animate__animated animate__fadeInDown">
        <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <i class="bi bi-bullseye display-4 text-white me-3"></i>
                <div>
                    <h2 class="mb-0 text-white fw-bold">Listado de Goles</h2>
                    <small class="text-light">Registro y gestión de goles en partidos</small>
                </div>
            </div>
            <a href="{{ route('goals.create') }}" class="btn btn-lg btn-custom shadow animate__animated animate__pulse animate__infinite">
                <i class="bi bi-plus-circle me-1"></i> Nuevo Gol
            </a>
        </div>
    </div>

    <div class="bg-white p-4 rounded shadow-sm">
        @if ($goals->isEmpty())
            <div class="alert alert-info rounded-pill text-center fs-5 animate__animated animate__fadeInDown">
                <i class="bi bi-info-circle me-2"></i> No hay goles registrados aún.
            </div>
        @else
            <div class="table-responsive animate__animated animate__fadeInUp">
                <table class="table table-hover align-middle tabla-goles mb-0">
                    <thead class="table-success text-secondary text-uppercase small">
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Jugador</th>
                            <th scope="col" class="text-center">Juego</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($goals as $goal)
                            <tr class="shadow-sm bg-white rounded">
                                <td class="text-center text-muted fw-bold">
                                    <span class="badge bg-secondary">{{ $goal->id }}</span>
                                </td>
                                <td class="fw-semibold text-success">{{ $goal->name }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">{{ Str::limit($goal->description, 60) }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-primary">{{ $goal->player->name ?? 'N/A' }}</span>
                                </td>
                                <td class="text-center text-secondary">
                                    <span class="badge bg-warning text-dark">
                                        {{ $goal->game->date ? \Carbon\Carbon::parse($goal->game->date)->format('d/m/Y') : 'N/A' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('goals.edit', $goal->id) }}" class="btn btn-edit me-2" title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este gol?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-delete" title="Eliminar">
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
    </div>
</div>
@endsection