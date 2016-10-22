<!--ending template-->
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <?php
        echo $general_setting['ga_code'];
        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title><?php if (isset($title)) {
            echo $title;
        } ?></title>
        <script type="text/javascript" src="<?php echo base_url() . 'statics/js/jquery.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'statics/bootstrap/js/bootstrap.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'statics/js/jquery_validation/jquery.validate.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'statics/js/jquery_validation/additional-methods.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>statics/js/handlebars-v1.3.0.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>statics/AdminLTE/AdminLTE.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() . 'statics/bootstrap/css/bootstrap.min.css' ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'statics/font-awesome/css/font-awesome.css' ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>statics/css/custom-control.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>statics/css/backend/index.css"/>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico" />
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    </head>
    <style type="text/css">
        .left-side{
            top:-52px;
            margin-bottom: 113px;
        }
    </style>

    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo base_url(); ?>admin/dashboard" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
<?php echo SITE_NAME; ?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <!--user profile-->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo lang('msg_hello'); ?>
                            <?php
                            if (isset($_SESSION['user'])) {
                                $user = $_SESSION['user'][0];
                                echo $user->user_name;
                            }
                            ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url() . 'admin/dashboard/update_profile'; ?>" class="red"><?php echo lang('msg_update_profile'); ?></a></li>
                            <li><a href="<?php echo base_url() . 'admin/dashboard/update_pwd'; ?>" class="red"><?php echo lang('msg_update_pwd'); ?></a></li>
                            <li><a href="<?php echo base_url() . 'admin/dashboard/logout'; ?>"><?php echo lang('msg_logout'); ?></a></li>
                        </ul>
                    </li>
                </ul>
                <!--end-->

            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!-- search form -->

                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">

                        <li>
                            <a href="<?php echo base_url() ?>admin/dashboard">
                                <i class="fa fa-dashboard"></i> <span><?php echo lang('msg_dashboard'); ?></span>
                            </a>
                        </li>


                        <li <?php if ($menu == 0) {
                                echo 'class="active"';
                            } ?>>
                            <a href="<?php echo base_url() . 'admin/types' ?>">
                                <i class="fa fa-list"></i>
<?php echo lang('msg_types') ?> - <?php echo lang('msg_categories'); ?>
                            </a>
                        </li>

                        <li <?php if ($menu == 1) {
    echo 'class="active"';
} ?>>
                            <a href="<?php echo base_url() . 'admin/estates' ?>">
                                <i class="fa fa-home"></i>
                                <?php echo lang('msg_estates') ?></a>
                        </li>

                        <li <?php if ($menu == 2) {
                                    echo 'class="active"';
                                } ?>>
                            <a href="<?php echo base_url() . 'admin/county' ?>">
                                <i class="fa fa-building"></i>
<?php echo lang('msg_county') ?></a>
                        </li>

                        <li <?php if ($menu == 3) {
    echo 'class="active"';
} ?>>
                            <a href="<?php echo base_url() . 'admin/cities' ?>">
                                <i class="fa fa-building"></i>
<?php echo lang('msg_city') ?></a>
                        </li>


                        <li <?php if ($menu == 4) {
    echo 'class="active"';
} ?>>
                            <a href="<?php echo base_url() . 'admin/marker' ?>">
                                <i class="fa fa-map-marker"></i>
                                <?php echo lang('msg_marker') ?></a>
                        </li>

                        <li <?php if ($menu == 5) {
                                    echo 'class="active"';
                                } ?>>
                            <a href="<?php echo base_url() . 'admin/users' ?>">
                                <i class="fa fa-users"></i>
<?php echo lang('msg_users') ?></a>
                        </li>
                        <li <?php if ($menu == 6) {
    echo 'class="active"';
} ?>>
                            <a href="<?php echo base_url() . 'admin/amenities' ?>">
                                <i class="fa fa-dashboard"></i>
<?php echo lang('msg_amenities') ?></a>
                        </li>

<!--              <li <?php //if($menu==7){//echo 'class="active"';}  ?>>
               <a href="<?php //echo base_url().'admin/contact'?>">
                 <i class="fa fa-phone-square"></i>
<?php //echo lang('msg_contact') ?></a>
               </li>
                        -->
                        <li <?php if ($menu == 8) {
    echo 'class="active"';
} ?>>
                            <a href="<?php echo base_url() . 'admin/pages'; ?>">
                                <i class="fa fa-pagelines"></i>
<?php echo lang('msg_pages'); ?></a>
                        </li>


<!--                <li <?php //if($menu==10){ //echo 'class="active"';}  ?>>
  <a href="<?php //echo base_url().'admin/hotline'?>">
   <i class="fa fa-phone-square"></i>
<?php //echo lang('msg_hotline');  ?></a>
 </li>

                        -->

                        <li <?php if ($menu == 14) {
    echo 'class="active"';
} ?>>
                            <a href="<?php echo base_url() . 'admin/posts' ?>">
                                <i class="fa fa-file"></i>
<?php echo lang('msg_post'); ?>
                            </a>
                        </li>

<!-- <li <?php //if($menu==15){echo 'class="active"';}  ?>>
 <a href="<?php //echo base_url().'admin/partner' ?>">
  <i class="fa fa-file"></i>
<?php //echo lang('msg_partner');  ?>
</a>
</li> -->

                        <li <?php if ($menu == 15) {
    echo 'class="active"';
} ?>>
                            <a href="<?php echo base_url() . 'admin/languages' ?>">
                                <i class="fa fa-language"></i>
<?php echo lang('msg_languages'); ?>
                            </a>
                        </li>

                        <li <?php if ($menu == 16) {
    echo 'class="active"';
} ?>>
                            <a href="<?php echo base_url() . 'admin/packages' ?>">
                                <i class="fa fa-box"></i>
<?php echo lang('msg_packages'); ?>
                            </a>
                        </li>

<!-- <li <?php //if($menu==16){echo 'class="active"';}  ?>>
  <a href="<?php //echo base_url().'admin/top_slider' ?>">
    <i class="fa fa-file"></i>
    Top Slider</a>
  </li> -->

     <!--              <li <?php //if($menu==17){//echo 'class="active"';}  ?>>
       <a href="<?php //echo base_url().'admin/banner' ?>">
         <i class="fa fa-file"></i>
         Banner</a>
       </li>
                        -->

                        <li class="treeview <?php if ($menu == 11) {
    echo 'active';
} ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-gear"></i>
                        <?php echo lang('msg_settings') ?><b class="caret"></b></a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url() . 'admin/settings/general' ?>" class="red"><?php echo lang('msg_general') ?></a></li>
                                <li><a href="<?php echo base_url() . 'admin/settings/currency' ?>" class="red"><?php echo lang('msg_currency') ?></a></li>
                                <li><a href="<?php echo base_url() . 'admin/settings/mail' ?>" class="red"><?php echo lang('msg_email') ?></a></li>
                                <li><a href="<?php echo base_url() . 'admin/settings/contact_info' ?>" class="red"><?php echo lang('msg_contact_info') ?></a></li>
                                <li><a href="<?php echo base_url() . 'admin/settings/default_location' ?>" class="red"><?php echo lang('msg_default_location') ?></a></li>
                                <li><a href="<?php echo base_url() . 'admin/settings/paypal' ?>" class="red"><?php echo lang('msg_paypal') ?></a></li>
                            </ul>
                        </li>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
<?php
if (isset($heading)) {
    echo $heading;
}
?>
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">

<?php echo $template['partials']['content']; ?>      
<?php
// echo $content;
?> 
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

        <style type="text/css">
            .content{
                padding-bottom: 100px;
            }

            #footer{
                display: block;
                background: rgb(216, 216, 216);
                padding-top: 5px;
            }

            .sidebar .sidebar-menu{
                margin-top: 100px;
            }
        </style>
        <!--         <div id="footer" class="row">
          <div class="footer-inner">
            <center>
              <p><?php //echo $general_setting['copyright']  ?></p>
            </center>
          </div>
        </div> -->
    </body>
    <script type="text/javascript" src="<?php echo base_url(); ?>statics/AdminLTE/db.js"></script>
</html>
