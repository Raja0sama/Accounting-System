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
        <title>FIX ME - Payment Voucher</title>
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
        <link rel="shortcut icon" href="/core/img/favicon1.png">
        <link rel="stylesheet" href="/css/jquery-ui.min.js">


        <!-- Tweaks for older IEs-->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

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

            <header class="header">
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
                                        class="text-primary">DF</strong><strong>M</strong></div>
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

            <div class="d-flex align-items-stretch">

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
                        <li {{ activeIfRoute('adjustments.create') }}><a href="{{ route('adjustments.create') }}"> <i
                                    class="icon-padnote"></i>Adjustment
                            </a></li>
                        <li {{ activeIfRoute('general_ledger') }}><a href="{{ route('general_ledger') }}"> <i
                                    class="fa fa-bar-chart"></i>General
                                Ledger</a></li>
                        <li {{ activeIfRoute(['chartaccounts.index','accounts.index','subaccounts.index'] )}}>
                            <a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse"> <i
                                    class="icon-windows"></i>Create Account</a>
                            <ul id="exampledropdownDropdown1" class="collapse list-unstyled ">
                                <li {{ activeIfRoute('chartaccounts.index') }}><a
                                        href="{{ route('chartaccounts.index') }}">Chart Of Account</a></li>
                                <li {{ activeIfRoute('accounts.index') }}><a href="{{ route('accounts.index') }}">Main
                                        Account</a></li>
                                <li {{ activeIfRoute('subaccounts.index') }}><a
                                        href="{{ route('subaccounts.index') }}">Sub Account</a></li>
                            </ul>
                        </li>
                        <li
                            {{ activeIfRoute(['receipts.index','payments.index','adjustments.index','invoices.index'] )}}>
                            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                                    class="icon-windows"></i>All Records</a>
                            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
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
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="paymentdesign">Home</a></li>
                            <li class="breadcrumb-item active">payment -- fix this -- </li>
                            @if (Session::has('message'))
                            <span id='message' class="alert alert-success"
                                style="position:absolute; z-index:99999 ; left:15%; top:4.5rem">
                                <ul>
                                    <li>{!! Session::get('message')!!}</li>
                                </ul>
                            </span>
                            @endif

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
                                @yield('content')

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

    @if(Session::has('message'))
    <script src='/js/jquery-ui.min.js'></script>
    <script>
        setTimeout( function() {$( "#message.alert-success" ).fadeOut(2500,'swing')} ,2000);
    </script>
    @endif

    @yield('footer')

</html>
