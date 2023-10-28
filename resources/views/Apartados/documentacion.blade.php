@extends('layouts.app')
@section('documentacion-active','active')

@section('contenido')
    <div class="cont-general">
        <div class="nav" style="position: fixed">
            <ul>
                <li><a href="#terminos">Terminos y condiciones</a></li>
                <li><a href="#quienes">¿Quienes Somos?</a></li>
                <li><a href="#sobre">Sobre EcoRent</a></li>
                <li><a href="#vision">Vision</a></li>
                <li><a href="#mision">Mision</a></li>
                <li><a href="#valores">Valores</a></li>
            </ul>

        </div>
        <div class="informacion">
            <div id="terminos" class="terminosCondiciones">
                <h1>Terminos y Condiciones</h1>
                <h6>Aceptacion de los terminos y condiciones:</h6>
                <p>Al acceder y utilizar los servicios de nuestra empresa de ventas, alquiler y asesoramiento, acepta
                    cumplir con los siguientes términos y condiciones. Si no estás de acuerdo con estos términos, te
                    solicitamos que no utilices nuestros servicios.
                </p>
                <h6>Uso de los servicios: </h6>
                <p>Nuestros servicios incluyen la venta, alquiler y asesoramiento de productos y servicios. Te comprometes a
                    utilizarlos de acuerdo con las leyes y aplicables ya no utilizarlos para multas ilegales o inapropiados.
                </p>
                <h6>Responsabilidad del usuario:</h6>
                <p>Eres responsable de mantener la confidencialidad de cualquier información de acceso proporcionada por
                    nuestra empresa. Además, eres responsable de cualquier actividad realizada a través de tu cuenta.
                </p>
                <h6>Precios y pagos:</h6>
                <p>Los precios de nuestros productos y servicios están sujetos a cambios sin previo aviso. Nos reservamos el derecho de modificar los precios y condiciones de pago en cualquier momento. Los pagos deben realizarse según las opciones y plazos indicados en nuestras facturas o contratos.
                </p>
                <h6>Propiedad Intelectual:</h6>
                <p>Todos los derechos de propiedad intelectual relacionados con nuestros productos, servicios y contenido pertenecen a nuestra empresa. No se permite la reproducción, distribución o modificación de ningún material sin nuestro consentimiento previo por escrito.
                </p>
                <h6>Limitacion de Responsabilidad:</h6>
                <p>Nuestra empresa no se hace responsable de ningún daño directo, indirecto, incidental o consecuente que surja del uso de nuestros servicios, incluyendo pérdidas económicas, daños a la propiedad o lesiones personales.
                </p>
                <h6>Ley Aplicable y Jutisdiccion:</h6>
                <p>Estos términos y condiciones se rigen por las leyes del país o estado donde nuestra empresa tiene su sede. Cualquier disputa que surja de estos términos y condiciones se someterá a la jurisdicción exclusiva de los tribunales competentes de dicha jurisdicción.</p>
            </div>
            <div id="quienes" class="quienesSomos">
                <h1>¿Quienes Somos?</h1>
                <p>Somos una empresa con una plataforma en línea que conecta a propietarios de artículos de consumo
                    frecuente, como ropa, juguetes, herramientas y electrodomésticos, con personas que desean utilizar estos
                    artículos permamente o temporalmente, tambien tenemos a su dispocicion asesorameinto y servicios con el
                    fin de suplir todas sus necesidades. La idea principal es fomentar la economía circular y reducir el
                    consumo necesario y el desperdicio.</p>
            </div>
            <div id="sobre" class="SobreEcoRent">
                <h1>Eco Rent</h1>
                <h6>Concepto:</h6>
                <p>Es una plataforma en línea que conecta a propietarios de artículos de consumo frecuente, como ropa,
                    juguetes, herramientas y electrodomésticos, con personas que desean utilizar estos artículos
                    temporalmente. La idea principal es fomentar la economía circular y reducir el consumo necesario y el
                    desperdicio.
                </p>
                <h6>¿Como funciona EcoRent?</h6>
                <p>Los propietarios de los artículos publicarían sus productos en la plataforma y establecerían un precio de alquiler. Los usuarios interesados ​​podrían buscar artículos por categoría y ubicación y reservarlos en línea. La plataforma proporcionaría un sistema de pago seguro, así como un servicio de entrega y recolección de los artículos. Los propietarios recibirían una parte del alquiler, mientras que EcoRent se quedaría con una pequeña comisión. 
                </p>
                <h6>Beneficios:</h6>
                <p>EcoRent tiene varios beneficios para el medio ambiente y la sociedad en general. En primer lugar, reduciría el consumo necesario de bienes, lo que a su vez reduciría la huella de carbono y los residuos. En segundo lugar, permitiría a las personas acceder a artículos que quizás no podrían permitirse comprar, lo que fomentaría la economía colaborativa y el intercambio. Además, podría ser una excelente fuente de ingresos adicionales para aquellos que tienen artículos que no usan con frecuencia.</p>
            </div>
            <div id="vision" class="vision">
                <h1>Vision</h1>
                <p>Hacer de nuestra empresa una empresa reconocida para que los clientes tengan la confianza de comprar, vender y alquilar sus productos u objetos. También queremos lograr extender nuestra empresa a nivel internacional.</p>
            </div>
            <div id="mision" class="vision">
                <h1>Mision</h1>
                <p>Buscar métodos de publicidad donde la gente entienda de que se trata tanto nuestra página web, como nuestra empresa en donde estaremos ubicados. Ya sea hacer marketing o tomar en cuenta la publicidad física.</p>
            </div>
            <div id="valores" class="valores">
                <h1>Valores</h1>
                <h6>Sostenibilidad:</h6>
                <p>El proyecto fomenta la reutilización y el intercambio de objetos, lo que contribuye a reducir el impacto ambiental de la producción y el consumo.
                </p>
                <h6>Comunidad:</h6>
                <p>El proyecto crea una comunidad de usuarios que comparten una visión común de consumo más consciente y colaborativo.
                </p>
                <h6>Confianza:</h6>
                <p>El proyecto promueve la confianza entre los usuarios mediante la creación de perfiles verificados, una plataforma segura y un sistema de calificación de usuarios.
                </p>
                <h6>Empatia:</h6>
                <p>El proyecto fomenta la empatía y la compasión entre los usuarios, ya que se basa en la idea de compartir y ayudar a otros miembros de la comunidad.
                </p>
                <h6>Ahorro:</h6>
                <p>El proyecto permite a los usuarios ahorrar dinero al no tener que comprar objetos que sólo necesitan usar temporalmente.
                </p>
                <h6>Innovacion:</h6>
                <p>El proyecto propone una nueva forma de consumo que desafía los modelos tradicionales de producción y consumo.
                </p>
                <h6>Diversidad</h6>
                <p>El proyecto fomenta la diversidad de objetos y experiencias que los usuarios pueden compartir, lo que enriquece la vida de todos los miembros de la comunidad.</p>
            </div>


        </div>

    </div>
    <style>
        ul{
            list-style: none;
            margin-left: -20px;
            text-align: center

        }
        ul li a{
            text-decoration: none; 
            color: black; 
            font-size: 16px; 
            line-height: 50px;
            font-weight: 900;
        }
        .cont-general {
            display: flex;
        }

        

        .informacion {
            width: 68%;
            margin: auto;
            box-shadow: 0 0 6px 0 rgba(0, 128, 128, 0.126);
            padding: 40px;
            background: white;
        }

        p {
            font-size: 18px;
        }

        h1 {
            text-align: center
        }

        h4 {
            text-align: start;
            font-weight: 900;
        }

        h6 {
            font-weight: 900;
            font-size: 19px;
        }
        @media screen and (max-width:500px){
            .nav{
                display: none;
            }
            .informacion{
                width: 93%;
             
            }
            p{
                font-size: 13px;
            }
        }
    </style>
@endsection
