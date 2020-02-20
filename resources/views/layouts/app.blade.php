<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- DISABLE FOR NOW LARAVEL COMPILED Styles -->
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


        <meta charset="utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="/core/vendor/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="/core/vendor/font-awesome/css/font-awesome.min.css">
        <!-- Custom Font Icons CSS-->
        <link rel="stylesheet" href="/core/css/font.css">
        <!-- Google fonts - Muli-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="/core/css/style.default.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="/core/css/custom.css">
        <!-- Favicon-->
        <link rel="shortcut icon" href="//core/favicon/apple-icon-57x57.png">
        <link rel="stylesheet" href="/css/jquery-ui.min.js">
        <link rel="apple-touch-icon" sizes="57x57" href="/core/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/core/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/core/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/core/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/core/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/core/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/core/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/core/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/core/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="/core/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/core/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/core/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/core/favicon/favicon-16x16.png">
<link rel="manifest" href="/core/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/core/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#000000">

        <!-- Tweaks for older IEs-->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <style>
            [v-cloak] {
                display: none;
            }
        </style>

        @yield('header')

    </head>

    <body>
        <div id="app">
            <div class="loader">
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__ball"></div>
            </div>

            <header style="position: fixed;
    width: 100%;
    z-index: 100;" class="header">
                <nav class="navbar navbar-expand-lg">
                    <div class="search-panel">
                        <div class="search-inner d-flex align-items-center justify-content-center">
                            <div class="close-btn">Close <i class="fa fa-close"></i></div>
                            <form id="searchForm" action="#">
                                <div class="form-group">
                                    <input type="search" name="search" placeholder="What are you searching for...">
                                    <button type="submit" class="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="container-fluid d-flex align-items-center justify-content-between">
                        <div class="navbar-header">
                            <!-- Navbar Header--><a href="/" class="navbar-brand">
                                <div class="brand-text brand-big visible text-uppercase"><strong
                                        class="text-primary">Dash</strong><strong>Board</strong></div>
                                <div class="brand-text brand-sm"><strong
                                        class="text-primary">S</strong><strong>S</strong></div>
                            </a>
                            <!-- Sidebar Toggle Btn-->
                            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
                        </div>


                        <div class="list-inline-item logout">

                            <a id="logout" href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span style='color:blue'> {{ Auth::user()->name }} </span> Logout <i
                                    class="icon-logout"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        </div>

                </nav>
            </header>

            <div style="padding-top:81px" class="d-flex align-items-stretch">

                <!-- Sidebar Navigation-->
                <nav id="sidebar">
                    <!-- Sidebar Header-->
                    <div class="sidebar-header d-flex align-items-center">
                        <div class="avatar"><img src="/core/img/Mylogo.jpg" alt="..." class="img-fluid rounded-circle">
                        </div>
                        <div class="title">
                            <h1 class="h5">SSA</h1>
                            <p>(Super-Sami.com)</p>
                        </div>
                    </div>

                    <span class="heading">Main</span>
                    <ul class="list-unstyled">
                        <li {{ activeIfRoute('payments.create') }}><a href="{{ route('payments.create') }}"> <i
                                    class="fa fa-file-text-o"></i>Payment Voucher </a></li>
                        <li {{ activeIfRoute('receipts.create') }}><a href="{{ route('receipts.create') }}"> <i
                                    class="fa fa-file-text-o"></i>Receipt Voucher </a></li>
                        <li {{ activeIfRoute('invoices.create') }}><a href="{{ route('invoices.create') }}"> <i
                                    class="icon-padnote"></i>Invoice </a></li>
                        <li {{ activeIfRoute('SupplierI') }}><a href="{{ route('SupplierI') }}"> <i
                                    class="icon-padnote"></i>Supplier Invoice </a></li>
                                    
                        <li {{ activeIfRoute('adjustments.create') }}><a href="{{ route('adjustments.create') }}"> <i
                                    class="icon-padnote"></i>Adjustment
                            </a></li>
                        <li {{ activeIfRoute(['chartaccounts.create','accounts.create','subaccounts.create'] )}}>
                            <a href="ul#Accounts" aria-expanded="false" data-toggle="collapse"> <i
                                    class="icon-windows"></i>Create Account</a>
                            <ul id="Accounts" class="collapse list-unstyled ">
                                <li {{ activeIfRoute('chartaccounts.create') }}><a
                                        href="{{ route('chartaccounts.create') }}">Chart Of Account</a></li>
                                <li {{ activeIfRoute('accounts.create') }}><a href="{{ route('accounts.create') }}">Main
                                        Account</a></li>
                                <li {{ activeIfRoute('subaccounts.create') }}><a
                                        href="{{ route('subaccounts.create') }}">Sub Account</a></li>
                            </ul>
                        </li>
                        <li
                            {{ activeIfRoute(['receipts.index','payments.index','adjustments.index','invoices.index'] )}}>
                            <a href="ul#Records" aria-expanded="false" data-toggle="collapse"> <i
                                    class="icon-windows"></i>All Records</a>
                            <ul id="Records" class="collapse list-unstyled ">
                                <li {{ activeIfRoute('payments.index') }}><a
                                        href="{{ route('payments.index') }}">Payment
                                        Voucher
                                        Records</a></li>
                                <li {{ activeIfRoute('receipts.index') }}><a
                                        href="{{ route('receipts.index') }}">Receipt
                                        Voucher
                                        Records</a></li>
                                <li {{ activeIfRoute('invoices.index') }}><a
                                        href="{{ route('invoices.index') }}">Invoice
                                        Records</a></li>
                                <li {{ activeIfRoute('adjustments.index')    }}><a
                                        href="{{ route('adjustments.index') }}">Adjustment
                                        Records</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- Sidebar Navigation end-->



                <div class="page-content">
                    <!-- Page Header-->
                    <div class="page-header no-margin-bottom">
                        <div class="container-fluid">
                            <h2 class="h5 no-margin-bottom">Super Sami Accounting Managements</h2>
                        </div>
                    </div>
                    <!-- Breadcrumb-->
                    <div class="container-fluid">
                        <ul id='breadcrumb' class="breadcrumb">
                        </ul>
                    </div>
                    <section class="no-padding-top">
                        <div class="container-fluid">
                            <div class="row" position='relative'>
                                @if ($errors->any())
                                <div id='errors' class="alert alert-danger">
                                    <div style="display:block; float:right">
                                        <a href='#' style='right; color:red ; weight:bold; text-decoration:none'
                                            onclick='$("#errors").hide()'>X</a>
                                    </div>
                                    <ul>
                                        @foreach (array_unique($errors->all()) as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                {{-- This is for Vue / axios error messages --}}
                                <div v-if='errors' v-cloak id='vue-errors' class="alert alert-danger col-md-5">
                                    <div style="display:block; float:right">
                                        <a href='#' style='right; color:red ; weight:bold; text-decoration:none'
                                            v-on:click='errors=null'>X</a>
                                    </div>
                                    <ul>
                                        <li v-for='error in errors'>@{{ error[0] }}</li>
                                    </ul>
                                </div>
                                @yield('content')
                                @if (Session::has('message'))
                                <span id='message' class="alert alert-success"
                                    style="position:absolute; z-index:99999 ; right:30px; top:60px">
                                    <ul>
                                        <li>{!! Session::get('message')!!}</li>
                                    </ul>
                                </span>
                                @endif
                                <span v-cloak v-if='message' id='message' class="alert alert-success"
                                    style="position:absolute; z-index:99999 ; right:30px; top:60px">
                                    <ul>
                                        <li>@{{ message }}</li>
                                    </ul>
                                </span>

                            </div>
                        </div>
                    </section>
                    <footer class="footer">
                        <div class="footer__block block no-margin-bottom">
                            <div class="container-fluid text-center">
                                <!-- Please do not remove the backlink to us unless you support us at https://super-sami.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                                <p class="no-margin-bottom">2020&copy; Super-Sami Design by <a
                                        href="https://super-sami.com">Raja Osama
                                        - Theme used of Bootstrap</a>.</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

        </div>
    </body>
    <!-- JavaScript files-->
    <script src="/core/vendor/jquery/jquery.min.js"></script>
    <script src="/core/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="/core/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/core/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/core/vendor/chart.js/Chart.min.js"></script>
    <script src="/core/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="/core/js/front.js"></script>



    @yield('footer')

    @if(Session::has('message'))
    <script src='/js/jquery-ui.min.js'></script>
    <script>
        setTimeout( function() {$( "#message.alert-success" ).fadeOut(2500,'swing')} ,2000);
    </script>
    @endif

    <script>
        if ('{{ activeIfRoute(['chartaccounts.create','accounts.create','subaccounts.create']) }}') {
            setTimeout(function() { $('ul#Accounts').addClass('show'); } ,200);
        }
        if ('{{ activeIfRoute(['receipts.index','payments.index','adjustments.index','invoices.index'] ) }}') {
            setTimeout(function() { $('ul#Records').addClass('show') } ,200);
        }

        $('ul#breadcrumb').html('<li class="breadcrumb-item"><a href="/">Home</a></li>'+
                                '<li class="breadcrumb-item active"> ' + document.title + '</li>');

    </script>

</html>
