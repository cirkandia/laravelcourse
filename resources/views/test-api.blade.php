@extends('layouts.app')
@section('title', 'Probar API V3')
@section('subtitle', 'Test API POST Endpoint')
@section('content')
    <div class="row min-vh-100 align-items-center justify-content-center bg-light"
        style="font-family: 'Inter', sans-serif;">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4"
                style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
                <div class="card-body p-5">
                    <h2 class="fw-bold mb-4 text-center" style="color: #2c3e50;">🔥 Prueba la API </h2>
                    <p class="text-muted text-center mb-4">Ingresa un nombre y precio. Al darle en guardar, usaremos
                        JavaScript (fetch) para comunicarnos con la ruta API <kbd>POST /api/v3/products</kbd> sin recargar
                        la página.</p>

                    <form id="apiTestForm">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del Producto</label>
                            <input type="text" id="api_name" class="form-control form-control-lg rounded-3"
                                placeholder="Ej. Audífonos Bluetooth" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Precio</label>
                            <input type="number" id="api_price" class="form-control form-control-lg rounded-3"
                                placeholder="Ej. 120000" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3 shadow-sm"
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                            🚀 Enviar a la API
                        </button>
                    </form>

                    <div id="api_result" class="mt-4 d-none">
                        <h5 class="fw-bold text-success mb-2">✅ Respuesta Exitosa de la API:</h5>
                        <pre id="api_response_body" class="bg-dark text-light p-3 rounded-3"
                            style="font-size: 0.9rem; overflow-x: auto;"></pre>
                    </div>

                    <div id="api_error" class="mt-4 d-none">
                        <h5 class="fw-bold text-danger mb-2">❌ Ocurrió un Error:</h5>
                        <p id="api_error_body" class="text-danger"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('apiTestForm').addEventListener('submit', function (e) {
            e.preventDefault();

            let btn = e.target.querySelector('button');
            btn.innerHTML = 'Enviando... <div class="spinner-border spinner-border-sm" role="status"></div>';
            btn.disabled = true;

            // Los datos que recolectamos
            let payload = {
                name: document.getElementById('api_name').value,
                price: document.getElementById('api_price').value
            };

            // Petición POST a la API directamente
            fetch('/api/v3/products', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Error HTTP: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('api_result').classList.remove('d-none');
                    document.getElementById('api_error').classList.add('d-none');
                    document.getElementById('api_response_body').textContent = JSON.stringify(data, null, 4);
                })
                .catch(error => {
                    document.getElementById('api_error').classList.remove('d-none');
                    document.getElementById('api_result').classList.add('d-none');
                    document.getElementById('api_error_body').textContent = error.message;
                })
                .finally(() => {
                    btn.innerHTML = '🚀 Enviar a la API';
                    btn.disabled = false;
                    e.target.reset();
                });
        });
    </script>
@endsection