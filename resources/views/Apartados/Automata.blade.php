@push('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../../../standalone/umd/vis-network.min.js"></script>
    {{-- <style type="text/css">
  body,
  html {
    font: 10pt sans;
    line-height: 1.5em;
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
    color: #4d4d4d;
    box-sizing: border-box;
    overflow: hidden;
  }

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

  #left {
    top: 0;
    left: 0;
  }

  #right {
    top: 0;
    right: 0;
  }

  #error {
    color: red;
  }

  #data {
    width: 100%;
    height: 100%;
    border: 1px solid #d3d3d3;
    box-sizing: border-box;
    resize: none;
  }

  #draw {
    padding: 5px 15px;
  }

  #mynetwork {
    width: 100%;
    height: 100%;
    border: 1px solid #d3d3d3;
    box-sizing: border-box;
  }

  a:hover {
    color: red;
  }
</style> --}}
@endpush

<button onclick="darvalor()">dar valor</button>

<div id="header">
    <div>
        <button class="btn btn-info" id="draw" title="Draw the DOT graph (Ctrl+Enter)">Draw</button>
        <span id="error"></span>
    </div>
</div>

<div id="contents">
    <div id="left">
        <textarea id="data" cols="30" rows="10">

</textarea>
    </div>
    <div id="right">
        <div id="mynetwork"></div>
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

            console.log(transicionesModificadas);
            console.log(estados[0] + transicionesModificadas[0]);


            for (var a = 0; a < transicionesModificadas.length; a++) {
                dato = dato + estados[a] + "->" + transicionesModificadas[a] + ";\n";
            }



            document.getElementById("data").value = "digraph G {\n" +
                "node [shape=circle fontsize=16]\n" +
                "edge [length=100, color=gray, fontcolor=black]\n" +
                dato +
                "A [\n" +
                "fontcolor=white,\n" +
                "color=yellow,\n" +
                "label=filled,\n" +
                "]\n" +
                "}";
        };
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
            contenido[2] = contenido[2].replace(/\r/g, '');
            contenido[2] = contenido[2].replace(/\n/g, '');
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
    </script>
@endpush
