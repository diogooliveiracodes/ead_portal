<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $connection = 'mysql_crm';
    protected $table = 'atividades';

    protected $fillable = [
        'id',
        'curso_id',
        'modulo_id',
        'capitulo_id',
        'user_id',
        'pergunta',
        'r1',
        'r2',
        'r3',
        'r4',
        'r5',
        'correta',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function cursos(){
        return $this->belongsTo(Curso::class);
    }

    public function modulos(){
        return $this->belongsTo(Modulo::class);
    }

    public function capitulos(){
        return $this->belongsTo(Capitulo::class);
    }

    public function user(){
        return $this->setConnection('mysql')->belongsToMany(User::class)
            ->withPivot('andamento_id', 'modulo_id', 'curso_id', 'concluido');
    }
}
