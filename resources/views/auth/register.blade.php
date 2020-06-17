@extends('welcome')

@section('panel')
<div class="col-lg-4">

    {{-- Card register --}}
    <div class="card mb-2">
        <div class="card-body" style="padding-bottom: 5px">

            <h1 class="text-center mt-3 mb-2" style="letter-spacing: 1px; font-family: 'Cookie', cursive; font-size: 60px">Photogram</h1>

            <p class="text-center" style=" font-size:18px; color: #777">Regístrate para ver fotos y videos de tus amigos.</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{--Inputs for registration  --}}
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ _('Nombre') }}">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="{{ __('Apellidos') }}">

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname" autofocus placeholder="{{ __('Apodo') }}">

                        @error('nickname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Correo electrónico') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Contraseña') }}">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control " name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirmar contraseña') }}">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12 ">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

     {{-- Card Login --}}
     <div class="card ">
        <div class="car-body">
            <div class="form-group row ">
                <div class="col-md-12 text-center">
                    @if (Route::has('login'))
                       <p class="mt-3">¿Tienes una cuenta? <a href="{{ route('login') }}">{{ __('Inicia Sesión') }}</a></p>      
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>           
@endsection






