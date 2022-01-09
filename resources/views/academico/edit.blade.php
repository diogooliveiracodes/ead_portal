
@extends('layouts.dashboard')

@section('content')

<div class="container">
    <form method="POST" action="{{ route('aluno.update', ['user' => $aluno->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
    <div class="row justify-content-center">
        <div class='col-md-3'>
            <img src="{{$aluno->url}}" width="100%" alt="">
            <input type="file" class="form-control-file mt-2 @error('foto') is-invalid @enderror" id="foto" name="foto">
            @error('foto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <div class="col-md-9">
            <div class="card-body">
                    <div class="form-group row">
                        <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                        <div class="col-md-6">
                            <input value="{{$aluno->name}}" id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="name" autofocus placeholder="{{$aluno->name}}">

                            @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cep" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>

                        <div class="col-md-6">                                
                            <input value="{{$aluno->cep}}" id="cep" type="text" maxlength="8" class="form-control" name="cep" required>                            
                        </div>
                    </div>
                    <div class="endereco">
                        <div class="form-group row">
                            <label for="logradouro" class="col-md-4 col-form-label text-md-right">{{ __('Logradouro') }}</label>

                            <div class="col-md-6">
                                <input value="{{$aluno->logradouro}}" id="logradouro" type="text" class="form-control" name="logradouro" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cidade" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>

                            <div class="col-md-6">
                                <input value="{{$aluno->cidade}}" id="cidade" type="text" class="form-control" name="cidade" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <input value="{{$aluno->estado}}" id="estado" type="text" class="form-control" name="estado" required>
                            </div>
                        </div>                                                
                        <div class="form-group row">
                            <label for="bairro" class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>

                            <div class="col-md-6">
                                <input value="{{$aluno->bairro}}" id="bairro" type="text" class="form-control" name="bairro" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Numero') }}</label>

                            <div class="col-md-6">
                                <input value="{{$aluno->numero}}" id="numero" type="text" class="form-control" name="numero" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="complemento" class="col-md-4 col-form-label text-md-right">{{ __('Complemento') }}</label>

                            <div class="col-md-6">
                                <input value="{{$aluno->complemento}}" id="complemento" type="text" class="form-control" name="complemento">
                            </div>
                        </div>  
                    
                    </div>

                    <div class="form-group row mb-0 justify-content-center">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-md btn-success">
                                {{ __('Salvar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection