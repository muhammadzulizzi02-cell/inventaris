
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inventaris | Dashboard</title>

    <!-- Font Awesome -->
    <link href="/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">

    <!-- SB Admin -->
    <link href="/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Nunito', sans-serif;
        }

        body {
            background: #f4f7fc;
            margin: 0;
            overflow-x: hidden;
        }

        /* MAIN WRAPPER */
        #wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .custom-sidebar {
            width: 255px;
            min-width: 255px;
            min-height: 100vh;
            background: linear-gradient(180deg, #142b4d 0%, #0d1d36 100%);
            color: white;
            display: flex;
            flex-direction: column;
            transition: all .3s ease;
            z-index: 1000;
            box-shadow: 5px 0 20px rgba(15, 35, 65, .08);
        }

        .sidebar-brand-custom {
            height: 90px;
            display: flex;
            align-items: center;
            padding: 0 25px;
            text-decoration: none !important;
            border-bottom: 1px solid rgba(255,255,255,.08);
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            background: linear-gradient(135deg, #438bff, #1765d1);
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            color: white;
            margin-right: 13px;
            box-shadow: 0 5px 15px rgba(38,117,220,.3);
        }

        .brand-name {
            font-size: 20px;
            font-weight: 900;
            color: white;
            letter-spacing: .3px;
        }

        .brand-subtitle {
            display: block;
            color: #91a9c8;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.5px;
            margin-top: -3px;
        }

        .sidebar-heading-custom {
            padding: 28px 25px 12px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: #8299b8;
            text-transform: uppercase;
        }

        .custom-sidebar .nav-item {
            margin: 3px 13px;
            list-style: none;
        }

        .custom-sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 14px 16px;
            border-radius: 10px;
            color: #b7c7dd;
            font-size: 14px;
            font-weight: 700;
            transition: .25s;
            text-decoration: none;
        }

        .custom-sidebar .nav-link i {
            width: 27px;
            font-size: 17px;
            margin-right: 12px;
            text-align: center;
        }

        .custom-sidebar .nav-link:hover {
            background: rgba(255,255,255,.08);
            color: white;
            transform: translateX(3px);
        }

        .custom-sidebar .nav-item.active .nav-link {
            background: linear-gradient(100deg, #2879e8, #1760c6);
            color: white;
            box-shadow: 0 5px 15px rgba(24,102,205,.25);
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 20px 13px;
            border-top: 1px solid rgba(255,255,255,.08);
        }

        .sidebar-info {
            background: rgba(255,255,255,.06);
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 15px;
            color: #b7c7dd;
            font-size: 11px;
            line-height: 1.6;
        }

        .sidebar-info i {
            color: #55a1ff;
            margin-right: 5px;
        }

        /* CONTENT */
        #content-wrapper {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        #content {
            flex: 1;
        }

        /* TOPBAR */
        .custom-topbar {
            height: 80px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            box-shadow: 0 3px 15px rgba(0,0,0,.035);
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .topbar-title {
            color: #253b5b;
            font-size: 17px;
            font-weight: 800;
            margin: 0;
        }

        .topbar-description {
            color: #9aa8ba;
            font-size: 12px;
            margin: 2px 0 0;
        }

        .sidebar-toggle-custom {
            border: none;
            background: #edf4ff;
            color: #2878e8;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            padding: 7px 13px;
            border: 1px solid #edf0f5;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none !important;
        }

        .user-avatar {
            width: 37px;
            height: 37px;
            border-radius: 50%;
            background: #e8f1ff;
            color: #2878e8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            margin-right: 10px;
        }

        .user-name {
            color: #253b5b;
            font-size: 13px;
            font-weight: 800;
        }

        .user-role {
            color: #9aa8ba;
            font-size: 10px;
        }

        .topbar-user .fa-chevron-down {
            color: #91a0b5;
            font-size: 10px;
            margin-left: 13px;
        }

        /* DROPDOWN */
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,.12);
            padding: 10px;
        }

        .dropdown-item {
            padding: 10px 13px;
            font-size: 13px;
            border-radius: 8px;
            color: #52647d;
        }

        .dropdown-item:hover {
            background: #f0f5ff;
            color: #2878e8;
        }

        /* PAGE CONTENT */
        .main-content {
            padding: 30px 35px;
        }

        /* FOOTER */
        .custom-footer {
            background: white;
            padding: 20px;
            text-align: center;
            color: #9aa8ba;
            font-size: 12px;
            border-top: 1px solid #edf0f5;
        }

        /* SIDEBAR COLLAPSE DESKTOP */
        #wrapper.sidebar-collapsed .custom-sidebar {
            width: 85px;
            min-width: 85px;
        }

        #wrapper.sidebar-collapsed .brand-name,
        #wrapper.sidebar-collapsed .brand-subtitle,
        #wrapper.sidebar-collapsed .sidebar-heading-custom,
        #wrapper.sidebar-collapsed .nav-link span,
        #wrapper.sidebar-collapsed .sidebar-info {
            display: none;
        }

        #wrapper.sidebar-collapsed .sidebar-brand-custom {
            padding: 0;
            justify-content: center;
        }

        #wrapper.sidebar-collapsed .brand-icon {
            margin: 0;
        }

        #wrapper.sidebar-collapsed .nav-link {
            justify-content: center;
            padding: 15px 5px;
        }

        #wrapper.sidebar-collapsed .nav-link i {
            margin: 0;
        }

        /* MOBILE */
        .sidebar-overlay {
            display: none;
        }

        @media (max-width: 768px) {
            .custom-sidebar {
                position: fixed;
                left: -260px;
                top: 0;
                height: 100vh;
                overflow-y: auto;
            }

            #wrapper.mobile-sidebar-open .custom-sidebar {
                left: 0;
            }

            #wrapper.mobile-sidebar-open .sidebar-overlay {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,.45);
                z-index: 999;
            }

            #wrapper.sidebar-collapsed .custom-sidebar {
                width: 255px;
                min-width: 255px;
            }

            #wrapper.sidebar-collapsed .brand-name,
            #wrapper.sidebar-collapsed .brand-subtitle,
            #wrapper.sidebar-collapsed .sidebar-heading-custom,
            #wrapper.sidebar-collapsed .nav-link span,
            #wrapper.sidebar-collapsed .sidebar-info {
                display: initial;
            }

            #wrapper.sidebar-collapsed .sidebar-heading-custom {
                display: block;
            }

            #wrapper.sidebar-collapsed .sidebar-brand-custom {
                padding: 0 25px;
                justify-content: flex-start;
            }

            #wrapper.sidebar-collapsed .brand-icon {
                margin-right: 13px;
            }

            #wrapper.sidebar-collapsed .nav-link {
                justify-content: flex-start;
                padding: 14px 16px;
            }

            #wrapper.sidebar-collapsed .nav-link i {
                margin-right: 12px;
            }

            .custom-topbar {
                height: 70px;
                padding: 0 15px;
            }

            .main-content {
                padding: 20px 15px;
            }

            .topbar-description {
                display: none;
            }
        }
    </style>

</head>

<body id="page-top">

<div id="wrapper">

    <!-- SIDEBAR -->
    <ul class="navbar-nav custom-sidebar" id="accordionSidebar">

        <!-- BRAND -->
        <a class="sidebar-brand-custom" href="/admin">
            <div class="brand-icon">
                <i class="fas fa-boxes"></i>
            </div>

            <div>
                <span class="brand-name">Inventaris</span>
                <span class="brand-subtitle">MANAGEMENT SYSTEM</span>
            </div>
        </a>

        <!-- MENU UTAMA -->
        <div class="sidebar-heading-custom">
            Menu Utama
        </div>

        <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
            <a class="nav-link" href="/admin">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item {{ request()->is('admin/barang*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/barang">
                <i class="fas fa-boxes"></i>
                <span>Data Barang</span>
            </a>
        </li>

        <li class="nav-item {{ request()->is('admin/laporan*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/admin/laporan') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Laporan</span>
    </a>
</li>

        <!-- SIDEBAR BOTTOM -->
        <div class="sidebar-bottom">

            <div class="sidebar-info">
                <i class="fas fa-shield-alt"></i>
                Sistem Inventaris
                <br>
                Kelola persediaan dengan mudah dan teratur.
            </div>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar Sistem</span>
                </a>
            </li>

        </div>

    </ul>

    <!-- OVERLAY MOBILE -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- CONTENT WRAPPER -->
    <div id="content-wrapper">

        <div id="content">

            <!-- TOPBAR -->
            <nav class="custom-topbar">

                <div class="topbar-left">

                    <button class="sidebar-toggle-custom" id="sidebarToggleTop" type="button">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div>
                        <h5 class="topbar-title">Inventory Management</h5>
                        <p class="topbar-description">
                            Sistem Informasi Pengelolaan Inventaris
                        </p>
                    </div>

                </div>

                <!-- USER PROFILE -->
                <ul class="navbar-nav">

                    <li class="nav-item dropdown no-arrow">

                        <a class="topbar-user dropdown-toggle"
                           href="#"
                           id="userDropdown"
                           role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">

                            <div class="user-avatar">
                                <i class="fas fa-user"></i>
                            </div>

                            <div>
                                <div class="user-name">
                                    {{ auth()->user()->username ?? 'Admin' }}
                                </div>
                                <div class="user-role">Administrator</div>
                            </div>

                            <i class="fas fa-chevron-down"></i>

                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow"
                             aria-labelledby="userDropdown">

                            <h6 class="dropdown-header">
                                Akun Pengguna
                            </h6>

                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user mr-2"></i>
                                Profil
                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item"
                               href="#"
                               data-toggle="modal"
                               data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout
                            </a>

                        </div>

                    </li>

                </ul>

            </nav>

            <!-- PAGE CONTENT -->
            <div class="container-fluid main-content">

                @yield('content')

            </div>

        </div>

        <!-- FOOTER -->
        <footer class="custom-footer">
            Copyright &copy; {{ date('Y') }} Sistem Informasi Inventaris.
            All Rights Reserved.
        </footer>

    </div>

</div>

<!-- LOGOUT MODAL -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content" style="border: none; border-radius: 15px;">

            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">
                    Konfirmasi Logout
                </h5>

                <button class="close" type="button" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body text-gray-600">
                Apakah kamu yakin ingin keluar dari sistem inventaris?
            </div>

            <div class="modal-footer">

                <button class="btn btn-light" type="button" data-dismiss="modal">
                    Batal
                </button>

                <!-- LINK LOGOUT LAMA DIPERTAHANKAN -->
                <a class="btn btn-primary" href="login.html">
                    <i class="fas fa-sign-out-alt mr-1"></i>
                    Logout
                </a>

            </div>

        </div>

    </div>

</div>

<!-- JAVASCRIPT -->
<script src="/sbadmin/vendor/jquery/jquery.min.js"></script>
<script src="/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="/sbadmin/js/sb-admin-2.min.js"></script>
<script src="/sbadmin/vendor/chart.js/Chart.min.js"></script>

<script>
    $(document).ready(function () {

        $('#sidebarToggleTop').on('click', function () {

            if (window.innerWidth <= 768) {
                $('#wrapper').toggleClass('mobile-sidebar-open');
            } else {
                $('#wrapper').toggleClass('sidebar-collapsed');
            }

        });

        $('#sidebarOverlay').on('click', function () {
            $('#wrapper').removeClass('mobile-sidebar-open');
        });

    });
</script>

</body>
</html>
