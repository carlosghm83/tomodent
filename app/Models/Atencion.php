<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;
    // Definir el nombre de la tabla si no sigue la convención de Laravel
    protected $table = 'atenciones';
    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'dentista_id',
        'paciente_id',
        'fecha',
        'servicio_id',
        'precio',
        'puntos',
        'descuento',
    ];

    // Definir las relaciones con otros modelos
    public function dentista()
    {
        return $this->belongsTo(Dentista::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
