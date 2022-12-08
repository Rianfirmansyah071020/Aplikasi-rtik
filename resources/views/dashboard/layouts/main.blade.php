<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="/storage/organisasi/rtik-stmik.jfif" type="image/x-icon">
     <!-- Custom fonts for this template -->
     <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

     <!-- Custom styles for this page -->
     <link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
     <link rel="stylesheet" href="/sass/main.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
     <link rel="stylesheet" type="text/css" href="/trix/trix.css">
    <script type="text/javascript" src="/trix/trix.js"></script>
</head>
<body id="page-top">

    <div id="wrapper">

        {{-- include sidebar --}}
        @include('dashboard.layouts.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                {{-- include topbar --}}
                @include('dashboard.layouts.topbar')

                {{-- sub-title --}}
                <div class="card card-sub-title">
                    <span class="d-flex align-content-end justify-content-end">{{ $sub_title }}</span>
                    @if (session('success'))
                        <div class="alert alert-info alert-dismissible fade show p-3" role="alert">
                            <strong>{{ session('success') }}</strong>
                          </div>
                    @endif
                </div>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Rian Firmansyah {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

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
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Kalau anda keluar anda tidak bisa akses halaman ini lagi</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/assets/js/demo/datatables-demo.js"></script>
</body>
</html>
