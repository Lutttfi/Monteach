<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Monteach</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

    <style>
        body {
            background-color: #c1b7b7;
        }

        /* Sidebar */
        .sidebar {
            background-color: #009b12;
            padding: 20px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            z-index: 1050;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        .sidebar .nav-link {
            color: white;
            padding: 10px 15px;
            border-radius: 15px;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
        }

        .sidebar .nav-link.active {
            background-color: white;
            color: black;
        }

        .sidebar .iconify {
            font-size: 20px;
            margin-right: 10px;
        }

        .main-content {
            margin-left: 260px;
            padding: 20px;
            margin-top: 70px;
        }

        .navbar {
            background-color: white;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            position: fixed;
            top: 0;
            left: 260px;
            width: calc(100% - 260px);
        }

        /* Backdrop for mobile */
        .sidebar-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            display: none;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                left: -260px;
            }

            .sidebar.show {
                left: 0;
            }

            .navbar {
                left: 0;
                width: 100%;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar-backdrop.show {
                display: block;
            }
        }
    </style>
</head>

<body>
    <!-- Backdrop -->
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler me-2" type="button" id="sidebarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-brand ms-auto me-2">
                @auth
                    {{ Auth::user()->username }}
                @else
                    Guru
                @endauth
            </span>
            <div class="dropdown">
                <span class="iconify dropdown-toggle" data-bs-toggle="dropdown" data-icon="fa6-solid:user"
                    style="cursor: pointer;"></span>
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
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebarMenu">
        <div class="text-center mb-4">
            <img src="{{ asset('foto/logo.png') }}" alt="logo" style="width: 150px;">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('guruPiket.dashboard') ? 'active' : '' }}"
                    href="{{ route('guruPiket.dashboard') }}">
                    <span class="iconify" data-icon="tabler:home"></span> Beranda
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('guruPiket.task') ? 'active' : '' }}"
                    href="{{ route('guruPiket.task') }}">
                    <span class="iconify" data-icon="tabler:clipboard-list"></span> Tugas
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('guruPiket.teacher') ? 'active' : '' }}"
                    href="{{ route('guruPiket.teacher') }}">
                    <span class="iconify" data-icon="tabler:user"></span> Guru
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('guruPiket.picketTeacher') ? 'active' : '' }}"
                    href="{{ route('guruPiket.picketTeacher') }}">
                    <span class="iconify" data-icon="tabler:users"></span> Guru Piket
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('guruPiket.recap') ? 'active' : '' }}"
                    href="{{ route('guruPiket.recap') }}">
                    <span class="iconify" data-icon="tabler:report"></span> Rekap
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container mt-4 bg-light" style="border-radius: 10px;">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const sidebar = document.getElementById('sidebarMenu');
        const backdrop = document.getElementById('sidebarBackdrop');
        const toggle = document.getElementById('sidebarToggle');

        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            backdrop.classList.toggle('show');
        });

        backdrop.addEventListener('click', () => {
            sidebar.classList.remove('show');
            backdrop.classList.remove('show');
        });
    </script>
</body>

</html>
