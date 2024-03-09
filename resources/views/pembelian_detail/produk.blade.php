
<div class="modal fade" id="modal-produk" tabindex="-1" aria-labelledby="modal-produk" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Pilih Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered table-produk">
            <thead>
              <th width="5%">No</th>
              <th>Kode</th>
              <th>Nama</th>
              <th>Harga Beli</th>
              <th><i class="fa fa-cog"></i></th>
            </thead>
            <tbody>
              @foreach ($produk as $key => $item)
                  <tr>
                    <td width="5%">{{$key+1}}</td>
                    <td><span class="label badge-success">{{ $item->kode_produk }}</span></td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->harga_beli }}</td>
                    <td>
                      <a href="#" class="btn btn-primary btn-md"
                        onclick="pilihProduk('{{ $item->id_produk }}', '{{ $item->kode_produk }}')">
                        <i class="fa fa-check-circle mr-2"></i>
                        Pilih
                      </a>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div> --}}
    </div>
  </div>
</div> 

