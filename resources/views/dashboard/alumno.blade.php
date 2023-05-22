@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard del Alumno</h1>
        <p>Bienvenido, {{ auth()->user()->nombre }}!</p>
        <!-- Contenido específico del dashboard del alumno -->
    </div>
@endsection
