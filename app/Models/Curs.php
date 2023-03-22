<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curs extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    public $timestamps = false;

    public function cicle() {
        return $this->belongsTo(Cicle::class, 'cicles_id');
    }

    public function moduls() {
        return $this->belongsToMany(Modul::class, 'moduls_has_cursos', 'moduls_id', 'cursos_id');
    }
}
