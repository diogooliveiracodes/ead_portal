<?php

namespace App\Http\Controllers\Academico;

use App\Http\Controllers\Controller;
use App\Models\Academico\Andamento;
use App\Models\Academico\AndamentoModulo;
use App\Models\Academico\Aula;
use App\Models\Academico\AulaUser;
use Illuminate\Http\Request;
use App\Models\Academico\Modulo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class AcademicoController extends Controller
{
    public function index(){
        $modulos = Modulo::where('curso_id', 1)->get();
        $response = new Collection;
        foreach($modulos as $i => $modulo){
            $andamentoModulo = Auth::user()->andamentoModulo->where('modulo_id', $modulo->id)->first();
            $response[$i] = $modulo;
            $response[$i]->porcentagem_concluida = $andamentoModulo->quantidade_aulas > 0 ?
                intval(($andamentoModulo->aulas_concluidas * 100 ) / $andamentoModulo->quantidade_aulas) : 0;
        }

        return view('academico.aulas', ['modulos' => $response]);
    }

    /**
     * @param Request
     * Quando uma aula específica é chamada
     */
    public function showAula(Request $request){
        $aula = Aula::find($request->aula);
        $modulo = Modulo::find($request->modulo);

        //verifica se a aula existe
        if(!$aula) return redirect(route('academico.modulos.index'));

        //se a aula for a primeira aula do módulo redireciona para tela de módulos
        $primeiraAulaModulo = $modulo->aulas->sortBy('identifyer')->first()->identifyer;
        if($aula->identifyer < $primeiraAulaModulo) return redirect(route('academico.modulos.index'));

        //salva a última aula do módulo assistida
        $andamentoModulo = AndamentoModulo::where('modulo_id', $aula->modulo->id)
        ->where('user_id', Auth::user()->id)
        ->where('curso_id', $aula->curso->id)
        ->first();
        $andamentoModulo->ultima_aula = $aula->id;
        $andamentoModulo->save();

        return view('academico.modulo', [
            'modulo' => $modulo,
            'aula'  => $aula
        ]);
    }

    /**
     * @param Modulo
     * Quando um módulo específico é chamado
     */
    public function show(Modulo $modulo){
        $andamentoModulo = AndamentoModulo::where('user_id', Auth::user()->id)
            ->where('modulo_id', $modulo->id)
            ->first();

        $primeiraAulaModulo = $modulo->aulas->sortBy('identifyer')->first()->id;

        //verifica a última aula assistida do módulo, se não encontrar, retorna a primeira aula do módulo
        $andamentoModulo->ultima_aula != 0 ?
            $aula = Aula::where('id', $andamentoModulo->ultima_aula)->first() :
            $aula = Aula::where('id', $primeiraAulaModulo)->first();

        return view('academico.modulo', [
            'modulo' => $modulo,
            'aula'  => $aula
        ]);
    }

    /**
     * @param Request
     * Quando uma aula é finalizada
     */
    public function check(Request $request){

        $user = Auth::user();
        $aula = Aula::find($request->aula);
        $modulo = Modulo::find($aula->modulo->id);

        //seta a última aula assistida do módulo
        $andamentoModulo = AndamentoModulo::where('modulo_id', $aula->modulo->id)
            ->where('user_id', $user->id)
            ->where('curso_id', $aula->curso->id)
            ->first();
        $ultimaAulaModulo = $modulo->aulas->sortByDesc('identifyer')->first()->id;
        $ultimaAulaModulo > ($aula->identifyer+1) ?
            $andamentoModulo->ultima_aula = ($aula->id+1) :
            $andamentoModulo->ultima_aula = $ultimaAulaModulo;

        //seta última aula assistida do curso
        $andamento = Andamento::where('user_id', $user->id)
            ->where('curso_id', $aula->curso->id)
            ->first();
        $andamento->ultima_aula = $aula->id+1;

        //chama tabela pivot entre aluno e aula
        $aulaUser = AulaUser::where('aula_id', $request->aula)
        ->where('user_id', $user->id)
        ->first();

        //verifica se o aluno já assistiu esta aula anteriormente
        if(!$aulaUser){
            $user->aulas()->attach($request->aula, [
                'andamento_id' => $andamento->id,
                'modulo_id' => $aula->modulo->id,
                'curso_id' => $aula->curso->id,
                'concluido' => 1,
                'created_at' => now()
            ]);
            $andamento->aulas_concluidas++;
            if($ultimaAulaModulo >= $aula->id)$andamentoModulo->aulas_concluidas++;
        }

        //salva as mudanças
        $andamento->save();
        $andamentoModulo->save();

        //verifica se o aluno terminou o módulo
        $ultimaAulaModulo = $modulo->aulas->sortByDesc('identifyer')->first()->id;
        if($ultimaAulaModulo == $aula->id) return redirect(route('academico.modulos.index'));

        return redirect(route('academico.modulos.show', ['modulo' => $aula->modulo->id]));

    }


}
