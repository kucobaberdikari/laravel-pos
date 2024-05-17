@extends('layouts.master')

@section('title')
  Edit Profil
@endsection

@section('breadcrumb')
  @parent
  <li class="breadcrumb-item active">Profil</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <form action="{{route ('user.update_profil')}}" class="form-profil" method="post" data-toggle="validator" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="alert alert-info alert-dismissible" style="display: none;">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="icon fa fa-check"></i> Perubahan berhasil disimpan
            </div>
            {{-- <div id="toastsContainerTopRight" class="toasts-top-right fixed d-none">
              <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                  <strong class="mr-auto">Toast Title</strong>
                  <small>Subtitle</small>
                  <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="toast-body">Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</div>
              </div>
            </div> --}}
            <div class="form-group row">
              <label for="name" class="col-md-3 col-offset-1 control-label">Nama </label>
              <div class="col-md-6">
                <input type="text"  class="form-control" name="name" id="name" required autofocus
                value="{{$profil->name}}" >
                <span class="help-block with-errors text-danger text-xs"></span>
              </div>
            </div>
            <div class="form-group row">
              <label for="foto" class="col-md-3 col-offset-1 control-label">Profil</label>
              <div class="col-md-4">
                <input type="file"  class="form-control" name="foto" id="foto"
                  onchange="preview('.tampil-foto', this.files[0])">
                <span class="help-block with-errors text-danger text-xs"></span>
                <div class="mt-4 tampil-foto">
                  <img src="{{ url($profil->foto ?? '/') }}" width="200">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="old_password" class="col-md-3 col-offset-1 control-label">Password Lama</label>
              <div class="col-md-9">
                <input type="password"  class="form-control" name="old_password" id="old_password">
                <span class="help-block with-errors text-danger text-xs"></span>
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-3 col-offset-1 control-label">Password</label>
              <div class="col-md-9">
                <input type="password"  class="form-control" name="password" id="password"  minlength="4">
                <span class="help-block with-errors text-danger text-xs"></span>
              </div>
            </div>
            <div class="form-group row">
              <label for="password_confirmation" class="col-md-3 col-offset-1 control-label">Konfirmasi Password</label>
              <div class="col-md-9">
                <input type="password"  class="form-control" name="password_confirmation" id="password_confirmation"  data-match="#password">
                <span class="help-block with-errors text-danger text-xs"></span>
              </div>
            </div>
          </div>    
          <div class="card-footer">
            {{-- <button type="button" class="btn btn-danger" >Batal</button> --}}
            <button type="submit" class="btn btn-success float-right"><di class="fa fa-save mr-2"></di> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('script')
  <script>
     $(function () {
        $('#old_password').on('keyup', function () {
            if ($(this).val() != "") $('#password, #password_confirmation').attr('required', true);
            else $('#password, #password_confirmation').attr('required', false);
        });

        $('.form-profil').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.ajax({
                    url: $('.form-profil').attr('action'),
                    type: $('.form-profil').attr('method'),
                    data: new FormData($('.form-profil')[0]),
                    async: false,
                    processData: false,
                    contentType: false
                })
                .done(response => {
                    $('[name=name]').val(response.name);
                    $('.tampil-foto').html(`<img src="{{ url('/') }}${response.foto}" width="200">`);
                    $('.img-profil').attr('src', `{{ url('/') }}/${response.foto}`);

                    $('.alert').fadeIn();
                    setTimeout(() => {
                        $('.alert').fadeOut();
                    }, 3000);
                })
                .fail(errors => {
                    if (errors.status == 422) {
                        alert(errors.responseJSON); 
                    } else {
                        alert('Tidak dapat menyimpan data');
                    }
                    return;
                });
            }
        });
    });
  </script>
@endpush