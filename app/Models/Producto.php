<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'id_talla', 'id_marca', 'cantidad', 'observacion', 'fecha_embarque'
    ];

    public function talla()
    {
        return $this->belongsTo(Talla::class, 'id_talla', 'id');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca', 'id');
    }
}
