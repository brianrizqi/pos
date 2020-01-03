<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
{{--<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">--}}
<!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('css/font-awesome.css')}}">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('css/adminpro-custon-icon.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('css/meanmenu.min.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('css/jquery.mCustomScrollbar.min.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('css/animate.css')}}">
    <!-- data-table CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('css/data-table/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{url('css/data-table/bootstrap-editable.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('css/normalize.css')}}">
    <!-- charts C3 CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('css/c3.min.css')}}">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('css/form/all-type-forms.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <link rel="stylesheet" href="{{url('css/modals.css')}}">
    <script src="{{url('js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body class="materialdesign">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header top area start-->
<div class="wrapper-pro">
    <div class="left-sidebar-pro">
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="{{route('home')}}">
                    <h3>POS</h3>
                    <p>Point Of Sales</p>
                    <strong>POS</strong>
                </a>
            </div>
            <div class="left-custom-menu-adp-wrap">
                <ul class="nav navbar-nav left-sidebar-menu-pro">
                    <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                            class="nav-link dropdown-toggle"><i class="fa big-icon fa-archive"></i>
                            <span class="mini-dn">Barang</span> <span class="indicator-right-menu mini-dn"><i
                                        class="fa indicator-mn fa-angle-left"></i></span></a>
                        <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                            <a href="{{route('barang')}}" class="dropdown-item">Laporan Stok</a>
                            <a href="{{route('kartu_stok')}}" class="dropdown-item">Kartu Stok</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('supplier')}}" role="button" aria-expanded="false"
                           class="nav-link dropdown-toggle"><i class="fa fa-user"></i>
                            <span class="mini-dn">Supplier</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('customer')}}" role="button" aria-expanded="false"
                           class="nav-link dropdown-toggle"><i class="fa fa-users"></i> <span
                                    class="mini-dn">Customer</span>
                        </a>
                    </li>
                    <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                            class="nav-link dropdown-toggle"><i class="fa fa-arrow-circle-o-down"></i>
                            <span
                                    class="mini-dn">Pengadaan</span> <span class="indicator-right-menu mini-dn"><i
                                        class="fa indicator-mn fa-angle-left"></i></span></a>
                        <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                            <a href="{{route('pembelian')}}" class="dropdown-item">Pembelian</a>
                            <a href="{{route('detail_pembelian')}}" class="dropdown-item">Detail Pembelian</a>
                            <a href="{{route('retur')}}" class="dropdown-item">Retur Pembelian</a>
                            <a href="{{route('hutang')}}" class="dropdown-item">Hutang Pembelian</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                            class="nav-link dropdown-toggle"><i class="fa fa-arrow-circle-o-up"></i>
                            <span
                                    class="mini-dn">Penjualan</span> <span class="indicator-right-menu mini-dn"><i
                                        class="fa indicator-mn fa-angle-left"></i></span></a>
                        <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                            <a href="{{route('penjualan')}}" class="dropdown-item">Penjualan</a>
                            <a href="{{route('detail_penjualan')}}" class="dropdown-item">Detail Penjualan</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="content-inner-all">
        <div class="header-top-area">
            <div class="fixed-header-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                            <button type="button" id="sidebarCollapse"
                                    class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                <i class="fa fa-bars"></i>
                            </button>
                            <div class="admin-logo logo-wrap-pro">
                                <a href="#"><img src="img/logo/log.png" alt=""/>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
                            <div class="header-top-menu tabl-d-n">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <div class="header-right-info">
                                <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                    <li class="nav-item dropdown">
                                    <li class="nav-item">
                                        <a href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl" role="button"
                                           aria-expanded="false"
                                           class="nav-link dropdown-toggle">
                                            {{--<span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>--}}
                                            <span class="admin-name">Petunjuk</span>
                                            {{--<span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>--}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header top area end-->
        <!-- Breadcome start-->
        <div class="breadcome-area mg-b-30 small-dn">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="breadcome-heading">
                                        <form role="search" class="">
                                            <!--<input type="text" placeholder="Search..." class="form-control">-->
                                            <!--<a href=""><i class="fa fa-search"></i></a>-->
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <ul class="breadcome-menu">
                                        <li>
                                            <a href="{{route('home')}}">
                                                Point Of Sales
                                            </a>
                                            <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">@yield('fitur')</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcome End-->
        <!-- Mobile Menu start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul class="mobile-menu-nav">
                                    <li><a data-toggle="collapse" data-target="#Charts" href="#">Barang <span
                                                    class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul class="collapse dropdown-header-top">
                                            <li><a href="{{route('barang')}}">Laporan Stok</a>
                                            </li>
                                            <li><a href="{{route('kartu_stok')}}">Kartu Stok</a>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#demo" href="{{route('supplier')}}">Supplier <span
                                                    class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#others" href="{{route('customer')}}">Customer <span
                                                    class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#Charts" href="#">Pengadaan <span
                                                    class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul class="collapse dropdown-header-top">
                                            <li><a href="{{route('pembelian')}}">Pembelian</a>
                                            </li>
                                            <li><a href="{{route('detail_pembelian')}}">Detail Pembelian</a>
                                            <li><a href="{{route('retur')}}" class="dropdown-item">Retur Pembelian</a></li>
                                            <li><a href="{{route('hutang')}}" class="dropdown-item">Hutang Pembelian</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
        <!-- Breadcome start-->
        <div class="breadcome-area des-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="breadcome-heading">
                                        <form role="search" class="">
                                            <!--<input type="text" placeholder="Search..." class="form-control">-->
                                            <!--<a href=""><i class="fa fa-search"></i></a>-->
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <ul class="breadcome-menu">
                                        <li><a href="#">POS</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">@yield('fitur')</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcome End-->
        <!-- Static Table Start -->
    @yield('content')
    <!-- Data table area End-->
        <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl" id="petunjuk"
           style="display: none">Primary</a>
        <div id="PrimaryModalhdbgcl" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title">Petunjuk</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <h3>Press F7 = Menu Barang</h3>
                        <h3>Press F4 = Menu Supplier</h3>
                        <h3>Press F6 = Menu Customer</h3>
                        <h3>Press F8 = Menu Kartu Stok</h3>
                        <h3>Press F2 = Menu Pembelian</h3>
                        <h3>Press F9 = Menu Detail Pembelian</h3>
                        <h3>Press F10 = Menu Penjualan</h3>
                        <h3>Press F11 = Menu Detail Penjualan</h3>
                    </div>
                    <div class="modal-footer">
                        {{--<a data-dismiss="modal" href="#">Cancel</a>--}}
                        {{--<a href="#">Process</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Start-->
<div class="footer-copyright-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-copy-right">
                    <p>Copyright &#169; 2019
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("keydown", e => {
        if (e.key == "F11") {
            e.preventDefault()
        }
        if (e.key == "F1") {
            e.preventDefault()
        }
        if (e.key == "F6") {
            e.preventDefault()
        }
        ;
    });
    window.addEventListener("keyup", checkKey, false);

    function checkKey(key) {
        if (key.keyCode == "118") {
            window.location.href = "{{route('barang')}}";
        }
        if (key.keyCode == "115") {
            window.location.href = "{{route('supplier')}}";
        }
        if (key.keyCode == "117") {
            window.location.href = "{{route('customer')}}";
        }
        if (key.keyCode == "119") {
            window.location.href = "{{route('kartu_stok')}}";
        }
        if (key.keyCode == "113") {
            window.location.href = "{{route('pembelian')}}";
        }
        if (key.keyCode == "120") {
            window.location.href = "{{route('detail_pembelian')}}";
        }
        if (key.keyCode == "121") {
            window.location.href = "{{route('penjualan')}}";
        }
        if (key.keyCode == "122") {
            window.location.href = "{{route('detail_penjualan')}}";
        }
        if (key.keyCode == "112") {
            document.getElementById("petunjuk").click();
        }
    }
</script>
<!-- Footer End-->
<!-- Chat Box End-->
<!-- jquery
    ============================================ -->
<script src="{{url('js/vendor/jquery-1.11.3.min.js')}}"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="{{url('js/bootstrap.min.js')}}"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="{{url('js/jquery.meanmenu.js')}}"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="{{url('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- sticky JS
    ============================================ -->
<script src="{{url('js/jquery.sticky.js')}}"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="{{url('js/jquery.scrollUp.min.js')}}"></script>
<!-- counterup JS
    ============================================ -->
<script src="{{url('js/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{url('js/counterup/waypoints.min.js')}}"></script>
<script src="{{url('js/counterup/counterup-active.js')}}"></script>
<!-- peity JS
    ============================================ -->
<script src="{{url('js/peity/jquery.peity.min.js')}}"></script>
<script src="{{url('js/peity/peity-active.js')}}"></script>
<!-- sparkline JS
    ============================================ -->
<script src="{{url('js/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{url('js/sparkline/sparkline-active.js')}}"></script>
<!-- flot JS
    ============================================ -->
<script src="{{url('js/flot/Chart.min.js')}}"></script>
<script src="{{url('js/flot/flot-active.js')}}"></script>
<!-- map JS
    ============================================ -->
<script src="{{url('js/map/raphael.min.js')}}"></script>
<script src="{{url('js/map/jquery.mapael.js')}}"></script>
<script src="{{url('js/map/france_departments.js')}}"></script>
<script src="{{url('js/map/world_countries.js')}}"></script>
<script src="{{url('js/map/usa_states.js')}}"></script>
<script src="{{url('js/map/map-active.js')}}"></script>
<!-- data table JS
    ============================================ -->
<script src="{{url('js/data-table/bootstrap-table.js')}}"></script>
<script src="{{url('js/data-table/tableExport.js')}}"></script>
<script src="{{url('js/data-table/data-table-active.js')}}"></script>
<script src="{{url('js/data-table/bootstrap-table-editable.js')}}"></script>
<script src="{{url('js/data-table/bootstrap-editable.js')}}"></script>
<script src="{{url('js/data-table/bootstrap-table-resizable.js')}}"></script>
<script src="{{url('js/data-table/colResizable-1.5.source.js')}}"></script>
<script src="{{url('js/data-table/bootstrap-table-export.js')}}"></script>
<!-- main JS
    ============================================ -->
<script src="{{url('js/main.js')}}"></script>
</body>

</html>
