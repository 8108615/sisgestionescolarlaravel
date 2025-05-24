<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::all();
        return view('admin.materias.index', compact('materias'));
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
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombre_create' => 'required|string|max:255',
        ]);
        $materia = new Materia();
        $materia->nombre = $request->nombre_create;
        $materia->save();

        return redirect()->route('admin.materias.index')
        ->with('mensaje', 'La Materia se ha Creado Correctamente')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
        $materia = Materia::find($id);
        $materia->nombre = $request->nombre;
        $materia->save();

        return redirect()->route('admin.materias.index')
            ->with('mensaje', 'La Materia se ha Actualizado Correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $materia = Materia::find($id);
        $materia->delete();

        return redirect()->route('admin.materias.index')
            ->with('mensaje', 'La Materia se ha Eliminado Correctamente')
            ->with('icono', 'success');
    }
}
