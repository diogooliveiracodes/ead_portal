<?php

namespace App\Models;

use App\Models\Academico\AulaUser;
use App\Models\Academico\Andamento;
use App\Models\Academico\AndamentoModulo;
use App\Models\Academico\Aula;
use App\Models\Academico\AulaUser as AcademicoAulaUser;
use App\Models\Academico\Matricula;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'password', 'email', 'created_at', 'updated_at', 'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function chamadoSuporte(){
        return $this->setConnection('mysql_crm')->hasMany(ChamadoSuporte::class);
    }

    public function atendimentoSuporte(){
        return $this->setConnection('mysql_crm')->hasMany(AtendimentoSuporte::class);
    }

    public function aulas(){
        return $this->belongsToMany(Aula::class)
            ->using(AulaUser::class)
            ->withPivot(['andamento_id', 'modulo_id', 'curso_id', 'concluido']);
    }

    public function andamento(){
        return $this->hasMany(Andamento::class);
    }

    public function andamentoModulo(){
        return $this->hasMany(AndamentoModulo::class);
    }

}
