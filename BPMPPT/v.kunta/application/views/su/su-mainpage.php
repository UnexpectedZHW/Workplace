<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard Superuser</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- basic styles -->

        <link href="<?php echo base_url() ?>assets/ace/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/ace/css/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo base_url() ?>assets/ace/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/ace/css/jquery-ui-1.10.3.full.min.css" />

        <!-- fonts -->

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/ace/css/ace-fonts.css" />

        <!-- ace styles -->

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/ace/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/ace/css/ace-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/ace/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/ace/css/custom.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo base_url() ?>assets/ace/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->

        <script src="<?php echo base_url() ?>assets/ace/js/ace-extra.min.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="<?php echo base_url() ?>assets/ace/js/html5shiv.js"></script>
        <script src="<?php echo base_url() ?>assets/ace/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="navbar navbar-default" id="navbar">
            <script type="text/javascript">
                try {
                    ace.settings.check('navbar', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            Dashboard Superuser
                        </small>
                    </a><!-- /.brand -->
                </div><!-- /.navbar-header -->

                <div class="navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">

                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php echo $this->sess->fullname?>
                                </span>

                                <i class="icon-caret-down"></i>
                            </a>

                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="<?php echo site_url('su/dashboard/password_ganti') ?>">
                                        <i class="icon-key"></i>
                                        password
                                    </a>
                                </li>
                                <li class="divider"></li>

                                <li>
                                    <a href="<?php echo site_url('su/dashboard/logout') ?>">
                                        <i class="icon-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul><!-- /.ace-nav -->
                </div><!-- /.navbar-header -->
            </div><!-- /.container -->
        </div>

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="main-container-inner">
                <a class="menu-toggler" id="menu-toggler" href="#">
                    <span class="menu-text"></span>
                </a>
                <div class="sidebar" id="sidebar">
                    <ul class="nav nav-list">
                        <li>
                            <a href="<?php echo site_url('su/dashboard') ?>">
                                <i class="icon-home"></i>
                                <span class="menu-text"> Home </span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo site_url('su/dashboard/permission') ?>">
                                <i class="icon-unlock-alt"></i>
                                <span class="menu-text"> Permission Data </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('su/dashboard/group') ?>" class="dropdown-toggle">
                                <i class="icon-group"></i>
                                <span class="menu-text"> Role / Group </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('su/dashboard/user') ?>" class="dropdown-toggle">
                                <i class="icon-user"></i>
                                <span class="menu-text"> Users </span>
                            </a>
                        </li>
                    </ul><!-- /.nav-list -->

                    <div class="sidebar-collapse" id="sidebar-collapse">
                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
                    </div>

                    <script type="text/javascript">
                        try {
                            ace.settings.check('sidebar', 'collapsed')
                        } catch (e) {
                        }
                    </script>
                </div>

                <div class="main-content">
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try {
                                ace.settings.check('breadcrumbs', 'fixed')
                            } catch (e) {
                            }
                        </script>

                        <ul class="breadcrumb">
                            <li>
                                <i class="icon-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
                            <li class="active">Dashboard</li>
                        </ul><!-- .breadcrumb -->
                    </div>
                    <?php $this->load->view($content); ?> 
                </div><!-- /.main-content -->
            </div><!-- /.main-container-inner -->

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="icon-double-angle-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <div class="clear-both"></div>
        <!--<footer class="footer">
            <div class="container">
                <p class="bigger-150 dark"><span class="blue bigger-125">Ace</span> Admin Template &copy;2013</p>
            </div>
        </footer> -->

        <!-- basic scripts -->

        <!--[if !IE]> -->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo base_url() ?>assets/ace/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='<?php echo base_url() ?>assets/ace/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='<?php echo base_url() ?>assets/ace/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="<?php echo base_url() ?>assets/ace/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/ace/js/typeahead-bs2.min.js"></script>

        <!-- page specific plugin scripts -->

        <!--[if lte IE 8]>
          <script src="<?php echo base_url() ?>assets/ace/js/excanvas.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url() ?>assets/ace/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="<?php echo base_url() ?>assets/ace/js/jquery.ui.touch-punch.min.js"></script>

        <!-- ace scripts -->

        <script src="<?php echo base_url() ?>assets/ace/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url() ?>assets/ace/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->
    </body>
</html>
