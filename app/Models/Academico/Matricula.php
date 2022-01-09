<?php

namespace App\Models\Academico;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = [
        'id',
        'subscribe_at',
        'expire_at',
        'created_at',
        'updated_at',
        'pagamento_id'
    ];


}
