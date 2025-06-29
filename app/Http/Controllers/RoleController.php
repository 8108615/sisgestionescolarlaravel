<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = 'web';
        $role->save();
        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'El Rol se ha Creado Correctamente')
        ->with('icono', 'success');
    }

    public function permisos($id){
        $rol = Role::findOrFail($id);
        $permisos = Permission::all()->groupBy(function($permiso){
            if(stripos($permiso->name, 'configuracion') !== false){ return 'Configuracion del Sistema'; }
            if(stripos($permiso->name, 'gestiones') !== false){ return 'Gestiones'; }
            if(stripos($permiso->name, 'periodos') !== false){ return 'Periodos'; }
            if(stripos($permiso->name, 'niveles') !== false){ return 'Niveles'; }
            if(stripos($permiso->name, 'grados') !== false){ return 'Grados'; }
            if(stripos($permiso->name, 'paralelos') !== false){ return 'Paralelos'; }
            if(stripos($permiso->name, 'turnos') !== false){ return 'Turnos'; }
            if(stripos($permiso->name, 'materias') !== false){ return 'Materias'; }
            if(stripos($permiso->name, 'roles') !== false){ return 'Roles'; }
            if(stripos($permiso->name, 'personal') !== false){ return 'Personal Docente y Administrativos'; }
            if(stripos($permiso->name, 'formaciones') !== false){ return 'Formaciones del Personal'; }
            if(stripos($permiso->name, 'estudiantes') !== false){ return 'Estudiantes'; }
            if(stripos($permiso->name, 'ppffs') !== false){ return 'Padres de Familia'; }
            if(stripos($permiso->name, 'matriculaciones') !== false){ return 'Matriculaciones'; }
            if(stripos($permiso->name, 'turnos') !== false){ return 'Turnos'; }
            if(stripos($permiso->name, 'pagos') !== false){ return 'Pagos'; }
            if(stripos($permiso->name, 'asistencias') !== false){ return 'Asistencias'; }
            if(stripos($permiso->name, 'calificaciones') !== false){ return 'Calificaciones'; }
            if(stripos($permiso->name, 'kardexs') !== false){ return 'Kardexs'; }
            if(stripos($permiso->name, 'asignaciones') !== false){ return 'Asignaciones'; }
            
        });
        return view('admin.roles.permisos',compact('rol','permisos'));
    }

    public function update_permisos(Request $request, $id){
        //$datos = request()->all();
        //return response()->json($datos);
        $rol = Role::findOrFail($id);
        $rol->permissions()->sync($request->input('permisos'));

        return redirect()->route('admin.roles.index')
        ->with('mensaje','Los Permisos se han Actualizado Correctamente')
        ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rol = Role::findOrFail($id);
        return view('admin.roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
        ]);
        $rol = Role::findOrFail($id);
        $rol->name = $request->name;
        $rol->guard_name = 'web';
        $rol->save();
        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'El Rol se ha Actualizado Correctamente')
        ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rol = Role::findOrFail($id);
        $rol->delete();
        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'El Rol se ha Eliminado Correctamente')
        ->with('icono', 'success');
    }
}
