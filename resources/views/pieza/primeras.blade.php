@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 text-center mb-4">
            <h2 class="fw-bold">Primeros 2 Humanos Registrados</h2>
            <p class="text-muted">Un vistazo rápido al catálogo.</p>
        </div>
    </div>

    @if(count($viewData["piezas"]) == 2)
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
                @php
                    $p1 = $viewData["piezas"][0];
                    $p2 = $viewData["piezas"][1];
                @endphp
                @if($p1->getValor() > $p2->getValor())
                    <h4 class="text-success fw-bold">🏆 ¡El ganador es {{ $p1->getNombre() }}!</h4>
                @elseif($p2->getValor() > $p1->getValor())
                    <h4 class="text-success fw-bold">🏆 ¡El ganador es {{ $p2->getNombre() }}!</h4>
                @else
                    <h4 class="text-warning fw-bold">🤝 ¡Es un empate entre {{ $p1->getNombre() }} y {{ $p2->getNombre() }}!</h4>
                @endif
            </div>
        </div>
    @elseif(count($viewData["piezas"]) == 1)
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
                <h4 class="text-info fw-bold">Falta otro humano para comparar quién ganaría.</h4>
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
        @if(count($viewData["piezas"]) > 0)
            @foreach ($viewData["piezas"] as $pieza)
                <div class="col-md-5 mb-4">
                    <div class="card shadow-sm border-0 bg-light rounded-4 h-100">
                        <div class="card-body text-center p-5 d-flex flex-column justify-content-center">
                            <h3 class="fw-bolder mb-3 text-dark">
                                {{ $pieza->getNombre() }}
                            </h3>
                            <h5 class="text-primary fw-bold m-0 text-uppercase tracking-wide">
                                Aura: {{ $pieza->getValor() }}
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-8 text-center mt-5">
                <div class="alert alert-secondary rounded-3" role="alert">
                    Aún no hay humanos en la base de datos.
                </div>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-12 text-center mt-4">
            <a href="{{ route('piezas.index') }}" class="btn btn-outline-secondary">
                Volver al listado completo
            </a>
        </div>
    </div>
@endsection