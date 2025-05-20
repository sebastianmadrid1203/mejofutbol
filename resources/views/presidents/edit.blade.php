
@extends('layouts.app')

@section('title', 'Editar Presidente')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-lg border-0 animate__animated animate__fadeInDown">
            <div class="card-header bg-gradient-header text-white d-flex align-items-center">
                <i class="bi bi-pencil-square display-6 me-2"></i>
                <span class="fs-5 fw-bold">Editar presidente</span>
            </div>
            <div class="card-body">
                <form action="{{ route('presidents.update', $president->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $president->name) }}" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">Año</label>
                        <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $president->year) }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-custom">
                            <i class="bi bi-check-circle me-1"></i> Actualizar
                        </button>
                        <a href="{{ route('presidents.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection