<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Academico\Andamento;
use App\Models\Academico\AndamentoModulo;
use App\Models\Academico\Curso;
use App\Models\Academico\Matricula;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level' => 'usuario',
        ]);

        $curso = Curso::where('id', 1)->first();

        // VOLTAR AQUI E COLOCAR A DATA DE VENCIMENTO CORRETA
        // APÓS A INTEGRAÇÃO FINANCEIRA
        $matricula = Matricula::create([
            'subscribe_at' => now(),
            'expire_at' => '2022-10-12 17:59:00',
            'payment_id' => 1
        ]);

        $andamento = new Andamento;
        $andamento->user_id = $user->id;
        $andamento->matricula_id = $matricula->id;
        $andamento->curso_id = $curso->id;
        $andamento->inicio = now();
        $andamento->quantidade_aulas = $curso->aulas->count();
        $andamento->save();

        foreach($curso->modulos as $mod){
            $andamentoModulo = new AndamentoModulo;
            $andamentoModulo->user_id = $user->id;
            $andamentoModulo->matricula_id = $matricula->id;
            $andamentoModulo->curso_id = $curso->id;
            $andamentoModulo->modulo_id = $mod->id;
            $andamentoModulo->quantidade_aulas = $mod->aulas->count();
            $andamentoModulo->save();
        }

        return $user;
    }
}
