<?php

namespace App\Livewire\Pos;

use App\Models\Produk;
use Livewire\Component;

class CounterPos extends Component
{ 


        
    public function show()
    {
         $produk = Produk::all();
        // return view('livewire.pos.counter-pos');
        
    }
}
