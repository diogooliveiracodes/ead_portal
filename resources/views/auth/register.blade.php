@extends('layouts.applogin')

@section('content')

<div class="container" style="height: 90vh;">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin flex-row my-5">
          {{-- <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div> --}}
          <div class="card-body">
            <h5 class="card-title text-center">CADASTRE-SE</h5>
            <form class="form-signin" method="POST" action="{{ route('register') }}">
            @csrf
              <div class="form-label-group">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="name">Nome</label>
              </div>

              <div class="form-label-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="email">Email</label>
              </div>

              <hr>

              <div class="form-label-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="password">Senha</label>
              </div>

              <div class="form-label-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <label for="password-confirm">Confirmação de Senha</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" style="background-color: #0084ff !important" type="submit">Cadastrar</button>
              <a class="d-block text-center mt-2 small" href="{{route('entrar')}}">Já tenho uma conta</a>
              <hr class="my-4">
              <a class="btn btn-lg btn-facebook btn-block text-uppercase text-white bg-primary" href="{{route('loginfacebook')}}"><i class="fab fa-facebook-f mr-2"></i>Cadastrar com o Facebook</a>
              <a class="btn btn-lg btn-facebook btn-block text-uppercase text-dark bg-white" style="border-color:black"  href="{{route('logingithub')}}"><i class="fab fa-google mr-2"></i> Entrar com o Google</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
