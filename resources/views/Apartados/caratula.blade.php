@extends('layouts.app')

@section('contenido')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('tu-imagen-de-fondo.jpg');
            background-size: cover;
            background-position: center;
            color: #333;
        }

        .cover {
            background-color: rgba(255, 255, 255, 0.7);
            text-align: center;
            padding: 50px;
        }

        .cover h1 {
            font-size: 48px;
            color: #007BFF;
        }

        .cover p {
            font-size: 20px;
            margin: 10px 0;
        }

        .logo {
            max-width: 150px;
            margin: 20px auto;
        }
    </style>
      <div class="cover">
        <img src="imagenes/logoUniversidad.jpg" alt="Tu Logo" class="logo">
        <h1>Proyecto Automatas Y lenguajes Formales</h1>
        <p>Grupo:</p>
        <p>Wilian Alberto Marroquin Morales </p>
        <p>Domingo De Jesus Sente Sun</p>
        <p>Jerson Alberto Donis Marroquin </p>
        <p>Huver Donis Cordova</p>
        <p>Emerson</p>
    </div>
@endsection