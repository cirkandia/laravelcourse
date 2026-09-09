<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use Illuminate\Http\Request;

class PiezaController extends Controller
{
    public function index(Request $request): \Illuminate\View\View
    {
        $viewData = [];
        $viewData['title'] = 'Piezas - Online Store';
        $viewData['subtitle'] = 'Lista de piezas';

        $sortBy = $request->query('sort_by');
        $validSortColumns = ['id', 'nombre', 'valor', 'categoria'];

        if (in_array($sortBy, $validSortColumns)) {
            $viewData['piezas'] = Pieza::orderBy($sortBy, 'desc')->get();
            $viewData['currentSort'] = $sortBy;
        } else {
            $viewData['piezas'] = Pieza::all();
            $viewData['currentSort'] = null;
        }

        return view('pieza.index')->with('viewData', $viewData);
    }

    public function primeras(): \Illuminate\View\View
    {
        $viewData = [];
        $viewData['title'] = 'Primeras 2 Piezas - Online Store';
        $viewData['subtitle'] = 'Vistazo rápido';
        $viewData['piezas'] = Pieza::take(2)->get();

        return view('pieza.primeras')->with('viewData', $viewData);
    }

    public function create(): \Illuminate\View\View
    {
        $viewData = [];
        $viewData['title'] = 'Crear Pieza';

        return view('pieza.create')->with('viewData', $viewData);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'valor' => 'required|integer',
            'categoria' => 'required|in:común,moderado,legendario',
        ]);

        Pieza::create($request->only(['nombre', 'valor', 'categoria']));

        return redirect()->route('piezas.index')->with('success', 'Pieza creada exitosamente!');
    }

    public function show(string $id): \Illuminate\View\View
    {
        $viewData = [];
        $pieza = Pieza::findOrFail($id);
        $viewData['title'] = $pieza->getNombre() . ' - Online Store';
        $viewData['subtitle'] = $pieza->getNombre() . ' - Información de la pieza';
        $viewData['pieza'] = $pieza;

        return view('pieza.show')->with('viewData', $viewData);
    }

    public function edit(string $id): \Illuminate\View\View
    {
        $viewData = [];
        $viewData['title'] = 'Editar Pieza';
        $viewData['pieza'] = Pieza::findOrFail($id);

        return view('pieza.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'valor' => 'required|integer',
            'categoria' => 'required|in:común,moderado,legendario',
        ]);

        $pieza = Pieza::findOrFail($id);
        $pieza->update($request->only(['nombre', 'valor', 'categoria']));

        return redirect()->route('piezas.index')->with('success', 'Pieza actualizada exitosamente!');
    }

    public function destroy(string $id): \Illuminate\Http\RedirectResponse
    {
        $pieza = Pieza::findOrFail($id);
        $pieza->delete();

        return redirect()->route('piezas.index')->with('success', 'Pieza eliminada exitosamente!');
    }
}
