<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wah Dashboard</title>
    <link href="<?php echo asset('public_html/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo asset('public_html/css/font-awesome.css'); ?>" rel="stylesheet" />
    <link href="<?php echo asset('public_html/css/custom.css'); ?>" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel = 'stylesheet' type = 'text/css' href = '<?php echo asset('public_html/css/datepicker.css'); ?>' >
    <link rel = 'stylesheet' type = 'text/css' href = '<?php echo asset('public_html/css/bootstrap-datetimepicker.min.css'); ?>' >
    <link rel = 'stylesheet' type = 'text/css' href = '<?php echo asset('public_html/css/jquery.timepicker.min.css'); ?>' >
    <link rel = 'stylesheet' type = 'text/css' href = '<?php echo asset('public_html/css/full-slider.css'); ?>' >
    <link rel = 'stylesheet' type = 'text/css' href = '<?php echo asset('public_html/css/jquery.dynatable.css'); ?>' >
    <link rel = 'stylesheet' type = 'text/css' href = '<?php echo asset('public_html/css/jquery.dataTables.min.css'); ?>' >
    <link rel = 'stylesheet' type = 'text/css' href = '<?php echo asset('public_html/css/font-awesome.min.css'); ?>'>
    <link rel = 'stylesheet' type = 'text/css' href = '<?php echo asset('public_html/chosen/chosen.min.css'); ?>' />
    
    <script src="<?php echo asset('public_html/js/jquery-1.10.2.js'); ?>"></script>
    <script src="<?php echo asset('public_html/js/bootstrap.min.js'); ?>"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
    
    <script src="<?php echo asset('public_html/js/custom.js'); ?>"></script>

    <script src="<?php echo asset('public_html/js/fileinput-master/fileinput.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo asset('public_html/js/fileinput-master/fileinput_locale_fr.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo asset('public_html/js/fileinput-master/fileinput_locale_es.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo asset('public_html/js/jquery.dynatable.js'); ?>"  type="text/javascript" ></script>
    
    <script src="<?php echo asset('public_html/js/bootstrap-datepicker.js'); ?>" type="text/javascript"></script> 
    <script src="<?php echo asset('public_html/js/jquery.timepicker.min.js'); ?>" type="text/javascript"></script> 
    <script type="text/javascript" src="<?php echo asset('public_html/js/jquery.dataTables.min.js'); ?>"></script>   
    <script type="text/javascript" src="<?php echo asset('public_html/js/dropzone.js'); ?>"></script>   
    <script src="<?php echo asset('public_html/js/moment.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo asset('public_html/js/bootstrap-datetimepicker.min.js'); ?>" type="text/javascript"></script>            
    <!--growl-->
    <script src="<?php echo asset('public_html/js/jquery-growl/jquery.growl.js'); ?>" type="text/javascript"></script>
    <link href="<?php echo asset('public_html/js/jquery-growl/jquery.growl.css'); ?>" rel="stylesheet" type="text/css" />

    <!--picEdit-->
    <link rel= 'stylesheet' type = 'text/css' href = '<?php echo asset('public_html/css/picedit.min.css'); ?>' />        
    <script type="text/javascript" src="<?php echo asset('public_html/js/picedit.min.js'); ?>"></script>
   <!--back stretch-->
    <script src="<?php echo asset('public_html/js/jquery.backstretch.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo asset('public_html/js/scripts.js'); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo asset('public_html/js/jquery.mousewheel-3.0.6.pack.js'); ?>"></script>
    
    

    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="<?php echo asset('public_html/fancy/jquery.fancybox.js?v=2.1.5'); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('public_html/fancy/jquery.fancybox.css?v=2.1.5'); ?>" media="screen" />

    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('public_html/fancy/helpers/jquery.fancybox-buttons.css?v=1.0.5'); ?>" />
    <script type="text/javascript" src="<?php echo asset('public_html/fancy/helpers/jquery.fancybox-buttons.js?v=1.0.5'); ?>"></script>
          
    <script src="<?php echo asset('public_html/chosen/chosen.jquery.min.js'); ?>" type="text/javascript"></script>
</head>
<body>
<div id="wrapper" style="background-color:#2e3442;">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <img src="<?php echo asset('public_html/imgs/dashboard3.png'); ?>" class="logotop1" style="height: 50px;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            
            <span class="logout-spn" style="margin-top:20px;">
                <!-- Split button -->
                <div class="btn-group">
                  <button type="button" class="btn btnuser-logout" style="cursor:default">Login as <?php echo session('first_name'); ?> <?php echo session('last_name'); ?> </button>
                  <button type="button" class="btn btnuser-logout dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" title="Logout">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="<?php echo url('logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                  </ul>
                </div>
            </span> 

            <span class="spann">
                <a href="" data-toggle="tooltip" data-placement="top" title="Tarlac"><img src="<?php echo asset('public_html/imgs/tarlac.png'); ?>" alt="tarlac" style="height: 65px;"></a>
                <a href="" data-toggle="tooltip" data-placement="top" title="LMP"><img src="<?php echo asset('public_html/imgs/lmp.png'); ?>" alt="lmp" style="height: 65px;"></a>
                <a href="" data-toggle="tooltip" data-placement="top" title="Department of Health"><img src="<?php echo asset('public_html/imgs/doh.png'); ?>" alt="doh" style="height: 65px;"></a>
            <a href="" data-toggle="tooltip" data-placement="top" title="Surigao"><img src="<?php echo asset('public_html/imgs/surigao.png'); ?>" alt="surigao" style="height: 65px;"></a>
            <a href="" data-toggle="tooltip" data-placement="top" title="Pangasinan"><img src="<?php echo asset('public_html/imgs/Pangasinan.png'); ?>" alt="pangasinan" style="height: 65px;"></a>
            <a href="" data-toggle="tooltip" data-placement="top" title="Ilocos Sur"><img src="<?php echo asset('public_html/imgs/ilocos-sur.png'); ?>" alt="ilocos-sur" style="height: 65px;"></a>
            <a href="" data-toggle="tooltip" data-placement="top" title="US Agency for Int'l Devel."><img src="<?php echo asset('public_html/imgs/usaid.png'); ?>" alt="usaid" style="height: 65px;"></a>
            <a href="" data-toggle="tooltip" data-placement="top" title="Qualcomm Wireless Reach"><img src="<?php echo asset('public_html/imgs/qualcomm.png'); ?>" class="logotop" alt="qualcomm" style="height: 65px;"></a>
            <a href="" data-toggle="tooltip" data-placement="top" title="RTI International"><img src="<?php echo asset('public_html/imgs/rti.png'); ?>" class="logotop" alt="rti" style="height: 65px;"></a>
            <a href="" data-toggle="tooltip" data-placement="top" title="Zuellig Family Foundation"><img src="<?php echo asset('public_html/imgs/zuellig.png'); ?>" class="logotop" alt="zuellig" style="height: 65px;"></a>
            </span>
            
        </div>
    </div>
    <style>
        .row{
            margin-left: -10px !important;
            margin-right: -10px !important;
        }
    </style>