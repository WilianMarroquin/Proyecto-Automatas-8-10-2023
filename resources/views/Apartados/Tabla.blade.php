@push('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../../../standalone/umd/vis-network.min.js"></script>
    <style type="text/css">
        #header {
            margin: 0;
            padding: 10px;
            box-sizing: border-box;
        }

        #contents {
            height: 100%;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            position: relative;
        }

        #left,
        #right {
            position: absolute;
            width: 50%;
            height: 100%;
            margin: 0;
            padding: 10px;
            box-sizing: border-box;
            display: inline-block;
        }

        #right {
            top: 0;
            right: 0;
        }

        #error {
            color: red;
        }

        .col {
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        .border {
            border: 1px solid black;
        }

        .tamaño {
            max-width: 70px;
            min-width: 70px;
        }

        .cuadroInicial {
            margin-left: 12px;
        }

        .colorHeadCuadro {
            background: rgb(3, 41, 255);
        }

        .imagenes {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
    </style>
@endpush



<textarea style="display: none" name="valores" id="valores" cols="30" rows="10"></textarea>

<div style="margin-bottom: 20px">
    <label for="formFileLg" class="form-label">Archivo de entrada: </label>
    <input class="form-control form-control-lg" id="file-input" type="file">
</div>
<div style="margin-left: 400px">

    <span>Estado De Aceptacion : <h3 id="EstadoAceptacion"></h3></span>
    
    <span>Cadena Actual : <h3 id="cadenasUsar"></h3></span>

</div>


<div style="width:90%; margin:auto; display: flex;  margin-top:-100px;" class=" text-center">
    <div style="width: 80%">
        <div id="simbolos" class="row">
            {{-- <div class="col" style="margin-left: 10px; max-width:52px"></div> --}}
        </div>
        <div class="" style="display: flex">
            {{-- Los estados --}}
            <div class="col" id="estados" style="min-width: 70 px">
            </div>
            {{-- las transiciones --}}
            <div class="container text-center">
                <div id="transiciones" class="row">
                </div>
            </div>
        </div>
    </div>
    <div style="width: 60%;">
        <div style="width: 100%; heigth:400px; margin-top: 100px" class="border">
            <ul class="list-group" id="MostrarCadenas">
                <button type="button" class="list-group-item list-group-item-action active">
                    Cadenas:
                </button>
            </ul>
        </div>
    </div>

</div>




<span style="display: none">El estado Actual es: <h4 id="EstadoActual"></h4></span>
<span style="display: none">El numero de caracter es: <h4 id="NumeroCaracter"></h4></span>
<span style="display: none">El caracter actual es: <h4 id="CaracterActual"></h4></span>
<span style="display: none">Estado anteerior (Para el color) : <h4 id="EstadoAnterior"></h4></span>
<span style="display: none">Estado Anterior de transiciones: <h4 id="NumeroEstadoAnterior"></h4></span>
<span style="display: none">Proximo estado al que pasa (Anterior): <h4 id="ProximoEstadoAnterior"></h4></span>
<span style="display: none">Proximo simbolos al que pasa (Anterior): <h4 id="ProximoSimboloAnterior"></h4></span>
<span style="display: none">El color del estado (Anterior): <h4 id="colorEstadoAnterior"></h4></span>
<span style="display: none">¿La cadena es valida? <h4 id="EsValida"></h4></span>
<span style="display: none">La cadena que se esta usando <h4 id="numeroCadenaUso"></h4></span>

<span style="display: none">Aca estan todas las cadenas<h1 id="todasLasCadenas"></h1></span>
<span style="display: none">Es el estado Inicial<h1 id="EstadoInicial"></h1></span>
<span style="display: none">¿Ya hubo una transicion en la tabla?<h1 id="historicoColorTabla"></h1></span>
<span style="display: none">¿Ya hubo una transicion en la tabla?<h1 id="transicionesColor"></h1></span>
<span style="display: none">Numero De La Cadena Actual<h1 id="NumeroCadenaActual"></h1></span>






@push('scripts')
    <script>
        function leerArchivo(e) {
            var archivo = e.target.files[0];
            if (!archivo) {
                return;
            }
            var lector = new FileReader();
            lector.onload = function(e) {
                var contenido = e.target.result;
                mostrarContenido(contenido);
            };
            lector.readAsText(archivo);
        }

        function mostrarContenido(contenido) {
            var simbolos = Obtenersimbolos(contenido);
            var estados = ObtenerEstados(contenido);
            var estadoInicial = ObtenerEstadoInicial(contenido);
            var estadoAceptacion = ObtenerEstadosAceptacion(contenido);
            var transiciones = ObtenerTransiciones(contenido);
            var cadenasAnalizar = ObtenerCadenas(contenido);
            var transicionCalculada = CalcularTranscicion(transiciones);
            hacerTabla(simbolos, transicionCalculada, estados);
            document.getElementById('valores').innerHTML = contenido;
            darvalor();
            vizualizarCadenas();
        }

        document.getElementById('file-input')
            .addEventListener('change', leerArchivo, false);

        //Funcion para obtener los simbolos del archivo//
        function Obtenersimbolos(contenido) {
            contenido = contenido.split(':');
            contenido[1] = contenido[1].replace(/Estados/g, '');
            array = contenido[1].split(',');
            return array;
        }

        //Funcion para obtener los estados del archivo//
        function ObtenerEstados(contenido) {
            contenido = contenido.split(':');
            contenido[2] = contenido[2].replace(/Estado inicial/g, '');
            array = contenido[2].split(',');
            return array;
        }

        //Funcion para obtener el estado inicial del archivo//
        function ObtenerEstadoInicial(contenido) {
            contenido = contenido.split(':');
            contenido[3] = contenido[3].replace(/Estados de aceptación/g, '');
            array = contenido[3].split(',');
            return array;
        }

        //Funcion para obtener los estados de aceptacion del archivo//
        function ObtenerEstadosAceptacion(contenido) {
            contenido = contenido.split(':');
            contenido[4] = contenido[4].replace(/Transiciones/g, '');
            array = contenido[4].split(',');
            return array;
        }

        //Funcion para obtener las transiciones del archivo//
        function ObtenerTransiciones(contenido) {
            var footer = contenido.split('Transiciones:');
            var header = footer[1].split(':');
            var array = header[0].replace(/Cadenas a analizar/g, '');
            array = array.split('\n');
            return array;
        }

        //Funcion para obtener las cadenas a analizar del archivo//
        function ObtenerCadenas(contenido) {
            var footer = contenido.split('Cadenas a analizar:');
            var array = footer[1].split('\n');
            return array;
        }
        //Funcion para calcular las transiciones//
        function CalcularTranscicion(transciciones) {
            var array = [];
            for (var i = 0; i < transciciones.length; i++) {
                var o = transciciones[i].replace(/,/g, '?');
                o = o.split('?');
                array.push(o);
            }
            return array;
        }

        function hacerTabla(simbolos, transicionCalculada, estados) {

            var div = document.createElement('div');
            div.classList.add('col');
            div.classList.add('border');
            div.classList.add('tamaño');
            div.classList.add('cuadroInicial');
            div.classList.add('colorHeadCuadro');
            document.getElementById('simbolos').appendChild(div);



            for (var i = 0; i < simbolos.length; i++) {
                crearElementoHtml(simbolos[i]);
                console.log(simbolos[1]);
            }

            //se crea los estados de la tabla
            for (i = 0; i < estados.length; i++) {
                crearElementoEstados(estados[i], i);
            }
            //se crea los simbolos de la tabla
            for (i = 1; i < transicionCalculada.length; i++) {
                for (var j = 0; j < transicionCalculada[i].length; j++) {
                    crearElementoHtmlTransiciones(transicionCalculada[i][j], i, j);
                }
                var div = document.createElement('div');
                div.classList.add('w-100');
                div.classList.add('d-none');
                div.classList.add('d-md-block');
                document.getElementById('transiciones').appendChild(div);
            }
        }

        function crearElementoHtml(Dato) {
            var div = document.createElement('div');
            div.classList.add('col');
            div.classList.add('border');
            div.classList.add('tamaño');
            div.classList.add('colorHeadCuadro');
            div.innerHTML = Dato;
            document.getElementById('simbolos').appendChild(div);
        }

        function crearElementoHtmlTransiciones(Dato, i, j) {
            var div = document.createElement('div');
            div.innerHTML = Dato;
            div.classList.add('col-6');
            div.classList.add('col-sm-4');
            div.classList.add('col')
            div.classList.add('tamaño');
            div.classList.add('border');
            div.setAttribute('id', 'transicion: ' + j + " linea: " + i); // Add an id to the div
            document.getElementById('transiciones').appendChild(div);
        }

        function crearElementoEstados(Dato, i) {
            var div = document.createElement('div');
            div.classList.add('col');
            // div.classList.add('tamaño');
            div.classList.add('border');
            div.classList.add('tamaño');
            // div.style.max_width = '70px';
            div.innerHTML = Dato;
            div.setAttribute('id', 'estado-' + (i + 1)); // Add an id to the div
            document.getElementById('estados').appendChild(div);
        }

        function vizualizarCadenas() {
            var cadenas = document.getElementById('todasLasCadenas').textContent;

            var cadena = cadenas.split('$');

            for (var i = 1; i < cadena.length; i++) {
                var div = document.createElement('li');
                div.classList.add('list-group-item');
                div.innerHTML = cadena[i];
                 div.classList.add('d-flex');
                 div.classList.add('align-items-center');
                 div.classList.add('justify-content-between');
                div.setAttribute('id', 'cadena' + i);

                var img = document.createElement('img');
                img.classList.add('imagenes');
                img.classList.add('text-right');
                img.setAttribute('src', 'imagenes/esperar.png');
                img.setAttribute('alt', '');

                div.appendChild(img);
                document.getElementById('MostrarCadenas').appendChild(div);
            }
        }
    </script>
@endpush
