<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'genero', 'id');
    }
}
