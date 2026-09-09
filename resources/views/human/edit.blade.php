@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning text-dark fw-bold">
                        <h5 class="mb-0">Editar Humano: {{ $viewData['human']->getNombre() }}</h5>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger pb-0">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('humans.update', $viewData['human']->getId()) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nombre</label>
                                <input type="text" class="form-control" name="nombre"
                                    value="{{ old('nombre', $viewData['human']->getNombre()) }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Aura</label>
                                <input type="number" class="form-control" name="aura"
                                    value="{{ old('aura', $viewData['human']->getAura()) }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Categoría</label>
                                <select class="form-select" name="categoria" required>
                                    <option value="común" {{ (old('categoria', $viewData['human']->getCategoria()) == 'común') ? 'selected' : '' }}>Común</option>
                                    <option value="moderado" {{ (old('categoria', $viewData['human']->getCategoria()) == 'moderado') ? 'selected' : '' }}>Moderado
                                    </option>
                                    <option value="legendario" {{ (old('categoria', $viewData['human']->getCategoria()) == 'legendario') ? 'selected' : '' }}>Legendario
                                    </option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('humans.show', $viewData['human']->getId()) }}"
                                    class="btn btn-outline-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-warning fw-bold">Actualizar Humano</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection