
{{-- Modal for edit profile photo --}}

<div class="modal" id="ModalPhoto" tabindex="-1" role="dialog">
    <form action="{{ route('image') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      @method('PUT')
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{ _('Foto de perfil') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <input type="file" class="form-control-file btn btn-primary" name="photo" id="">        
          </div>

          @error('photo')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
          </div>
        </div>
      </div>
    </form>
  </div>