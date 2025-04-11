<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monteach</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            transition: transform 0.3s ease;
        }

        /* Sidebar hidden on small screens */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
                z-index: 1040;
            }

            .main-content {
                margin-left: 0 !important;
                width: 100% !important;
            }

            .navbar {
                left: 0 !important;
                width: 100% !important;
            }
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
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
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

        .nav-link .iconify {
            font-size: 22px;
            margin-right: 10px;
        }

        .nav-link.active {
            background-color: white;
            color: black;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle;
        }

        /* Hamburger button */
        #sidebarToggle {
            display: none;
        }

        .sidebar.show {
            z-index: 1050;
        }


        #sidebarBackdrop {
            transition: opacity 0.3s ease;
        }


        @media (max-width: 991.98px) {
            #sidebarToggle {
                display: block;
                position: fixed;
                top: 10px;
                left: 10px;
                z-index: 1050;
                background: white;
                border: none;
                padding: 8px 12px;
                border-radius: 5px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            }
        }
    </style>
</head>

<body>
    <!-- Tombol hamburger -->
    <button id="sidebarToggle">&#9776;</button>

    <!-- Sidebar Start -->
    <nav class="sidebar text-white">
        <div style="padding-bottom: 30px;">
            <img src="{{ asset('foto/logo.png') }}" alt="logo" style="width: 150px; margin-left:23px;">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <span class="iconify" data-icon="tabler:home" data-width="22"></span> Beranda
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.task.*') ? 'active' : '' }}"
                    href="{{ route('admin.task.index') }}">
                    <span class="iconify" data-icon="tabler:clipboard-list" data-width="22"></span> Tugas
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.teacher.*') ? 'active' : '' }}"
                    href="{{ route('admin.teacher.index') }}">
                    <span class="iconify" data-icon="tabler:user" data-width="22"></span> Guru
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.picketTeacher.*') ? 'active' : '' }}"
                    href="{{ route('admin.picketTeacher.index') }}">
                    <span class="iconify" data-icon="tabler:users" data-width="22"></span> Guru Piket
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.recap') ? 'active' : '' }}"
                    href="{{ route('admin.recap') }}">
                    <span class="iconify" data-icon="tabler:report" data-width="22"></span> Rekap
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.mapel.*') ? 'active' : '' }}"
                    href="{{ route('admin.mapel.index') }}">
                    <span class="iconify" data-icon="mdi:book" data-width="22"></span> Mapel
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#manageUserDropdown">
                    <span class="iconify" data-icon="tabler:settings" data-width="22"></span> Pengguna
                </a>
                <div class="collapse {{ request()->routeIs('admin.manageUser.*') || request()->routeIs('admin.role.*') ? 'show' : '' }}"
                    id="manageUserDropdown">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.manageUser.index') ? 'active' : '' }}"
                                href="{{ route('admin.manageUser.index') }}">
                                <span class="iconify" data-icon="mdi:account-group-outline" data-width="18"></span>
                                Daftar Pengguna
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.manageUser.create') ? 'active' : '' }}"
                                href="{{ route('admin.manageUser.create') }}">
                                <span class="iconify" data-icon="mdi:account-plus-outline" data-width="18"></span>
                                Tambah Pengguna
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.role.index') ? 'active' : '' }}"
                                href="{{ route('admin.role.index') }}">
                                <span class="iconify" data-icon="mdi:briefcase-outline" data-width="18"></span> Daftar
                                Jabatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.role.create') ? 'active' : '' }}"
                                href="{{ route('admin.role.create') }}">
                                <span class="iconify" data-icon="mdi:briefcase-plus-outline" data-width="18"></span>
                                Tambah Jabatan
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
    <!-- Sidebar End -->

    <!-- Main Content Start -->
    <div class="main-content">
        <!-- Topbar Start -->
        <div class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid d-flex justify-content-end me-2">
                <span class="navbar-brand me-2">
                    @auth
                        {{ Auth::user()->username }}
                    @else
                        Admin
                    @endauth
                </span>
                <div class="dropdown">
                    <span class="iconify dropdown-toggle" data-bs-toggle="dropdown" data-icon="fa6-solid:user"
                        data-width="20" data-height="20" style="cursor: pointer;"></span>
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

        <div class="container mt-4 bg-light" style="width: 100%; height: 85%; border-radius: 10px;">
            @yield('content')
        </div>
    </div>
    <!-- Main Content End -->

    {{-- Sidebar Backdrop --}}
    <div id="sidebarBackdrop"
        style="display: none; position: fixed; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.4); z-index:1030;">
    </div>

    <!-- JavaScript Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleButton = document.getElementById('sidebarToggle');
            const sidebar = document.querySelector('.sidebar');
            const backdrop = document.getElementById('sidebarBackdrop');

            toggleButton.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                backdrop.style.display = sidebar.classList.contains('show') ? 'block' : 'none';
            });

            backdrop.addEventListener('click', function() {
                sidebar.classList.remove('show');
                backdrop.style.display = 'none';
            });
        });
    </script>

</body>

</html>
