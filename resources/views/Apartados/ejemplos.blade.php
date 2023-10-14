@extends('layouts.app')
@section('titulo','Importar')
@section('ejemplos-active','active')


@section('head')
<title>Vis Network | Data | DOT language playground</title>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../../../../standalone/umd/vis-network.min.js"></script>

<style type="text/css">
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
</style>
@endsection

@section('contenido')
<button onclick="darvalor()">dar valor</button>

<div id="header">
  <div>
    <button id="draw" title="Draw the DOT graph (Ctrl+Enter)">Draw</button>
    <span id="error"></span>
  </div>
</div>

<div id="contents">
  <div id="left">
    <textarea id="data">

</textarea>
  </div>
  <div id="right">
    <div id="mynetwork"></div>
  </div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">
  // create a network
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

  $("a.example").click(function (event) {
    var url = $(event.target).data("url");
    $.get(url)
      .done(function (dotData) {
        $("#data").val(dotData);
        draw();
      })
      .fail(function () {
        $("#error").html(
          "Error: Cannot fetch the example data because of security restrictions in JavaScript. Run the example from a server instead of as a local file to resolve this problem. Alternatively, you can copy/paste the data of DOT graphs manually in the textarea below."
        );
        resize();
      });
  });

  $(window).resize(resize);
  $(window).load(draw);

  $("#data").keydown(function (event) {
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

  function darvalor(){
    document.getElementById("data").value = "digraph G {\n" + 
    'lines -- solid[label="0", color="pink"];' +
    "node [shape=circle fontsize=16]\n" +
    "edge [length=100, color=gray, fontcolor=black]\n" +
    "A -> B[label=0.5];\n" +
    "B -> B[label=1.2] -> C[label=0.7] -- A;\n" +    
    "B -> D;\n" +
    "D -> {B; C}\n" +
    "D -> E[label=0.2];\n" +
    "F -> F;\n" +
    "A [\n" +
    "fontcolor=white,\n" +
    "color=yellow,\n" +
    "label=filled,\n" +
    "]\n" +
    "}";
  }; 
</script>
@endsection

