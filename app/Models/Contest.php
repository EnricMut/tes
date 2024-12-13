<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'contest';

    // Definir qué columnas pueden ser asignadas masivamente
    protected $fillable = ['title', 'dateStart', 'dateEnd', 'numCategories'];

    // Deshabilitar los timestamps automáticos, ya que no se usan
    public $timestamps = false;

    // Especificar que el campo de la clave primaria no es 'id' sino 'idContest'
    protected $primaryKey = 'idContest';

    // Especificar el tipo de la clave primaria (si no es un entero)
    protected $keyType = 'int';
}
