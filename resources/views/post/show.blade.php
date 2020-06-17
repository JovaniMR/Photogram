
@extends('layouts.app')

@section('content')

<div class="container">

    <section class="row justify-content-center mt-3">

      {{-- Principal content --}}
  
          {{-- Post --}}

        <div class="col-md-5 pr-0 " >

              <img src="{{ asset('storage').'/'.$post->image }}" class="img-fluid" style="width: 100%; height:500px "  alt="...">
               
        </div>  


        <div class="col-md-4 pl-0">
          <div class="card" style="height: 500px">
     
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

            <hr>
 
            {{-- Comments --}}
            <div class="overflow-auto"> 

            @if (count($post->commentsAll) > 0)

              @foreach ($post->commentsAll as $comment )

             
              <div class="row ">
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
            </div> 

            <hr>

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

            {{-- input comments --}}
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <form action="{{ route('comment.store') }}" method="POST">
                  
                  @csrf

                  <input type="hidden" name="id" value="{{ $post->id }}">

                  <input class="border-0" style="width: 77%" type="text" name="comentary" placeholder="{{ __('Agrega un comentario') }}">

                  <button class="mr-0 btn btn-primary btn-sm" type="submit">Publicar</button>

                </form>
                </li>
            </ul>
          </div>
        </div> 
    </section>
</div>
@endsection
