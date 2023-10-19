<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    
    protected $table = 'series';
    protected $fillable = ['titulo','descripcion','fecha_estreno','estrellas','genero','precio_alquiler','ATP','estado'];
    protected $hidden = ['create_at','update_at'];
    use HasFactory;

    public function apta(){
        if ($this->ATP=true) {
            return "Si";
        } else {
            return "No";
        }
    }
}
