<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monteach</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <style>
        body {
            background-color: #C1B7B7;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #009B12;
            width: 250px;
            height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }

        .main-content {
            margin-left: 250px; 
            width: calc(100% - 250px);
            padding: 20px;
            margin-top: 30px;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 250px; 
            width: calc(100% - 250px); 
            background-color: white; 
            z-index: 1000; 
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Tambah bayangan biar terlihat */
        }

        /* Menu Styling */
        .nav-link {
            display: flex;
            align-items: center;
            color: white;
            padding: 10px;
            border-radius: 10px;
            text-decoration: none;
            transition: background 0.1s;
        }

        .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Ikon Styling */
        .nav-link .iconify {
            font-size: 22px;
            margin-right: 10px;
        }

        /* Saat menu aktif */
        .nav-link.active {
            background-color: white;
            color: black;
        }

        th, td {
            text-align: center;
            vertical-align: middle;
        }

    </style>
</head>

<body>
    <!-- Sidebar Start -->
    <nav class="sidebar text-white">
        <div style="padding-bottom: 30px; position:center;">
            <img src="{{ asset('storage/images/logo.png') }}" alt="logo" style="width: 150px; margin-left:23px;">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('guruPiket.dashboard') ? 'active' : '' }}" href="{{ route('guruPiket.dashboard') }}">
                    <span class="iconify" data-icon="tabler:home" data-width="22"></span>
                    Beranda
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('guruPiket.task') ? 'active' : '' }}" href="{{ route('guruPiket.task') }}">
                    <span class="iconify" data-icon="tabler:clipboard-list" data-width="22"></span>
                    Tugas
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('guruPiket.teacher') ? 'active' : '' }}" href="{{ route('guruPiket.teacher') }}">
                    <span class="iconify" data-icon="tabler:user" data-width="22"></span>
                    Guru
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('guruPiket.picketTeacher') ? 'active' : '' }}" href="{{ route('guruPiket.picketTeacher') }}">
                    <span class="iconify" data-icon="tabler:users" data-width="22"></span>
                    Guru Piket
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('guruPiket.recap') ? 'active' : '' }}" href="{{ route('guruPiket.recap') }}">
                    <span class="iconify" data-icon="tabler:report" data-width="22"></span>
                    Rekap
                </a>
            </li>
        </ul>
    </nav>
    <!-- Sidebar End -->

    <!-- Konten Utama -->
    <div class="main-content">
        <!-- Topbar Start -->
        <div class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid d-flex justify-content-end" style="margin-right: 10px;">
            <span class="navbar-brand me-2">
                    @auth
                        {{ Auth::user()->username }}
                    @else
                        Guru
                    @endauth
                </span>
                <div class="dropdown">
    <span class="iconify dropdown-toggle" data-bs-toggle="dropdown" data-icon="fa6-solid:user" data-width="20" data-height="20" style="cursor: pointer;"></span>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
        </li>
    </ul>
</div>

            </div>
        </div>
        <!-- Topbar End -->

        <!-- Section Start -->
        <!-- Section End -->
        <div class="container mt-4 bg-light" style="width: 100%; height: 85%; border-radius: 10px;">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
