<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $jsonData = file_get_contents('https://api.hilariweb.com/divisas');
        $divisas = json_decode($jsonData,true);
        $configuracion = Configuracion::first();
        return view('admin.configuracion.index', compact('configuracion', 'divisas'));
    }

    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'divisa' => 'required',
            'correo_electronico' => 'required|email',
            'logo' => 'image|mimes:jpeg,png,jpg',
        ]);

        //BUSCAR SI EXISTE LA CONFIGURACION
        $configuracion = Configuracion::first();
        //Actualizar
        if($configuracion) {
            $configuracion->nombre = $request->nombre;
            $configuracion->descripcion = $request->descripcion;
            $configuracion->direccion = $request->direccion;
            $configuracion->telefono = $request->telefono;
            $configuracion->divisa = $request->divisa;
            $configuracion->web = $request->web;
            $configuracion->correo_electronico = $request->correo_electronico;
            
            if($request->hasFile('logo')){
                //Eliminar la Anterior
                if($configuracion->foto && file_exists(public_path($configuracion->foto))) {
                unlink(public_path($configuracion->foto));
                }
                //Guardar Nuevo Logo
                $logoPath = $request->file('logo');
                $nombreArchivo = time() . '_' .$logoPath->getClientOriginalName();
                $rutaDestino = public_path('uploads/logos');
                $logoPath->move($rutaDestino, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/'. $nombreArchivo;
                
            }
            $configuracion->save();
            return redirect()->route('admin.configuracion.index')
            ->with('mensaje', 'Configuracion Actualizada Correctamente')
            ->with('icono', 'success');
        }else {
            //Crear Nueva Configuracion
                $configuracion = new Configuracion();
                $configuracion->nombre = $request->nombre;
                $configuracion->descripcion = $request->descripcion;
                $configuracion->direccion = $request->direccion;
                $configuracion->telefono = $request->telefono;
                $configuracion->divisa = $request->divisa;
                $configuracion->web = $request->web;
                $configuracion->correo_electronico = $request->correo_electronico;

                if($request->hasFile('logo')){
                    //Guardar Nuevo Logo
                    $logoPath = $request->file('logo');
                    $nombreArchivo = time() . '_' .$logoPath->getClientOriginalName();
                    $rutaDestino = public_path('uploads/logos');
                    $logoPath->move($rutaDestino, $nombreArchivo);
                    $configuracion->logo = 'uploads/logos/'. $nombreArchivo;
                }
                $configuracion->save();
                return redirect()->route('admin.configuracion.index')
                ->with('mensaje', 'Configuracion Creada Correctamente')
                ->with('icono', 'success');
            } 
    
    }
}
