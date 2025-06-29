<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personals';
    protected $fillable = [
        'usuario_id',
        'tipo',
        'nombres',
        'apellidos',
        'ci',
        'fecha_nacimiento',
        'direccion',
        'telefono',
        'profesion'
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
    public function formaciones()
    {
        return $this->hasMany(Formacion::class);
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }
}
