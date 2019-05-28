
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mobile Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{!! url('/public/admin/css/bootstrap.min.css') !!}" />
    <link rel="stylesheet" href="{!! url('/public/admin/css/bootstrap-responsive.min.css') !!}" />
    <link rel="stylesheet" href="{!! url('/public/admin/css/uniform.css') !!}" />
    <link rel="stylesheet" href="{!! url('/public/admin/css/select2.css') !!}" />
    <link rel="stylesheet" href="{!! url('/public/admin/css/matrix-style.css') !!}" />
    <link rel="stylesheet" href="{!! url('/public/admin/css/matrix-media.css') !!}" />
    <link href="{!! url('public/admin/font-awesome/css/font-awesome.css') !!}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style type="text/css">
        ul.pagination{
            list-style: none;
            float: right;
        }
        ul.pagination li.active{
            font-weight: bold
        }
        ul.pagination li{
            float: left;
            display: inline-block;
            padding: 10px
        }
        .avatar{
            width: 210px;
        }
        .avatar img{
            width: 100%;
            height: 220px;
        }
    </style>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="{!! route('admin.product.index') !!}">Dashboard</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class=""><a title="" href="{!! url('/home') !!}"><i class="icon icon-cog"></i> <span class="text">Welcome Admin</span></a></li>
        <li class=""><a title="" href="{!! url('/auth/logout') !!}"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    </ul>
</div>

<!--start-top-serch-->
<div id="search">
    <form action="{!! route('admin.product.showFindAdmin') !!}" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="text" placeholder="Search here..." name="name"/>
        <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </form>
</div>
<!--close-top-serch-->

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
    <ul>
        <li> <a href="{!! route('admin.product.create') !!}"><i class="icon icon-th-list"></i> <span>Add New Product</span></a></li>
        <li> <a href="{!! route('admin.product.index') !!}"><i class="icon icon-th-list"></i> <span>Products</span></a></li>
        <li> <a href="{!! route('admin.manu.create') !!}"><i class="icon icon-th-list"></i> <span>Add New Manufacture</span></a></li>
        <li> <a href="{!! route('admin.manu.index') !!}"><i class="icon icon-th-list"></i> <span>Manufactures</span></a></li>
        <li> <a href="{!! route('admin.type.create') !!}"><i class="icon icon-th-list"></i> <span>Add New Type</span></a></li>
        <li> <a href="{!! route('admin.type.index') !!}"><i class="icon icon-th-list"></i> <span>Types</span></a></li>
        <li> <a href="{!! route('admin.user.create') !!}"><i class="icon icon-th-list"></i> <span>Add New User</span></a></li>
        <li> <a href="{!! route('admin.user.index') !!}"><i class="icon icon-th-list"></i> <span>Users</span></a></li>
    </ul>
</div>

@yield('content')

<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2017 &copy; TDC - Lập trình web 1</div>
</div>
<!--end-Footer-part-->
<script src="{!! url('/public/admin/js/jquery.min.js') !!}"></script>
<script src="{!! url('/public/admin/js/jquery.ui.custom.js') !!}"></script>
<script src="{!! url('/public/admin/js/bootstrap.min.js') !!}"></script>
<script src="{!! url('/public/admin/js/jquery.uniform.js') !!}"></script>
<script src="{!! url('/public/admin/js/select2.min.js') !!}"></script>
<script src="{!! url('/public/admin/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! url('/public/admin/js/matrix.js') !!}"></script>
<script src="{!! url('/public/admin/js/matrix.tables.js') !!}"></script>
</body>
</html>
