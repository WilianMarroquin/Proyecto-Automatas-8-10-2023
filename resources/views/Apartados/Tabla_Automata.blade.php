@extends('layouts.app')
@section('titulo', 'Automata')
@section('automatas-active', 'active')

@push('head')
<style>
    .boton_verificar{
        display: none; 
    }
</style>
@endpush

@section('contenido')

{{-- 

    <div class="container">
        <div class="card text-left">
            <div class="card-header">
                Automatas:
            </div>
            <div class="card-body" style="min-height: 600px">
                <div class="col-xs-3">
                </div>
                <div class="col">
                </div>
            </div>
        </div>
    </div> --}}


    <div style=" margin: auto; margin-top: 30px;  width: 90%" class=" card">
        <div class="card-header" style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 14%, rgba(100,220,245,1) 82%);">
                Automatas:
            </div>
            <button id="boton_pasos" class="btn btn-success boton_verificar">Pasos Espesificados</button>

            <div class="row align-items-start" >
            <div class="col" style="width: 70%">
                @include('Apartados.Tabla')
            </div>
            <div class="col" style="width: 20%">
                @include('Apartados.Automata')
            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script></script>
@endpush
