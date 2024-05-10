@extends('layouts.master')

@section('title')
  Pengaturan
@endsection

@section('breadcrumb')
  @parent
  <li class="breadcrumb-item active">Pengaturan</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <form action="{{route ('setting.update')}}" class="form-setting" method="post" data-toggle="validator" enctype="multipart/form-data">
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
              <label for="nama_perusahaan" class="col-md-3 col-offset-1 control-label">Nama Perusahaan</label>
              <div class="col-md-6">
                <input type="text"  class="form-control" name="nama_perusahaan" id="nama_perusahaan" required autofocus>
                <span class="help-block with-errors text-danger text-xs"></span>
              </div>
            </div>
            <div class="form-group row">
              <label for="alamat" class="col-md-3 col-offset-1 control-label">Alamat</label>
              <div class="col-md-6">
                <textarea rows="5" class="form-control" name="alamat" id="alamat" required> </textarea>
                <span class="help-block with-errors text-danger text-xs"></span>
              </div>
            </div>
            <div class="form-group row">
              <label for="telepon" class="col-md-3 col-offset-1 control-label">Telepon</label>
              <div class="col-md-6">
                <input type="text"  class="form-control" name="telepon" id="telepon" required>
                <span class="help-block with-errors text-danger text-xs"></span>
              </div>
            </div>
            <div class="form-group row">
              <label for="path_logo" class="col-md-3 col-offset-1 control-label">Logo Perusahaan</label>
              <div class="col-md-4">
                <input type="file"  class="form-control" name="path_logo" id="path_logo"
                  onchange="preview('.tampil-logo', this.files[0])">
                <span class="help-block with-errors text-danger text-xs"></span>
                <div class="mt-4 tampil-logo"></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="path_kartu_member" class="col-md-3 col-offset-1 control-label">Kartu Member</label>
              <div class="col-md-4">
                <input type="file"  class="form-control" name="path_kartu_member" id="path_kartu_member"
                  onchange="preview('.tampil-kartu-member', this.files[0], 300)">
                <span class="help-block with-errors text-danger text-xs"></span>
                <div class="mt-4 tampil-kartu-member"></div>
              </div>
            </div>
            <div class="form-group row">
              <label for="diskon" class="col-md-3 col-offset-1 control-label">Diskon</label>
              <div class="col-md-6">
                <input type="text"  class="form-control" name="diskon" id="diskon" required>
                <span class="help-block with-errors text-danger text-xs"></span>
              </div>
            </div>
            <div class="form-group row">
              <label for="tipe_nota" class="col-md-3 col-offset-1 control-label">Tipe Nota</label>
              <div class="col-md-6">
                <select class="form-control" name="tipe_nota" id="tipe_nota" required>
                  <option value="1">Nota Kecil</option>
                  <option value="2">Nota Besar</option>
                 </select>
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
      showData();

      $('.form-setting').validator().on('submit', function (e) {
        if (! e.preventDefault()) {
          $.ajax({
            url: $('.form-setting').attr('action'),
            type: $('.form-setting').attr('method'),
            data: new FormData($('.form-setting')[0]),
            async: false,
            processData: false,
            contentType: false
          })
          .done(response => {
            showData();
            $('.alert').fadeIn();

            setTimeout(() => {
                // $('#toastsContainerTopRight').fadeOut();
                $('.alert').fadeOut();
            }, 3000);
          })
          .fail(errors => {
            alert('Tidak dapat menyimpan data !');
            return;
          });
        }
      });
    });

    function showData() {
      $.get('{{ route('setting.show') }}')
        .done(response => {
          $('[name=nama_perusahaan]').val(response.nama_perusahaan);
          $('[name=telepon]').val(response.telepon);
          $('[name=alamat]').val(response.alamat);
          $('[name=diskon]').val(response.diskon);
          $('[name=tipe_nota]').val(response.tipe_nota);
          $('title').text(response.nama_perusahaan + ' | Pengaturan');
          
          let words = response.nama_perusahaan.split(' ');
          let word  = '';
          words.forEach(w => {
              word += w.charAt(0);
          });
          $('.logo-mini').text(word);
          $('.logo-lg').text(response.nama_perusahaan);

          $('.tampil-logo').html(`<img src="{{ url('/') }}${response.path_logo}" width="200">`);
          $('.tampil-kartu-member').html(`<img src="{{ url('/') }}${response.path_kartu_member}" width="300">`);
          $('[rel=icon]').attr('href', `{{ url('/') }}/${response.path_logo}`);
        })
        .fail(errors => {
          alert('Tidak dapat menampilkan data');
          return;
      });
    }
  </script>
@endpush

{{-- <div id="toastsContainerTopRight" class="toasts-top-right fixed">
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