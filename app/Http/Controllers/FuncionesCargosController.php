<?php

namespace App\Http\Controllers;

use App\Models\FuncionesCargos;
use App\Models\Cargos;
use Illuminate\Http\Request;

class FuncionesCargosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $funcionesCargos = FuncionesCargos::with('cargo')->paginate(10);
        return response()->json($funcionesCargos->items(), 200);
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
            'descripcion_funcion' => 'required|string|max:255',
            'estado' => 'required|in:activo,inactivo',
            'cargo_id' => 'required|exists:cargos,id',
        ],[
            'cargo_id.required' => 'El cargo es obligatorio',
            'cargo_id.exists' => 'El cargo seleccionado no existe',
        ]);

        $funcionCargo = FuncionesCargos::create($datos);
        return response()->json([
            'message' => 'Función de cargo creada',
            'data' => $funcionCargo
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $funcionesCargos = FuncionesCargos::with('cargo')->find($id);
        if(!$funcionesCargos){
            return response()->json([
                'message' => 'Función de cargo no encontrada'
            ], 404);
        }
        Return response()->json($funcionesCargos, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FuncionesCargos $funcionesCargos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FuncionesCargos $funcionesCargos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $funcionesCargos= FuncionesCargos::find($id);  
        if(!$funcionesCargos){
            return response()->json([
                'message' => 'Función de cargo no encontrada'
            ], 404);
        }

        $funcionesCargos->delete();  

        return response()->json([
            'message' => 'Función de cargo eliminada'
        ], 200);
    }
}
