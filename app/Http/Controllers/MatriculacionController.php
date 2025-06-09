<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Estudiante;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Matriculacion;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Turno;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class MatriculacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculaciones = Matriculacion::with('estudiante','turno','gestion','nivel','grado','paralelo')->get();
        return view('admin.matriculaciones.index',compact('matriculaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $turnos = Turno::all();
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $grados = Grado::all();
        $paralelos = Paralelo::all();
        $estudiantes = Estudiante::all();
        return view('admin.matriculaciones.create',compact('estudiantes','turnos','gestiones','niveles','grados','paralelos'));
    }

    /**
     * Store a newly created resource in storage.
     */

    
    public function buscar_estudiante($id){

        $estudiante = Estudiante::with('usuario','matriculaciones.turno','matriculaciones.gestion','matriculaciones.nivel','matriculaciones.grado','matriculaciones.paralelo')->find($id);

        if(!$estudiante){
            return response()->json(['error','Estudiante No Encontrado']);
        }
        $estudiante->foto_url = url($estudiante->foto);

        return response()->json($estudiante);
    }

    public function buscar_grados($id){

        $grados = Grado::where('nivel_id',$id)->pluck('nombre','id');

        if(!$grados){
            return response()->json(['error','Grados No Encontrados']);
        }

        return response()->json($grados);
    }

    public function buscar_paralelos($id){

        $paralelos = Paralelo::where('grado_id',$id)->pluck('nombre','id');

        if(!$paralelos){
            return response()->json(['error','Paralelos No Encontrados']);
        }

        return response()->json($paralelos);
    }


    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'estudiante_id' => 'required',
            'turno_id' => 'required',
            'gestion_id' => 'required',
            'nivel_id' => 'required',
            'grado_id' => 'required',
            'paralelo_id' => 'required',
            'fecha_matriculacion' => 'required',
        ]);

        //validacion para estudiantes ya matriculado
        $estudiante_duplicado = Matriculacion::where('estudiante_id',$request->estudiante_id)
        ->where('turno_id',$request->turno_id)
        ->where('gestion_id',$request->gestion_id)
        ->where('nivel_id',$request->nivel_id)
        ->where('grado_id',$request->grado_id)
        ->where('paralelo_id',$request->paralelo_id)
        ->exists();

        if($estudiante_duplicado){
            return redirect()->back()->with([
                'mensaje' => 'El Estudiante Ya esta Matriculado',
                'icono' => 'error',
            ]);
        }

        $matriculacion = new Matriculacion();
        $matriculacion->estudiante_id = $request->estudiante_id;
        $matriculacion->turno_id = $request->turno_id;
        $matriculacion->gestion_id = $request->gestion_id;
        $matriculacion->nivel_id = $request->nivel_id;
        $matriculacion->grado_id = $request->grado_id;
        $matriculacion->paralelo_id = $request->paralelo_id;
        $matriculacion->fecha_matriculacion = $request->fecha_matriculacion;
        $matriculacion->save();

        return redirect()->route('admin.matriculaciones.index')
        ->with('mensaje', 'El Matriculacion se ha Creado Correctamente')
        ->with('icono', 'success');
    }

    public function pdf_matricula($id){
        $configuracion = Configuracion::first();
        $matricula = Matriculacion::with('estudiante.ppff','turno','gestion','nivel','grado','paralelo')->find($id);

        $pdf = PDF::loadView('admin.matriculaciones.pdf',compact('configuracion','matricula'));
        $pdf->setPaper('letter','protrait');
        $pdf->setOption(['defaultFont' => 'sans-serif']);
        $pdf->setOption(['isHtml5ParserEnabled' => true]);
        $pdf->setOption(['isRemoteEnabled' => true]);
        return $pdf->stream('matriculas.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

        $matricula = Matriculacion::with('estudiante.ppff','turno','gestion','nivel','grado','paralelo')->find($id);
        return view('admin.matriculaciones.show',compact('matricula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matriculacion $matriculacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matriculacion $matriculacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matriculacion $matriculacion)
    {
        //
    }
}
