<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/dashboard">STOCK BARANG</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-4" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="btn btn-link btn-sm navbar-nav order-1 order-lg-0 ms-auto me-4 me-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" data-bs-toggle="dropdown"><i
                        class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout <i
                                    class="fa-solid fa-right-from-bracket"></i></button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link {{ Request::is ('dashboard/outlet') ? 'active' : '' }}"
                            href="/dashboard/outlet">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-shop"></i></div>
                            Outlet
                        </a>
                        <a class="nav-link {{ Request::is ('dashboard') ? 'active' : '' }}" href="/dashboard">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-table-columns"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link {{ Request::is ('dashboard/tables*') ? 'active' : '' }}"
                            href="/dashboard/tables">
                            <div class="sb-nav-link-icon "><i class="fas fa-table "></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="container mx-0">
                    <form action="/logout" method="post" class="btn btn-sm navbar-nav order-1 order-lg-0 mb-1">
                        @csrf
                        <button type="submit" class="side-nav-dark nav-link-icon  border-0 py-2">Logout <i
                                class="fa-solid fa-right-from-bracket mx-1"></i></button>
                    </form>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">
                        <p>Logged in as:</p>
                    </div>
                    {{ auth()->user()->name }}
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="col-lg-8">
                        <h1 class="mt-4">Data Table Stock</h1>
                        {{-- Tombol create data --}}
                        <div class="mt-4 mb-3">
                            <a class="btn btn-success {{ Request::is ('/dashboard/create-data') ? 'active' : '' }}"
                                href="/dashboard/tables/create"><i class="fa-regular fa-square-plus"></i> Create
                                Data</a>
                        </div>
                        {{-- akhir tombol create --}}
                        <div>
                            @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif
                        </div>
                        <div class="card mb-4">
                            <div class="card-header king">
                                <h5></h5>
                            </div>
                            <div class="card-body table table-responsive">
                                <table class="table text-center table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Qty</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stocks as $index => $stock_barang)
                                        <tr>
                                            <td>{{ $index + $stocks->firstItem() }}</td>
                                            <td>{{ $stock_barang->nama_barang }}</td>
                                            <td>{{ $stock_barang->qty }}</td>
                                            <td>{{ $stock_barang->tgl_masuk }}</td>
                                            <td>{{ $stock_barang->tgl_keluar }}</td>
                                            <td>
                                                <a href="/dashboard/tables/{{ $stock_barang->id }}/edit"
                                                    class="badge rounded-pill bg-warning text-decoration-none"><i
                                                        class="fa-solid fa-pen-to-square"></i> Edit</a>

                                                <form action="/dashboard/tables/{{ $stock_barang->id }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        class="badge rounded-pill bg-danger text-decoration-none border-0"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="fa-regular fa-trash-can"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $stocks->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-dark mt-auto">
                <div class="container-fluid px-4 ">
                    <div class="align-items-center justify-content-between small">
                        <div class="text-light text-center">
                            <p>Copyright &copy; Juandi, Bayu, Ahsan</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
</body>

</html>