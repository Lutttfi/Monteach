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
            height: 100vh;
            width: 250px;
            padding: 20px;
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

        .navbar .container-fluid {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
        }

        .nav-link:hover {
            color: white;
            background-color: inherit;
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
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar Start -->
        <nav class="sidebar text-white">
            <div class="mb-4">
                <h2>LOGO</h2>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <span class="iconify" data-icon="tabler:home" data-width="22"></span>
                        Beranda
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('tugas') ? 'active' : '' }}" href="{{ route('tugas') }}">
                        <span class="iconify" data-icon="tabler:clipboard-list" data-width="22"></span>
                        Tugas
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('guru*') ? 'active' : '' }}" href="{{ route('guru.index') }}">
                        <span class="iconify" data-icon="tabler:user" data-width="22"></span>
                        Guru
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('picketTeach') ? 'active' : '' }}" href="{{ route('picketTeach') }}">
                        <span class="iconify" data-icon="tabler:users" data-width="22"></span>
                        Guru Piket
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('rekap') ? 'active' : '' }}" href="{{ route('rekap') }}">
                        <span class="iconify" data-icon="tabler:report" data-width="22"></span>
                        Rekap
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('manageUser') ? 'active' : '' }}" href="{{ route('manageUser') }}">
                        <span class="iconify" data-icon="tabler:settings" data-width="22"></span>
                        Manage User
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Sidebar End -->

        <!-- Topbar Start -->
        <div class="flex-grow-1">
            <div class="navbar navbar-expand-lg navbar-light bg-white">
                <div class="container-fluid d-flex justify-content-end">
                <span class="navbar-brand me-2">Admin</span>
                <!-- Dropdown untuk Logout -->
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
            <div class="container mt-4 bg-light" style="width: 96%; height: 85%; border-radius: 10px;">
                @yield('content')
            </div>
            <!-- Section End -->
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
