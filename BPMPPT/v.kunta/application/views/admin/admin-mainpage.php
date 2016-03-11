<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard Administrator</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- basic styles -->

        <link href="<?php echo base_url() ?>assets/ace/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/ace/css/font-awesome.min.css" />
        
        <!-- basic scripts -->

        <!--[if !IE]> -->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo base_url() ?>assets/ace/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>

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
        <script src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js"></script>


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

                tinymce.init({
                    selector: "textarea.editor",
                    theme: "modern",
                    height: 300,
                    plugins: ["advlist autolink link image lists hr anchor", "wordcount code fullscreen media nonbreaking", "table paste textcolor"],
                    menubar: false,
                    toolbar: "bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table link | image media | code",
                    paste_remove_styles: true,
                    paste_remove_spans: true,
                    paste_strip_class_attributes: "all",
                    paste_text_use_dialog: false,
                    theme_advanced_resizing: true,
                    theme_advanced_resize_horizontal: true,
                    relative_urls: false,
                    remove_script_host: false

                });


            </script>

            <div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            Dashboard Administrator
                        </small>
                    </a><!-- /.brand -->
                </div><!-- /.navbar-header -->

                <div class="navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">

                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php echo $this->sess->fullname ?>
                                </span>

                                <i class="icon-caret-down"></i>
                            </a>

                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="<?php echo site_url('admin/profile') ?>">
                                        <i class="icon-user"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('admin/password') ?>">
                                        <i class="icon-key"></i>
                                        password
                                    </a>
                                </li>
                                <li class="divider"></li>

                                <li>
                                    <a href="<?php echo site_url('admin/logout') ?>">
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

        <div id="modalDelete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class='widget-header'>
                            <h4 class='smaller'>
                                <i class='icon-warning-sign red'></i> 
                                Konfirmasi Hapus
                            </h4>
                        </div>
                        <div class="alert alert-info bigger-110">                            
                            <p id="data"></p>
                        </div>
                        <div class="center">
                            <a href="#">
                                <button type="button" class="btn btn-success" id="cfmDelete" role="button" aria-disabled="false">
                                    <i class="icon-ok"></i>
                                    &nbsp; Hapus Sekarang
                                </button>
                            </a>
                            <button type="button" data-dismiss="modal" class="btn btn-danger" role="button" aria-disabled="false">
                                <i class="icon-arrow-left"></i>
                                &nbsp; Batalkan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
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
                            <a href="<?php echo site_url('admin') ?>">
                                <i class="icon-home"></i>
                                <span class="menu-text"> Home </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-file-text"></i>
                                <span class="menu-text"> Pendaftaran </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="<?php echo site_url('admin/bangunan') ?>">
                                        <i class="icon-caret-right"></i>
                                        <span class="menu-text"> Pemohon </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('pendaftaran/berkas_masuk') ?>">
                                        <i class="icon-caret-right"></i>
                                        <span class="menu-text"> Berkas Masuk </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('pendaftaran/berkas_import') ?>">
                                        <i class="icon-caret-right"></i>
                                        <span class="menu-text"> Import Berkas </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('pendaftaran/berkas_baru') ?>">
                                        <i class="icon-caret-right"></i>
                                        <span class="menu-text"> Berkas Baru</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-exchange"></i>
                                <span class="menu-text"> Alur Berkas </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">                                
                                <li>
                                    <a href="<?php echo site_url('admin/periksa_berkas') ?>">
                                        <i class="icon-caret-right"></i>
                                        <span class="menu-text"> Pemeriksaan Berkas </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('admin/periksa_lapangan') ?>">
                                        <i class="icon-caret-right"></i>
                                        <span class="menu-text"> Pemeriksaan Lapangan</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="menu-text"> Laporan </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">                                
                                <li>
                                    <a href="<?php echo site_url('admin/cetak_form') ?>">
                                        <i class="icon-caret-right"></i>
                                        <span class="menu-text"> Cetak Form </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('admin/cetak_sk') ?>">
                                        <i class="icon-caret-right"></i>
                                        <span class="menu-text"> Cetak SK</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('admin/lapoan') ?>">
                                        <i class="icon-caret-right"></i>
                                        <span class="menu-text"> Laporan</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-bookmark"></i>
                                <span class="menu-text"> Master Data </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">                                
                                <li>
                                    <a href="<?php echo site_url('admin/provinsi') ?>">
                                        <i class="icon-caret-right"></i>
                                        <span class="menu-text"> Provinsi </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('admin/kabupaten') ?>">
                                        <i class="icon-caret-right"></i>
                                        <span class="menu-text"> Kabupaten</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('admin/kecamatan') ?>">
                                        <i class="icon-caret-right"></i>
                                        <span class="menu-text"> Kecamatan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('pendaftaran/pemohon/kendali') ?>">
                                        <i class="icon-caret-right"></i>
                                        <span class="menu-text"> Desa</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--
                        <?php foreach ($this->menu as $m): ?>
                            <li>
                                <a href="<?php echo site_url('admin/' . strtolower($m['url'])) ?>">
                                    <i class="icon-caret-right"></i>
                                    <span class="menu-text"> <?php echo $m['menu'] ?>  </span>
                                </a>
                            </li>
                        <?php endforeach ?>
                        -->
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
                                <a href="<?php echo site_url('admin') ?>">Home</a>
                            </li>
                            <li class="active">
                                <?php $n = preg_replace("/[_]/", " ", $this->uri->segment(2)) ?>
                                <?php echo ucfirst($n) ?>
                            </li>
                        </ul><!-- .breadcrumb -->
                    </div>
                    <?php $this->load->view('admin/content/' . $content); ?> 
                </div><!-- /.main-content -->
            </div><!-- /.main-container-inner -->

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="icon-double-angle-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <div class="clear-both"></div>


        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo base_url() ?>assets/ace/js/jquery-1.10.2.min.js'>" + "<" + "/script>");
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
        <script src="<?php echo base_url() ?>assets/ace/js/flot/jquery.flot.min.js"></script>
        <script src="<?php echo base_url() ?>assets/ace/js/flot/jquery.flot.pie.min.js"></script>
        <script src="<?php echo base_url() ?>assets/ace/js/flot/jquery.flot.resize.min.js"></script>


        <!-- ace scripts -->

        <script src="<?php echo base_url() ?>assets/ace/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url() ?>assets/ace/js/date-time/bootstrap-datetimepicker.min.js"></script>
        <script src="<?php echo base_url() ?>assets/ace/js/date-time/daterangepicker.min.js"></script>
        <script src="<?php echo base_url() ?>assets/ace/js/date-time/moment.min.js"></script>
        <script src="<?php echo base_url() ?>assets/ace/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->
        <?php if (isset($js)) $this->load->view($js); ?>

        <script>

            if ($('#piechart-placeholder').length) {
                var placeholder = $('#piechart-placeholder').css({'width': '90%', 'min-height': '150px'});

                function drawPieChart(placeholder, data, position) {
                    $.plot(placeholder, data, {
                        series: {
                            pie: {
                                show: true,
                                tilt: 0.8,
                                highlight: {
                                    opacity: 0.25
                                },
                                stroke: {
                                    color: '#fff',
                                    width: 2
                                },
                                startAngle: 2
                            }
                        },
                        legend: {
                            show: true,
                            position: position || "ne",
                            labelBoxBorderColor: null,
                            margin: [-30, 15]
                        }
                        ,
                        grid: {
                            hoverable: true,
                            clickable: true
                        }
                    })
                }
                drawPieChart(placeholder, data);

                /**
                 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
                 so that's not needed actually.
                 */
                placeholder.data('chart', data);
                placeholder.data('draw', drawPieChart);



                var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
                var previousPoint = null;

                placeholder.on('plothover', function (event, pos, item) {
                    if (item) {
                        if (previousPoint != item.seriesIndex) {
                            previousPoint = item.seriesIndex;
                            var tip = item.series['label'] + " : " + item.series['percent'] + '%';
                            $tooltip.show().children(0).text(tip);
                        }
                        $tooltip.css({top: pos.pageY + 10, left: pos.pageX + 10});
                    } else {
                        $tooltip.hide();
                        previousPoint = null;
                    }

                });


                var placeholder = $('#piechart-placeholder2').css({'width': '90%', 'min-height': '150px'});


                drawPieChart(placeholder, data2);

                /**
                 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
                 so that's not needed actually.
                 */
                placeholder.data('chart', data2);
                placeholder.data('draw', drawPieChart);



                var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
                var previousPoint = null;

                placeholder.on('plothover', function (event, pos, item) {
                    if (item) {
                        if (previousPoint != item.seriesIndex) {
                            previousPoint = item.seriesIndex;
                            var tip = item.series['label'] + " : " + item.series['percent'] + '%';
                            $tooltip.show().children(0).text(tip);
                        }
                        $tooltip.css({top: pos.pageY + 10, left: pos.pageX + 10});
                    } else {
                        $tooltip.hide();
                        previousPoint = null;
                    }

                });
            }
        </script>
    </body>
</html>
