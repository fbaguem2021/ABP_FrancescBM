<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    public $timestamps = false;

    public function cursos() {
        return $this->belongsToMany(Curs::class, 'moduls_has_cursos', 'cursos_id', 'moduls_id');
    }
}
