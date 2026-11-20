<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleados::all();
        return view('empleados.index', compact('empleados'));
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
            'codigo_empleado' => 'required|string|max:255|min:3',
            'nombre' => 'required|string|max:255|min:3',
            'apellido' => 'required|string|max:255|min:3',
            'email' => 'required|string|max:255|min:3',
            'cargo' => 'required|string|max:200|min:3',
            'fecha_contratacion' => 'required|string|max:255|min:3',
            'estado' => 'required|string|max:255|min:3',

        ]);

        Empleados::create($validated);

        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleados $empleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleados $empleados)
    {
        $validated = $request->validate([
            'codigo_empleado' => 'required|string|max:255|min:3',
            'nombre' => 'required|string|max:255|min:3',
            'apellido' => 'required|string|max:255|min:3',
            'email' => 'required|string|max:255|min:3',
            'cargo' => 'required|string|max:200|min:3',
            'fecha_contratacion' => 'required|string|max:255|min:3',
            'estado' => 'required|string|max:255|min:3',

        ],
        [
            'codigo_empleado.required' => 'El campo codigo empleado es obligatorio',
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellido.required' => 'El campo apellido es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'cargo.required' => 'El campo cargo es obligatorio',
            'fecha_contratacion.required' => 'El campo fecha es obligatorio',
            'estado.required' => 'El campo estado es obligatorio',
        ]);

        $empleados->update($validated);



        return redirect()
        ->route('empleados.index')
        ->with('sucess','Empleado actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $empleados = Empleados::findorFail($id);
        $empleados->delete();

        return redirect()->route('empleados.index')->with ('success', 'Empleados Eliminado');
    }
}
