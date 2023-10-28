<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script
          type="text/javascript"
          src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"
        ></script>
        <style type="text/css">
          #mynetwork {
            width: 600px;
            height: 400px;
            border: 1px solid lightgray;
          }
        </style>
    @Vite(['resources/sass/app.scss','resources/js/app.js'])
<script src="sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    <title>Automatas-@yield('titulo')</title>
    @stack('head')
</head>
<body>
    <!-- Nav tabs -->
    <ul style="background: rgb(70, 220, 0); color: black" class="nav nav-tabs " id="navId" style="margin-bottom: 30px; padding: 20px">
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
            <a href="{{route('tabla')}}" class="nav-link  @yield('')">Tabla</a>
        </li>
        <li class="nav-item">
            <a href="{{route('Automata')}}" class="nav-link  @yield('automatas-active')">Automata</a>
        </li>
    </ul>

@yield('contenido')

@stack('scripts')

</body>    
</html>