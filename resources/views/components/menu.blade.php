<nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('img/logo.png')}}" alt="logo" width="200" height="24">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('register')}}">{{__('Register')}}</a>
                        </li>
                    @endif

                @else
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/products/show">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/bodegas/show">Bodegas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/proveedores/show">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/marcas/show">Marcas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/categorias/show">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/entradas/show">Entradas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/salidas/show">Salidas</a>
                </li>                
                @if (Auth::user()->role == "admin" or Auth::user()->role == "analyst" )
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Generar reporte
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/reports/productos-bodegas">Existencias de productos por bodega</a></li>
                        <li><a class="dropdown-item" href="/reports/entradas-bodegas">Historial de entradas por bodega</a></li>
                        <li><a class="dropdown-item" href="/reports/salidas-bodegas">Historial de salidas por bodega</a></li>
                        <li><a class="dropdown-item" href="/reports/productos-categorias">Listado de productos por categoría</a></li>
                        <li><a class="dropdown-item" href="/reports/productos-marcas">Listado de productos por marcas</a></li>
                        </ul>
                    </li>
                @endif
                
                 <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} ({{Auth::user()->role}})
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