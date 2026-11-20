<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$clientes = Clientes::all();
        // dd($clientes);

        //$clientes=Clientes::withoutTrashed()->get();
        //return view('clientes.index', compact('clientes'));

        //$clientes = Clientes:: whereIn('id',[6,4,5])->get();
        //$clientes = Clientes:: wherenotIn('id',[6,4,5])->get();
        //$clientes = Clientes :: wheredate('created_at','>=','2026-10-27');

        $clientes = Clientes::all();
        $clientes_count = Clientes::exists();
        //$clientes_count = Clientes::all()->count();

        return view('clientes.index',compact(['clientes','clientes_count']));

        dd($clientes);

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
            'codigo_cliente' => 'required|string|max:50|min:3',
            'nombre' => 'required|string|max:255|min:3',
            'apellido' => 'required|string|max:255|min:3',
            'email' => 'required|string|max:255|min:3',
            'telefono' => 'required|string|max:20|min:3',
            'direccion' => 'required|string|max:255|min:3',
            'estado' => 'required|string|max:100|min:3',
            ],
            [
                'codigo_cliente.required' => 'El campo codigo cliente es obligatorio',
                'codigo_cliente.max' => 'El limite de caracteres maximo es 50',
                'codigo_cliente.min' => 'El limite de caracteres minimo es 3',

                'nombre.required' => 'El campo nombre es obligatorio',
                'nombre.max' => 'El limite de caracteres maximo es 255',
                'nombre.min' => 'El limite de caracteres minimo es 3',

                'apellido.required' => 'El campo apellido es obligatorio',
                'apellido.max' => 'El limite de caracteres maximo es 255',
                'apellido.min' => 'El limite de caracteres minimo es 3',

                'email.required' => 'El campo email es obligatorio',
                'email.max' => 'El limite de caracteres maximo es 255',
                'email.min' => 'El limite de caracteres minimo es 3',

                'telefono.required' => 'El campo telefono es obligatorio',
                'telefono.max' => 'El limite de caracteres maximo es 20',
                'telefono.min' => 'El limite de caracteres minimo es 3',

                'direccion.required' => 'El campo direccion es obligatorio',
                'direccion.max' => 'El limite de caracteres maximo es 255',
                'direccion.min' => 'El limite de caracteres minimo es 3',

                'estado.required' => 'El campo estado es obligatorio',
                'estado.max' => 'El limite de caracteres maximo es 100',
                'estado.min' => 'El limite de caracteres minimo es 3',
            ]);

            Clientes::create($validated);

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clientes $clientes)
    {
         $validated = $request->validate([
            'codigo_cliente' => 'required|string|max:50|min:3',
            'nombre' => 'required|string|max:255|min:3',
            'apellido' => 'required|string|max:255|min:3',
            'email' => 'required|string|max:255|min:3',
            'telefono' => 'required|string|max:20|min:3',
            'direccion' => 'required|string|max:255|min:3',
            'estado' => 'required|string|max:100|min:3',
            ],
            [
                'codigo_cliente.required' => 'El campo codigo cliente es obligatorio',
                'nombre.required' => 'El campo nombre es obligatorio',
                'apellido.required' => 'El campo apellido es obligatorio',
                'email.required' => 'El campo email es obligatorio',
                'telefono.required' => 'El campo telefono es obligatorio',
                'direccion.required' => 'El campo direccion es obligatorio',
                'estado.required' => 'El campo estado es obligatorio',
            ]);

        $clientes->update($validated);



        return redirect()
        ->route('clientes.index')
        ->with('sucess','CLiente actualizado');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $cliente = Clientes::findorFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with ('success', 'Cliente Eliminado');
    }
}
