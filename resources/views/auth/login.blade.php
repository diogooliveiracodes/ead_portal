@extends('layouts.applogin')

@section('content')

{{-- <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '{717821069018009}',
        cookie     : true,
        xfbml      : true,
        version    : '{v8.0}'
      });

      FB.AppEvents.logPageView();

    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script> --}}

    {{-- LOGIN --}}
    <div class="container" style="height: 90vh;">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">ENTRAR</h5>
              <form method="POST" action="{{ route('login') }}" class="form-signin">
                    @csrf
                    <div class="form-label-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label for="inputEmail">Email</label>
                    </div>

                    <div class="form-label-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <label for="inputPassword">Senha</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Lembrar minha senha') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase p-3" style="background-color: #0084ff !important" type="submit">{{ __('Entrar') }}</button>
                    <div class="row justify-content-center">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link col-sm-6" href="{{ route('password.request') }}">
                            {{ __('Esqueceu a sua senha?') }}
                        </a>
                        @endif
                    </div>
                    <hr class="my-4">
                    <a class="btn btn-lg btn-facebook btn-block text-uppercase text-white" style="background:#1a538a" href="{{route('loginfacebook')}}"><i class="fab fa-facebook-f mr-2"></i> Entrar com o Facebook</a>
                    <a class="btn btn-lg btn-facebook btn-block text-uppercase text-dark bg-white" style="border-color:black"  href="{{route('logingithub')}}"><i class="fab fa-google mr-2"></i> Entrar com o Google</a>

                </form>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection
