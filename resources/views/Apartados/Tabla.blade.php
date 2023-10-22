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
            border: 1px solid black;
        }

        .tamaño {
            max-width: 100px;
            min-width: 100px;
        }
    </style>
@endpush
<div style="margin-bottom: 20px">
  <label for="formFileLg" class="form-label">Archivo de entrada: </label>
  <input class="form-control form-control-lg" id="file-input" type="file">
</div>

<textarea name="valores" id="valores" cols="30" rows="10"></textarea>

<div style="width:50%; " class=" text-center">
    <div id="simbolos" class="row">
        <div class="col" style="margin-left: 10px; max-width:90px"></div>
    </div>
    <div class="" style="display: flex">
        {{-- Los estados --}}
        <div class="col" id="estados" style="min-width: 88px">
        </div>
        {{-- las transiciones --}}
        <div class="container text-center">
            <div id="transiciones" class="row">
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function leerArchivo(e) {
            var archivo = e.target.files[0];
            if (!archivo) {
                return;
            }
            var lector = new FileReader();
            lector.onload = function (e) {
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
                var o = transciciones[i].replace(/Q/g, '');
                o = o.split(',');
                array.push(o);
            }
            return array;
        }

        function hacerTabla(simbolos, transicionCalculada, estados) {
            for (var i = 0; i < simbolos.length; i++) {
                crearElementoHtml(simbolos[i]);
                console.log(simbolos[1]);
            }
            //se crea los estados de la tabla
            for (i = 0; i < estados.length; i++) {
                crearElementoEstados(estados[i]);
            }
            //se crea los simbolos de la tabla
            for (i = 1; i < transicionCalculada.length - 1; i++) {
                for (var j = 0; j < transicionCalculada[i].length; j++) {
                    crearElementoHtmlTransiciones("Q" + transicionCalculada[i][j], i, j);
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
            div.classList.add('tamaño');
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
            div.setAttribute('id', 'transicion: ' + j + " linea: " + i); // Add an id to the div
            document.getElementById('transiciones').appendChild(div);
        }

        function crearElementoEstados(Dato) {
            var div = document.createElement('div');
            div.classList.add('col');
            div.style.max_width = '100px';
            div.innerHTML = Dato;
            document.getElementById('estados').appendChild(div);
        }
    </script>
@endpush
