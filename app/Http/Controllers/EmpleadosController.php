<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $empleados = Empleados::with('cargo')->paginate(10);
        return response()->json($empleados ->items(), 200);
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
        //
        $datos = $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'fecha_nacimiento' => 'required|date',
        'fecha_ingreso' => 'required|date',
        'salario' => 'required|numeric',
        'estado' => 'required|string',
        'cargo_id' => 'required|exists:cargos,id',
    ], [
        'nombre.required' => 'El nombre es obligatorio',
        'apellido.required' => 'El apellido es obligatorio',
        'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
        'fecha_ingreso.required' => 'La fecha de ingreso es obligatoria',
        'salario.required' => 'El salario es obligatorio',
        'cargo_id.required' => 'El cargo es obligatorio',
        'cargo_id.exists' => 'El cargo seleccionado no existe',
    ]);

    $empleado = Empleados::create($datos);

        return response()->json([
            'message' => 'Empleado creado',
            'data' => $empleado
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $empleados = Empleados::with('cargo')->find($id);
        if(!$empleados){
            return response()->json([
                'message' => 'Empleado no encontrado'
            ]);
        }
        Return response()->json($empleados, 200);
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
    public function update(Request $request, $id)
    {
        //
        $empleados= Empleados::find($id);
        if(!$empleados){
            return response()->json([
                'message' => 'Empleado no encontrado'
            ], 404);
        }
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'fecha_ingreso' => 'required|date',
            'salario' => 'required|numeric',
            'estado' => 'required|string',
            'cargo_id' => 'required|exists:cargos,id',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'apellido.required' => 'El apellido es obligatorio',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
            'fecha_ingreso.required' => 'La fecha de ingreso es obligatoria',
            'salario.required' => 'El salario es obligatorio',
            'cargo_id.required' => 'El cargo es obligatorio',
            'cargo_id.exists' => 'El cargo seleccionado no existe',
        ]);

        $empleados->update($datos);
        return response()->json([
            'message' => 'Empleado actualizado',
            'data' => $empleados
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $empleados= Empleados::find($id);  
        if(!$empleados){
            return response()->json([
                'message' => 'Empleado no encontrado'
            ], 404);
        }

        $empleados->delete();  

        return response()->json([
            'message' => 'Empleado eliminado'
        ], 200);
    }
}
