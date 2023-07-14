<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            Portal Marispan
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto"></ul>
            
            <!-- Left Side Of Navbar for testing-->
            <ul class="flex-fill navbar-nav me-auto">
                <li class="dropdown"><a href="#"><span>Comercial</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="http://interno.marispan.com/dashboard/pedidos/?Marispan=true">Painel de Pedidos</a>
                        </li>
                        <li><a href="http://interno.marispan.com/dashboard/pedidos/splash.php?Marispan=Pecas">Painel de
                                Peças</a></li>
                        <li><a href="http://interno.marispan.com/dashboard/ocorrencias/">Painel de Ocorrências</a></li>
                        <li><a href="http://interno.marispan.com/dashboard/cargas/">Planejamento de Cargas</a></li>
                        <li><a href="http://interno.marispan.com/dashboard/cargas/dashboard.php">Dashboard</a></li>
                        <li><a href="http://interno.marispan.com/dashboard/separacao/">Separação</a></li>
                        <li><a href="http://interno.marispan.com/dashboard/transportadora/">Transportadora</a></li>
                        <li><a href="http://interno.marispan.com/consulta-saldo/">Consulta Saldo 07</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
