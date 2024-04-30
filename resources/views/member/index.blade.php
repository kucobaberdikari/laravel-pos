@extends('layouts.master')

@section('title')
   Daftar Member
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Member</li>
@endsection

@section('content')
<div class="container-fluid">
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header with-border">
          <button class="btn btn-success btn-md" onclick="addForm('{{ route('member.store') }}')">
            <i class="fa fa-plus-circle mr-2"></i>Tambah Data
          </button>
          <button class="btn btn-info btn-md" onclick="cetakMember('{{ route('member.cetak_member') }}')">
            <i class="fa fa-id-card mr-2"></i> Cetak Member
           </button>

        </div>
        <div class="card-body table-responsive">
          <form action="" method="POST" class="form-member">
            @csrf
            <table class="table table-striped table-bordered">
              <thead>
                <th width="5%">
                  <input type="checkbox" name="select_all" id="select_all">
                </th>
                <th width="7%">No</th>
                <th>Kode Member</th>
                <th>Nama</th>
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

@includeIf('member.form')
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
            url: '{{route('member.data')}}', 
          },
          columns: [
            {data: 'select_all', searchable: false, sortable: false}, 
            {data: 'DT_RowIndex', searchable:false, sortable:false},
            {data: 'kode_member'},
            {data: 'nama'},
            {data: 'telepon'},
            {data: 'alamat'},
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

        $('[name=select_all]').on('click', function () {
            $(':checkbox').prop('checked', this.checked);
        });
      }); 

      function addForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Member');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama]').focus();

      }

      function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Member');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama]').val(response.nama);
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

    function cetakMember(url) {
        if ($('input:checked').length < 1) {
          alert('Pilih data yang akan dicetak');
          return;
        } else {
          $('.form-member')
            .attr('target', '_blank')
            .attr('action', url)
            .submit();
        }
    }
  </script>
@endpush
