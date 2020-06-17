<link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">


 @include('layouts.header')



<div class="row justify-content-center mt-5">

    <div class="col-lg-4">

        {{-- Success message --}}
        @if (session('message'))
           <div class="alert alert-success mb-3">
              {{ session('message') }}
           </div>
        @endif

        {{-- Card update --}}
        <div class="card mb-2">
            <div class="card-header pb-0">
                <p class="text-center" style=" font-size:18px; color: #777">{{ __('Modifica tu información') }}</p>
            </div> 

            <div class="card-body" style="padding-bottom: 5px">  
    
                <form method="POST" action="{{ route('user.update',Auth::user()->id) }}">
                    @csrf
                    @method('PUT')
                    {{--Inputs for update  --}}
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus value="{{ Auth::user()->name }}" placeholder="{{ __('Nombre') }}">
    
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ Auth::user()->last_name }}" required autocomplete="last_name" autofocus placeholder="{{ __('Apellidos') }}">
    
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ Auth::user()->nickname }}" required autocomplete="nickname" autofocus placeholder="{{ __('Apodo') }}">
    
                            @error('nickname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" placeholder="{{ __('Correo electrónico') }}">
    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    

                    {{-- Button submit --}}
                    <div class="form-group row mb-0">
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-primary btn-sm btn-block">
                                {{ __('Modificar información') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    </div>   
</div>