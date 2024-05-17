<aside class="main-sidebar sidebar-light-teal elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="{{ url($setting->path_logo) }}" class="brand-image mr-3">
    <span class="brand-text text-lg font-weight-medium text-capitalize">{{ $setting->nama_perusahaan }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
        @if (auth()->user()->level == 1)
          <li class="nav-header">Master</li>
            <li class="nav-item">
              <a href="{{route('kategori.index')}}" class="nav-link {{ Request::is('kategori*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-cube"></i>
                <p class="text-capitalize">
                  Kategori
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('produk.index')}}" class="nav-link {{ Request::is('produk*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-cubes"></i>
                <p class="text-capitalize">
                  Produk
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('member.index')}}" class="nav-link {{ Request::is('member*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-id-card"></i>
                <p class="text-capitalize">
                  member
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route ('supplier.index')}}" class="nav-link {{ Request::is('supplier*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-truck"></i>
                <p class="text-capitalize">
                  supplier
                </p>
              </a>
            </li>
         
          <li class="nav-header">Transaksi</li>
            <li class="nav-item">
              <a href="{{route ('pengeluaran.index')}}" class="nav-link {{ Request::is('pengeluaran*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-money-bill-wave-alt"></i>
                <p class="text-capitalize">
                  pengeluaran
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('pembelian.index')}}" class="nav-link {{ Request::is('pembelian*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-file-download"></i>
                <p class="text-capitalize">
                  pembelian
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('penjualan.index')}}" class="nav-link {{ Request::is('penjualan*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-file-upload"></i>
                <p class="text-capitalize">
                  penjualan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('transaksi.index')}}" class="nav-link {{ Request::is('transaksi.index*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-cart-arrow-down"></i>
                <p class="text-capitalize">
                  Transaksi Aktif
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('transaksi.baru')}}" class="nav-link {{ Request::is('transaksi.baru*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-cart-arrow-down"></i>
                <p class="text-capitalize">
                  Transaksi Baru
                </p>
              </a>
            </li>
          
          <li class="nav-header">Report</li>
            <li class="nav-item">
              <a href="{{route ('laporan.index')}}" class="nav-link {{ Request::is('laporan*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-file-pdf"></i>
                <p class="text-capitalize">
                  laporan
                </p>
              </a>
            </li>

          <li class="nav-header">System</li>
            <li class="nav-item">
              <a href="{{route('user.index')}}" class="nav-link {{ Request::is('produk*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-user"></i>
                <p class="text-capitalize">
                  User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('setting.index')}}" class="nav-link {{ Request::is('produk*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-cogs"></i>
                <p class="text-capitalize">
                  Pengaturan
                </p>
              </a>
            </li>
      @else
      <li class="nav-item">
        <a href="{{route('transaksi.index')}}" class="nav-link {{ Request::is('transaksi.index*') ? 'active' : '' }} ">
          <i class="nav-icon fas fa-cart-arrow-down"></i>
          <p class="text-capitalize">
            Transaksi Aktif
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('transaksi.baru')}}" class="nav-link {{ Request::is('transaksi.baru*') ? 'active' : '' }} ">
          <i class="nav-icon fas fa-cart-arrow-down"></i>
          <p class="text-capitalize">
            Transaksi Baru
          </p>
        </a>
      </li>
      @endif
      </ul>
      
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>