<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveHumanRequest;
use App\Models\Human;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HumanController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = 'Humans - Online Store';
        $viewData['subtitle'] = 'List of Humans';

        $sortBy = $request->query('sort_by');
        $validSortColumns = ['id', 'name', 'aura', 'category'];

        if (in_array($sortBy, $validSortColumns)) {
            $viewData['humans'] = Human::orderBy($sortBy, 'desc')->get();
            $viewData['currentSort'] = $sortBy;
        } else {
            $viewData['humans'] = Human::all();
            $viewData['currentSort'] = null;
        }

        return view('human.index')->with('viewData', $viewData);
    }

    public function primeros(): View
    {
        $viewData = [];
        $viewData['title'] = 'First 2 Humans - Online Store';
        $viewData['subtitle'] = 'Quick Peek';
        $viewData['humans'] = Human::take(2)->get();

        return view('human.primeros')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Human';

        return view('human.create')->with('viewData', $viewData);
    }

    public function store(SaveHumanRequest $request): RedirectResponse
    {
        Human::create($request->validated());

        return redirect()->route('humans.index')->with('success', 'Human created successfully!');
    }

    public function show(Human $human): View
    {
        $viewData = [];
        $viewData['title'] = $human->getName().' - Online Store';
        $viewData['subtitle'] = $human->getName().' - Human Information';
        $viewData['human'] = $human;

        return view('human.show')->with('viewData', $viewData);
    }

    public function edit(Human $human): View
    {
        $viewData = [];
        $viewData['title'] = 'Edit Human';
        $viewData['human'] = $human;

        return view('human.edit')->with('viewData', $viewData);
    }

    public function update(SaveHumanRequest $request, Human $human): RedirectResponse
    {
        $human->update($request->validated());

        return redirect()->route('humans.index')->with('success', 'Human updated successfully!');
    }

    public function destroy(Human $human): RedirectResponse
    {
        $human->delete();

        return redirect()->route('humans.index')->with('success', 'Human deleted successfully!');
    }
}
