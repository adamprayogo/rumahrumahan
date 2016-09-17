<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title><?php echo (isset($title)) ? $title : ''; ?></title> 
        <meta name="description" content="<?php echo (isset($meta_description)) ? $meta_description : $general_setting['desc']; ?>" />
        <meta name="keywords" content="<?php echo (isset($meta_kw)) ? $meta_kw : $general_setting['keyword']; ?>" />
        <meta name="author" content="<?php echo (isset($meta_author)) ? $meta_author : $general_setting['author']; ?>"/>
        <meta property="og:image" content="<?php echo (isset($og_image)) ? $meta_description : base_url() . 'img/logo.png' ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico" />
        <?php
        //$CI = & get_instance();
        //echo $general_setting['ga_code'];
        ?>
        <!-- CUSTOM ADDITIONAL --->
        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>statics/bootstrap/dist/css/bootstrap.min.css" >
        <!-- Font Awesome -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>statics/font-awesome/css/font-awesome.min.css">
        <!-- NProgress -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>statics/nprogress/nprogress.css">
        <!-- Ion.RangeSlider -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>statics/normalize-css/normalize.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>statics/ion.rangeSlider/css/ion.rangeSlider.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>statics/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css">
        <!-- iCheck -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>statics/iCheck/skins/flat/green.css">
        <!-- Select2 -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>statics/select2/dist/css/select2.min.css">
        <!-- Switchery -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>statics/switchery/dist/switchery.min.css">
        <!-- starrr -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>statics/rateyo/jquery.rateyo.min.css">

        <!-- Custom Theme Style -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>statics/build/css/custom.css">


        <!-- jQuery -->
        <script type="text/javascript" src="<?php echo base_url(); ?>statics/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script type="text/javascript" src="<?php echo base_url(); ?>statics/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script type="text/javascript" src="<?php echo base_url(); ?>statics/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script type="text/javascript" src="<?php echo base_url(); ?>statics/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script type="text/javascript" src="<?php echo base_url(); ?>statics/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script type="text/javascript" src="<?php echo base_url(); ?>statics/moment/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>statics/datepicker/daterangepicker.js"></script>
        <!-- Ion.RangeSlider -->
        <script type="text/javascript" src="<?php echo base_url(); ?>statics/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
        <!-- Switchery -->
        <script type="text/javascript" src="<?php echo base_url(); ?>statics/switchery/dist/switchery.min.js"></script>  
        <!-- Select2 -->
        <script type="text/javascript" src="<?php echo base_url(); ?>statics/select2/dist/js/select2.full.min.js"></script>
        <!-- starrr -->
        <script src="<?php echo base_url(); ?>statics/rateyo/jquery.rateyo.min.js"></script>
        <!-- Custom Theme Scripts -->
        <script type="text/javascript" src="<?php echo base_url(); ?>statics/build/js/custom.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyB0ZCtG2kdIz5dX34KnuOIRyTdQPQh3wJs&libraries=places"></script>
    </head>
    <body>
        <div class="container body">
            <?php
            echo $template['partials']['nav'];
            ?>

            <?php echo $template['partials']['content']; ?>	

            <?php
            echo $template['partials']['footer'];
            ?>
        </div>
    </body>
</html>