@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="row mb-4">
        <!-- Opciones: Listar y Registrar -->
        <div class="col-md-4 d-flex align-items-center">
            <h3>Listado de Humanos</h3>
        </div>
        <div class="col-md-8 text-end">
            <div class="d-inline-flex gap-2 align-items-center justify-content-end">
                <form action="{{ route('humans.index') }}" method="GET" class="m-0">
                    <select name="sort_by" class="form-select shadow-sm" onchange="this.form.submit()">
                        <option value="">Ordenar descendentemente por...</option>
                        <option value="id" {{ ($viewData['currentSort'] ?? '') == 'id' ? 'selected' : '' }}>ID</option>
                        <option value="nombre" {{ ($viewData['currentSort'] ?? '') == 'nombre' ? 'selected' : '' }}>Nombre
                        </option>
                        <option value="aura" {{ ($viewData['currentSort'] ?? '') == 'aura' ? 'selected' : '' }}>Aura
                        </option>
                        <option value="categoria" {{ ($viewData['currentSort'] ?? '') == 'categoria' ? 'selected' : '' }}>
                            Categoría</option>
                    </select>
                </form>
                <a href="{{ route('humans.primeros') }}" class="btn btn-info btn-lg shadow-sm text-white">
                    ⭐ Primeros 2
                </a>
                <a href="{{ route('humans.create') }}" class="btn btn-success btn-lg shadow-sm">
                    ✨ Registrar Nuevo Humano
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        @if(count($viewData["humans"]) > 0)
            @foreach ($viewData["humans"] as $human)
                <div class="col-md-4 col-lg-3 mb-3">
                    <div class="card h-100 border-primary">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <h5 class="card-title fw-bold">
                                {{ $human->getNombre() }}
                                @if(strtolower($human->getCategoria()) === 'legendario')
                                    (“Boff”)
                                @endif
                            </h5>
                            <p class="card-text mb-1">Categoría: <span
                                    class="badge bg-secondary">{{ ucfirst($human->getCategoria()) }}</span></p>
                            <p class="card-text mb-3">
                                Aura:
                                <span class="{{ strtolower($human->getCategoria()) === 'común' ? 'text-primary fw-bold' : '' }}">
                                    {{ $human->getAura() }}
                                </span>
                            </p>
                            <a href="{{ route('humans.show', $human->getId()) }}" class="btn bg-primary text-white mt-auto">Ver
                                Detalle</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12 text-center mt-5">
                <div class="alert alert-info" role="alert">
                    Aún no hay humanos registrados en el catálogo. ¡Usa el botón superior para registrar al primero!
                </div>
            </div>
        @endif
    </div>
@endsection
