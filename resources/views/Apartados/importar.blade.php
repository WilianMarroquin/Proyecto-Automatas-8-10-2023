@extends('layouts.app')
@section('titulo', 'Importar')
@section('importar-active', 'active')



@section('contenido')
    <ul style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 14%, rgba(100,220,245,1) 82%); color: black"
        class="nav nav-tabs " id="navId" style="margin-bottom: 30px; padding: 20px">
        <li class="nav-item">
            <a href="{{ route('importar') }}" class="nav-link @yield('importar-active')">Empezar!</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="true">Dropdown</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#tab2Id">Action</a>
                <a class="dropdown-item" href="#tab3Id">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#tab4Id">Action</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{ route('ejemplos') }}" class="nav-link @yield('ejemplos-active')">Ejemplos</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('documentacion') }}" class="nav-link  @yield('documentacion-active')">Documentos</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('Automata') }}" class="nav-link  @yield('automatas-active')">Automata</a>
        </li>
    </ul>

    <header style="margin-top: -10px">
        <div class="imagen-portada">
            <img src="https://www.ellitoral.com/images/2023/05/11/Klmqnm6CD_1300x655__1.jpg" alt="">
            <div class="textos-imagen">
                <h1>La Mejor Forma de Analizar Automatas</h1>
                <h2>Podras Observar Graficas y tablas paso a paso.</h2>
            </div>
        </div>
        <div class="opciones-portada">
            <a href="#tutorial" class="Opciones-individual">
                <p>Tutorial</p>
            </a>

            <a class="Opciones-individual" href="{{route('caratula')}}">
                <p>Caratula</p>
            </a>

            <a href="{{route('ejemplos')}}" class="Opciones-individual">
                <p>Ejemplos</p>
            </a>
            <a href="{{route('Automata')}}" class="Opciones-individual">
                <p>Analizar Automata</p>
            </a>
            <a href="{{route('documentacion')}}" class="Opciones-individual">
                <p>Documentacion</p>
            </a>
            <a href="Info_Pagina/MisionYvision.html" class="Opciones-individual">
                <p>Proximamente</p>
            </a>

        </div>
    </header>


    <div class="cont-eco" id="tutorial">
        <div class="grupos-eco">
            <div class="individual-eco">
                <p> <span class="number">1</span> Ahora analizar automatas se volvio sensillo con nuestra aplicacion web, la
                    cual te
                    vamos a enseñar a usar. Primero que nada es bueno que conozcas un poco sobre la forma en que funciona y
                    su entrono, a
                    continuacion te dejo una imagen para que la vallas conociendo. </p>
                <img src="/imagenes/subirTxt.png" alt="">
            </div>
            <div class="individual-eco">
                <img src="imagenes/formatoEntrada.png" alt="">
                <p><span class="number">2</span>Es importante saber que nuestro proyecto funciona a base de archivos planos
                    (txt) los
                    cuales deben de cumplir con un formato muy estrico, ya que de no ser asi seria imposible realizar la
                    funcionalidad. Acontinuacion
                    te dejamos un ejemplo del formato del archivo txt que debe de ser subido. </p>
            </div>
            <div class="individual-eco">
                <p><span class="number">3</span>Luego de haber subido el archivo txt al espacio que se menciona en el paso
                    No.1 Se mostrara
                    automaticamente en pantalla una tabla, la cual contiene los datos Espesificados en el txt y a su vez se
                    muestran en pantalla
                    el estado de aceptacion y la cadena que sera analizada.</p>
                <img src="imagenes/Aparece la tabla.png" alt="">
            </div>
            <div class="individual-eco">
                <img src="imagenes/aparece el automata.png" alt="">
                <p><span class="number">4</span>Una vez se puede vizualizar la tabla ya estaria habilitado el boton que
                    muestra la grafica del automata
                    el mismo boton permitira cambiar de estado segun sea necesario para el analicis correspondiente. </p>
            </div>
            <div class="individual-eco">
                <p><span class="number">5</span>Cambiar entre estados sera tan divertido que querras usar nuestra aplicacion
                    para entretenerte incluso y mientras
                    aprendes </p>
                <img src="imagenes/cambia estados.png" alt="">
            </div>
            <div class="individual-eco">
                <img src="imagenes/cancelacion.png" alt="">
                <p><span class="number">6</span>Cuando la cadena sea analizada, recibiras un mensaje que te dira si
                    la cadena es admitida por el automata y de ser asi, tendras la opcion de seguir analizando tus otras
                    cadenas
                    seguramente una de ellas si sea admitida!</p>
            </div>
            <div class="individual-eco">
                <p><span class="number">7</span>Finalmente recibiras un mensaje cuando tu cadena sea admitida por el
                    automata
                    Pero no lo es todo. Hay muchas cosas interesantes en esta Aplicacion, espero las disfrutes! </p>
                <img src="imagenes/cadena adminitda.png" alt="">
            </div>
        </div>

        <div class="final-footer">
            <div class="letrass">
                <p>Mapa de sitio | Ayuda | Aviso Legal | Politica de privacidad | Terminos y Condiciones |
                    Contactenos</p>
                <p>@ Copyright 2023 - 2023, EcoRent.com -Networks. Derechos Reservados</p>
            </div>

        </div>



        <style>
            @media screen and (max-width:500px) {
                .cont-eco {
                    background: #0d9d24
                }
            }


            header {
                width: 100%;
                display: block;
            }

            .textos-nav {
                display: flex;
                width: 70%;
                position: absolute;
                top: 30px;
                left: 400px;
            }

            .textos-nav p {
                margin-left: 15px;
                font-size: 20px;
                color: rgb(143, 136, 136);
            }

            .btn-acceder {
                width: 150px;
                height: 30px;
                background: rgb(14, 230, 97);
                position: absolute;
                right: 15px;
                top: 26px;
                text-align: center;
                line-height: 30px;
                border-radius: 10px;
                color: white;
            }

            .nav-bajo {
                display: flex;
                justify-content: center;
                margin-top: 10px;
            }

            .nav-bajo p {
                margin-right: 15px;
                font-size: 15px;
                color: rgb(143, 136, 136);
            }

            .imagen-portada {
                margin-top: 10px;
                width: 100%;
            }

            .imagen-portada img {
                width: 100%;
                height: 430px;
                position: relative;
            }

            .opciones-portada {
                display: flex;
                box-shadow: 0px 13px 30px -8px rgba(0, 0, 0, 0.1);
                margin-top: 30px;
                width: 95%;
                margin: auto;
                margin-bottom: 10px;
                margin-top: -150px;
                background-color: white;
                position: relative;
            }

            .Opciones-individual {
                width: 15%;
                height: 80px;
                border-right: 1px solid rgb(197, 192, 192);
                font-size: 20px;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 20px;
                text-decoration: none;
                color: gray;
            }

            .Opciones-individual p {
                margin-top: 30px;
            }

            .textos-imagen {
                position: relative;
                top: -300px;
                text-align: center;
                color: white;
            }

            .textos-imagen h1 {
                font-size: 40px;
                font-weight: 900;
                flex-wrap: wrap;
            }

            .contenidos-main {
                width: 90%;
                margin: auto;
                display: flex;
                height: 400px;
                margin-top: 40px;
            }

            .texto-main {
                line-height: 30px;
                display: flex;
                font-size: 14px;
                margin-right: 80px;
                color: rgb(0, 0, 0);

            }

            .texto-main img {
                height: 100%;
                margin-left: 20px;
                margin-right: 20px;
            }

            .texto-main .titulo {
                text-align: center;
                width: 40%;
                margin-top: 13%;
                margin-left: 30px;
                color: rgb(83, 82, 82);
            }

            .eslogan {
                line-height: 24px;
                margin-top: 15px;
                color: rgb(166, 162, 162);
            }

            .textos-portada {
                line-height: 20px;
                font-size: 15px;
                margin-top: 10px;

            }

            .Opciones-individual:hover {
                text-decoration: underline;
                color: rgb(9, 167, 20);
            }

            .cont-opciones {
                width: 100%;
                margin: auto;
                margin-top: 20px;
                height: 620px;
                background-color: #e6f7ec;
                opacity: 1;
                background-image: radial-gradient(#0d9d24 0.6000000000000001px, transparent 0.6000000000000001px), radial-gradient(#0d9d24 0.6000000000000001px, #e6f7ec 0.6000000000000001px);
                background-size: 24px 24px;
                background-position: 0 0, 12px 12px;
            }

            .cont-grupos {
                display: flex;
                flex-wrap: wrap;
                width: 90%;
                margin: auto;
            }

            .cont-individual {
                width: 30%;
                margin-left: 3%;
                height: 250px;
                background: gray;
                position: relative;
                margin-top: 20px;
                box-shadow: 0 0 15px 0 rgb(14, 230, 97);
                cursor: pointer;
            }

            .cont-individual img {
                width: 100%;
                height: 100%;
            }

            .cont-individual h5 {
                font-size: 30px;
                font-weight: 600;
                position: relative;
                color: white;
                margin-top: 200px;
                text-align: center;
            }

            .titulo {
                color: rgb(0, 0, 0);
                text-align: center;

                margin-top: 30px;
                font-size: 35px;
            }

            .ocultor {
                width: 100%;
                height: 100%;
                position: absolute;
            }

            .contImg {
                width: 100%;
                height: 100%;
                position: absolute;
            }

            .individual-hover {
                position: absolute;
                top: 5px;
                left: 15px;
                transform: scale(0);
                transition: transform .4s;
            }

            .individual-hover p {
                margin-top: 10px;
                color: white
            }

            /* efecto del hober */
            .cont-individual:hover .ocultor {
                background-image: linear-gradient(120deg, #d5fc7941 0%, #96e6a14d 100%);

            }

            .cont-individual:hover .individual-hover {
                transform: scale(1);
            }

            .cont-individual:hover h5 {
                display: none;
            }

            a {
                margin-left: 15px;
                font-size: 20px;
                color: rgb(143, 136, 136);
                text-decoration: none;
            }

            .datos {
                display: flex;
            }

            .comentarios {
                width: 100%;
                margin-top: 60px;
                margin: auto;
                height: 500px;
                background: rgb(210, 247, 222);
                background: linear-gradient(0deg, rgba(210, 247, 222, 1) 0%, rgba(245, 245, 245, 1) 83%);

            }

            .datos {
                width: 70%;
                margin: auto;
                justify-content: center;
                flex-wrap: wrap;
            }

            .comentario {
                width: 630px;
                height: 200px;
                border: 0;
            }

            .datos-input {
                width: 190px;
                margin-left: 19px;
                font-size: 20px;
                border: 0;
            }

            .margin {
                margin-bottom: 10px;
            }

            .submit {
                color: white;
                background-color: #086818;
                width: 200px;
                height: 50px;
                text-align: center;
                margin-left: 41%;
                border: 0;
                border-radius: 10px;
                margin-top: 20px;
                font-size: 20px;
            }

            .textos-input {
                margin-top: 10px;
                color: gray;
                margin-left: 20px;
                margin-bottom: 10px;
            }

            .ubicacion {
                width: 90%;
                margin: auto;
                height: 600px;
                margin-top: -80px;

                background: #f9fffa;
                box-shadow: 0 0 6px rgba(0, 0, 0, 0.1)
            }

            .cont-ubicacion {
                width: 95%;
                margin: auto;
                height: 100%;
            }

            .grupos-ubicacion {
                display: flex;
            }

            .ubi {
                width: 34%;
                height: 100%;
                margin-top: 45px;

            }

            .mapa-ubicacion {
                height: 500px;
                background: rgb(210, 247, 222);
                background: linear-gradient(0deg, rgba(210, 247, 222, 1) 0%, rgba(245, 245, 245, 1) 83%);
            }

            .mapa-ubicacion p {
                color: rgb(5, 5, 5);
                margin: 10px 10px;
            }

            .img-ubicacion img {
                width: 100%;
                height: 500px;
            }

            .mapa-ubicacion iframe {
                width: 100%;
                height: 280px;
            }

            .titulo-ubicacion {
                text-align: center;
                height: 500px;

            }

            .titulo-ubicacion .letras {
                margin-top: 370px;
                font-weight: 900;
            }

            .letras img {
                width: 260px;
                position: absolute;
                margin-top: -250px;
                margin-left: -125px;
            }

            footer {
                width: 100%;
                height: 250px;

                margin-top: -70px;
            }

            .cont-footer {
                margin: 70px 70px;
                padding: 70px 70px;
            }

            .grupos-footer {
                display: flex;
                justify-content: space-evenly;
            }

            .grupos-footer h4 {
                margin-bottom: 10px;
                font-size: 20px;
            }

            .grupos-footer p {
                line-height: 25px;
            }

            .final-footer {
                width: 120%;
                height: 100px;
                text-align: center;
                color: white;
                background: black;
                box-shadow: 0 0 6px 0 rgb(0, 0, .6);
                line-height: 20px;
                margin-left: -10%;
                margin-top: 10px;
            }

            .final-footer .letrass {
                padding: 10px 5px;
            }

            .individual-eco {
                display: flex;
                margin-top: 20px;
            }

            .cont-eco {
                background-color: rgba(245, 245, 245, 1);
                margin-top: -60px;
            }

            .individual-eco p {
                margin-top: 100px;
                font-size: 15px;
            }

            .grupos-eco {
                margin: 60px;
                padding: 60px;
            }

            .grupos-eco img {
                width: 40%;
                margin-left: 20px;
                margin-right: 20px;
            }

            .number {

                background: rgb(40, 120, 16);
                color: white;
                border-radius: 50%;
                display: inline-block;
                text-align: center;
                width: 30px;
                height: 30px;
                padding: 3px;
                box-shadow: 0 0 6px 0 rgba(0, 0, 0, .5);
                margin-right: 5px;

            }

            @media screen and (max-width:500px) {
                .opciones-portada {
                    margin-top: -280px;
                }

                .Opciones-individual p {
                    font-size: 10px;
                }

                .grupos-eco {
                    width: 100%;

                }

                .individual-eco p {
                    margin-top: 100px;
                    font-size: 10px;
                }

                .grupos-eco {
                    margin: 10px;
                    padding: 10px;
                }

                .grupos-eco img {
                    height: 100px;
                    margin-top: 150px;
                }

                .ubicacion {
                    margin-top: 60px;

                }

                .ubicacion {
                    width: 90%;
                    margin: auto;
                    height: 600px;
                    background: #f9fffa;
                    box-shadow: 0 0 6px rgba(0, 0, 0, 0.1)
                }

                .cont-ubicacion {
                    width: 95%;
                    margin: auto;
                    height: 100%;
                }

                .grupos-ubicacion {
                    display: flex;
                }

                .ubi {
                    width: 34%;
                    height: 100%;


                }

                .mapa-ubicacion {
                    height: 500px;
                    background: rgb(210, 247, 222);
                    background: linear-gradient(0deg, rgba(210, 247, 222, 1) 0%, rgba(245, 245, 245, 1) 83%);
                }

                .mapa-ubicacion p {
                    color: rgb(5, 5, 5);
                    margin: 10px 10px;
                    font-size: 7px;
                }

                .img-ubicacion img {
                    width: 100%;
                    height: 500px;
                }

                .mapa-ubicacion iframe {
                    width: 100%;
                    height: 200px;
                }

                .titulo-ubicacion {
                    text-align: center;
                    height: 500px;

                }

                .titulo-ubicacion .letras {
                    margin-top: 370px;
                    font-weight: 900;
                }

                .letras img {
                    width: 260px;
                    position: absolute;
                    margin-top: -250px;
                    margin-left: -125px;
                    font-size: 10px;
                }

                .comentarios {
                    display: none;
                }



            }
        </style>
