<div class="card h-100 border-primary">
    <div class="card-body text-center d-flex flex-column justify-content-center">
        <h5 class="card-title fw-bold">
            {{ $human->getName() }}
            @if($human->isLegendary())
                (“Boff”)
            @endif
        </h5>
        <p class="card-text mb-1">Categoría: <span
                class="badge bg-secondary">{{ ucfirst($human->getCategory()) }}</span></p>
        <p class="card-text mb-3">
            Aura:
            <span class="{{ $human->isCommon() ? 'text-primary fw-bold' : '' }}">
                {{ $human->getAura() }}
            </span>
        </p>
        <a href="{{ route('humans.show', $human->getId()) }}" class="btn bg-primary text-white mt-auto">Ver Detalle</a>
    </div>
</div>