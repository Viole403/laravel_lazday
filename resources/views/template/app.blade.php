<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lte - Simple @yield('tittle')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{URL::asset('/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('dist/css/skins/_all-skins.min.css')}}">
    @stack('customcss')
</head>

<body class="hold-transition skin-purple sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <span class="logo-mini"><b>S</b>DA</span>
                <span class="logo-lg">Simple <b>Dashboard</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{URL::asset('dist/img/user2-160x160.jpg')}}" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="{{URL::asset('dist/img/user2-160x160.jpg')}}" class="img-circle"
                                        alt="User Image">
                                    <p>
                                        {{ Auth::user()->name }}
                                        <small>Member Since {{ Auth::user()->created_at->format('Y') }}</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            {{ __('Sign out') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{URL::asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{Auth::user()->name}}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview">
                        <a href="{{ route('home') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#!">
                            <i class="fa fa-gear"></i> <span>Master</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('data.users')}}"><i class="fa fa-user"></i>User</a></li>
                            <li><a href="{{ route('product.index')}}"><i class="fa fa-dropbox"></i>Product</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('transaction.index') }}">
                            <i class="fa fa-shopping-cart"></i> <span>Transaction</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('pagetittle')
                    {{-- <small>it all starts here</small> --}}
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b><a href="#!">Simple Dashboard</a></b>
            </div>
            <strong> <a href="#!">Simple :v</a></strong>
        </footer>

        {{-- <div class="control-sidebar-bg"></div> --}}
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 2.2.3 -->
    {{-- <script src="{{URL::asset('/plugins/jQuery/jquery-2.2.3.min.js')}}"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> --}}
    <script src="{{ URL::asset('/js/jq.js') }}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{URL::asset('/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{URL::asset('/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{URL::asset('/plugins/fastclick/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{URL::asset('/dist/js/app.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{URL::asset('/dist/js/demo.js')}}"></script>

    <!-- JQuery 3.4.1 -->
    {{-- <script src="{{ URL::asset('/js/jquery.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('/js/jquery.min.js') }}"></script> --}}

    @stack('customscript')

</body>

</html>
