<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipStoreRequest;
use App\Http\Requests\ShipUpdateRequest;
use App\Models\Ship;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $ships = Ship::withCount('cabinCategories')->simplePaginate(5);

        return view('pages.ships.index', compact('ships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.ships.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ShipStoreRequest  $request
     *
     * @return RedirectResponse
     */
    public function store(ShipStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['spec'] = json_decode($validated['spec'], true);

        $ship = Ship::create($validated);

        return redirect()
            ->route('ships.edit', $ship)
            ->withSuccess(__('Created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Ship  $ship
     *
     * @return View
     */
    public function show(Ship $ship): View
    {
        return view('pages.ships.show', compact('ship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Ship  $ship
     *
     * @return View
     */
    public function edit(Ship $ship): View
    {
        $cabinCategories = $ship->cabinCategories()->simplePaginate(5);

        return view('pages.ships.edit', compact('ship', 'cabinCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ShipUpdateRequest  $request
     * @param  Ship  $ship
     *
     * @return RedirectResponse
     */
    public function update(ShipUpdateRequest $request, Ship $ship): RedirectResponse
    {
        $validated = $request->validated();
        $validated['spec'] = json_decode($validated['spec'], true);

        $ship->update($validated);

        return redirect()
            ->route('ships.edit', $ship)
            ->withSuccess(__('Edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Ship  $ship
     *
     * @return RedirectResponse
     */
    public function destroy(Ship $ship): RedirectResponse
    {
        $ship->delete();

        return redirect()
            ->route('ships.index')
            ->withSuccess(__('Deleted'));
    }
}
