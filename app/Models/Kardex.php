<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    protected $fillable = [
        'asignacion_id',
        'estudiante_id',
        'periodo_id',
        'observacion',
        'nota',
        'fecha',
    ];
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
    public function asignacion()
    {
        return $this->belongsTo(Asignacion::class);
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}