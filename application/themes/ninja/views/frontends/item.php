<?php
//    var_dump($amenities_check);
?>
<div class="main_container">
    <!-- page content -->
    <div class="content_wrapper" role="main">
        <div class="container gap">
            <div class="col-md-8 col-md-offset-2 col-xs-12">
                <div class="x_panel">
                    <div id="item-img" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php
                            if ($images != null) {
                                $idx = 0;
                                foreach ($images as $img) {
                                    if ($idx == 0) {
                                        ?>
                                        <li data-target="#item-img" data-slide-to="<?php echo $idx ?>" class="active"></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li data-target="#item-img" data-slide-to="<?php echo $idx; ?>"></li>
                                        <?php
                                    }
                                    $idx++;
                                }
                            } else {
                                ?>
                                <li data-target="#item-img" data-slide-to="0" class="active"></li>
                                <?php
                            }
                            ?>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                            if ($images != null) {
                                $idx = 0;
                                foreach ($images as $img) {
                                    if ($idx == 0) {
                                        ?>
                                        <div class="item active" style="overflow: hidden;">
                                            <img class="img-responsive" src="<?php echo base_url() . $img->path; ?>">
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="item" style="overflow: hidden;">
                                            <img class="img-responsive" src="<?php echo base_url() . $img->path; ?>">
                                        </div>
                                        <?php
                                    }
                                    $idx++;
                                }
                            } else {
                                ?>
                                <div class="item active" style="overflow: hidden;">
                                    <img src="<?php echo base_url() . 'statics/images/no_photo.png'; ?>" alt="Chania">
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#item-img" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#item-img" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="container gap">
                        <div class="col-md-12">
                            <h2><?php echo $obj[0]->title ?></h2>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label><?php echo $obj[0]->cities_name; ?>, </label>
                                    <label><?php echo $obj[0]->county_name; ?></label>
                                    <p><?php echo $obj[0]->address; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <b>Luas Ruangan</b> : <?php echo $obj[0]->area; ?>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="col-md-12">
                                    <label>Fasilitas : </label>
                                </div>
                                <div class="col-md-12">
                                    <?php
                                    if ($amenities_check == null) {
                                        echo 'Facility not set';
                                    } else {
                                        foreach ($amenities_check as $amnts) {
                                            ?>
                                            <span class="label label-success"><?php echo $amnts->name ?></span>
                                            <?php
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <h2 class="itm-price"><?php echo $obj[0]->price; ?></h2>
                        </div>
                        <div class="col-md-12 gap">
                            <div class="itm-desc">
                                <?php
                                if (strlen($obj[0]->content) == 0) {
                                    echo '<p class="text-center">NO DESCRIPTION</p>';
                                } else {
                                    echo $obj[0]->content;
                                }
                                ?>

                            </div>
                            <?php
                            if (strlen($obj[0]->content >= 447)) {
                                ?>
                                <center><button class="btn btn-default" id="read-more">Read More</button></center>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <center>
                                    <div class="col-md-12 col-xs-12">
                                        <h3 class="rating-val">5.5</h3>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="starrr starrr-bg stars-existing " data-rating="<?php echo ($total_rating != null) ? $total_rating : 0; ?>"></div>
                                        <p><small><i class="fa fa-user"></i> 35000</small></p>
                                    </div>
                                </center>
                            </div>
                            <div class="col-md-5 col-xs-12">
                                <div style="padding-top:7%; padding-bottom: auto;">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            40
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            20
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            60
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            80
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-xs-12 gap">
                            <center>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-earphone"></span> Call</button>
                                    <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-map-marker"></span> Location</button>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#read-more').click(function () {
            $('.itm-desc').removeClass('itm-desc');
            $(this).remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        $stars = $('.starrr');
        $stars.each(function () {
            $(this).rateYo({
                rating: $(this).attr('data-rating'),
                ratedFill: '#FFD119',
                starWidth: "15px",
                readOnly: true
            });
        });
    });
</script>