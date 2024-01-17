@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <h2 class="mb-5">Resultados de la búsqueda: </h2>

        @if($resultados->isEmpty())
            <p>No se encontraron resultados.</p>
        @else
            <div class="row">
                @foreach($resultados as $resultado)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <!-- Muestra la información relevante de cada resultado -->
                                <h5 class="card-title">Tipo: {{ $resultado instanceof \App\Models\Salaprensa ? 'Noticia' : ($resultado instanceof \App\Models\TramitesDigitales ? 'Trámite' : ($resultado instanceof \App\Models\Documentonew ? 'Documento' : 'Desconocido')) }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">ID: {{ $resultado->id }}</h6>
                                <!-- Añade más campos según tus modelos -->
                                <!-- Ejemplo con Salaprensa -->
                                @if($resultado instanceof \App\Models\Salaprensa)
                                    <h6 class="card-subtitle mb-2 text-muted">Categoría: {{ $resultado->categoria }}</h6>
                                    <p class="card-text">
                                        <strong>Título:</strong> {{ Str::limit($resultado->titulo, 80) }}<br>
                                        <strong>Descripción:</strong> {{ Str::limit($resultado->descripcion, 80) }}<br>
                                    </p>
                                @endif
                                <!-- Ejemplo con TramitesDigitales -->
                                @if($resultado instanceof \App\Models\TramitesDigitales)
                                    <p class="card-text">
                                        <strong>Tags:</strong> {{ $resultado->tags }}<br>
                                        <strong>Título:</strong> {{ Str::limit($resultado->titulo, 80) }}<br>
                                        <strong>Descripción:</strong> {{ Str::limit($resultado->descripcion, 80) }}<br>
                                    </p>
                                @endif
                                <!-- Ejemplo con Documentonew -->
                                @if($resultado instanceof \App\Models\Documentonew)
                                    <p class="card-text">
                                        <strong>Tipo de documento:</strong> {{ $resultado->tipo_documento }}<br>
                                        <strong>Provincia:</strong> {{ $resultado->provincia }}<br>
                                        <strong>Comuna:</strong> {{ $resultado->comuna }}<br>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
