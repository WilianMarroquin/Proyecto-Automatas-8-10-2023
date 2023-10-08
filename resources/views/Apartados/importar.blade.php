@extends('layouts.app')
@section('titulo','Importar')
@section('importar-active','active')

@section('contenido')

<input type="file" id="file-input" />
<h3>Contenido del archivo:</h3>
<p id="contenido-modificado"></p>

@endsection

@section('scripts')
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

    var mostrar = document.getElementById('contenido-modificado');
    mostrar.innerHTML = cadenasAnalizar[3]; 


}
document.getElementById('file-input')
.addEventListener('change', leerArchivo, false);

//Funcion para obtener los simbolos del archivo// 
function Obtenersimbolos(contenido){
    contenido = contenido.split(':');
    contenido[1] = contenido[1].replace(/Estados/g, '');
    array = contenido[1].split(',');
    return  array;
}
//Funcion para obtener los estados del archivo//
function ObtenerEstados(contenido){
    contenido = contenido.split(':');
    contenido[2] = contenido[2].replace(/Estado inicial/g, '');
    array = contenido[2].split(',');
    return  array;
}
//Funcion para obtener el estado inicial del archivo//
function ObtenerEstadoInicial(contenido){
    contenido = contenido.split(':');
    contenido[3] = contenido[3].replace(/Estados de aceptación/g, '');
    array = contenido[3].split(',');
    return  array;
}
//Funcion para obtener los estados de aceptacion del archivo//
function ObtenerEstadosAceptacion(contenido){
    contenido = contenido.split(':');
    contenido[4] = contenido[4].replace(/Transiciones/g, '');
    array = contenido[4].split(',');
    return  array;
}
//Funcion para obtener las transiciones del archivo//
function ObtenerTransiciones(contenido){
    var footer = contenido.split('Transiciones:');
    var header = footer[1].split(':');
    var array = header[0].replace(/Cadenas a analizar/g, '');
    array = array.split('\n');
    return array;
}
//Funcion para obtener las cadenas a analizar del archivo//
function ObtenerCadenas(contenido){
    var footer = contenido.split('Cadenas a analizar:');
    var array = footer[1].split('\n');
    return array; 
}
</script>
@endsection