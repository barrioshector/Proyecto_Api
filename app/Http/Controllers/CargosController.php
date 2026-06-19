<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cargos = Cargos::paginate(10);
        return response()->json($cargos->items(), 200);
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
            'nombre_cargo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ], [
            'nombre_cargo.required' => 'El nombre del cargo es obligatorio',
            
        ]);

        
        $cargos = Cargos::create($datos);
        return response() ->json([
            'message' => 'Cargo creado correctamente',
            'data' => $cargos
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $cargos = Cargos::find($id);
        if(!$cargos){
            return response()->json([
                'message' => 'Cargo no encontrado'
            ], 404);
        }
        Return response()->json($cargos, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cargos $cargos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $cargos = Cargos::find($id); 
        if(!$cargos){
            return response() ->json([
                'message' => 'Cargo no encontrado'
            ], 404);
        }
        $datos = $request->validate([
            'nombre_cargo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ], [
            'nombre_cargo.required' => 'El nombre del cargo es obligatorio',
        ]);
        $cargos->update($datos);
        if($cargos){
            return response()->json([
                'message' => 'Cargo actualizado',
                'data' => $cargos
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $cargos = Cargos::find($id);
        if(!$cargos){
            return response()->json([
                'message' => 'Cargo no encontrado'
            ], 404);
        }
        $cargos->delete();
        return response()->json([
            'message' => 'Cargo eliminado'
        ], 200);
    }
}
