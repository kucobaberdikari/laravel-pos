<div>
    <div class="h-full overflow-hidden mt-4">
        <div class="h-full overflow-y-auto px-2">
            <div  class="grid grid-cols-4 gap-4 pb-3">
                @forelse ($produk as $product)
                    <template >
                        <div
                            role="button"
                            class="select-none cursor-pointer transition-shadow overflow-hidden rounded-2xl bg-white shadow hover:shadow-lg"
                            
                            x-on:click="addToCart(product)"
                        >
                            <img src="{{asset('image/produk/beef-burger.png')}}" >
                            <div class="flex pb-3 px-3 text-sm -mt-3">
                                <p class="flex-grow truncate mr-1" >{{$product->nama_produk}}</p>
                                <p class="nowrap font-semibold" >Rp {{$product->harga_jual}}</p>
                            </div>
                        </div>
                    </template>
                @empty
                <div class="w-full text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <p class="text-xl">
                        EMPTY SEARCH RESULT
                        <br/>
                        "<span  class="font-semibold"></span>"
                    </p>
                    </div>
                </div> 
                @endforelse
            </div>
        </div>
    </div>
</div>
