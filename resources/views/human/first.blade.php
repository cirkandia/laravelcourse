@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 text-center mb-4">
            <h2 class="fw-bold">First 2 Registered Humans</h2>
            <p class="text-muted">A quick peek at the catalog.</p>
        </div>
    </div>

    @if(count($viewData["humans"]) == 2)
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
                @if($viewData["humans"][0]->getAura() > $viewData["humans"][1]->getAura())
                    <h4 class="text-success fw-bold">🏆 The winner is {{ $viewData["humans"][0]->getName() }}!</h4>
                @elseif($viewData["humans"][1]->getAura() > $viewData["humans"][0]->getAura())
                    <h4 class="text-success fw-bold">🏆 The winner is {{ $viewData["humans"][1]->getName() }}!</h4>
                @else
                    <h4 class="text-warning fw-bold">🤝 It's a tie between {{ $viewData["humans"][0]->getName() }} and
                        {{ $viewData["humans"][1]->getName() }}!</h4>
                @endif
            </div>
        </div>
    @elseif(count($viewData["humans"]) == 1)
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
                <h4 class="text-info fw-bold">Another human is needed to compare who would win.</h4>
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
        @if(count($viewData["humans"]) > 0)
            @foreach ($viewData["humans"] as $human)
                <div class="col-md-5 mb-4">
                    <div class="card shadow-sm border-0 bg-light rounded-4 h-100">
                        <div class="card-body text-center p-5 d-flex flex-column justify-content-center">
                            <h3 class="fw-bolder mb-3 text-dark">
                                {{ $human->getName() }}
                            </h3>
                            <h5 class="text-primary fw-bold m-0 text-uppercase tracking-wide">
                                Aura: {{ $human->getAura() }}
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-8 text-center mt-5">
                <div class="alert alert-secondary rounded-3" role="alert">
                    There are no humans in the database yet.
                </div>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-12 text-center mt-4">
            <a href="{{ route('humans.index') }}" class="btn btn-outline-secondary">
                Back to the full list
            </a>
        </div>
    </div>
@endsection