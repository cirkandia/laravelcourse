<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveHumanRequest;
use App\Models\Human;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HumanController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Humans - Online Store';
        $viewData['subtitle'] = 'List of Humans';
        $viewData['humans'] = Human::orderBy('id', 'desc')->get();

        return view('human.index')->with('viewData', $viewData);
    }

    public function first(): View
    {
        $viewData = [];
        $viewData['title'] = 'First 2 Humans - Online Store';
        $viewData['subtitle'] = 'Quick Peek';
        $viewData['humans'] = Human::take(2)->get();

        return view('human.first')->with('viewData', $viewData);
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
}
