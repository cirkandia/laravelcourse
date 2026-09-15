<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImageController extends Controller
{
    public function index(): View
    {
        return view('image.index');
    }

    public function save(\App\Http\Requests\StoreImageRequest $request, ImageStorage $storage): RedirectResponse
    {
        $storage->store($request);

        return back();
    }
}
