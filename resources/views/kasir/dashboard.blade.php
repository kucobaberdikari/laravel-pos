@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
   <div class="col-lg-12">
    <div class="card">
      <div class="card-body text-center">
        <h1>Selamat Datang</h1>
        <h2 class="mb-4">Anda login sebagai Kasir</h2>
        <a href="{{route('transaksi.baru')}}" class="btn btn-lg btn-success mb-4"> Transaksi baru</a>
      </div>
    </div>
   </div>
  </div>
</div>
@endsection

