<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function penduduk()
    {
        $data['penduduks'] = Penduduk::get();
        return view('penduduk.penduduk')->with($data);
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
    // public function store(StorePendudukRequest $request)
    // {
    //     Penduduk::create($request->all());
    //     return redirect('penduduk')->with('success', 'Data Berhasil disimpan');
    // }

    public function store(StorePendudukRequest $request)
    {
        // Hash password before saving
        $requestData = $request->validated();
        $requestData['password'] = Hash::make($request->password);
        
        Log::info('Hashed Password: ' . $requestData['password']); // Logging hashed password
    
        Penduduk::create($requestData);
        return redirect('penduduk')->with('success', 'Data Berhasil disimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(penduduk $penduduk)
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
    // public function update(UpdatePendudukRequest $request, penduduk $penduduk)
    // {
    //     $penduduk->update($request->all());
    //     return redirect('penduduk')->with('success', 'Update Data Penduduk berhasil');
    // }

    public function update(UpdatePendudukRequest $request, penduduk $penduduk)
    {
        // Hash password before updating
        $requestData = $request->validated();
        if ($request->filled('password')) {
            $requestData['password'] = Hash::make($request->password);
        } else {
            unset($requestData['password']);
        }

        $penduduk->update($requestData);
        return redirect('penduduk')->with('success', 'Update Data Penduduk berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penduduk $penduduk)
    {
        $penduduk->delete();
        return redirect('penduduk')->with('success', 'Delete Data Penduduk Berhasil');
    }
}
