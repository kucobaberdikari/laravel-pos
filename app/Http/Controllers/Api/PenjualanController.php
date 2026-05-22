<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function data()
    {
        $penjualan = Penjualan::orderBy('id_penjualan', 'desc')->get();

         return response()->json([
            'message' => 'success',
            'response' => 200,
            'data' => $penjualan
        ]);

    }
}
