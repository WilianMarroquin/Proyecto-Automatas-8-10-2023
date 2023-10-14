@extends('layouts.app')
@section('titulo','Importar')
@section('importar-active','active')

@section('contenido')

<input type="file" id="file-input" />
<h3>Contenido del archivo:</h3>
<p id="contenido-modificado"></p>
<div id="mynetwork"></div>




@endsection

@section('scripts')
<script type="text/javascript">
</script>
@endsection