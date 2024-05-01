@extends('layouts.master')

@section('title')
   Laporan Pendapatan {{tanggal_indonesia($tanggalAwal, false)}} s/d  {{tanggal_indonesia($tanggalAkhir, false)}}
   <span class="text-md"></span>
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Laporan</li>
@endsection

@section('content')
<div class="container-fluid">
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header with-border">
          <button type="button" class="btn btn-info btn-md" onclick="updatePeriode()">
            <i class="fa fa-plus-circle mr-2"></i>Ubah Periode
          </button>
          
          <a href="{{route ('laporan.export_pdf', [$tanggalAwal, $tanggalAkhir])}}" target="_blank" class="btn btn-success btn-md">
            <i class="far fa-file-excel mr-2"></i>Export PDF
          </a>
        </div>
        <div class="card-body table-responsive">
          <form action="" method="POST" class="form-pengeluaran">
            @csrf
            <table class="table table-striped table-bordered">
              <thead>
                <th width="7%">No</th>
                <th>Tanggal </th>
                <th>Penjualan</th>
                <th>Pembelian</th>
                <th>Pengeluaran</th>
                <th>Pendapatan</th>
              </thead>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row (main row) -->
</div>

@includeIf('laporan.form')
@endsection

@push('script')
    <script>
      let table;
      $(function() {
        $('body').addClass('sidebar-collapse');

        table = $('.table').DataTable({
          responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
          ajax: {
            url: '{{route('laporan.data', [$tanggalAwal, $tanggalAkhir]) }}', 
          },
          columns: [
            {data: 'DT_RowIndex', searchable:false, sortable:false},
            {data: 'tanggal'},
            {data: 'penjualan'},
            {data: 'pembelian'},
            {data: 'pengeluaran'},
            {data: 'pendapatan'}
          ],
            dom: 'Brt',
            buttons: [],
            bSort: false,
            bPaginate: false,
        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
      });

      function updatePeriode() {
        $('#modal-form').modal('show');
      }

  </script>
@endpush
