<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Http\Request;

class HumanController extends Controller
{
    public function index(Request $request): \Illuminate\View\View
    {
        $viewData = [];
        $viewData['title'] = 'Humans - Online Store';
        $viewData['subtitle'] = 'List of Humans';

        $sortBy = $request->query('sort_by');
        $validSortColumns = ['id', 'nombre', 'aura', 'categoria'];

        if (in_array($sortBy, $validSortColumns)) {
            $viewData['humans'] = Human::orderBy($sortBy, 'desc')->get();
            $viewData['currentSort'] = $sortBy;
        } else {
            $viewData['humans'] = Human::all();
            $viewData['currentSort'] = null;
        }

        return view('human.index')->with('viewData', $viewData);
    }

    public function primeros(): \Illuminate\View\View
    {
        $viewData = [];
        $viewData['title'] = 'First 2 Humans - Online Store';
        $viewData['subtitle'] = 'Quick Peek';
        $viewData['humans'] = Human::take(2)->get();

        return view('human.primeros')->with('viewData', $viewData);
    }

    public function create(): \Illuminate\View\View
    {
        $viewData = [];
        $viewData['title'] = 'Create Human';

        return view('human.create')->with('viewData', $viewData);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'aura' => 'required|integer',
            'categoria' => 'required|in:común,moderado,legendario',
        ]);

        Human::create($request->only(['nombre', 'aura', 'categoria']));

        return redirect()->route('humans.index')->with('success', 'Human created successfully!');
    }

    public function show(Human $human): \Illuminate\View\View
    {
        $viewData = [];
        $viewData['title'] = $human->getNombre() . ' - Online Store';
        $viewData['subtitle'] = $human->getNombre() . ' - Human Information';
        $viewData['human'] = $human;

        return view('human.show')->with('viewData', $viewData);
    }

    public function edit(Human $human): \Illuminate\View\View
    {
        $viewData = [];
        $viewData['title'] = 'Edit Human';
        $viewData['human'] = $human;

        return view('human.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, Human $human): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'aura' => 'required|integer',
            'categoria' => 'required|in:común,moderado,legendario',
        ]);

        $human->update($request->only(['nombre', 'aura', 'categoria']));

        return redirect()->route('humans.index')->with('success', 'Human updated successfully!');
    }

    public function destroy(Human $human): \Illuminate\Http\RedirectResponse
    {
        $human->delete();

        return redirect()->route('humans.index')->with('success', 'Human deleted successfully!');
    }
}
