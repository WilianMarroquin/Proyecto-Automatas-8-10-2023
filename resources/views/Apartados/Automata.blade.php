@push('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../../../standalone/umd/vis-network.min.js"></script>
@endpush
<div>
    <div id="header">
        <div>
            <button class="btn btn-info" id="draw" title="La vaca lola tiene cabeza y no tiene cola">Draw</button>
            <div>
                <textarea style="display: none" id="data" cols="30" rows="10"></textarea>
            </div>
        </div>
    </div>
    <h1 id="pruebas"></h1>

    <div id="contents">
        <div>
            <div class="mydiv" style="width: 400px; heigth:400px; margin: auto" id="mynetwork"></div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        var container = document.getElementById("mynetwork");
        var options = {
            physics: {
                stabilization: false,
                barnesHut: {
                    springLength: 200,
                },
            },
        };
        var data = {};
        var network = new vis.Network(container, data, options);
        $("#draw").click(draw);
        $("a.example").click(function(event) {
            var url = $(event.target).data("url");
            $.get(url)
                .done(function(dotData) {
                    $("#data").val(dotData);
                    draw();
                })
                .fail(function() {
                    $("#error").html(
                        "Error: Cannot fetch the example data because of security restrictions in JavaScript. Run the example from a server instead of as a local file to resolve this problem. Alternatively, you can copy/paste the data of DOT graphs manually in the textarea below."
                    );
                    resize();
                });
        });
        $(window).resize(resize);
        $(window).load(draw);
        $("#data").keydown(function(event) {
            if (event.ctrlKey && event.keyCode === 13) {
                // Ctrl+Enter
                draw();
                event.stopPropagation();
                event.preventDefault();
            }
        });

        function resize() {
            $("#contents").height($("body").height() - $("#header").height() - 30);
        }

        function draw() {
            try {
                resize();
                $("#error").html("");

                // Provide a string with data in DOT language
                data = vis.parseDOTNetwork($("#data").val());

                network.setData(data);

                var button = document.getElementById("boton_verificar");
                button.style.display = "block";

            } catch (err) {
                // set the cursor at the position where the error occurred
                var match = /\(char (.*)\)/.exec(err);
                if (match) {
                    var pos = Number(match[1]);
                    var textarea = $("#data")[0];
                    if (textarea.setSelectionRange) {
                        textarea.focus();
                        textarea.setSelectionRange(pos, pos);
                    }
                }

                // show an error message
                $("#error").html(err.toString());
            }
        }

        function darvalor() {
            var contenido = document.getElementById("valores").textContent;
            var simbolos = Obtenersimbolos(contenido);
            var estados = ObtenerEstados(contenido);
            var estadoInicial = ObtenerEstadoInicial(contenido);

            var estadoAceptacion = ObtenerEstadosAceptacion(contenido);

            var transiciones = ObtenerTransiciones(contenido);
            var cadenasAnalizar = ObtenerCadenas(contenido);
            var transicionCalculada = CalcularTranscicion(transiciones);
            var dato = "";
            var transicionesModificadas = modificarTransiciones(transiciones);


















            var diseñarAutomata = diseñarAutomatafuncion(simbolos, estados, transicionCalculada);

            // Esta funcion esta terminada solo buscare otra posible forma para hacerlo
            // var lineas = agregarLineas(simbolos, estados, transicionCalculada);

            //  for (var a = 0; a < transicionesModificadas.length; a++) {
            //      dato = dato + estados[a] + "->" + transicionesModificadas[a] + ";\n";
            //  }
            document.getElementById("data").value = "digraph G {\n" +
                "node [shape=circle fontsize=16]\n" +
                "edge [length=100, color=gray, fontcolor=black]\n" +
                diseñarAutomata +
                "}";

                cadenasAnalizar = cadenasAnalizar.split('$');


            document.getElementById("EstadoActual").innerHTML = estadoInicial;
            document.getElementById("cadenasUsar").innerHTML = cadenasAnalizar[1];
            document.getElementById("NumeroCaracter").innerHTML = 0;
            document.getElementById("EstadoAceptacion").innerHTML = estadoAceptacion;

            var ArrayCadenas = ObtenerValorCadenas(document.getElementById("cadenasUsar").textContent);
            // ArrayCadenas[0] = ArrayCadenas[0] + "," + " ";
            // var cadenaActual = ArrayCadenas[0].split(',');
            // document.getElementById("CaracterActual").innerHTML = cadenaActual[0][0]; 


        };
        //Funcion para obtener los simbolos del archivo//
        function Obtenersimbolos(contenido) {
            contenido = contenido.split(': ');
            contenido[1] = contenido[1].replace(/Estados/g, '');
            contenido[1] = contenido[1].replace(/\r/g, '');
            contenido[1] = contenido[1].replace(/\n/g, '');
            array = contenido[1].split(',');
            return array;
        }
        //Funcion para obtener los estados del archivo//
        function ObtenerEstados(contenido) {
            contenido = contenido.split(':');
            contenido[2] = contenido[2].replace(/Estado inicial/g, '');
            contenido[2] = contenido[2].replace(/\r/g, '');
            contenido[2] = contenido[2].replace(/\n/g, '');
            array = contenido[2].split(',');
            array = array.filter(function(el) {
                return el != "";
            });
            return array;
        }
        //Funcion para obtener el estado inicial del archivo//
        function ObtenerEstadoInicial(contenido) {
            contenido = contenido.split(':');
            contenido[3] = contenido[3].replace(/Estados de aceptación/g, '');
            array = contenido[3].split(',');
            array[0] = array[0].split("\n");
            var arrayresu = array[0]
            arrayresu = arrayresu.filter(function(el) {
                return el != "";
            });
            return arrayresu;
        }
        //Funcion para obtener los estados de aceptacion del archivo//
        function ObtenerEstadosAceptacion(contenido) {
            contenido = contenido.split(':');
            contenido[4] = contenido[4].replace(/Transiciones/g, '');
            array = contenido[4].split(',');
            array[0] = array[0].split("\n");
            var arrayresu = array[0]
            arrayresu = arrayresu.filter(function(el) {
                return el != "";
            });
            return arrayresu;
        }
        //Funcion para obtener las transiciones del archivo//
        function ObtenerTransiciones(contenido) {
            var footer = contenido.split('Transiciones:');
            var header = footer[1].split(':');
            var array = header[0].replace(/Cadenas a analizar/g, '');
            array = array.split('\n');
            array = array.filter(function(el) {
                return el != "";
            });
            return array;
        }
        //Funcion para obtener las cadenas a analizar del archivo//
        function ObtenerCadenas(contenido) {
            var footer = contenido.split('Cadenas a analizar:');
            var array = footer[1].replace(/\n/g, '$');
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

        function modificarTransiciones(transciciones) {
            for (var a = 0; a < transciciones.length; a++) {
                transciciones[a] = transciciones[a].replace(/,/g, ';');
            }
            transciciones = transciciones.filter(function(el) {
                return el != "";
            });
            for (var a = 0; a < transciciones.length; a++) {
                transciciones[a] = '{' + transciciones[a] + "}";
            }
            return transciciones;
        }
        //Funcion terminada para diseñar el automata mediante las lineas//
        function agregarLineas(simbolos, estados, transicionCalculada) {
            var iteraciones = estados.length;
            for (var a = 0; a < transicionCalculada.length; a++) {
                for (var b = 0; b < simbolos.length; b++) {

                    var dato = dato + estados[a] + " -- " + transicionCalculada[a][b] + "[label=" + '"' + simbolos[
                        b] + '"' + ", color=blue];\n";
                }
            }
            dato = dato.replace(/undefined/g, '');
            return dato;
        }

        function diseñarAutomatafuncion(simbolos, estados, transicionCalculada) {
            for (var a = 0; a < transicionCalculada.length; a++) {
                for (var b = 0; b < simbolos.length; b++) {
                    var dato = dato + estados[a] + "->" + transicionCalculada[a][b] + "[label=" + '"' + simbolos[
                        b] + '"]' + "\n";
                }
            }
            dato = dato.replace(/undefined/g, '');
            return dato;
        }

        function datoRenderAutomata() {
            var estadoActual = document.getElementById("EstadoActual").textContent;
            var dato = document.getElementById("data").value;
            var cadenas = ObtenerValorCadenas(document.getElementById("cadenasUsar").textContent);

            var CaracterActual = document.getElementById("CaracterActual").textContent;

            var estadoAceptacion = document.getElementById("EstadoAceptacion").textContent;

            var NumeroCaracter = document.getElementById("NumeroCaracter").textContent;

            dato = dato.split('black]');
            dato[1] = dato[1].replace(/}/g, '');
            datosSinCalcular = dato[1].split('\n');
            var datosCalculados = datosSinCalcular.map(function(elemento) {
                return elemento.replace(/\t/g, "");
            });
            datosCalculados = datosCalculados.filter(function(el) {
                return el != "";
            });

            cadenas[0] = cadenas[0] + "," + " ";
            cadenaActual = cadenas[0].split(',');

            var a = 0;
            var colorEstado = "";
            var EstadoSiguiente = " "
            var simboloComparado = " ";
            datosCalculados.forEach(element => {
                var EstadoComparar = element.split('->');
                console.log(a); 
                if (estadoActual == EstadoComparar[0]) {

                    var simboloComparar = element.split('"');
                    simboloComparado = simboloComparar[1].split('"');
                    console.log('el simbolo que se compara es: ' + simboloComparado[0] +
                        ' y el caracter actual es: ' + cadenaActual[NumeroCaracter]);
                    if (simboloComparado[0] == cadenaActual[NumeroCaracter]) {
                        console.log(simboloComparado[0] + ' = ' + cadenaActual[NumeroCaracter]);

                        var ProximoEstado = EstadoComparar[1].split('[');
                        EstadoSiguiente = ProximoEstado;
                        datosCalculados[a] = estadoActual + "->" + ProximoEstado[0] + "[label=" + '"' +
                            simboloComparado[0] + '", color = aqua]' + estadoActual + "[color=aqua]" + "\n";

                        if (document.getElementById('EstadoAnterior').textContent != "") {
                            var Numero = document.getElementById('NumeroEstadoAnterior').textContent;
                            var estadoAnterior = document.getElementById('EstadoAnterior').textContent;
                            var ProximoEstadoAnterior = document.getElementById('ProximoEstadoAnterior')
                                .textContent;

                            var simboloComparadoAnterior = document.getElementById('ProximoSimboloAnterior')
                                .textContent;

                            datosCalculados[Numero] = estadoAnterior + "->" + ProximoEstadoAnterior +
                                "[label=" +
                                '"' +
                                simboloComparadoAnterior + '"]' + "\n";
                        }

                        document.getElementById('ProximoEstadoAnterior').innerHTML = ProximoEstado[0];
                        document.getElementById('EstadoAnterior').innerHTML = estadoActual;
                        document.getElementById("NumeroEstadoAnterior").innerHTML = a;
                        document.getElementById("ProximoSimboloAnterior").innerHTML = simboloComparado[0];



                        document.getElementById("EstadoActual").innerHTML = ProximoEstado[0];
                        NumeroCaracter = parseInt(NumeroCaracter);
                        var numeroTemporal = NumeroCaracter + 1;
                        document.getElementById("NumeroCaracter").innerHTML = numeroTemporal;
                        var siguienteCaracter = cadenaActual[numeroTemporal]
                        document.getElementById('CaracterActual').innerHTML = siguienteCaracter;
                    }
                }
                a = a + 1;
            });






            if (cadenaActual[NumeroCaracter] == " ") {
                datosCalculados[a] = estadoActual + "[color=red]" + "\n";
                estadoAceptacion = estadoAceptacion.split(' ').join('');
                if (estadoActual == estadoAceptacion) {

                    document.getElementById("EsValida").innerHTML = 'La cadena es valida';
                } else {

                    document.getElementById("EsValida").innerHTML = 'La cadena no es Valida';
                }
            }
            for (var i = 0; i < datosCalculados.length; i++) {
                var Dato = Dato + datosCalculados[i] + "\n";

            }
            Dato = Dato.replace(/undefined/g, '');

            var data = document.getElementById("data");
            data.value = "";
            data.value = "digraph G {\n" +
                "node [shape=circle fontsize=16]\n" +
                "edge [length=100, color=gray, fontcolor=black]\n" +
                Dato +
                "}";

            draw();
        }


        function ObtenerValorCadenas(cadenas) {
            var array = cadenas.split('$');
            array = array.filter(function(el) {
                return el != "";
            });
            return array;
        }
    </script>
@endpush
