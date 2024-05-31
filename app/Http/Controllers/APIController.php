<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index()
    {
        $produk = Produk::leftJoin('kategori', 'kategori.id_kategori', 'produk.id_kategori')
            ->select('produk.*', 'nama_kategori')
            ->orderBy('kode_produk', 'asc')
            ->get();
        return response()->json([
            'message' => 'success',
            'response' => 200,
            'data' => $produk
        ]);
    }
}
