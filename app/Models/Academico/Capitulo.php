<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    protected $connection = 'mysql_crm';
    protected $table = 'capitulos';

    protected $fillable = [
        'id',
        'curso_id',
        'modulo_id',
        'name',
        'identifyer',
        'description',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function modulo(){
        return $this->belongsTo(Modulo::class);
    }

    public function aulas(){
        return $this->hasMany(Aula::class);
    }

    public function atividades(){
        return $this->hasMany(Atividade::class);
    }
}
