<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentista extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'fecha_nacimiento',
        'consultorio',
        'direccion',
        'celular',
        'email',
        'password',
    ];
}
