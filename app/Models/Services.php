<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return "slug";
    }

    const EMPRESARIAL = 1;
    const INDEPENDIENTE = 2;
    const PROFESIONAL = 3;

    protected $fillable = ['titulo', 'descripcion_corta', 'descripcion_larga', 'slug', 'descuento', 'planes', 'precio_tachado', 'precio'];
}
