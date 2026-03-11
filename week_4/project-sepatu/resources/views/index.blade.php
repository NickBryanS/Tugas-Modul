<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Manajemen Sepatu</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">CIBADUYUT SHOES</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#wishlistModal"
        onclick="tampilkanWhislist()">
          Wishlist (<span id="wishlist-count">0</span>)
      </button>
      <button id="btn-theme" class="btn btn-outline-light btn-sm">Mode Gelap</button>
      @if(session()->has('user'))
        <span class="text-white me-3">
          {{ session('user') }}
        </span>
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
      @else
        <a href="{{ route('login') }}" class="btn btn-warning btn-sm">Login</a>
      @endif
      </div>
    </nav>
    <!-- Hero Section -->
    <div class="hero text-center text-white d-flex align-items-center">
      <div class="container">
        <h1>Sistem Manajemen Sepatu</h1>
        <p>Kelola Data sepatu dengan mudah</p>
      </div>
    </div>
    <!-- Dashboard -->
    <div class="container mt-5">
      <div class="row text-center">
        <div class="col-md-4">
          <div class="card dashboard-card">
            <div class="card-body">
              <h5>Total Produk</h5>
              <h2>12</h2>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card dashboard-card">
            <div class="card-body">
              <h5>Stok Tersedia</h5>
              <h2>85</h2>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card dashboard-card">
            <div class="card-body">
              <h5>Kategori</h5>
              <h2>3</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Daftar Sepatu -->
    <div class="container mt-5">
      <h3 class="mb-4">Daftar Sepatu</h3>
      <div class="row" id="container-barang">
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <img
              src="{{ asset('assets/AIR_FORCE_1.jpg') }}"
              class="card-img-top"
              alt="Sepatu 1"
            />
            <div class="card-body">
              <h5 class="card-title">Nike Air Force 1</h5>
              <p class="card-text">Harga: Rp 1.300.000</p>
              <p class="stok-text">Stok: 25</p>
              <div class="d-flex justify-content-between">
                <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
                <button class="btn btn-outline-danger btn-wishlist w-50">Wishlist</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <img
              src="{{ asset('assets/AIR_JORDAN_1_LOW.jpg') }}"
              class="card-img-top"
              alt="Sepatu 2"
            />
            <div class="card-body">
              <h5 class="card-title">Nike Air Jordan 1 Low</h5>
              <p class="card-text">Harga: Rp 2.500.000</p>
              <p class="stok-text">Stok: 15</p>
              <div class="d-flex justify-content-between">
                <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
                <button class="btn btn-outline-danger btn-wishlist w-50">Wishlist</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <img
              src="{{ asset('assets/NIKE_P_6000.jpg') }}"
              class="card-img-top"
              alt="Sepatu 3"
            />
            <div class="card-body">
              <h5 class="card-title">Nike P-6000</h5>
              <p class="card-text">Harga: Rp 2.000.000</p>
              <p class="stok-text">Stok: 20</p>
              <div class="d-flex justify-content-between">
                <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
                <button class="btn btn-outline-danger btn-wishlist w-50">Wishlist</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="wishlistModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Daftar Wishlist Saya</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <ul class="list-group" id="daftar-wishlist"></ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-danger" onclick="hapusWishlist()">Kosongkan</button>
          </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Form Tambah Sepatu -->
    <div class="container mt-5 mb-5">
      <h3 class="mb-4">Tambah Sepatu</h3>

      <div class="card p-4">
        <form action="">
          <div class="mb-3">
            <label class="form-label">Nama Sepatu</label>
            <input
              type="text"
              class="form-control"
              placeholder="Masukan nama sepatu"
            />
          </div>
          <div class="mb-3">
            <label for="hargaSepatu" class="form-label">Harga sepatu</label>
            <input
              type="number"
              class="form-control"
              placeholder="Masukan harga sepatu"
            />
          </div>
          <div class="mb-3">
            <label for="stokSepatu" class="form-label">Stok</label>
            <input
              type="number"
              class="form-control"
              placeholder="Masukan stok sepatu"
            />
          </div>
          <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select class="form-select">
              <option>Running</option>
              <option>Basket</option>
              <option>Casual</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
    
    <footer class="bg-dark text-white text-center p-3">
      © 2026 Sistem Manajemen Sepatu
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>