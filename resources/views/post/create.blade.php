
{{-- Modal for create post  --}}

<div class="modal" id="ModalPost" tabindex="-1" role="dialog">
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{ _('Crear publicación') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body ">

            {{-- Photo --}}
              <div class="form-group">
                  <input type="file" class="form-control-file btn btn-primary" name="photo" id="" required>        
              </div>

              @error('photo')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
               
            {{-- Descripcion  --}}
              <div class="form-group">
                <textarea name="description" class="form-control h-50" id="exampleFormControlTextarea1" rows="3" placeholder="{{ _('Escribe una descripción') }}" required>
                </textarea>
              </div>

              @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror 
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">{{ __('Publicar') }}</button>
          </div>
        </div>
      </div>
    </form>
  </div>