<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $connection = 'mysql_crm';
    protected $table = 'aulas';

    protected $fillable = [
        'id',
        'curso_id',
        'modulo_id',
        'capitulo_id',
        'name',
        'identifyer',
        'description',
        'thumb',
        'filename',
        'url',
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

    public function capitulo(){
        return $this->belongsTo(Capitulo::class);
    }

    public function user(){
        return $this->belongsToMany(User::class)
            ->using(AulaUser::class)
            ->withPivot(['andamento_id', 'modulo_id', 'curso_id', 'concluido']);;
    }

}
