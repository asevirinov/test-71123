<?php

namespace App\Http\Controllers;

use App\Enums\CabinCategoryType;
use App\Http\Requests\CabinCategoryStoreRequest;
use App\Http\Requests\CabinCategoryUpdateRequest;
use App\Models\CabinCategory;
use App\Models\Ship;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CabinCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $cabinCategories = CabinCategory::simplePaginate(5);

        return view('pages.cabin-categories.index', compact('cabinCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $ships = Ship::pluck('title', 'id');

        return view('pages.cabin-categories.create', compact('ships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CabinCategoryStoreRequest  $request
     *
     * @return RedirectResponse
     */
    public function store(CabinCategoryStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['photos'] = json_decode($validated['photos'], true);

        $ship = CabinCategory::create($validated);

        return redirect()
            ->route('cabin-categories.edit', $ship)
            ->withSuccess(__('Created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  CabinCategory  $cabinCategory
     *
     * @return View
     */
    public function show(CabinCategory $cabinCategory): View
    {
        return view('pages.cabin-categories.show', compact('cabinCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CabinCategory  $cabinCategory
     *
     * @return View
     */
    public function edit(CabinCategory $cabinCategory): View
    {
        $ships = Ship::pluck('title', 'id');

        return view('pages.cabin-categories.edit', compact('cabinCategory', 'ships'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CabinCategoryUpdateRequest  $request
     * @param  CabinCategory  $cabinCategory
     *
     * @return RedirectResponse
     */
    public function update(CabinCategoryUpdateRequest $request, CabinCategory $cabinCategory): RedirectResponse
    {
        $validated = $request->validated();
        $validated['photos'] = json_decode($validated['photos'], true);

        $cabinCategory->update($validated);

        return redirect()
            ->route('cabin-categories.edit', $cabinCategory)
            ->withSuccess(__('Edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CabinCategory  $cabinCategory
     *
     * @return RedirectResponse
     */
    public function destroy(CabinCategory $cabinCategory): RedirectResponse
    {
        $cabinCategory->delete();

        return redirect()
            ->route('cabin-categories.index')
            ->withSuccess(__('Deleted'));
    }
}
