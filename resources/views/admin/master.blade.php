<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin - Khoa Phạm</title>

    <!-- Bootstrap Core CSS -->
    <link href="/source/admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/source/admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/source/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/source/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="/source/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="/source/admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>
   
    @if(Session::has('flag'))
    <div style="text-align: center" class="alert alert-success {{ Session::get('flag') }}">{{ Session::get('message') }}</div>
@endif
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Area - Khoa Phạm</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('admin.getLogout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="/admin/cartegory/danhsach"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/admin/cartegory/danhsach">List Category</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.getCateAdd') }}">Add Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/admin/product/danhsach">List Product</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.getProductAdd') }}">Add Product</a>
                                    {{-- {{ route('products.create') }} --}}
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.getUserList')}}">List User</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.getUserAdd')}}">Add User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#">
                                <i class="bi bi-envelope-exclamatio"></i> Contacts<span class="fa arrow"></span>
                              </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('admin.getContactNotViewed') }}">Not Viewed 
                                        @if($notViewedCount > 0)
                                            <span class="badge">{{ $notViewedCount }}</span>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.getContactViewed') }}">Viewed 
                                        @if($viewedCount > 0)
                                            <span class="badge">{{ $viewedCount }}</span>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.getContactReplied')}}">Replied 
                                        @if($repliedCount > 0)
                                            <span class="badge">{{ $repliedCount }}</span>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

       @yield('content')

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/source/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/source/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/source/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/source/admin/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="/source/admin/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="/source/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
