@extends('layouts.master')

@section('title')
  Transaksi Penjualan
@endsection

@push('css')
<style>
    .tampil-bayar {
        font-size: 5em;
        text-align: center;
        height: 100px;
    }

    .tampil-terbilang {
        padding: 10px;
        background: #f0f0f0;
    }

    .table-penjualan tbody tr:last-child {
        display: none;
    }

    @media(max-width: 768px) {
        .tampil-bayar {
            font-size: 3em;
            height: 70px;
            padding-top: 5px;
        }
    }
</style>
@endpush

@section('breadcrumb')
    @parent
    {{-- <li class="breadcrumb-item active"><a href="{{route('penjualan.index')}}">Penjualan</a></li> --}}
    <li class="breadcrumb-item active">Transaksi Penjualan</li>
@endsection

@section('content')
<div class="container-fluid">
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body table-responsive">
            <form class="form-produk">
            @csrf
            <div class="form-group row">
                <label for="kode_produk" class="col-lg-2">Kode Produk</label>
                <div class="col-lg-5">
                <div class="input-group">
                    <input type="hidden" name="id_penjualan" value="{{ $id_penjualan }}">
                    <input type="hidden" name="id_produk" id="id_produk">
                    <input type="text" class="form-control " name="kode_produk" id="kode_produk">
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-flat" type="button" onclick="tampilProduk()">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </span>
                </div>
                </div>
            </div>
            </form>

            <table class="table table-striped table-bordered table-penjualan">
                <thead>
                    <th width="7%">No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th width="15%" >Jumlah Barang</th>
                    <th>Diskon</th>
                    <th>Subtotal</th>
                    <th width="10%"><i class="fa fa-cog"></i></th>
                </thead>
            </table>

            <div class="row">
                <div class="col-lg-8">
                    <div class="tampil-bayar bg-primary"></div>
                    <div class="tampil-terbilang"></div>
                </div>
                <div class="col-lg-4">
                    <form action="{{ route('transaksi.simpan') }}" class="form-penjualan" method="post">
                        @csrf
                        <input type="hidden" name="id_penjualan" value="{{ $id_penjualan }}">
                        <input type="hidden" name="total" id="total">
                        <input type="hidden" name="total_item" id="total_item">
                        <input type="hidden" name="bayar" id="bayar">
                        <input type="hidden" name="id_member" id="id_member" " value="{{ $memberSelected->id_member }}">

                        <div class="form-group row">
                            <label for="totalrp" class="col-lg-4 control-label">Total</label>
                            <div class="col-lg-8">
                                <input type="text" id="totalrp" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_member" class="col-lg-4 control-label">Member</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="kode_member" value="{{ $memberSelected->kode_member }}" >
                                    <span class="input-group-btn">
                                        <button onclick="tampilMember()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="diskon" class="col-lg-4 control-label">Diskon</label>
                            <div class="col-lg-8">
                                <input type="number" name="diskon" id="diskon" class="form-control" value="{{ ! empty($memberSelected->id_member) ? $diskon : 0 }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bayar" class="col-lg-4 control-label">Bayar</label>
                            <div class="col-lg-8">
                                <input type="text" id="bayarrp" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="diterima" class="col-lg-4 control-label">Diterima</label>
                            <div class="col-lg-8">
                                <input type="number" id="diterima" name="diterima" value="{{$penjualan->diterima ?? 0}}" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kembali" class="col-lg-4 control-label">Kembali</label>
                            <div class="col-lg-8">
                                <input type="text" id="kembali" name="kembali" class="form-control" readonly>
                            </div>
                        </div>
                    </form>
                </div>
          </div>
        </div>
        <div class="modal-footer ">
            <button type="submit" class="btn btn-primary btn-sm btn-flat pull-right btn-simpan"><i class="fa fa-floppy-o"></i> Simpan Transaksi</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row (main row) -->
</div>

@includeIf('penjualan_detail.produk')
@includeIf('penjualan_detail.member')
@endsection

@push('script')
<script>
  let table, table2;

  $(function () {
        $('body').addClass('sidebar-collapse');

        table = $('.table-penjualan').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('transaksi.data', $id_penjualan) }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_produk'},
                {data: 'nama_produk'},
                {data: 'harga_jual'},
                {data: 'jumlah'},
                {data: 'diskon'},
                {data: 'subtotal'},
                {data: 'aksi', searchable: false, sortable: false},
            ],
            dom: 'Brt',
            bSort: false,
            buttons: [],
            paginate: false
        })
        .on('draw.dt', function () {
            loadForm($('#diskon').val());
            setTimeout(() => {
                $('#diterima').trigger('input');
            }, 300);
        });
        table2 = $('.table-produk').DataTable();

        $(document).on('input', '.quantity', function () {
            let id = $(this).data('id');
            let jumlah = parseInt($(this).val());

            if (jumlah < 1) {
                $(this).val(1);
                alert('Jumlah tidak boleh kurang dari 1');
                return;
            }
            if (jumlah > 10000) {
                $(this).val(10000);
                alert('Jumlah tidak boleh lebih dari 10000');
                return;
            }

            $.post(`{{ url('/transaksi') }}/${id}`, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'put',
                    'jumlah': jumlah
                })
                .done(response => {
                    $(this).on('mouseout', function () {
                        table.ajax.reload(() => loadForm($('#diskon').val()));
                    });
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
        });

        $(document).on('input', '#diskon', function () {
            if ($(this).val() == "") {
                $(this).val(0).select();
            }

            loadForm($(this).val());
        });

        $('#diterima').on('input', function () {
            if ($(this).val() == "") {
                $(this).val(0).select();
            }

            loadForm($('#diskon').val(), $(this).val());
        }).focus(function () {
            $(this).select();
        }); 

        $('.btn-simpan').on('click', function () {
            $('.form-penjualan').submit();
        });
    });


  function tampilProduk() {
      $('#modal-produk').modal('show');
  }
  
  function hideProduk() {
      $('#modal-produk').modal('hide');
  }

  function tampilMember() {
      $('#modal-member').modal('show');
  }

  function pilihMember(id, kode) {
        $('#id_member').val(id);
        $('#kode_member').val(kode);
        $('#diskon').val('{{ $diskon }}');
        loadForm($('#diskon').val());
        $('#diterima').val(0).focus().select();
        hideMember();
    }

    function hideMember() {
        $('#modal-member').modal('hide');
    }

  function pilihProduk(id, kode) {
      $('#id_produk').val(id);
      $('#kode_produk').val(kode);
      hideProduk();
      tambahProduk();
  }

  function tambahProduk() {
      $.post('{{ route('transaksi.store') }}', $('.form-produk').serialize())
          .done(response => {
              $('#kode_produk').focus();
              table.ajax.reload(() => loadForm($('#diskon').val()));
          })
          .fail(errors => {
              alert('Tidak dapat menyimpan data');
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
                  table.ajax.reload(() => loadForm($('#diskon').val()));
              })
              .fail((errors) => {
                  alert('Tidak dapat menghapus data');
                  return;
              });
      }
  }

  function loadForm(diskon = 0, diterima = 0) {
      $('#total').val($('.total').text());
      $('#total_item').val($('.total_item').text());

      $.get(`{{ url('/transaksi/loadform') }}/${diskon}/${$('.total').text()}/${diterima}`)
          .done(response => {
              $('#totalrp').val('Rp. '+ response.totalrp);
              $('#bayarrp').val('Rp. '+ response.bayarrp);
              $('#bayar').val(response.bayar);
              $('.tampil-bayar').text('Rp. '+ response.bayarrp);
              $('.tampil-terbilang').text(response.terbilang);

              $('#kembali').val('Rp.'+ response.kembalirp);
                if ($('#diterima').val() != 0) {
                    $('.tampil-bayar').text('Kembali: Rp. '+ response.kembalirp);
                    $('.tampil-terbilang').text(response.kembali_terbilang);
                }
          })
          .fail(errors => {
              alert('Tidak dapat menampilkan data');
              return;
          })
  }
</script>
@endpush
