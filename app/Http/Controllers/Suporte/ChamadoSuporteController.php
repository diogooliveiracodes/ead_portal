<?php

namespace App\Http\Controllers\Suporte;

use App\Http\Controllers\Controller;
use App\Models\ChamadoSuporte;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChamadoSuporteController extends Controller
{
    public function __construct(ChamadoSuporte $chamadoSuporte)
    {
        $this->chamadoSuporte = $chamadoSuporte;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chamadosAbertos = $this->chamadoSuporte::where('customer_id', '=', Auth::user()->id)
            ->where('status', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        $chamadosFechados = $this->chamadoSuporte::where('customer_id', '=', Auth::user()->id)
            ->where('status', 0)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('suporte.chamados.index', [
            'chamadosAbertos' => $chamadosAbertos,
            'chamadosFechados' => $chamadosFechados
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->chamadoSuporte::create([
                'customer_id' => Auth::user()->id,
                'user_id' => 1,
                'status' => 1,
                'assunto' => $request->assunto,
                'mensagem' => $request->mensagem
            ]);

            return redirect()->back()->with('msg', 'Chamado criado com sucesso!');

        } catch (Exception $e){

            return redirect()->back()->with('error', 'Ocorreu um erro ao tentar abrir o chamado!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChamadoSuporte  $chamadoSuporte
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chamadoSuporte = ChamadoSuporte::where('id', $id)->first();
        return view('suporte.chamados.show', ['chamado' => $chamadoSuporte]);
    }

}
