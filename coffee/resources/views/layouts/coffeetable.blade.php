<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Custom styles for the theme -->
    <style>
        body {
            background: linear-gradient(to right, #ff99cc, #ffccff);
        }
        .sidebar {
            background-color: #d63384;
        }
        .sidebar .nav-item .nav-link {
            color: #fff;
        }
        .sidebar .nav-item .nav-link:hover {
            background-color: #c71585;
        }
        .sidebar .nav-item .nav-link .fas,
        .sidebar .nav-item .nav-link .bi {
            color: #fff;
        }
        .sidebar .sidebar-brand {
            background-color: #c71585;
        }
        .sidebar .sidebar-brand:hover {
            background-color: #b22222;
        }
        .sidebar .sidebar-brand .sidebar-brand-text {
            color: #fff;
        }
        .sidebar .sidebar-brand .sidebar-brand-icon img {
            width: 47px;
            height: 47px;
        }
        .navbar {
            background-color: #fff0f6;
        }
        .navbar .nav-link {
            color: #d63384;
        }
        .navbar .nav-link:hover {
            color: #c71585;
        }
        .footer {
            background-color: #fff0f6;
        }
        .footer .copyright {
            color: #d63384;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon">
                    <img src="https://www.transparentpng.com/thumb/unicorn/I5APeU-unicorn-cute-unicorn-svg-cut-file-scrapbook-cut-file-cute.png" alt="Logo">
                </div>
                <div class="sidebar-brand-text mx-3 ms-1">Colour Land</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Orders -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
                    aria-expanded="true" aria-controls="collapseOrders">
                    <i class="bi bi-basket"></i>
                    <span>คำสั่งซื้อ</span>
                </a>
                <div id="collapseOrders" class="collapse" aria-labelledby="headingOrders"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">คำสั่งซื้อ:</h6>
                        <a class="collapse-item" href="{{ url('/orders') }}">คำสั่งซื้อ</a>
                        <a class="collapse-item" href="{{ url('/acceptorder') }}">คำสั่งซื้อที่ถูกยอมรับ</a>
                        <a class="collapse-item" href="{{ url('/cancelorder') }}">คำสั่งที่ถูกยกเลิก</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Finance -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFinance"
                    aria-expanded="true" aria-controls="collapseFinance">
                    <i class="bi bi-currency-dollar"></i>
                    <span>การเงิน</span>
                </a>
                <div id="collapseFinance" class="collapse" aria-labelledby="headingFinance"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('/checkmoney') }}">ตรวจสอบการโอนเงิน</a>
                        <a class="collapse-item" href="{{ url('/acceptcheckmoney') }}">โอนเงินสำเร็จ</a>
                        <a class="collapse-item" href="{{ url('/rejectcheckmoney') }}">โอนเงินไม่สำเร็จ</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Work -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWork"
                    aria-expanded="true" aria-controls="collapseWork">
                    <i class="bi bi-clipboard2-check"></i>
                    <span>งาน</span>
                </a>
                <div id="collapseWork" class="collapse" aria-labelledby="headingWork" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">งาน:</h6>
                        <a class="collapse-item" href="{{ url('/generatelists') }}">งานที่ต้องมอบหมาย</a>
                        <a class="collapse-item" href="{{ route('allgeneratelist') }}">งานทั้งหมดที่กำลังดำเนินการ</a>
                        <a class="collapse-item" href="{{ route('update.work') }}">งานที่มีการอัพเดต</a>
                        <a class="collapse-item" href="{{ url('/generates') }}">อัตราการผลิต</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Management -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseManagement"
                    aria-expanded="true" aria-controls="collapseManagement">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>จัดการ</span>
                </a>
                <div id="collapseManagement" class="collapse" aria-labelledby="headingManagement"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('/folwers') }}">สินค้า</a>
                        <a class="collapse-item" href="{{ url('/users') }}">ผู้ใช้งาน</a>
                        <a class="collapse-item" href="{{ url('/imageQR') }}">QR Codeรับเงิน</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                @yield('conutcomment')
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    แจ้งเตือน
                                </h6>
                                @yield('alertcomment')
                                <a class="dropdown-item text-center small text-gray-500" href="{{ url('/comments') }}">ดูความคิดเห็นทั้งหมด</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                @yield('countchat')
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                @yield('alertchat')
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('storage/' . Auth::user()->profile_image) }}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" style="margin-bottom: 11rem">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; ColourLand 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
