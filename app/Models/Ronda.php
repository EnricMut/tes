<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ronda extends Model
{
    use HasFactory;

    protected $fillable = ['categoria_id', 'nombre', 'fecha_inicio', 'fecha_fin'];

    protected $table = 'ronda';

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
