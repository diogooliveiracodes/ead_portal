@extends('layouts.dashboard')

@section('content')

<div class='row mt-0 pt-0'>
    {{-- VIDEO --}}
    <div class="col-md-9 mx-0 px-0">
        {{-- EMBED YOUTUBE --}}
        {{-- <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$aula->url ?? 'Z0KoGizUIjc'}}" allowfullscreen></iframe>
        </div> --}}

        {{-- EMBED VIMEO --}}
        <div style="padding:56.25% 0 0 0;position:relative;">
            <iframe src="https://player.vimeo.com/video/663709366?h=35517d0eff&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                style="position:absolute;top:0;left:0;width:100%;height:100%;" title="CURSO DE INGL&amp;Ecirc;S ONLINE - AULA 1">
            </iframe>
            {{-- BOTÕES --}}
            <div class="row justify-content-between p-0 m-0"
                style="position: absolute; top:45%; width: 100%;">
                <form action="{{route('academico.modulos.show.aula', ['modulo' => ($aula->modulo)])}}" method="post" class="m-0 p-0">
                    @csrf
                    <input type="hidden" name="aula" value="{{$aula->id-1}}">
                    <button class="btn arrows"
                        style="border-radius: 20%; border: none; opacity: 0.2; margin-left:10px">
                        <i class="fas fa-3x fa-arrow-circle-left text-white"></i>
                    </button>
                </form>
                <form action="{{route('check')}}" method="post" name="checkRoute" id="checkRoute">
                    @csrf
                    <input type="hidden" name="aula" value="{{$aula->id}}">
                    <button class="btn arrows"
                        style="border-radius: 20%; border: none; opacity: 0.2;">
                        <i class="fas fa-3x fa-arrow-circle-right text-white"></i>
                    </button>
                </form>
                <p hidden>Modulo:{{$modulo->id}} aula:{{$aula->id}}</p>
            </div>
        </div>
        {{-- SDK VIMEO --}}
        <script src="https://player.vimeo.com/api/player.js"></script>
        <script>
            var iframe = document.querySelector('iframe');
            var player = new Vimeo.Player(iframe);

            // player.on('play', function() {
            // //   console.log('Played the video');
            // });

            // player.getVideoTitle().then(function(title) {
            // //   console.log('title:', title);
            // });

            player.on('ended', function(data) {
                document.getElementById('checkRoute').submit();
                console.log(form);
            });
          </script>

        {{-- BOTÕES --}}
        {{-- <div class="row justify-content-around mt-4">
            <form action="{{route('academico.modulos.show.aula', ['modulo' => ($aula->modulo)])}}" method="post">
                @csrf
                <input type="hidden" name="aula" value="{{$aula->id-1}}">
                <button href="" class="btn bg-primary" style="border-radius: 20%"><i class="fas fa-3x fa-arrow-circle-left text-white"></i></button>
            </form>
            <form action="{{route('check')}}" method="post" name="checkRoute" id="checkRoute">
                @csrf
                <input type="hidden" name="aula" value="{{$aula->id}}">
                <button class="btn bg-primary" style="border-radius: 20%"><i class="fas fa-3x fa-arrow-circle-right text-white"></i></button>
            </form>
            <p hidden>Modulo:{{$modulo->id}} aula:{{$aula->id}}</p>
        </div> --}}
    </div>
    {{-- COLLAPSE CURSOS --}}
    <div class="col-md-3 mx-0 px-0">
        <div id="accordion">
            @foreach ($modulo->capitulos as $capitulo)
            <!-- CARD 01 -->
            <div class="card">
                <div class="card-header" id="heading{{str_replace(' ', '', $capitulo->name)}}">
                    <h5 class="mb-0">
                        <button class="btn btn-link {{ $capitulo->id == $aula->capitulo->id ? '':'collapsed'}}" data-toggle="collapse"
                            data-target="#{{str_replace(' ', '', $capitulo->name)}}"
                            aria-expanded="{{ $loop->index == 0 ? 'true' : 'false'}}" aria-controls="{{str_replace(' ', '', $capitulo->name)}}"
                            style="color: black; text-decoration: none; font-style: bold">
                            {{$capitulo->name}}
                        </button>
                    </h5>
                </div>
                <div id="{{str_replace(' ', '', $capitulo->name)}}" class="collapse {{ $capitulo->id == $aula->capitulo->id ? 'show' : ''}}"
                    aria-labelledby="heading{{str_replace(' ', '', $capitulo->name)}}"
                    data-parent="#accordion">
                    <div class="card-body">
                        @foreach ($capitulo->aulas as $a)
                        <div class="form-check">
                            @php
                                $aula_user = DB::table('aula_user')->where([['aula_id', '=' , $a->id] , ['user_id', '=' , Auth::user()->id]])->first();
                                // dd($aula_user->concluido);

                            @endphp
                            @if (isset($aula_user->concluido) && $aula_user->concluido==1)
                                <input style="pointer-events: none;" class="form-check-input" type="checkbox" checked value="" id="flexCheckDefault1">
                            @else
                                <input class="form-check-input" type="checkbox" disabled value="" id="flexCheckDefault1">
                            @endif

                            <label class="form-check-label" style="font-size: 1rem;" for="flexCheckDefault1">
                                <form action="{{route('academico.modulos.show.aula', ['modulo' => $a->modulo->id])}}" method="post">
                                    @csrf
                                    <input type="hidden" name="modulo" value="{{$a->modulo->id}}">
                                    <input type="hidden" name="aula" value="{{$a->id}}">
                                    @if ($a->id == $aula->id)
                                        <button
                                            style="border: none; text-decoration: none; background: none; text-align:left;"
                                            type="submit" class="text-primary font-weight-bold">
                                            {{$a->name}} - {{$a->description}}
                                        </button>
                                    @else
                                        <button
                                            style="border: none; text-decoration: none; background: none; text-align:left;"
                                            type="submit">
                                            {{$a->name}} - {{$a->description}}
                                        </button>
                                    @endif
                                </form>
                            </label>
                            <hr>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- END -->
            @endforeach
          </div>
    </div>
</div>

<style>
    .arrows:hover{
        opacity: 0.9 !important;
    }
</style>

@endsection
