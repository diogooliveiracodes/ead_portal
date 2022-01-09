<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $connection = 'mysql_crm';
    protected $table = 'modulos';

    protected $fillable = [
        'id', //NÃO REMOVER (UTILIZADO NO AcademicoController)
        'curso_id',
        'title',
        'description',
        'sequencial',
        'created_at',
        'updated_at'
    ];

    public function curso(){
        return $this->belongsTo(Curso::class);
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
