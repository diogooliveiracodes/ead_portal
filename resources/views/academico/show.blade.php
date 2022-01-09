@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class='col-md-3'>
            <img src="{{$aluno->url}}" width="100%" alt="">
        </div>
        <div class="col-md-9">
            <div class="card-body">     
                <div class="form-group row">
                    <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                    <div class="col-md-6">
                        <input disabled value="{{$aluno->name}}" id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="name" autofocus placeholder="{{$aluno->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cep" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>

                    <div class="col-md-6">                                
                        <input disabled value="{{$aluno->cep}}" id="cep" type="text" maxlength="8" class="form-control" name="cep" required>                            
                    </div>
                </div>
                <div class="endereco">
                    <div class="form-group row">
                        <label for="logradouro" class="col-md-4 col-form-label text-md-right">{{ __('Logradouro') }}</label>

                        <div class="col-md-6">
                            <input disabled value="{{$aluno->logradouro}}" id="logradouro" type="text" class="form-control" name="logradouro" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cidade" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>

                        <div class="col-md-6">
                            <input disabled value="{{$aluno->cidade}}" id="cidade" type="text" class="form-control" name="cidade" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                        <div class="col-md-6">
                            <input disabled value="{{$aluno->estado}}" id="estado" type="text" class="form-control" name="estado" required>
                        </div>
                    </div>                                                
                    <div class="form-group row">
                        <label for="bairro" class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>

                        <div class="col-md-6">
                            <input disabled value="{{$aluno->bairro}}" id="bairro" type="text" class="form-control" name="bairro" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Numero') }}</label>

                        <div class="col-md-6">
                            <input disabled value="{{$aluno->numero}}" id="numero" type="text" class="form-control" name="numero" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="complemento" class="col-md-4 col-form-label text-md-right">{{ __('Complemento') }}</label>

                        <div class="col-md-6">
                            <input disabled value="{{$aluno->complemento}}" id="complemento" type="text" class="form-control" name="complemento" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <form action="{{route('aluno.edit', ['user'=> $aluno->id])}}">
                            <button type="submit" class="btn btn-primary btn-lg mx-2">Editar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection