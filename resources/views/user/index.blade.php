{{-- Header (menu) --}}
@extends('layouts.app')

@section('content')

<div class="container">

    {{-- Profile information --}}
    <div class="row mb-5 ">    
        <div class="col-lg-4 text-center ml-5">
            <img style="width:45%;" class="img-fluid rounded-circle mr-3 ml-5 " src="{{ asset('storage').'/'. $user->image}}" alt="profile">
        </div>
       
        <div class="col-lg-6 pl-0 mt-3 ">

            <div class="row pl-2 mb-4 m-auto">
              <h2 class="mr-4" style="font-family: Arial, Helvetica, sans-serif; color:#777777">{{ $user->nickname }}</h2>
             
              @if($user->id == Auth::user()->id)
                <a href="{{ route('user.edit',$user->id)}}" class="btn btn-outline-secondary h-25"><strong>{{ __('Editar Perfil') }}</strong></a>

                {{-- Logout --}}
                <a href="{{ route('logout')}}" class="btn btn-outline-danger h-25 ml-4" 
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <strong>
                                    {{ __('Cerrar Sesión') }}
                                </strong>
                </a>
              @endif
            
              {{-- form logout --}}
              <form id="logout-form" action="{{ route('logout') }}" method="POST"         style="display: none;">
                @csrf
               </form>
            </div>
         
             <div class="row mr-md-auto">
               <h5 class="ml-3 mr-3" style="font-family: Arial, Helvetica, sans-serif"><strong>{{ count($images) }}</strong> Publicaciones</h5>
               <h5 class="" style="font-family: Arial, Helvetica, sans-serif"><strong>78</strong> Seguidores</h5>
            </div>
        
            <p class="mt-2 mb-2">
              <strong style="font-family: Arial, Helvetica, sans-serif">{{ $user->name }}</strong>
            </p>

            @if ($user->id == Auth::user()->id)
              <button type="submit" data-toggle="modal" data-target="#ModalPhoto" class="btn btn-primary btn-sm">{{ __('Editar foto de perfil') }}</button>
            @endif
        </div>
    </div>

    <hr class="w-75">

    {{-- Photos --}}
    <div class="row ml-2 mr-2 justify-content-around pl-5 pr-5">

        @foreach ($images as $post )
        <div class="col-md-5 col-lg-4 text-center p-0 mt-4" >
            <img class="img-fluid rounded" style="max-width: 300px; max-height:300px" src="{{ asset('storage').'/'.$post->image }}" alt="">
        </div>
        @endforeach

    </div>

</div>

{{-- footer --}}
@include('layouts.footer')

@endsection

{{-- Modal for profile photo --}}
@include('user.modal')


