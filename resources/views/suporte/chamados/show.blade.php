@extends('layouts.dashboard')

@section('content')

@if(session('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


<div class="container-fluid pt-4 pb-5">
    {{-- HEADER --}}
    <div class="row">
        <div class="col-2">
            <h4>Assunto:</h4>
            <h6 class="text-muted">{{$chamado->assunto ?? ''}}</h6>

        </div>
        <div class="col-2">
            <h4>Abertura:</h4>
            <h6 class="text-muted">{{$chamado->created_at ? date('d M Y - H:i\h', strtotime($chamado->created_at)) : ''}}</h6>

        </div>
        <div class="col-2">
            <h4>Atualizado em:</h4>
            <h6 class="text-muted">{{$chamado->updated_at ? date('d M Y - H:i\h', strtotime($chamado->updated_at)) : ''}}</h6>
        </div>
        <div class="col-2">
            <h4>Encerramento:</h4>
            <h6 class="text-muted">{{$chamado->encerramento ? date('d M Y', strtotime($chamado->encerramento)) : 'em andamento'}}</h6>
        </div>
    </div>
    {{-- FIM HEADER --}}

    <hr>
    {{-- CHAMADO --}}
    <div class="card p-4">
        <div class="row">
            <div class="col">
                <h5 class="text-primary">
                    <img class="img-profile rounded-circle" style="max-width: 40px;"
                        src="{{Auth::user()->url ? Auth::user()->url : '/img/profile.jpg'}}">
                    <strong>{{$chamado->user->name}}<strong>
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="text-muted">{{$chamado->mensagem}}</h6>
            </div>
        </div>
    </div>
    {{-- FIM CHAMADO --}}

    {{-- ATENDIMENTO --}}
    @if ($chamado->atendimento)
        @foreach ($chamado->atendimento as $atendimento)
            <hr>
            @if ($atendimento->criador == 'suporte')
            <div class="card p-4">
                <div class="row">
                    <div class="col">
                        <h5 style="text-align: right" class="text-success">
                            <strong>Suporte</strong>
                            <img class="img-profile rounded-circle" style="max-width: 40px;"
                                    src="/img/suporte/avatar_suporte.jpg">
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 style="text-align: right" class="text-muted">{{$atendimento->mensagem}}</h6>
                    </div>
                </div>
            </div>
            @else
                <div class="card p-4">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-primary">
                                <img class="img-profile rounded-circle" style="max-width: 40px;"
                                    src="{{Auth::user()->url ? Auth::user()->url : '/img/profile.jpg'}}">
                                <strong>{{$atendimento->user->name}}</strong>
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6 class="text-muted">{{$atendimento->mensagem}}</h6>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    {{-- FIM ATENDIMENTO --}}

    <hr>
    {{-- NOVO ATENDIMENTO --}}
    @if ($chamado->status == 1)
        <form action="{{route('atendimentos.store')}}" method="post">
            @csrf
            <input type="text" name="user_id" hidden value="{{$chamado->user_id}}">
            <input type="text" name="customer_id" hidden value="{{$chamado->customer_id}}">
            <input type="text" name="chamado_suporte_id" hidden value="{{$chamado->id}}">
            <input type="text" name="criador" hidden value="aluno">
            <div class="mb-3">
                <label for="mensagem" class="form-label"></label>
                <textarea class="form-control" name="mensagem" id="mensagem" rows="3" required placeholder="Descreva detalhadamente o problema..."></textarea>
            </div>
                <a href="{{route('suporte.index')}}" class="btn btn-success mb-4 mt-2">Voltar</a>
                <button class="btn btn-primary mb-4 mt-2 float-right">Enviar</button>
        </form>
    @else
        <div class="row">
            <div class="col text-center">
                <a href="{{route('suporte.index')}}" class="mt-4 btn btn-lg btn-success mb-5">Voltar</a>
            </div>
        </div>
    @endif
    {{-- FIM ATENDIMENTO --}}
</div>



@endsection
