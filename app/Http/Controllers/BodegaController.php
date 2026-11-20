<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodegas = Bodega::all();
        return view('bodegas.index', compact('bodegas'));

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
    public function store(Request $request)
    {
         $validated = $request->validate([
            'codigo_bodega' => 'required|string|max:50|min:3',
            'nombre' => 'required|string|max:255|min:3',
            'descripcion' => 'required|string|max:255|min:3',

            ]);

            Bodega::create($validated);

        return redirect()->route('bodegas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bodega $bodega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bodega $bodega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bodega $bodega)
    {
        $validated = $request->validate([
            'codigo_bodega' => 'required|string|max:50|min:3',
            'nombre' => 'required|string|max:255|min:3',
            'descripcion' => 'required|string|max:255|min:3',

            ],
            [
                'codigo_bodega.required' => 'El campo codigo bodega es obligatorio',
                'nombre.required' => 'El campo nombre es obligatorio',
                'descripcion.required' => 'El campo descripcion es obligatorio',

            ]);

        $bodega->update($validated);



        return redirect()
        ->route('bodegas.index')
        ->with('sucess','Bodega actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $bodega = Bodega::findorFail($id);
        $bodega->delete();

        return redirect()->route('bodegas.index')->with('success', 'Bodega Eliminado');
}
}
