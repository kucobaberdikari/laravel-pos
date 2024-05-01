
<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="{{route('laporan.index')}}" method="get" class="form-horizontal">
        {{-- @csrf --}}
        {{-- @method('get') --}}
        <div class="modal-header">
          <h5 class="modal-title" >Periode Laporan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="tanggal_awal" class="col-md-3 col-offset-1 control-label">Tanggal Awal</label>
           <div class="input-group date" >
              <input type="date" class="form-control datepicker" id="tanggal_awal" name="tanggal_awal" value="{{ request('tanggal_awal') }}" required autofocus/>
          </div>
          </div>
          <div class="form-group row">
            <label for="tanggal_akhir" class="col-md-3 col-offset-1 control-label">Tanggal Akhir</label>
             <div class="input-group date" >
              <input type="date" class="form-control datepicker" id="tanggal_akhir" name="tanggal_akhir" value="{{ request('tanggal_akhir') ?? date('Y-m-d') }}" required/>
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

