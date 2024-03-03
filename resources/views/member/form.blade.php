
<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="" method="post" class="form-horizontal">
        @csrf
        @method('post')
        <div class="modal-header">
          <h5 class="modal-title" ></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="nama" class="col-md-3 col-offset-1 control-label">Nama </label>
            <div class="col-md-9">
              <input type="text"  class="form-control" name="nama" id="nama" required autofocus>
              <span class="help-block with-errors text-danger text-xs"></span>
            </div>
          </div>
          <div class="form-group row">
            <label for="telepon" class="col-md-3 col-offset-1 control-label">Telepon</label>
            <div class="col-md-9">
              <input type="text"  class="form-control" name="telepon" id="telepon" required autofocus>
              <span class="help-block with-errors text-danger text-xs"></span>
            </div>
          </div>
          <div class="form-group row">
            <label for="alamat" class="col-md-3 col-offset-1 control-label">Alamat</label>
            <div class="col-md-9">
              <textarea rows="3" class="form-control" name="alamat" id="alamat" ></textarea>
              <span class="help-block with-errors text-danger text-xs"></span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div> 

