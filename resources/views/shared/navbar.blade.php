<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('storage/assets/salutic-logo-web.svg') }}" height="30" alt="Company logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav my-2 my-lg-0">
                @if (Auth::guest())
                    <li class="nav-item mx-3">
                        <a class="nav-link text-white navbar-item" href="{{ route('login') }}">
                            Iniciar sesión
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link text-white navbar-item" href="{{ route('register') }}">
                            Registrarme
                        </a>
                    </li>
                @else
                    <li class="nav-item mx-3">
                        <a class="nav-link text-white navbar-item {{ (request()->is('view1')) ? 'active' : '' }}"
                           href="{{ route('view1') }}">Vista 1</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link text-white navbar-item {{ (request()->is('view2')) ? 'active' : '' }}"
                           href="{{ route('view2') }}">Vista 2</a>
                    </li>

                    <li class="nav-item mx-3 dropdown d-flex align-items-center">
                        <a href="#" class="dropdown-toggle  decoration-none font-weight-bold text-white"
                           data-toggle="dropdown" role="button" aria-expanded="false">
                            Hola, {{ Auth::user()->NOMBRE }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                    <i class="fas fa-sign-out-alt ml-2"></i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      class="d-none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
            @endif
        </div>

    </div>
</nav>
