<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();

        return view('productos.index', compact('productos'));
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
            'categoria_id' => 'required|string|max:50|min:1',
            'codigo' => 'required|string|max:50|min:3',
            'nombre' => 'required|string|max:255|min:3',
            'descripcion' => 'required|string|max:255|min:3',
            'precio' => 'required|string|max:255|min:1',
            'stock' => 'required|string|max:1000|min:1',
            'estado' => 'required|string|max:25|min:3',


            ]);

            Producto::create($validated);

        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'categoria_id' => 'required|string|max:50|min:1',
            'codigo' => 'required|string|max:50|min:3',
            'nombre' => 'required|string|max:255|min:3',
            'descripcion' => 'required|string|max:255|min:3',
            'precio' => 'required|string|max:255|min:1',
            'stock' => 'required|string|max:1000|min:1',
            'estado' => 'required|string|max:25|min:3',

            ],
            [
                'categoria_id.required' => 'El campo id bodega es obligatorio',
                'codigo.required' => 'El campo codigo bodega es obligatorio',
                'nombre.required' => 'El campo nombre es obligatorio',
                'descripcion.required' => 'El campo descripcion es obligatorio',
                'precio.required' => 'El campo precio es obligatorio',
                'stock.required' => 'El campo stock es obligatorio',
                'estado.required' => 'El campo estado es obligatorio',

            ]);

        $producto->update($validated);



        return redirect()
        ->route('productos.index')
        ->with('sucess','Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $producto = Producto::findorFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto Eliminado');
    }
}
