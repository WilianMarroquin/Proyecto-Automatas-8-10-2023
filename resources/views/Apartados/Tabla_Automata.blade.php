@extends('layouts.app')
@section('titulo', 'Automata')
@section('automatas-active', 'active')

@section('contenido')



    <div class="container">
        <div class="card text-left">
            <div class="card-header">
                Automatas: 
            </div>
            <div class="card-body">
                @include('Apartados.Tabla')
                @include('Apartados.Automata')
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    
</script>
@endpush
