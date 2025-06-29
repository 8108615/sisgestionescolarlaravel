<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Calificacion;
use App\Models\Estudiante;
use App\Models\Kardex;
use App\Models\Matriculacion;
use App\Models\Periodo;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KardexController extends Controller
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
            return view('admin.kardexs.index',compact('asignaciones'));
        }

        if($rol == 'DOCENTE'){
            $docente = Personal::where('usuario_id',$id_usuario)->first();
            $asignaciones = Asignacion::where('personal_id',$docente->id)->get();
            return view('admin.kardexs.index_docente',compact('docente','asignaciones'));
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

            return view('admin.kardexs.index_estudiante',compact('estudiante','matriculas','asignaciones'));
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

        $kardexs = Kardex::where('asignacion_id', $asignacion->id)->get();

        return view('admin.kardexs.create', compact('asignacion', 'docente', 'periodos', 'matriculados', 'kardexs'));
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
            'estudiante_id' => 'required',
            'periodo_id' => 'required',
            'observacion' => 'required',
            'fecha' => 'required',
        ]);
        $kardex = new Kardex();
        $kardex->asignacion_id = $request->asignacion_id;
        $kardex->estudiante_id = $request->estudiante_id;
        $kardex->periodo_id = $request->periodo_id;
        $kardex->observacion = $request->observacion;
        $kardex->nota = $request->nota;
        $kardex->fecha = $request->fecha;
        $kardex->save();

        return redirect()->back()
            ->with('mensaje', 'El Reporte se Registro Correctamente.')
            ->with('icono','success');
    }

    public function show_admin($id){
        $asignacion = Asignacion::find($id);
        $kardexs = Kardex::where('asignacion_id', $asignacion->id)
            ->with('estudiante', 'periodo')
            ->get()
            ->sortBy('estudiante.apellidos');
            
        return view('admin.kardexs.show_admin', compact('asignacion', 'kardexs'));
    }

    public function show_estudiante($id_asignacion, $id_estudiante)
    {
        $asignacion = Asignacion::find($id_asignacion);
        $estudiante = Estudiante::find($id_estudiante);
        $kardexs = Kardex::where('asignacion_id', $asignacion->id)
            ->where('estudiante_id', $estudiante->id)
            ->get();

        return view('admin.kardexs.show_estudiante', compact('asignacion', 'estudiante', 'kardexs'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Kardex $kardex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kardex $kardex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'asignacion_id' => 'required',
            'estudiante_id' => 'required',
            'periodo_id' => 'required',
            'observacion' => 'required',
            'fecha' => 'required',
        ]);
        $kardex = Kardex::find($id);
        $kardex->asignacion_id = $request->asignacion_id;
        $kardex->estudiante_id = $request->estudiante_id;
        $kardex->periodo_id = $request->periodo_id;
        $kardex->observacion = $request->observacion;
        $kardex->nota = $request->nota;
        $kardex->fecha = $request->fecha;
        $kardex->save();

        return redirect()->back()
            ->with('mensaje', 'El Reporte se Actualizo Correctamente.')
            ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kardex = Kardex::find($id);
        $kardex->delete();

        return redirect()->back()
            ->with('mensaje', 'El Reporte se Elimino Correctamente.')
            ->with('icono','success');
    }
}
