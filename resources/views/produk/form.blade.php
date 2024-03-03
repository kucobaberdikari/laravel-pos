
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
          {{-- nama produk --}}
          <div class="form-group row">
            <label for="nama_produk" class="col-md-3 col-offset-1 control-label">Nama Produk</label>
            <div class="col-md-9">
              <input type="text"  class="form-control" name="nama_produk" id="nama_produk" required autofocus>
              <span class="help-block with-errors text-danger text-xs"></span>
            </div>
          </div>
          {{-- kategori --}}
          <div class="form-group row">
            <label for="id_kategori" class="col-md-3 col-offset-1 control-label">Kategori</label>
            <div class="col-md-9">
              <select name="id_kategori" id="id_kategori" class="form-control" required>
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $key=>$item)
                  <option value="{{$key}}">{{$item}}</option>
                @endforeach
              </select>
              <span class="help-block with-errors text-danger text-xs"></span>
            </div>
          </div>
          {{-- merk --}}
          <div class="form-group row">
            <label for="merwk" class="col-md-3 col-offset-1 control-label">Merk</label>
            <div class="col-md-9">
              <input type="text"  class="form-control" name="merk" id="merk" required autofocus>
              <span class="help-block with-errors text-danger text-xs"></span>
            </div>
          </div>
          {{-- harga beli --}}
          <div class="form-group row">
            <label for="harga_beli" class="col-md-3 col-offset-1 control-label">Harga Beli</label>
            <div class="col-md-9">
              <input type="number"  class="form-control" name="harga_beli" id="harga_beli" required autofocus>
              <span class="help-block with-errors text-danger text-xs"></span>
            </div>
          </div>
          {{-- harga jual --}}
          <div class="form-group row">
            <label for="harga_jual" class="col-md-3 col-offset-1 control-label">Harga Jual</label>
            <div class="col-md-9">
              <input type="number"  class="form-control" name="harga_jual" id="harga_jual" required autofocus>
              <span class="help-block with-errors text-danger text-xs"></span>
            </div>
          </div>
          {{-- diskon --}}
          <div class="form-group row">
            <label for="diskon" class="col-md-3 col-offset-1 control-label">Diskon</label>
            <div class="col-md-9">
              <input type="number"  class="form-control" name="diskon" id="diskon" value="0">
              <span class="help-block with-errors text-danger text-xs"></span>
            </div>
          </div>
          {{-- stok --}}
          <div class="form-group row">
            <label for="stok" class="col-md-3 col-offset-1 control-label">Stok</label>
            <div class="col-md-9">
              <input type="number"  class="form-control" name="stok" id="stok" value="0" required>
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

