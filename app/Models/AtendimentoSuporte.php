<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtendimentoSuporte extends Model
{
    protected $connection = 'mysql_crm';
    protected $table = 'atendimento_suportes';

    protected $fillable = [
        'id',
        'customer_id',
        'user_id',
        'chamado_suporte_id',
        'mensagem',
        'created_at',
        'updated_at',
        'criador'
    ];

    public function chamado(){
        return $this->belongsTo(ChamadoSuporte::class, 'chamado_suporte_id');
    }

    public function user(){
        return $this->setConnection('mysql')->belongsTo(User::class, 'customer_id', 'id');
    }

}
