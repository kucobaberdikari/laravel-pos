@extends('layouts.master')

@section('title')
   Daftar Pengeluaran
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Pengeluaran</li>
@endsection

@section('content')
<div class="container-fluid">
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header with-border">
          <button type="button" class="btn btn-success btn-md" onclick="addForm('{{ route('pengeluaran.store') }}')">
            <i class="fa fa-plus-circle mr-2"></i>Tambah Data
          </button>
        </div>
        <div class="card-body table-responsive">
          <form action="" method="POST" class="form-pengeluaran">
            @csrf
            <table class="table table-striped table-bordered">
              <thead>
                <th width="7%">No</th>
                {{-- <th>Kode Pengeluaran</th> --}}
                <th>Tanggal Pengeluaran</th>
                <th>Deskripsi</th>
                <th>Nominal</th>
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

@includeIf('pengeluaran.form')
@endsection

@push('script')
    <script>
      let table;
      $(function() {
        $('body').addClass('sidebar-collapse');

        table = $('.table').DataTable({
          processing:true,
          autoWidth:false,
          ajax: {
            url: '{{route('pengeluaran.data')}}', 
          },
          columns: [
            {data: 'DT_RowIndex', searchable:false, sortable:false},
            {data: 'created_at'},
            {data: 'deskripsi'},
            {data: 'nominal'},
            {data: 'action', searchable:false, sortable:false},
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
        $('#modal-form .modal-title').text('Tambah Pengeluaran');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=deskripsi]').focus();

      }

      function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Pengeluaran');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=deskripsi]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=deskripsi]').val(response.deskripsi);
                $('#modal-form [name=nominal]').val(response.nominal);
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
