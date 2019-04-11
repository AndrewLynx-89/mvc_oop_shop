<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php echo $this->getMeta();?>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/backend/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/public/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/public/backend/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/public/backend/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="/public/backend/bower_components/bootstrap-fileinput-master/css/fileinput.css">
    <link rel="stylesheet" href="/public/backend/bower_components/dropzone/dropzone.css">
    <link rel="stylesheet" href="/public/css/custom_css.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/public/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">HEADER</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
                <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Link in level 2</a></li>
                        <li><a href="#">Link in level 2</a></li>
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        <?php getSidebar('admin');?>

        <?php echo $content; ?>
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>
</div>

<script src="/public/backend/bower_components/jquery/dist/jquery.min.js"></script>
<script  src="/public/backend/bower_components/ckeditor/ckeditor.js"></script>

<script src="/public/backend/bower_components/admin_js.js"></script>
<script src="/public/backend/dist/js/adminlte.min.js"></script>

<script src="/public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/public/backend/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="/public/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/public/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/public/backend/bower_components/fastclick/lib/fastclick.js"></script>
<script src="/public/backend/bower_components/dropzone/dropzone.js"></script>

<script type="text/javascript">// Immediately after the js include
    Dropzone.autoDiscover = false;
</script>


<!--удалить потом-->
<script src="/public/backend/bower_components/bootstrap-fileinput-master/js/fileinput.min.js"></script>
<script src="/public/backend/bower_components/bootstrap-fileinput-master/js/plugins/piexif.min.js"></script>
<script src="/public/backend/bower_components/bootstrap-fileinput-master/js/plugins/purify.min.js"></script>
<script src="/public/backend/bower_components/bootstrap-fileinput-master/js/plugins/sortable.min.js"></script>
<script src="/public/backend/bower_components/bootstrap-fileinput-master/themes/fas/theme.min.js"></script>
<script src="/public/backend/bower_components/bootstrap-fileinput-master/js/locales/ru.js"></script>

<!--<script>-->
<!--    var editor = CKEDITOR.replace('product_editor',{height: 300});-->
<!--    AjexFileManager.init({returnTo: 'ckeditor', editor: editor});-->
<!--</script>-->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
</body>
</html>