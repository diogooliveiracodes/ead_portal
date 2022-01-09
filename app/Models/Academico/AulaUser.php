<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AulaUser extends Pivot
{
    protected $table = 'aula_user';

    protected $fillable = [
        'aula_id',
        'user_id',
        'andamento_id',
        'modulo_id',
        'curso_id',
        'concluido'
    ];
}
