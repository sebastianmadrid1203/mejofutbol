@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="text-center">
    <h1 class="display-4">Bienvenido a FútbolApp</h1>
    <p class="lead">Sistema de gestión de equipos, jugadores, partidos y más.</p>

    <div class="row justify-content-center mt-5">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Presidentes</h5>
                    <p class="card-text">Gestión de presidentes de equipos.</p>
                    <a href="/presidents" class="btn btn-primary">Ver sección</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Equipos</h5>
                    <p class="card-text">Consulta y gestiona los equipos registrados.</p>
                    <a href="/teams" class="btn btn-primary">Ver sección</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Jugadores</h5>
                    <p class="card-text">Administración de jugadores por equipo.</p>
                    <a href="/players" class="btn btn-primary">Ver sección</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
