<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChamadoSuporte extends Model
{
    protected $connection = 'mysql_crm';
    protected $table = 'chamado_suportes';

    protected $fillable = [
        'id',
        'customer_id',
        'user_id',
        'assunto',
        'status',
        'encerramento',
        'mensagem',
        'created_at',
        'updated_at'
    ];

    public function atendimento(){
        return $this->hasMany(AtendimentoSuporte::class);
    }

    public function user(){
        return $this->setConnection('mysql')->belongsTo(User::class, 'customer_id', 'id');
    }
}
