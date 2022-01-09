@extends('layouts.dashboard')

@section('content')

<div class='container-fluid'>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Curso Básico</h1>
    </div>

    @foreach ($modulos as $modulo)
        <form action="{{route('academico.modulos.show', ['modulo'=> $modulo->id])}}" method="get">
            <!-- Earnings (Monthly) Card Example -->
            <div class="div-transition">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <button style="border: none; text-decoration: none; background: none; text-align:left;" type="submit">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{$modulo->title}}
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    {{$modulo->porcentagem_concluida}}%
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: {{$modulo->porcentagem_concluida}}%"
                                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
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
