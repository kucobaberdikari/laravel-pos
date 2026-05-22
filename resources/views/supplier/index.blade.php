@extends('layouts.master')

@section('title')
   Daftar Supplier
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Supplier</li>
@endsection

@section('content')
<div class="container-fluid">
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header with-border">
          <button type="button" class="btn btn-success btn-md" onclick="addForm('{{ route('supplier.store') }}')">
            <i class="fa fa-plus-circle mr-2"></i>Tambah Data
          </button>
        </div>
        <div class="card-body table-responsive">
          <form action="" method="POST" class="form-supplier">
            @csrf
            <table class="table-supplier table table-striped table-bordered">
              <thead>
                <th width="7%">No</th>
                {{-- <th>Kode Supplier</th> --}}
                <th>Nama Supplier</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th width="15%"><i class="fa fa-cog"></i></th>
              </thead>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row (main row) -->
</div>

@includeIf('supplier.form')
@includeIf('supplier.detail')
@endsection

@push('script')
    <script>
      let table, table2;
      $(function() {
        $('body').addClass('sidebar-collapse');

        table = $('.table-supplier').DataTable({
          processing:true,
          autoWidth:false,
          ajax: {
            url: '{{route('supplier.data')}}', 
          },
          columns: [
            // {data: 'select_all', searchable: false, sortable: false}, 
            {data: 'DT_RowIndex', searchable:false, sortable:false},
            {data: 'nama_supplier'},
            {data: 'telepon'},
            {data: 'alamat'},
            {data: 'action', searchable:false, sortable:false},
          ]
        });

        table2 = $('.table-produk').DataTable({
          processing: true,
          bSort: false,
          buttons: [],
          dom: 'Brt',
          columns: [
              {data: 'DT_RowIndex', searchable: false, sortable: false},
              {data: 'foto_produk'},
              {data: 'nama_produk'},
              {data: 'kode_produk'},
          ]
        });

        $('#modal-form').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            }
        });

        // $('[name=select_all]').on('click', function () {
        //     $(':checkbox').prop('checked', this.checked);
        // });
      }); 

      function addForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Supplier');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_supplier]').focus();

      }

      function detailform(url) {
        $('#modal-detail').modal('show');
        $('#modal-detail .modal-title').text('Detail Produk');

        table2.ajax.url(url);
        table2.ajax.reload();
      }

      function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Supplier');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama_supplier]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama_supplier]').val(response.nama_supplier);
                $('#modal-form [name=telepon]').val(response.telepon);
                $('#modal-form [name=alamat]').val(response.alamat);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }

  </script>
@endpush
