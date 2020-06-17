@extends('layouts.app')

@section('content')
<div class="container">

    <section class="row justify-content-center mt-3">

      {{-- Principal content --}}
      <div class="col-md-6 ">
            
          
          {{-- Post --}}
    
        @foreach ($images as $post )
     
          <div class="card mb-5">

            <div class="card-body pb-0 pt-0">

              <div class="row p-2 d-flex align-items-center">
                <div class="col-md-6 p-2">
                  <img  width="25px" class="img-fluid rounded-circle mr-3" src="{{ asset('storage').'/'.$post->user->image}}" alt="profile">

                  <a href="{{ route('user.show',$post->user->id) }}" class="text-decoration-none">
                    <strong style="font-family: Arial, Helvetica, sans-serif">{{ $post->user->nickname }}</strong>
                  </a>
                </div>

                  <div class="col-md-6 p-2 d-flex justify-content-end">
                    <span class="nav-item ">
                      <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>....</strong></a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('post.show', $post->id) }}" >{{ _('Ir a la publicación') }}</a>
                      </div>
                    </span>
                  </div>  
              </div>
            </div>
          
            <img src="{{ asset('storage').'/'.$post->image }}" class="card-img-top img-fluid" max-width="538px" max-height="538px" alt="...">


            <div class="card-body pb-0">
              <h5 class="card-title">
                  <a href="">
                    <i class="far fa-heart mr-2" style="font-size: 24px;"></i>
                  </a>
                  <a href="{{ route('post.show', $post->id) }}">
                    <i class="far fa-comment" style="font-size: 24px;"></i>
                  </a>
                </h5>
                
              <p class="card-text" style="font-family: Arial, Helvetica, sans-serif font-size: 25px;">
                <strong>2 Me Gusta</strong>
              </p>


              {{-- post description --}}
              <p class="card-text">
                <strong>
                  {{ $post->user->nickname }} 
                </strong> 
                {{ $post->description }}
                
              </p>

              <span  style="color: #777777">
                {{\FormatTime::LongTimeFilter($post->created_at)}}
              </span>
            </div>

          
            @if (count($post->comments) > 0)

              <hr>

              {{-- Button comments --}}
              <a href="{{ route('post.show',$post->id) }}">
                <button type="button" class="btn btn-primary btn-sm ml-3 mb-2">
                  {{ _('Ver los ') }} 
                  <span class="badge badge-light">
                    {{ count($post->commentsAll) }}
                  </span> 
                  {{ _(' comentarios') }}
                </button>
              </a>
           

              {{-- Coments --}}

              @foreach ($post->comments as $comment )

              <div class="row">
                <p class="card-text ml-5 mb-0">
               
                  <strong>
                    <span>@</span>{{ $comment->user->nickname}} 
                  </strong> 
                      {{ $comment->content }}   
                </p>   

                @if ($comment->follower_id == Auth::user()->id)
                <div class="col-1 d-flex justify-content-end">
                  <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>....</strong></a>
                  <div class="dropdown-menu">
                    <form action="{{ route('comment.destroy',$comment->id) }}" method="post">
                      @csrf
                      @method('DELETE')

                      <button type="submit" class="dropdown-item" >{{ _('Eliminar') }}</button>
                    </form>
                    
                  </div>
                </div>      
                @endif
               
              </div>
                
                
              @endforeach  
             @endif
            

            {{-- input comments --}}
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <form action="{{ route('comment.store') }}" method="POST">
                  
                  @csrf

                  <input type="hidden" name="id" value="{{ $post->id }}">

                  <input class="border-0" style="width: 85%" type="text" name="comentary" placeholder="{{ __('Agrega un comentario') }}">

                  <button class="mr-0 btn btn-primary btn-sm" type="submit">Publicar</button>

                </form>
                </li>
            </ul>
          </div>

        @endforeach
      </div>     
        
         

        {{--Secondary section  --}}
        <div class="col-md-4" style="max-height: 300px">

            {{-- Profile user --}}
            <div class="row mb-3 ">    
                <div class="col-3">
                    <img style="width:60px;" class="img-fluid rounded-circle mr-3 mt-2" src="{{ asset('storage').'/'.Auth::user()->image }}" alt="profile">
                </div>
               
                <div class="col-7 pl-0">
                  <p class="mt-3 mb-0">
                    <a href="{{ route('user.index')}}" class="text-decoration-none">
                      <strong style="font-family: Arial, Helvetica, sans-serif">
                        {{ Auth::user()->name }}
                      </strong>
                    </a>
                  </p>

                  <p style="font-family: Arial, Helvetica, sans-serif; color:#777777">
                   <span>@</span> {{ Auth::user()->nickname }}</p>
                </div>
            </div>


            <div class="row ">
                <div class="col-8">
                    <span style="color:#777;">{{ __('Sugerencias para ti') }} </span>
                </div>
    
                <div class="col-3 mb-2 pl-0">
                    <a href="">Ver todos</a>
                </div>    
            </div>
            
              
            {{-- Recomendations sections --}}
            {{-- Porfiles --}}
            <div class="row "> 

                <div class="col-2 mt-3 pr-0">
                    <img style="width:40px;" class="img-fluid rounded-circle " src="{{ asset('images/avatar.jpg') }}" alt="profile">
                </div>
               
                <div class="col-6 pl-0">
                  <p class="mt-3 mb-0">
                    <strong style="font-family: Arial, Helvetica, sans-serif">ElisaMr</strong>
                  </p>

                  <p style="font-family: Arial, Helvetica, sans-serif;font-size: 13px; color:#777777; ">Recomendado por photogram</p>
                </div>

                <div class="col-2 mt-4">
                      <a href="" class="btn btn-primary btn-sm">{{ __('Seguir') }}</a>
                </div>
            </div>

            {{-- Footer --}}
            <div class="row ">
              <div class="col-12 mt-4 ml-2 ">
                <p style="font-size: 12px; color: #777">&copy; {{ __('2020 PHOTOGRAM DESARROLLADO POR JOVANI MARTINEZ.') }}</p>
              </div>
            </div>
        </div>
      </section>
</div>
@endsection



{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
