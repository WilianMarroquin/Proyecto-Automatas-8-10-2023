@extends('layouts.app')
@section('titulo', 'Automata')
@section('automatas-active', 'active')

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
        <div class="card-header bg-success opacity-10">
                Automatas:
            </div>
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
