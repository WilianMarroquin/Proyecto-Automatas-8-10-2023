<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @Vite(['resources/sass/app.scss','resources/js/app.js'])

    <title>Automatas-@yield('titulo')</title>
</head>
    <!-- Nav tabs -->
    <ul style="background: gray; color: black" class="nav nav-tabs " id="navId" style="margin-bottom: 30px; padding: 20px">
        <li class="nav-item">
            <a href="{{route('importar')}}" class="nav-link @yield('importar-active')">Empezar!</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#tab2Id">Action</a>
                <a class="dropdown-item" href="#tab3Id">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#tab4Id">Action</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{route('ejemplos')}}" class="nav-link @yield('ejemplos-active')">Ejemplos</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link disabled @yield('')">Disabled</a>
        </li>
    </ul>

@yield('contenido')
@yield('scripts')
</body>
</html>