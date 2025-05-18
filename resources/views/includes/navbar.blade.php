<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">FútbolApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Página principal -->
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Inicio</a>
                </li>

                <!-- Dropdown de entidades -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestión
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('presidents.index') }}">Presidentes</a></li>
                        <li><a class="dropdown-item" href="{{ route('teams.index') }}">Equipos</a></li>
                        <li><a class="dropdown-item" href="{{ route('players.index') }}">Jugadores</a></li>
                        <li><a class="dropdown-item" href="{{ route('games.index') }}">Juegos</a></li>
                        <li><a class="dropdown-item" href="{{ route('goals.index') }}">Goles</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Barra de búsqueda (opcional) -->
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>
