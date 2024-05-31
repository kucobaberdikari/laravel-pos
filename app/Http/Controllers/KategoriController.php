<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori.index');
    }


    public function data()
    {
        $kategori = Kategori::orderBy('id_kategori','desc')->get();
        
        return datatables()
        ->of($kategori)
        ->addIndexColumn()
        ->addColumn('action', function ($kategori) {
            return '
            <div class="btn-group">
                <button onclick="detailform(`'. route('kategori.detail', $kategori->id_kategori) .'`)" class="btn btn-md btn-warning"><i class="fa fa-info-circle"></i></button>
                <button onclick="editForm(`'. route('kategori.update', $kategori->id_kategori) .'`)" class="btn btn-md btn-info"><i class="fa fa-pencil"></i></button>
                <button onclick="deleteData(`'. route('kategori.destroy', $kategori->id_kategori) .'`)" class="btn btn-md btn-danger"><i class="fa fa-trash"></i></button>
            </div>
            ';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategori = new Kategori() ?? new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        // return response()->json('Data berhasil disimpan', 200);
        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $kategori = Kategori::find($id);

        return response()->json($kategori);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return response(null, 204);
    }

    public function detail($id){
        // $produk = Produk::where('id_kategori', $id)->get();
        $produk = Produk::where('id_kategori', $id)->get();
        
        // return response()->json(['data' => $produk]);
        return datatables()
        ->of($produk)
        ->addIndexColumn()
        ->addColumn('kode_produk', function ($produk) {
            return '<span class="badge badge-success">'. $produk->kode_produk .'</span>';
        })
        ->addColumn('nama_produk', function ($produk) {
            return $produk->nama_produk;
        })
        ->addColumn('harga_jual', function ($produk) {
            return 'Rp. '. format_uang($produk->harga_jual);
        })
        ->addColumn('stok', function ($produk) {
            return $produk->stok;
        })
        
        ->rawColumns(['kode_produk'])
        ->make(true);
    }
}
