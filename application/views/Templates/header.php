<?php
$user = $this->ion_auth->user()->row();
?>
<!DOCTYPE html>
<html lang="pt_BR">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Nifty - Admin Template</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url(); ?>assets/css/nifty.min.css" rel="stylesheet">
    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="<?php echo base_url(); ?>assets/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?php echo base_url(); ?>assets/css/demo/nifty-demo.min.css" rel="stylesheet">
    <!--Switchery [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.css" rel="stylesheet">
    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <!--Bootstrap Tags Input [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.css" rel="stylesheet">
    <!--Chosen [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>assets/plugins/chosen/chosen.min.css" rel="stylesheet">
    <!--noUiSlider [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>assets/plugins/noUiSlider/nouislider.min.css" rel="stylesheet">
    <!--Select2 [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <!--Bootstrap Timepicker [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">
    <!--JAVASCRIPT-->
    <!--=================================================-->
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?php echo base_url(); ?>assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js"></script>
    <!--jQuery [ REQUIRED ]-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url(); ?>assets/js/nifty.min.js"></script>
    <!--=================================================-->
    <!--Demo script [ DEMONSTRATION ]-->
    <script src="<?php echo base_url(); ?>assets/js/demo/nifty-demo.min.js"></script>
    <!--Switchery [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.js"></script>
    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <!--Bootstrap Tags Input [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <!--Chosen [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>assets/plugins/chosen/chosen.jquery.min.js"></script>
    
    <!--Select2 [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.min.js"></script>
    <!--Bootstrap Timepicker [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!--Form Component [ SAMPLE ]-->
    <script src="<?php echo base_url(); ?>assets/js/demo/form-component.js"></script>
    <!--DataTables [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <!--DataTables Sample [ SAMPLE ]-->
    <script src="js/demo/tables-datatables.js"></script>

    <?php
    if($this->uri->segment(1) == 'dashboard'){
    ?>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <?php } ?>

    <script src="<?php echo base_url(); ?>assets/js/jscolor.js"></script>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <header id="navbar">
        <div id="navbar-container" class="boxed">
            <div class="navbar-header">
                <a href="index.html" class="navbar-brand">
                    <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Nifty Logo" class="brand-icon">
                    <div class="brand-title">
                        <span class="brand-text">BI</span>
                    </div>
                </a>
            </div>
            <div class="navbar-content clearfix">
                <ul class="nav navbar-top-links pull-left">
                    <li class="tgl-menu-btn">
                        <a class="mainnav-toggle" href="#">
                            <i class="demo-pli-view-list"></i>
                        </a>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End Navigation toogle button-->



                    <!--Notification dropdown-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            <i class="demo-pli-bell"></i>
                            <span class="badge badge-header badge-danger"></span>
                        </a>

                        <!--Notification dropdown menu-->
                        <div class="dropdown-menu dropdown-menu-md">
                            <div class="pad-all bord-btm">
                                <p class="text-semibold text-main mar-no">You have 9 notifications.</p>
                            </div>
                            <div class="nano scrollable">
                                <div class="nano-content">
                                    <ul class="head-list">

                                        <!-- Dropdown list-->
                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <p class="pull-left">Database Repair</p>
                                                    <p class="pull-right">70%</p>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div style="width: 70%;" class="progress-bar">
                                                        <span class="sr-only">70% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <p class="pull-left">Upgrade Progress</p>
                                                    <p class="pull-right">10%</p>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div style="width: 10%;" class="progress-bar progress-bar-warning">
                                                        <span class="sr-only">10% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li>
                                            <a class="media" href="#">
                                                <span class="badge badge-success pull-right">90%</span>
                                                <div class="media-left">
                                                    <i class="demo-pli-data-settings icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">HDD is full</div>
                                                    <small class="text-muted">50 minutes ago</small>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li>
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <i class="demo-pli-file-edit icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">Write a news article</div>
                                                    <small class="text-muted">Last Update 8 hours ago</small>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li>
                                            <a class="media" href="#">
                                                <span class="label label-danger pull-right">New</span>
                                                <div class="media-left">
                                                    <i class="demo-pli-speech-bubble-7 icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">Comment Sorting</div>
                                                    <small class="text-muted">Last Update 8 hours ago</small>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li>
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <i class="demo-pli-add-user-plus-star icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">New User Registered</div>
                                                    <small class="text-muted">4 minutes ago</small>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li class="bg-gray">
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <img class="img-circle img-sm" alt="Profile Picture" src="<?php echo base_url(); ?>assets//img/profile-photos/9.png">
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">Lucy sent you a message</div>
                                                    <small class="text-muted">30 minutes ago</small>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li class="bg-gray">
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <img class="img-circle img-sm" alt="Profile Picture" src="<?php echo base_url(); ?>assets//img/profile-photos/3.png">
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">Jackson sent you a message</div>
                                                    <small class="text-muted">40 minutes ago</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!--Dropdown footer-->
                            <div class="pad-all bord-top">
                                <a href="#" class="btn-link text-dark box-block">
                                    <i class="fa fa-angle-right fa-lg pull-right"></i>Show All Notifications
                                </a>
                            </div>
                        </div>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End notifications dropdown-->



                    <!--Mega dropdown-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li class="mega-dropdown">
                        <a href="#" class="mega-dropdown-toggle">
                            <i class="demo-pli-layout-grid"></i>
                        </a>
                        <div class="dropdown-menu mega-dropdown-menu">
                            <div class="row">
                                <div class="col-sm-4 col-md-3">

                                    <!--Mega menu list-->
                                    <ul class="list-unstyled">
                                        <li class="dropdown-header"><i class="demo-pli-file icon-fw"></i> Pages</li>
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="#">Search Result</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Sreen Lock</a></li>
                                        <li><a href="#" class="disabled">Disabled</a></li>                                        </ul>

                                </div>
                                <div class="col-sm-4 col-md-3">

                                    <!--Mega menu list-->
                                    <ul class="list-unstyled">
                                        <li class="dropdown-header"><i class="demo-pli-mail icon-fw"></i> Mailbox</li>
                                        <li><a href="#"><span class="pull-right label label-danger">Hot</span>Indox</a></li>
                                        <li><a href="#">Read Message</a></li>
                                        <li><a href="#">Compose</a></li>
                                    </ul>
                                    <p class="pad-top mar-top bord-top text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                                </div>
                                <div class="col-sm-4 col-md-3">
                                    <!--Mega menu list-->
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="#" class="media mar-btm">
                                                <span class="badge badge-success pull-right">90%</span>
                                                <div class="media-left">
                                                    <i class="demo-pli-data-settings icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-semibold text-dark mar-no">Data Backup</p>
                                                    <small class="text-muted">This is the item description</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="media mar-btm">
                                                <div class="media-left">
                                                    <i class="demo-pli-support icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-semibold text-dark mar-no">Support</p>
                                                    <small class="text-muted">This is the item description</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="media mar-btm">
                                                <div class="media-left">
                                                    <i class="demo-pli-computer-secure icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-semibold text-dark mar-no">Security</p>
                                                    <small class="text-muted">This is the item description</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="media mar-btm">
                                                <div class="media-left">
                                                    <i class="demo-pli-map-2 icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-semibold text-dark mar-no">Location</p>
                                                    <small class="text-muted">This is the item description</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <p class="dropdown-header"><i class="demo-pli-file-jpg icon-fw"></i> Gallery</p>
                                    <ul class="list-unstyled list-inline text-justify">

                                        <li class="pad-btm">
                                            <img src="<?php echo base_url(); ?>assets//img/thumbs/mega-menu-2.jpg" alt="thumbs">
                                        </li>
                                        <li class="pad-btm">
                                            <img src="<?php echo base_url(); ?>assets//img/thumbs/mega-menu-3.jpg" alt="thumbs">
                                        </li>
                                        <li class="pad-btm">
                                            <img src="<?php echo base_url(); ?>assets//img/thumbs/mega-menu-1.jpg" alt="thumbs">
                                        </li>
                                        <li class="pad-btm">
                                            <img src="<?php echo base_url(); ?>assets//img/thumbs/mega-menu-4.jpg" alt="thumbs">
                                        </li>
                                        <li class="pad-btm">
                                            <img src="<?php echo base_url(); ?>assets//img/thumbs/mega-menu-5.jpg" alt="thumbs">
                                        </li>
                                        <li class="pad-btm">
                                            <img src="<?php echo base_url(); ?>assets//img/thumbs/mega-menu-6.jpg" alt="thumbs">
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-sm btn-block btn-default">Browse Gallery</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End mega dropdown-->

                </ul>

                <ul class="nav navbar-top-links pull-right">
                    <?php
                    if($this->uri->segment(1) == 'dashboard'){
                    ?>
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right">
                                    <!--<img class="img-circle img-user media-object" src="<?php echo base_url(); ?>assets//img/profile-photos/1.png" alt="Profile Picture">-->
                                    <i class="fa fa-building-o ic-user"></i>
                                </span>
                                <div class="username hidden-xs">
                                    <?php echo $empresa;  ?>
                                </div>
                            </a>


                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                                <!-- User dropdown menu -->
                                <ul class="head-list">
                                    <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id.'/'.$filtro_padrao; ?>/1"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Comtour</a></li>
                                    <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id.'/'.$filtro_padrao; ?>/2"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Tiradentes</a></li>
                                    <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id.'/'.$filtro_padrao; ?>/3"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Duque</a></li>
                                    <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id.'/'.$filtro_padrao; ?>/5"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Sergipe</a></li>
                                    <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id.'/'.$filtro_padrao; ?>/11"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Rolândia</a></li>
                                    <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id.'/'.$filtro_padrao; ?>/12"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Cornélio</a></li>
                                    <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id.'/'.$filtro_padrao; ?>/13"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Cambé</a></li>
                                    <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id.'/'.$filtro_padrao; ?>/14"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Mulher Cambé</a></li>
                                </ul>
                            </div>
                        </li>
                    <li id="dropdown-user" class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right">
                                    <!--<img class="img-circle img-user media-object" src="<?php echo base_url(); ?>assets//img/profile-photos/1.png" alt="Profile Picture">-->
                                    <i class="fa fa-calendar ic-user"></i>
                                </span>
                            <div class="username hidden-xs">
                                <?php echo $filtro_padrao;  ?>
                            </div>
                        </a>


                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                            <!-- User dropdown menu -->
                            <ul class="head-list">
                                <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id; ?>/hoje"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Hoje</a></li>
                                <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id; ?>/ontem"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Ontem</a></li>
                                <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id; ?>/anteontem"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Anteontem</a></li>
                                <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id; ?>/mesatehoje"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Mês Até Hoje</a></li>
                                <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id; ?>/mesatual"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Mês Atual</a></li>
                                <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id; ?>/anoatual"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Ano Atual</a></li>
                                <li><a href="<?php echo base_url(); ?>dashboard/visualizar/<?php echo $id; ?>/anoanterior"><i class="demo-pli-calendar-3 icon-lg icon-fw"></i> Ano Anterior</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <!--Language selector-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End language selector-->



                    <!--User dropdown-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li id="dropdown-user" class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right">
                                    <!--<img class="img-circle img-user media-object" src="<?php echo base_url(); ?>assets//img/profile-photos/1.png" alt="Profile Picture">-->
                                    <i class="demo-pli-male ic-user"></i>
                                </span>
                            <div class="username hidden-xs"><?php echo $user->FIRST_NAME.' '.$user->LAST_NAME; ?></div>
                        </a>


                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                            <!-- Dropdown heading  -->
                            <div class="pad-all bord-btm">
                                <p class="text-main mar-btm"><span class="text-bold">750GB</span> of 1,000GB Used</p>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" style="width: 70%;">
                                        <span class="sr-only">70%</span>
                                    </div>
                                </div>
                            </div>




                            <!-- Dropdown footer -->
                            <div class="pad-all text-right">
                                <a href="<?php echo base_url() ?>/auth/logout" class="btn btn-primary">
                                    <i class="demo-pli-unlock"></i> Sair do Sistema
                                </a>
                            </div>
                        </div>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End user dropdown-->

                    <li>
                        <a href="#" class="aside-toggle navbar-aside-icon">
                            <i class="pci-ver-dots"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!--================================-->
            <!--End Navbar Dropdown-->

        </div>
    </header>
    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
