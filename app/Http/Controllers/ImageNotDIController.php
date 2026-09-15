<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Utils\ImageLocalStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ImageNotDIController extends Controller
{
    public function index(): View
    {
        return view('imagenotdi.index');
    }

    public function save(StoreImageRequest $request): RedirectResponse
    {
        $storeImageLocal = new ImageLocalStorage;
        $storeImageLocal->store($request);

        return back();
    }
}
