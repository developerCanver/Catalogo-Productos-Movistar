<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Movistar </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Plugins css-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />


    <!-- App css<link rel="stylesheet" href="{ mix('css/app.css') }}">-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />

    @livewireStyles

</head>

<body data-layout="horizontal">
    <div class="min-h-screen bg-gray-100">
       

        <!-- Page Heading -->
       

        <!-- Page Content -->
    
    </div>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Navigation Bar-->
        @include('layouts.headers')

        
      
        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                {{-- <h4 class="page-title">Nuestros productos</h4> --}}
                                <div class="page-title-right">
                                    <ol class="breadcrumb p-0 m-0">
                                        <li class="breadcrumb-item"><a href="#">
                                            movistar </a></li>

                                    </ol>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- end page title
                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-pink">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><span data-plugin="counterup">50</span></h2>
                                                <p class="mb-0">Daily Visits</p>
                                            </div>
                                            <i class="ion-md-eye"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-purple">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><span data-plugin="counterup">12056</span></h2>
                                                <p class="mb-0">Sales</p>
                                            </div>
                                            <i class="ion-md-paper-plane"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-info">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><span data-plugin="counterup">1268</span></h2>
                                                <p class="mb-0">New Orders</p>
                                            </div>
                                            <i class="ion-ios-pricetag"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-primary">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><span data-plugin="counterup">145</span></h2>
                                                <p class="mb-0">New Users</p>
                                            </div>
                                            <i class="mdi mdi-comment-multiple"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         -->

                    <div class="row">
                        <div class="col-12">
                            @yield('content')
                        </div>
                    </div>

                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end content -->



            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2021 &copy; Developed by <a href="">Coderthemes</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h4 class="font-17 m-0 text-white">Theme Customizer</h4>
        </div>
        <div class="slimscroll-menu">

            <div class="p-4">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, layout, etc.
                </div>
                <div class="mb-2">
                    <img src="assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch"
                        data-appStyle="assets/css/app-rtl.min.css" />
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

            </div>
        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>


    @livewireScripts
    
 {{-- <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Vendor js -->
      <!-- jquery para mensaje de enotificacion-->
      {{-- <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('assets/js/vendor.min.js') }}"></script> --}}

    <script src="{{ asset('assets/libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-scrollto/jquery.scrollTo.min.js') }}"></script>
   

  
    <!-- Todo app -->
    <script src="{{ asset('assets/js/pages/jquery.todo.js') }}"></script>

   

    <!-- Dashboard init JS -->
    <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>



    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

  <!-- Required datatable js -->
  <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Buttons examples -->
  <script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>

  <!-- Responsive examples -->
  <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>

  <script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>

  <!-- Datatables init -->
  <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

  <!-- App js -->
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>

</html>
