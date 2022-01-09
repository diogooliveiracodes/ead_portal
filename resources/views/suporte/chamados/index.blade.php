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

<div class='container-fluid'>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Suporte</h1>
    </div>

    <form action="{{route('suporte.store')}}" method="post">
        @csrf
        <select required class="form-control" name="assunto" id="assunto" placeholder="Selecione um assunto">
            <option value="" disabled selected>Escolha um tema</option>
            <option value="Financeiro">Financeiro</option>
            <option value="Acadêmico">Acadêmico</option>
        </select>

        <textarea required name="mensagem" class="mt-4 form-control form-control-alternative" rows="5" placeholder="Descreva detalhadamente o problema ..."></textarea>

        <div class="col-12" style="text-align: right;">
            <button class="btn btn-lg btn-primary mt-2" type="primary">Enviar</button>
        </div>
    </form>

    @if ($chamadosAbertos->count()>0)
        <hr>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Chamados em andamento:</h1>
        </div>
    @endif
    @foreach ($chamadosAbertos as $chamado)
        <form action="{{route('suporte.show', ['suporte'=> $chamado->id])}}" method="get">
            @csrf
            <!-- Earnings (Monthly) Card Example -->
            <div class="div-transition">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2">
                        <button style="border: none; text-decoration: none; background: none; text-align:left;" type="submit">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase text-danger mb-1">
                                            {{$chamado->assunto}}
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    {{$chamado->mensagem}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endforeach

    @if ($chamadosFechados->count()>0)
        <hr>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Chamados encerrados:</h1>
        </div>
    @endif

    @foreach ($chamadosFechados as $chamado)
        <form action="{{route('suporte.show', ['suporte'=> $chamado->id])}}" method="get">
            @csrf
            <!-- Earnings (Monthly) Card Example -->
            <div class="div-transition">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2">
                        <button style="border: none; text-decoration: none; background: none; text-align:left;" type="submit">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase text-danger mb-1">
                                            {{$chamado->assunto}}
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    {{$chamado->mensagem}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endforeach

</div>

<style>
    .div-transition:hover{
        transform: translateY(-7px);
        transition: 0.8s;

    }

    .div-transition{
        transition: 0.8s;
    }
</style>

@endsection
