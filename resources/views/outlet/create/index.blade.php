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
    <link href="../../css/styles.css" rel="stylesheet" />
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
                        <a class="nav-link {{ Request::is ('dashboard/outlet*') ? 'active' : '' }}"
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
                    <div class="card mb-5 mt-4 col-lg-8">
                        <div class="card-header">
                            <h2>Create Outlet</h2>
                        </div>
                        <div class="card">
                            <form action="/dashboard/outlet" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="mt-2 mx-3">
                                    <input type="text" class="form-control" name="nama_outlet" id="nama_outlet"
                                        placeholder="Nama Outlet" required autofocus>
                                </div>
                                <div class="mt-2 mx-3 mb-3">
                                    <input type="text" class="form-control" name="lok_outlet" id="lok_outlet"
                                        placeholder="Lokasi Outlet" required>
                                </div>
                                <button type="submit" class="btn btn-success mb-2 mt-4 mx-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Tombol Back --}}
                <div class="mx-4" style="margin-top:170px">
                    <a href="/dashboard/outlet" class="text-decoration-none btn btn-outline-secondary"><i
                            class="fa-solid fa-angles-left"></i> Back </a>
                </div>
                {{-- akhir back --}}
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
    <script src="../../js/scripts.js"></script>
</body>

</html>