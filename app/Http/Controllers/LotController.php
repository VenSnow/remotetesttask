<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Http\Requests\StoreLotRequest;
use App\Http\Requests\UpdateLotRequest;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $lots = Lot::latest()->with('categories')->paginate(15);
        return view('lot.index', compact('lots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('lot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLotRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreLotRequest $request)
    {
        $lot = Lot::create($request->validated());
        $lot->categories()->attach($request->category);
        return redirect()->route('crud.lot.index')->with('success', __('lot.lot_success_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Lot $lot)
    {
        return view('lot.edit', compact('lot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLotRequest  $request
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateLotRequest $request, Lot $lot)
    {
        $lot->updateOrFail($request->validated());
        $lot->categories()->attach($request->categories);
        return redirect()->route('crud.lot.index')->with('success', __('lot.lot_success_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Lot $lot)
    {
        $lot->deleteOrFail($lot);
        return redirect()->route('crud.lot.index')->with('success', __('lot.lot_success_deleted'));
    }
}
