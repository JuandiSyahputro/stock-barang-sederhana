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
    <link href="/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#">STOCK BARANG</a>
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
                        <a class="nav-link {{ Request::is ('/dashboard/tables') ? 'active' : '' }}"
                            href="/dashboard/tables">
                            <div class="sb-nav-link-icon "><i class="fas fa-table "></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="container mx-0">
                    <form action="/logout" method="post" class="btn btn-sm navbar-nav order-1 order-lg-0 mb-1">
                        @csrf
                        <button type="submit" class="side-nav-dark nav-link-icon  border-0 py-2">Logout
                            <i class="fa-solid fa-right-from-bracket mx-1"></i></button>
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
                <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            {{-- Tombol create data --}}
                            <div class="mt-4 mb-1 mx-3">
                                <a class="btn btn-success {{ Request::is ('/dashboard/outlet/create*') ? 'active' : '' }}"
                                    href="/dashboard/outlet/create">Add New <i class="fa-solid fa-store"></i></a>
                            </div>
                            {{-- akhir tombol create --}}
                            <div class="col-lg-8 mx-3 mt-2">
                                @if(session()->has('success'))
                                <div class="alert alert-success" role="alert">{{ session('success') }}
                                </div>
                                @endif
                            </div>
                            <div class="list">
                                <ul class="list-group mt-3 col-lg-3 mx-3 mt-4 li" disabled>
                                    <li class="list-group-item list-group-item-dark text-center king">
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table text-center table-bordered" id="tabel">
                                    <tbody>
                                        <div class="d-grid mx-3">
                                            @foreach ($outlet as $toko)
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="id" value={{ $toko->id }}>
                                                    <a href="/dashboard" type="submit"
                                                        class="btn btn-primary d-md-block col-lg-6 tombol">
                                                        {{ $toko->nama_outlet }} - {{ $toko->lok_outlet }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="/dashboard/outlet/{{ $toko->id }}" method="post"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="hidden" name="id" value="{{ $toko->id }}">
                                                        <button type="submit"
                                                            class="badge rounded-pill bg-danger text-decoration-none border-0"
                                                            onclick="return confirm('Are you sure?')"><i
                                                                class="fa-regular fa-trash-can"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </div>
                                    </tbody>
                                </table>
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
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>

</html>