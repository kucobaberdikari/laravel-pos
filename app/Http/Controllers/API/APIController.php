<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index()
    {
        $produk = Produk::
            leftJoin('kategori', 'kategori.id_kategori', 'produk.id_kategori')
            ->select('produk.*', 'nama_kategori')
            // orderBy('kode_produk', 'asc')
            ->get();
        return response()->json([
            'message' => 'success',
            'response' => 200,
            'data' => $produk
        ]);
    }

    public function penjualan( Request $request)
    {
        // $per_page = $request->get('per_page');
        
        $penjualan = Penjualan::paginate(10);
        return response()->json([
            'message' => 'success',
            'response' => 200,
            'data' => $penjualan
        ]);
    }
}
