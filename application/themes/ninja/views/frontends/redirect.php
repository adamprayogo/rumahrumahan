

<div class="main_container">
    <!-- page content -->
    <div class="content_wrapper" role="main">
        <div class="container">
            <div class="col-md-4 col-md-offset-4 col-sm-12">
                <center>
                    <img src="<?php echo base_url(); ?>img/logo.png" class="img-responsive" style="max-height: 110px;"/>
                </center>
            </div>
            <?php
                if(isset($send_newsletter)){
                    var_dump($send_newsletter);
                    var_dump($amenities_check);
//                    foreach($send_newsletter as $row){
//                        echo '<br>'.$row->id.' '.$row->subu_id.' '.$row->subu_email;
//                    }
                }
            ?>
<!--            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <h2>Redirect Page...</h2>
                <p><?php
                    if (isset($message)) {
                        echo $message;
                    }
                    ?></p>
                <p><small><?php
                    if (isset($submessage)) {
                        echo $submessage;
                    }else{
                        ?>
                        <a href="<?php echo base_url();?>">Click here if browser not redirect automatically.</a>
                            <?php
                    }
                    ?></small></p>
            </div>-->
        </div>
        <div class="text-center">
            <small>Available On</small>
        </div>
        <a class="and-img" href="#"></a>
    </div>
</div>
<!--<script>
    $(document).ready(function () {
        var interval = 5;
        setInterval(function () {
            $('#countdown').html(interval);
            if (interval == 0) {
                window.location = "<?php if($status=1){echo base_url();}else{echo $generated_url;}?>";
                return false;
            }
            interval--;
        },1000);
    });
</script>-->