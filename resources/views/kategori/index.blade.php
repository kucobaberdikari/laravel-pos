@extends('layouts.master')

@section('title')
   Daftar Kategori
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Kategori</li>
@endsection

@section('content')
<div class="container-fluid">
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header with-border">
          <button class="btn btn-success btn-md" onclick="addForm('{{route('kategori.store')}}')">
            <i class="fa fa-plus-circle mr-2"></i>Tambah Data
          </button>
        </div>
        <div class="card-body table-responsive">
          <table class="table-kategori table table-striped table-bordered">
            <thead>
              <th width="7%">No</th>
              <th>Kategori</th>
              <th width="15%"><i class="fa fa-cog"></i></th>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row (main row) -->
</div>

@includeIf('kategori.form')
@includeIf('kategori.detail')
@endsection

@push('script')
    <script>
      let table, table2;
      $(function() {
        $('body').addClass('sidebar-collapse');

        table = $('.table-kategori').DataTable({
          processing:true,
          autoWidth:false,
          buttons: [],
          ajax: {
            url: '{{route('kategori.data')}}', 
          },
          columns: [
            {data: 'DT_RowIndex', searchable:false, sortable:false},
            {data: 'nama_kategori'},
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
              {data: 'kode_produk'},
              {data: 'nama_produk'},
              {data: 'harga_jual'},
              {data: 'stok'},
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
      }); 

      function addForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Kategori');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_kategori]').focus();

      }

      function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Kategori');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama_kategori]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama_kategori]').val(response.nama_kategori);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }

    function detailform(url) {
      $('#modal-detail').modal('show');
      $('#modal-detail .modal-title').text('Detail Kategori');

      table2.ajax.url(url);
      table2.ajax.reload();
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
