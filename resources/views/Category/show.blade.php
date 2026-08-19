@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $viewData["category"]->getName() }}
                    </h5>
                    <p class="card-text">{{ $viewData["category"]->getDescription() }}</p>
                    <p class="card-text"><small class="text-muted">Status:
                            {{ $viewData["category"]->getStatus() ? 'Active' : 'Inactive' }} | Slug:
                            {{ $viewData["category"]->getSlug() }}</small></p>

                    <div class="mb-3">
                        <a href="{{ route('category.edit', ['id' => $viewData['category']->getId()]) }}"
                            class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST"
                            action="{{ route('category.delete', ['id' => $viewData['category']->getId()]) }}"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>

                    <hr>
                    <a href="{{ route('category.index') }}" class="btn btn-outline-secondary btn-sm">
                        < Volver a Categorías</a>
                            <form method="POST"
                                action="{{ route('category.assign', ['id' => $viewData['category']->getId()]) }}"
                                class="d-inline-block">
                                @csrf
                                <div class="input-group input-group-sm">
                                    <select name="product_id" class="form-select" required>
                                        <option value="" disabled selected>Añadir existente...</option>
                                        @foreach($viewData['unassigned_products'] as $product)
                                            <option value="{{ $product->getId() }}">{{ $product->getName() }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-outline-primary">Añadir a la Categoría</button>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            Productos en esta Categoría
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @forelse($viewData['category']->getProducts()->get() as $product)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $product->getName() }} - ${{ $product->getPrice() }}
                        <a href="{{ route('product.show', ['id' => $product->getId()]) }}"
                            class="btn btn-sm btn-info text-white">Ver Producto</a>
                    </li>
                @empty
                    <li class="list-group-item text-muted">No hay productos asignados a esta categoría todavía.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection