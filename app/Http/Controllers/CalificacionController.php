<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Calificacion;
use App\Models\DetalleCalificacion;
use App\Models\Estudiante;
use App\Models\Matriculacion;
use App\Models\Periodo;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rol = Auth::user()->roles->pluck('name')->implode(', ');
        $id_usuario = Auth::user()->id;

        if(($rol == 'ADMINISTRADOR') || ($rol == 'DIRECTOR/A GENERAL') || ($rol == 'DIRECTOR/A ACADÉMICO') || ($rol == 'SECRETARIO/A') || ($rol == 'REGENTE')){
            $asignaciones = Asignacion::all();
            return view('admin.calificaciones.index',compact('asignaciones'));
        }

        if($rol == 'DOCENTE'){
            $docente = Personal::where('usuario_id',$id_usuario)->first();
            $asignaciones = Asignacion::where('personal_id',$docente->id)->get();
            return view('admin.calificaciones.index_docente',compact('docente','asignaciones'));
        }

        if($rol == 'ESTUDIANTE'){
            $estudiante = Estudiante::where('usuario_id', $id_usuario)->first();
            $matriculas = Matriculacion::where('estudiante_id', $estudiante->id)->get();

            $asignaciones = collect();

            foreach($matriculas as $matricula){
                $datos = Asignacion::with('personal','materia')
                    ->where('turno_id',$matricula->turno_id)
                    ->where('gestion_id', $matricula->gestion_id)
                    ->where('nivel_id', $matricula->nivel_id)
                    ->where('grado_id', $matricula->grado_id)
                    ->where('paralelo_id', $matricula->paralelo_id)
                    ->get();
                    $asignaciones = $asignaciones->merge($datos);
            }

            return view('admin.calificaciones.index_estudiante',compact('estudiante','matriculas','asignaciones'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $asignacion = Asignacion::findOrFail($id);
        $docente = Personal::where('usuario_id', Auth::user()->id)->first();
        $periodos = Periodo::where('gestion_id', $asignacion->gestion_id)
            ->orderBy('id')
            ->get(); 
        $matriculados = Matriculacion::with('estudiante')
        ->where('turno_id',$asignacion->turno_id)
        ->where('gestion_id',$asignacion->gestion_id)
        ->where('nivel_id',$asignacion->nivel_id)
        ->where('grado_id',$asignacion->grado_id)
        ->where('paralelo_id',$asignacion->paralelo_id)
        ->get()
        ->sortBy('estudiante.apellidos');

        $calificaciones = Calificacion::with('detalleCalificaciones')
            ->where('asignacion_id', $asignacion->id)
            ->get();

        return view('admin.calificaciones.create', compact('asignacion', 'docente', 'periodos', 'matriculados', 'calificaciones'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'asignacion_id' => 'required',
            'periodo_id' => 'required',
            'tipo' => 'required',
            'fecha' => 'required',
            'nota' => 'required',
        ]);
        $calificacion = new Calificacion();
        $calificacion->asignacion_id = $request->asignacion_id;
        $calificacion->periodo_id = $request->periodo_id;
        $calificacion->tipo = $request->tipo;
        $calificacion->fecha = $request->fecha;
        $calificacion->descripcion = $request->descripcion;
        $calificacion->save();

        foreach($request->nota as $estudiante_id => $nota){
            DetalleCalificacion::create([
                'calificacion_id' => $calificacion->id,
                'estudiante_id' => $estudiante_id,
                'nota' => $nota,
            ]);
        }
        return redirect()->back()
                ->with('mensaje', 'Se Registro la Calificación Correctamente')
                ->with('icono', 'success');

    }

    public function show_admin($id)
    {
        $asignacion = Asignacion::find($id);
        $docente = Personal::where('usuario_id', $asignacion->personal_id)->first();
        $periodos = Periodo::where('gestion_id', $asignacion->gestion_id)
            ->orderBy('id')
            ->get();

        $calificacionPorPeriodo = [];
        foreach ($periodos as $periodo) {
            $calificaciones = Calificacion::with('detalleCalificaciones')
                ->where('asignacion_id', $asignacion->id)
                ->where('periodo_id', $periodo->id)
                ->get();
            $calificacionPorPeriodo[] = [
                'periodo' => $periodo,
                'calificaciones' => $calificaciones,
            ];
        }
        $calificaciones = Calificacion::with('detalleCalificaciones')
            ->where('asignacion_id', $asignacion->id)
            ->get();
        $matriculados = Matriculacion::with('estudiante')
            ->where('turno_id', $asignacion->turno_id)
            ->where('gestion_id', $asignacion->gestion_id)
            ->where('nivel_id', $asignacion->nivel_id)
            ->where('grado_id', $asignacion->grado_id)
            ->where('paralelo_id', $asignacion->paralelo_id)
            ->get()
            ->sortBy('estudiante.apellidos');

        return view('admin.calificaciones.show_admin', compact('asignacion', 'docente', 'periodos','calificacionPorPeriodo','calificaciones', 'matriculados'));
    }

    public function show_estudiante($id_asignacion, $id_estudiante)
    {
        $asignacion = Asignacion::find($id_asignacion);
        $estudiante = Estudiante::find($id_estudiante);
        $periodos = Periodo::where('gestion_id', $asignacion->gestion_id)
            ->orderBy('id')
            ->get();

        $calificaciones = Calificacion::with(['asignacion.personal', 'detalleCalificaciones'=> function($query) use ($id_estudiante) {
            $query->where('estudiante_id', $id_estudiante);
        }])
        ->where('asignacion_id', $asignacion->id)
        ->orderBy('periodo_id')
        ->get();
        

        return view('admin.calificaciones.show_estudiante', compact('asignacion', 'estudiante','calificaciones'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Calificacion $calificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calificacion $calificacion)
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
            'asignacion_id' => 'required',
            'periodo_id' => 'required',
            'tipo' => 'required',
            'fecha' => 'required',
            'nota' => 'required',
        ]);
        $calificacion = Calificacion::find($id);
        $calificacion->asignacion_id = $request->asignacion_id;
        $calificacion->periodo_id = $request->periodo_id;
        $calificacion->tipo = $request->tipo;
        $calificacion->fecha = $request->fecha;
        $calificacion->descripcion = $request->descripcion;
        $calificacion->save();

        foreach($request->nota as $estudiante_id => $nota){
            DetalleCalificacion::updateOrCreate(
                [
                    'calificacion_id' => $calificacion->id,
                    'estudiante_id' => $estudiante_id,
                ],
                [
                    'nota' => $nota
                ]);
            
        }
        return redirect()->back()
                ->with('mensaje', 'Se Actualizó las Calificaciones Correctamente')
                ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $calificacion = Calificacion::find($id);
        $calificacion->delete();

        return redirect()->back()
                ->with('mensaje', 'Se Eliminó la Calificación Correctamente')
                ->with('icono', 'success');
    }
}
