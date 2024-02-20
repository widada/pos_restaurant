<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Resto</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/user/user">Administrator</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="/logout">
        Logout <span data-feather="log-out"></span></a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark  sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('user/user') ? 'active' : ''}}" aria-current="page" href="/user/user">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('user/kategori') ? 'active' : ''}}" href="/user/kategori">
              <span data-feather="book-open"></span>
              Kategori
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('user/menu') ? 'active' : ''}}" href="/user/menu">
            <span data-feather="shopping-cart"></span>
            Makanan & Minuman
          </a>
        </li>
          <li class="nav-item">
              <a class="nav-link {{ Request::is('user/promo') ? 'active' : ''}}" href="/user/promo">
                  <span data-feather="gift"></span>
                  Banner Promo
                </a>
          </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('user/orderan') ? 'active' : ''}}" href="/user/orderan">
                    <span data-feather="phone-missed"></span>
                    Orderan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('user/pengguna') ? 'active' : ''}}" href="/user/pengguna">
                    <span data-feather="user"></span>
                    Pengguna
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @if (Session::has('success'))
          <div class="pt-3">
            <div class="alert alert-success">
              {{ Session::get('success') }}
            </div>
          </div>
      @endif
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Menu</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          </div>
        </div>
      </div>
      <div class="pb-3">
        <form class="d-flex" action="{{ url('user/menu')}}" method="GET">
          <input class="form-control me-1" type="search" name="pencarian" value="{{ Request::get('pencarian') }}"
          placeholder="Kolom Pencarian" aria-label="Search">
          <button class="btn btn-secondary" type="submit">Search</button>
        </form>
      </div>
      <a href="/user/menu/create" class="btn btn-primary"><span data-feather="plus"></span>
        Tambah Daftar Menu </a>
        <br><br>
      <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Kategori</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
        
          {{-- @foreach ($kategori as $item) --}}
              
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->picture }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->status }}</td>
            <td>{{ $product->category->name }}</td>
            <td>
              <a href="" class="btn btn-warning"><span data-feather="edit"></span></a>
              <button type="submit" name="submit" class="btn btn-danger"><span data-feather="delete"></span></button>
            </form>
          </td>
        </tr>
        {{-- @endforeach --}}
      @endforeach
      </table>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
        </table>
      </div>
    </main>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="/js/dashboard.js"></script>
  </body>
</html>
