<?php

namespace App\Models\Academico;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class AndamentoModulo extends Model
{
    protected $fillable = [
        'user_id',
        'matricula_id',
        'curso_id',
        'modulos_id',
        'quantidade_aulas',
        'aulas_concluidas',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function modulo(){
        return $this->setConnection('mysql_crm')->belongsTo(Modulo::class);
    }
}
