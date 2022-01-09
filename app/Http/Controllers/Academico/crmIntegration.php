<?php

namespace App\Http\Controllers\Academico;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class crmIntegration extends Controller
{
    public function getAulas(){
        return DB::connection('mysql_crm')->table('aulas')->get();
    }

    public function getCursos(){
        return DB::connection('mysql_crm')->table('cursos')->get();
    }

    public function getModulos(){
        return DB::connection('mysql_crm')->table('modulos')->get();
    }

    public function getAtividades(){
        return DB::connection('mysql_crm')->table('atividades')->get();
    }

    public function getCapitulos(){
        return DB::connection('mysql_crm')->table('capitulos')->get();
    }
}
