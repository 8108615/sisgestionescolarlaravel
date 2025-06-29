<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Materia;
use App\Models\Matriculacion;
use App\Models\Nivel;
use App\Models\Pago;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Personal;
use App\Models\Ppff;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $total_gestiones = Gestion::count();
        $total_periodos = Periodo::count();
        $total_niveles = Nivel::count();
        $total_grados = Grado::count();
        $total_paralelos = Paralelo::count();
        $total_turnos = Turno::count();
        $total_materias = Materia::count();
        $total_roles = Role::count();
        $total_ppffs = Ppff::count();
        $total_estudiantes = Estudiante::count();

        $gestiones = Gestion::all();
        $matriculasPorGestiones = Matriculacion::select(DB::raw('COUNT(*) as total_matriculas'), 'gestion_id')
            ->groupBy('gestion_id')
            ->get();
        
        $gestionesArray = $gestiones->pluck('nombre')->toArray();
        $datosMatriculados = $matriculasPorGestiones->pluck('total_matriculas')->toArray();
        
        $total_personal_administrativo = Personal::where('tipo', 'administrativo')->count();
        $total_personal_docente = Personal::where('tipo', 'docente')->count();

        //obtener los pagos por mes
        $pagos = Pago::selectRaw('YEAR(fecha_pago) as year, MONTH(fecha_pago) as month, SUM(monto) as total_pago')
            ->groupBy(DB::raw('YEAR(fecha_pago), MONTH(fecha_pago)'))
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $mesesEnEspañol = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
                           'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        $meses = [];
        $montos = [];
        foreach ($pagos as $pago) {
            $meses[] = $mesesEnEspañol[$pago->month - 1];
            $montos[] = $pago->total_pago;
        }

        return view('admin.index',compact('total_gestiones','total_periodos',
                                           'total_niveles','total_grados',
                                           'total_paralelos','total_turnos',
                                           'total_materias','total_roles',
                                           'total_personal_administrativo','total_personal_docente',
                                           'total_estudiantes','total_ppffs','gestionesArray','datosMatriculados',
                                           'pagos','meses','montos'));
                                           
    }
}
