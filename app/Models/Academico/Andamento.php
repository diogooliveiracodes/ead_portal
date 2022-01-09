<?php

namespace App\Models\Academico;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Andamento extends Model
{
    protected $fillable = [
        'aluno_id',
        'matricula_id',
        'cursos_id',
        'inicio',
        'fim',
        'quantidade_aulas',
        'aulas_concluidas'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
