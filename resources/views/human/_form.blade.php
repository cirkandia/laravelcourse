<div class="mb-3">
    <label class="form-label fw-bold">Nombre</label>
    <input type="text" class="form-control" name="name"
        value="{{ old('name', isset($human) ? $human->getName() : '') }}" required />
</div>
<div class="mb-3">
    <label class="form-label fw-bold">Aura</label>
    <input type="number" class="form-control" name="aura"
        value="{{ old('aura', isset($human) ? $human->getAura() : '') }}" required />
</div>
<div class="mb-3">
    <label class="form-label fw-bold">Categoría Jerárquica</label>
    <select class="form-select" name="category" required>
        <option value="" disabled {{ old('category') ? '' : (isset($human) ? '' : 'selected') }}>Selecciona una
            categoría...</option>
        <option value="common" {{ (old('category', isset($human) ? $human->getCategory() : '') == 'common') ? 'selected' : '' }}>Común</option>
        <option value="moderate" {{ (old('category', isset($human) ? $human->getCategory() : '') == 'moderate') ? 'selected' : '' }}>Moderado</option>
        <option value="legendary" {{ (old('category', isset($human) ? $human->getCategory() : '') == 'legendary') ? 'selected' : '' }}>Legendario</option>
    </select>
</div>