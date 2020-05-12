<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="StartProject">
        <meta name="author" content="StartProject">

        <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}">

        <title>@yield('title')</title>

        <!-- DataTables -->
        <link href="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('admin/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Multi Item Selection examples -->
        <link href="{{ asset('admin/assets/plugins/datatables/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Plugins css-->
        <link href="{{ asset('admin/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/assets/plugins/multiselect/css/multi-select.css') }}"  rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/assets/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

        <!-- Notification css (Toastr) -->
        <link href="{{ asset('admin/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        @if (\Auth::user()->UserSetting->dark_mode)
            <link href="{{ asset('admin/assets/css/style_dark.css') }}" rel="stylesheet" type="text/css" />
        @else
            <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        @endif
        
        <script src="{{ asset('admin/assets/js/modernizr.min.js') }}"></script>
        
        {{-- My css --}}
        <link href="{{ asset('css/my-css.css') }}" rel="stylesheet" type="text/css" />

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div style="background: unset;" class="topbar-left">
                    <a href="{{ route('adm.index') }}" class="logo">
                        @if (\Auth::user()->UserSetting->dark_mode)
                        <img width="230px" src="{{ asset('assets/ntsec-branca.png') }}" alt="logo-ntsec">
                        @else
                        <img width="230px" src="{{ asset('assets/ntsec-preta.png') }}" alt="logo-ntsec">
                        @endif
                        {{-- <span>
                            Start<span>Project</span>
                        </span> --}}
                        <i class="mdi mdi-layers"></i>
                    </a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <!-- Page title -->
                        <ul class="nav navbar-nav list-inline navbar-left">
                            <li class="list-inline-item">
                                <button class="button-menu-mobile open-left">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            <li class="list-inline-item">
                                <h4 class="page-title">
									@yield('title')
								</h4>
                            </li>
                        </ul>

                        <nav class="navbar-custom">
                            <ul class="list-unstyled topbar-right-menu float-right mb-0">
                                <!-- Notification -->
                                {{-- <li class="mr-2">
                                    <div class="notification-box">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <a href="javascript:void(0);" class="right-bar-toggle">
                                                    <i class="mdi mdi-bell-outline noti-icon"></i>
                                                </a>
                                                <div class="noti-dot">
                                                    <span class="dot"></span>
                                                    <span class="pulse"></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li> --}}
								<!-- Settings -->
                                <li>
                                    <div class="notification-box">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <a href="javascript:void(0);" class="right-bar-toggle">
                                                    <i class="mdi mdi-settings noti-icon"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->