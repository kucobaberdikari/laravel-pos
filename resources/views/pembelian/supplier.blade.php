
<div class="modal fade" id="modal-supplier" tabindex="-1" aria-labelledby="modal-supplier" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Pilih Supplier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered table-supplier">
            <thead>
              <th width="5%">No</th>
              <th>Nama</th>
              <th>Telepon</th>
              <th>Alamat</th>
              <th><i class="fa fa-cog"></i></th>
            </thead>
            <tbody>
              @foreach ($supplier as $key => $item)
                  <tr>
                    <td width="5%">{{$key+1}}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                      <a href="{{route('pembelian.create', $item->id_supplier)}}" class="btn btn-primary btn-md">
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

