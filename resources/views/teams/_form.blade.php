@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Team Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $team->name }}</h5>
            <!-- Mostrar más campos aquí si tienes -->
        </div>
    </div>

    <a href="{{ route('teams.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
