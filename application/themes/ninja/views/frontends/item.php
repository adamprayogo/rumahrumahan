<div class="main_container">
    <!-- page content -->
    <div class="content_wrapper" role="main">
        <div class="container gap">
            <div class="col-md-3 col-xs-12">
                <div class="x_panel content">
                    <div class="profile">
                        <div class="profile_pic">
                            <?php
                            if (file_exists(base_url() . $obj[0]->avt)) {
                                ?>
                                <img src="<?php echo base_url() . $obj[0]->avt; ?>" alt="..." class="img-circle profile_img">
                                <?php
                            } else {
                                ?>
                                <img src="<?php echo base_url() . 'statics/images/no_photo.png' ?>" alt="<?php echo 'rumahqu-' . $obj[0]->user_name; ?>" class="img-circle profile_img">
                                <?php
                            }
                            ?>
                            <div class="starrr user-star" data-rating="3.5"></div>
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $obj[0]->user_name ?></h2>
                            <span><?php echo $obj[0]->email; ?></span>
                            <div class="contact-user pull-right">
                                <button type="button" class="btn btn-success " data-element="phone" phone="<?php echo $obj[0]->phone; ?>"  data-toggle="modal" data-target="#modalDesc"><span class="glyphicon glyphicon-earphone"></span> Call</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 gap">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="x_panel content">
                    <div id="item-img" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php
                            if ($images != null) {
                                $idx = 0;
                                foreach ($images as $img) {
                                    if ($idx == 0) {
                                        ?>
                                        <li data-target="#item-img" data-slide-to="<?php echo $idx ?>" class="active" ></li>
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
                                        <div class="item active">
                                            <img class="img-responsive" src="<?php echo base_url() . $img->path; ?>">
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="item">
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
                        <div class="col-md-12 col-xs-12">
                            <h3 class="text-center"><?php echo $obj[0]->title ?></h3>
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
                        <div class="col-md-12 col-xs-12 text-right">
                            <h2 class="price">Rp. <?php echo $obj[0]->price; ?></h2>
                        </div>
                        <div class="col-md-12 gap col-xs-12">
                            <div class="itm-desc" style="max-height: 200px">
                                <?php
                                if (strlen($obj[0]->description) == 0) {
                                    echo '<p class="text-center">NO DESCRIPTION</p>';
                                } else {
                                    echo $obj[0]->description;
                                }
                                ?>
                            </div>
                            <?php
                            if (strlen($obj[0]->description) >= 300) {
                                ?>
                                <center><button class="btn btn-default" id="read-more">Read More</button></center>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <div class="col-md-3 col-xs-12">
                                <center>
                                    <div class="col-md-12 col-xs-12">
                                        <h3 class="rating-val"><?php echo ($total_rating != null) ? number_format($total_rating, 2, '.', '') : $total_rating = 0; ?></h3>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="starrr starrr-bg stars-existing " data-rating="<?php echo ($total_rating != null) ? $total_rating : $total_rating = 0; ?>"></div>
                                        <p><small><i class="fa fa-user"></i> <?php echo ($total_user != null) ? $total_user : $total_user = 0; ?></small></p>
                                    </div>
                                </center>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div style="padding-top:3%; padding-bottom: auto;">
                                    <?php
                                    if ($user_rating != NULL) {
                                        $stylebar = array('progress-bar-2', 'progress-bar-success', 'progress-bar-info', 'progress-bar-warning', 'progress-bar-danger');
                                        $idx_rating = 0;
                                        foreach ($user_rating as $rating) {
                                            ?>
                                            <div class="progress-user">
                                                <i class="fa fa-user"></i> <?php echo $rating->total_rating; ?>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar <?php echo $stylebar[$idx_rating] ?> text-center" role="progressbar" aria-valuenow="<?php echo $rating->total_rating; ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_user; ?>" style="width: <?php echo ($total_user != 0) ? ($rating->total_rating / $total_user) * 100 : 0; ?>%">
                                                    <p class="pull-left"><i class="fa fa-star"></i> <?php echo $idx_rating + 1; ?></p>
                                                </div>
                                            </div>
                                            <?php
                                            $idx_rating++;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-xs-12 gap">
                            <center>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalDesc" data-element="location" lat="<?php echo $obj[0]->lng; ?>" lng="<?php echo $obj[0]->lat; ?>"><span class="glyphicon glyphicon-map-marker"></span> Location</button>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDesc" tabindex="-1" role="dialog" aria-labelledby="modalDesc">
    <div class="modal-dialog" role="document">
        <div class="modal-content  text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <h3></h3>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#read-more').click(function () {
            $('.itm-desc').removeAttr('style');
            $(this).remove();
        });

        $('#modalDesc').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var elName = button.attr('data-element');
            var conTitle, conBody;
            var modal = $(this);
            if (elName == 'phone') {
                conTitle = 'Phone Number';
                conBody = button.attr('phone');
            } else if (elName == 'location') {
                conTitle = 'Location';
                conBody = '';
                var lat = button.attr('lat');
                var lng = button.attr('lng');
                modal.find('.modal-body').append('<div id="itemLocation" style="height:250px; width:100%;">');
                initMap(parseFloat(lat), parseFloat(lng), 'itemLocation');
            }
            modal.find('.modal-title').text(conTitle);
            modal.find('.modal-body h3').text(conBody);
        });
        $('#modalDesc').on('hidden.bs.modal', function () {
            var modal = $(this);
            modal.find('#itemLocation').remove();
            modal.find('.modal-title').text('');
            modal.find('.modal-body h3').text('');
        });
    });
    function initMap(lat, lng, selector) {
        var map = new google.maps.Map(document.getElementById(selector), {
            zoom: 14,
            center: {lat: lat, lng: lng},
            scrollwheel: false,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.RIGHT_TOP
            },
            mapType: 'hybrid'
        });
        var infowindow = new google.maps.InfoWindow({
            content: 'Estates Location'
        });
        var marker = new google.maps.Marker({
            map: map,
            animation: google.maps.Animation.DROP,
            position: {lat: lat, lng: lng},
            icon: '<?php echo base_url() . 'img/icon/android-icon-36x36.png' ?>'
        });
        marker.addListener('click', toggleBounce);
        infowindow.open(map, marker);
        google.maps.event.trigger(map, 'resize');
        map.setZoom(map.getZoom());
    }

    function toggleBounce() {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }
</script>
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
<script>
    $('#item-img').carousel({
        interval: false
    });
</script>