<?php

namespace App\Http\Controllers;

use App\Models\ShipsGallery;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShipsGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $shipsGalleries = ShipsGallery::simplePaginate(5);

        return view('pages.ships-gallery.index', compact('shipsGalleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.ships-gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
//        $validated = $request->validated();
//        $validated['spec'] = json_decode($validated['spec'], true);
//
//        $shipsGallery = ShipsGallery::create($validated);
//
//        return redirect()
//            ->route('ships-gallery.edit', $shipsGallery)
//            ->withSuccess(__('Created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  ShipsGallery  $shipsGallery
     *
     * @return View
     */
    public function show(ShipsGallery $shipsGallery): View
    {
        return view('pages.ships-gallery.show', compact('shipsGallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ShipsGallery  $shipsGallery
     * @return View
     */
    public function edit(ShipsGallery $shipsGallery): View
    {
        return view('pages.ships-gallery.edit', compact('shipsGallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  ShipsGallery  $shipsGallery
     *
     * @return RedirectResponse
     */
    public function update(Request $request, ShipsGallery $shipsGallery): RedirectResponse
    {
//        $validated = $request->validated();
//
//        $shipsGallery->update($validated);
//
//        return redirect()
//            ->route('ships-gallery.edit', $shipsGallery)
//            ->withSuccess(__('Edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ShipsGallery  $shipsGallery
     *
     * @return RedirectResponse
     */
    public function destroy(ShipsGallery $shipsGallery): RedirectResponse
    {
        $shipsGallery->delete();

        return redirect()
            ->route('ships-gallery.index')
            ->withSuccess(__('Deleted'));
    }
}
