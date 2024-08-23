<?php

namespace App\Http\Controllers;

use App\Models\perjalanan;
use App\Http\Requests\StorePerjalananRequest;
use App\Http\Requests\UpdatePerjalananRequest;

class PerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function perjalanan()
    {
        $data['perjalanans'] = Perjalanan::get();
        return view('perjalanan.perjalanan')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerjalananRequest $request)
    {
        Perjalanan::create($request->all());
        return redirect('perjalanan')->with('success', 'Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(perjalanan $perjalanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(perjalanan $perjalanan)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerjalananRequest $request, perjalanan $perjalanan)
    {
        $perjalanan->update($request->all());
        return redirect('perjalanan')->with('success', 'Update data perjalanan berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(perjalanan $perjalanan)
    {
        $perjalanan->delete();
        return redirect('perjalanan')->with('success', 'Delete Data Perjalanan Berhasil');
    }
}