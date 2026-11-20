<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
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
            'nombre' => 'required|string|max:50|min:3',
            'descripcion' => 'required|string|max:255|min:3',
            'estado' => 'required|string|max:255|min:3',

            ]);

            Categoria::create($validated);

        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([

            'nombre' => 'required|string|max:255|min:3',
            'descripcion' => 'required|string|max:255|min:3',
            'estado' => 'required|string|max:100|min:3',
            ],
            [

                'nombre.required' => 'El campo nombre es obligatorio',
                'descripcion.required' => 'El campo apellido es obligatorio',
                'estado.required' => 'El campo email es obligatorio',

            ]);

        $categoria->update($validated);



        return redirect()
        ->route('categorias.index')
        ->with('sucess','Categoria actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with ('success', 'Categoria Eliminado');
    }
}
