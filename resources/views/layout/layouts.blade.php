<!DOCTYPE html>
<html>
<head>
    <title>Mini Market</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">Mini Market</a>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Dashboard</a>
          </li>
          <li>
            <a class="nav-link active" aria-current="page" href="#">Pembelian</a>
          </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navBarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Barang
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{ route('barang.home') }}">Data Barang</a></li>
                  <li><a class="dropdown-item" href="{{ route('barang.create') }}">Tambah</a></li>
                  <li><a class="dropdown-item" href="{{ route('barang.stock') }}">stok</a></li>
                </ul>
              </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('user.index') }}">User</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </nav>
    <!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
