<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_producto',
        'descripcion_producto',
        'fecha_producto',
        'category_id',
    ];

    // Casteamos la fecha para que sea una instancia de Carbon automáticamente
    protected $casts = [
        'fecha_producto' => 'date',
    ];

    // Relación: Un producto pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
