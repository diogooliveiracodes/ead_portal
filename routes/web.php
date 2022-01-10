<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

//PÁGINA VISITANTE
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['middleware' => 'guest'], function(){
    //CADASTRO
    Route::get('/cadastre-se', function(){
        return view('auth.register');
    })->name('cadastrar');
    Route::post('register', 'Auth\RegisterController@register')->name('register');

    //LOGIN
    Route::get('/entrar', function(){
        return view('auth.login');
    })->name('entrar');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    // Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

Auth::routes(['except' => ['login', 'register']]);

//DASHBOARD
Route::get('/home', 'HomeController@index')->name('home');

//GITHUB
Route::get('login/github', [LoginController::class, 'redirectToProvider'])->name('logingithub');
Route::get('login/github/callback', [LoginController::class, 'handleProviderCallback']);

//FACEBOOK
Route::get('login/facebook', 'Auth\LoginController@redirectToProviderFacebook')->name('loginfacebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallbackFacebook');

Route::group(['middleware' => 'auth'], function(){
    //PERFIL
    Route::get('/perfil/{user}', 'HomeController@alunoShow')->name('aluno.show');
    Route::get('/aluno/editar/{user}', 'HomeController@alunoEdit')->name('aluno.edit');
    Route::put('/aluno/editar/{user}', 'HomeController@alunoUpdate')->name('aluno.update');

    //ACADEMICO
    Route::get('/academico/modulos', 'Academico\AcademicoController@index')->name('academico.modulos.index'); //todos os módulos
    Route::get('/academico/modulo/{modulo}', 'Academico\AcademicoController@show')->name('academico.modulos.show'); //conteúdo do módulo
    Route::post('/academico/modulo/{modulo}', 'Academico\AcademicoController@showAula')->name('academico.modulos.show.aula'); //chama aula específica

    //SUPORTE
    Route::resource('suporte', 'suporte\ChamadoSuporteController', [
        'except' => ['edit', 'update', 'delete']
    ]);
    Route::resource('atendimentos', 'Suporte\AtendimentoSuporteController',[
        'except' => ['edit', 'update', 'delete']
    ]);


    //
    Route::post('/aula', 'Academico\AcademicoController@check')->name('check');


    //PAGAMENTO
    Route::get('/pagamento', function(){
        return view('financeiro.index');
    });
});
