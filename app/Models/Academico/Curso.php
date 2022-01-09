<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $connection = 'mysql_crm';
    protected $table = 'cursos';

    protected $fillable = [
        'id',
        'name',
        'filename',
        'url',
        'created_at',
        'updated_at',
        'updated_by'
    ];

    public function modulos(){
        return $this->hasMany(Modulo::class);
    }

    public function capitulos(){
        return $this->hasMany(Capitulo::class);
    }

    public function aulas(){
        return $this->hasMany(Aula::class);
    }

    public function atividades(){
        return $this->hasMany(Atividade::class);
    }
}
