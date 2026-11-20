<?php

namespace App\Http\Controllers;

use App\Models\Pedios;
use Illuminate\Http\Request;

class PediosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedios::all();

        return view('pedidos.index', compact('pedidos'));

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
            'cliente_id' => 'required|string|max:50|min:1',
            'empleado_id' => 'required|string|max:50|min:1',
            'numero_pedido' => 'required|string|max:255|min:3',
            'fecha_pedido' => 'required|string|max:255|min:3',
            'fecha_entrega' => 'required|string|max:255|min:3',
            'total' => 'required|string|max:1000|min:1',
            'estado' => 'required|string|max:25|min:3',
            'observaciones' => 'required|string|max:25|min:3',


            ]);

            Pedios::create($validated);

        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedios $pedios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedios $pedios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedios $pedios)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|string|max:50|min:1',
            'empleado_id' => 'required|string|max:50|min:1',
            'numero_pedido' => 'required|string|max:255|min:3',
            'fecha_pedido' => 'required|string|max:255|min:3',
            'fecha_entrega' => 'required|string|max:255|min:3',
            'total' => 'required|string|max:1000|min:1',
            'estado' => 'required|string|max:25|min:3',
            'observaciones' => 'required|string|max:25|min:3',


            ],
            [
                'cliente_id.required' => 'El campo id cliente es obligatorio',
                'empleado_id.required' => 'El campo id empleado es obligatorio',
                'numero_pedido.required' => 'El campo numero pedido es obligatorio',
                'fecha_pedido.required' => 'El campo fecha pedido es obligatorio',
                'fecha_entrega.required' => 'El campo fecha entrega es obligatorio',
                'total.required' => 'El campo total es obligatorio',
                'estado.required' => 'El campo estado es obligatorio',
                'observaciones.required' => 'El campo observaciones es obligatorio',

            ]);

            $pedios->update($validated);



        return redirect()
        ->route('pedidos.index')
        ->with('sucess','Pedido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $pedios = Pedios::findorFail($id);
        $pedios->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido Eliminado');
    }
}
