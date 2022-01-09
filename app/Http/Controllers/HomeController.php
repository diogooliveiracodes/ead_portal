<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Auth;
use Image;
use File;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function alunoShow(User $user)
    {

        return view('academico.show', ['aluno' => $user]);
    }

    public function alunoEdit(User $user)
    {
        return view ('aluno.edit', [
            'aluno' => $user
        ]);
    }

    public function alunoUpdate(Request $request, User $user)
    {
        // $request->validate([
        //     'foto' => 'image|max:4000',
        // ]);

        if ($request->foto != null){
            Storage::disk('s3')->delete($user->filename); //Deleta a foto antiga do usuário caso exista.
            $diretorio = strval('temp'.Auth::user()->id.'.jpg'); //cria uma string personalizada com o id do usuario para salvar temporariamenta a foto do perfil
            $image = Image::make($request->foto)->resize(400,400)->save($diretorio); //redimensiona a foto utilizando a biblioteca Intervention Image
            $path = Storage::disk('s3')->putFile('imagens', $diretorio , 'public'); //Salva a imagem no drive s3
            File::delete($diretorio); // deleta a imagem residual temporária do servidor
            $user->url = Storage::disk('s3')->url($path); //salva no banco de dados a url da imagem salva no s3
            $user->filename = $path; //salva no banco de dados o nome do arquivo da foto de perfil

            // Storage::disk('s3')->delete($user->filename);
            // $path = $request->file('arquivo')->store('imagens', 's3');
            // $user->url = Storage::disk('s3')->url($path);
            // $user->filename = $path;
        }
        $user->name = $request->nome;
        $user->cep = $request->cep;
        $user->logradouro = $request->logradouro;
        $user->cidade = $request->cidade;
        $user->estado = $request->estado;
        $user->bairro = $request->bairro;
        $user->numero = $request->numero;
        $user->complemento = $request->complemento;
        $user->save();
        return redirect(route('aluno.show', ['user' => $user->id]));

    }


}
