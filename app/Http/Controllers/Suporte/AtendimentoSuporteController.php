<?php

namespace App\Http\Controllers\Suporte;

use App\Http\Controllers\Controller;
use App\Models\AtendimentoSuporte;
use App\Models\ChamadoSuporte;
use Exception;
use Illuminate\Http\Request;

class AtendimentoSuporteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $ChamadoSuporte = ChamadoSuporte::where('id', $request->chamado_suporte_id)->first();
            if($ChamadoSuporte->status == 1){
                AtendimentoSuporte::create($request->all());
                $ChamadoSuporte->updated_at = date("Y-m-d H:i:s");
                $ChamadoSuporte->save();

                return redirect()->back()->with('msg', 'Mensagem enviada com sucesso!');

            } else {

                return redirect()->back()->with('error', 'Este chamado já foi encerrado.');

            }

        } catch (Exception $e){

            return redirect()->back()->with('error', 'Ocorreu um erro ao salvar a mensagem de atendimento.');
        }
    }

}
