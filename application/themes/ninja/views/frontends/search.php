<div class="main_container">
    <!-- page content -->
    <div class="content_wrapper" role="main">
        <div class="container gap">
            <div class="map">
                <div class="col-md-3 col-xs-12" id="searchform">
                    <div class="x_panel">
                        <div class="text-center">
                            <h2>Cari Berdasarkan Kireteria</h2>
                            <div class="x_title"></div>
                        </div>
                        <?php echo form_open('search', 'class="form-horizontal form-label-left input_mask"') ?>
                        <div class="col-md-6 col-xs-6 form-group">
                            <label>Tipe</label>
                            <select class="form-control" name="category">
                                <option value="<?php echo KOSAN ?>" <?php
                                if ($category == KOSAN) {
                                    echo 'selected';
                                }
                                ?>>Kosan</option>
                                <option value="<?php echo KONTRAKAN ?>" <?php
                                if ($category == KONTRAKAN) {
                                    echo 'selected';
                                }
                                ?>>Kontrakan</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-xs-6 form-group">
                            <label>Untuk</label>
                            <select class="form-control" name="type">
                                <?php
                                foreach ($type_list as $row) {
                                    ?>
                                    <option value="<?php echo $row->id; ?>" <?php
                                    if ($row->id == $type) {
                                        echo 'selected';
                                    }
                                    ?>><?php echo $row->name; ?></option>;
                                            <?php
                                        }
                                        ?>
                            </select>
                        </div>

                        <div class="col-md-12 col-xs-12 col-sm-12 form-group">
                            <label>Lokasi</label>
                            <select class="select2_group form-control" name="cities">
                                <?php
                                $diff = 0;
                                $openTag = true;
                                $closeTag = false;
                                foreach ($cities_list as $row) {
                                    if ($diff != $row->county_id) {
                                        $diff = $row->county_id;
                                        if ($openTag == false) {
                                            ?>
                                            </optgroup>
                                            <?php
                                            $closeTag = true;
                                        }
                                        ?>
                                        <optgroup value="<?php echo $row->county_id ?>" label="<?php echo $row->county_name ?>">
                                            <option value="<?php echo $row->cities_id; ?>" <?php
                                            if ($row->cities_id == $cities) {
                                                echo 'selected';
                                            }
                                            ?>><?php echo $row->cities_name; ?></option>
                                                    <?php
                                                    $closeTag = false;
                                                } else {
                                                    $openTag = false;
                                                    ?>
                                            <option value="<?php echo $row->cities_id; ?>" <?php
                                            if ($row->cities_id == $cities) {
                                                echo 'selected';
                                            }
                                            ?>><?php echo $row->cities_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                </optgroup>
                            </select>
                        </div>  
                        <div class="col-md-12 col-xs-12 grid_slider form-group">
                            <div class=" text-center">
                                <label>Harga</label>
                            </div>
                            <input type="text" id="price" value="" name="price" />
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>    Cari</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12" id="src_map"></div>
            </div>
        </div>
        <div class="container gap">
            <div class="col-md-7 col-md-offset-3 col-xs-12">
                <h2>Search Result</h2>
                <div class="x_title">
                </div>
                <div>
                    <?php
                    if ($src_result != null) {
                        $prefix_row = '<div class="row">';
                        $suffix_row = '</div>';
                        $content_row = '';
                        $perPage = 4;
                        $idxPage = 0;
                        foreach ($src_result as $item_row) {
                            $idxPage++;
                            $content_row.='<a class="item-box" href="' . base_url() . 'search/' . $item_row->id . '" target="_blank"><div class="col-md-3 col-xs-6">
                                <div class="x_panel" style="height:230px">
                                    <div class="cover-img">';
                            if ($item_row->image_path != null) {
                                $content_row.='<img src="' . base_url() . $item_row->image_path . '" alt="' . $item_row->title . '" class="img-responsive img-rounded" style="max-height:95px;"/>';
                            } else {
                                $content_row.='<img class="img-responsive img-rounded" style="max-height:95px;" src="' . base_url() . 'statics/images/no_photo.png" alt="' . $item_row->title . 'style="max-height:95px;"/>';
                            }
//                            $price = explode('#', mod_price($item_row->price));
                            if ($item_row->total_rating != null) {
                                $rating = $item_row->total_rating;
                                $user_rating = $item_row->total_user;
                            } else {
                                $rating = 0;
                                $user_rating = 0;
                            }
                            $content_row.='</div>
                                <div class="content">
                                <div class="title">' . $item_row->title . '</div>
                                <div class="desc">Lorem Ipsum Dolor Sir..</div>
                                <div class="col-md-6 col-xs-6 itm-rating pull-left"><div class="starrr stars-existing" data-rating="' . $rating . '"></div></div>';
                            if ($item_row->status = 0) {
                                $status = '<b style="color:red; font-size:10px;">FULL</b>';
                            } else {
                                $status = '<b style="color:green; font-size:10px;">AVAILABLE</b>';
                            }

                            $content_row.='
                                <div class="col-md-6 col-xs-6" style="padding-right:0; text-align:right;"><small>' . $status . '</small></div>
                                <div class="col-md-12 col-xs-12" style="opacity:0.6;"><small><i class="fa fa-user"></i> ' . $user_rating . '</small></div>
                                <div class="col-md-12 col-xs-12 itm-price" style="padding-right:0;">' . format_money($item_row->price, ".", ",", "Rp. ") . '</b></div>
                                            </div></div></div></a>';
                            if ($idxPage == $perPage) {
                                echo $prefix_row . $content_row . $suffix_row;
                                $content_row = '';
                                $idxPage = 0;
                            }
                        }
                        if (count((array) $src_result) < $perPage) {
                            echo $prefix_row . $content_row . $suffix_row;
                        }
                    } else {
                        ?>
                        <p class="text-center">We're sorry, your search criteria is not found.</p>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-2 col-xs-12">
                <div class="x_panel text-center">
                    <h2>Pencarian Sejenis</h2>
                    <div class="x_title "></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#price").ionRangeSlider({
            type: "double",
            min: 0,
            max: 99999999,
            from: <?php echo $price_1; ?>,
            to: <?php echo $price_2; ?>,
            grid: true,
            prefix: "Rp ",
            force_edges: true
        });
        initMap();
        var $selection = $(".select2_group").select2({});
        initStar('.starrr',15);
    });
    //Maps Google//
    function initMap() {
//        
        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            scrollwheel: false,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.RIGHT_TOP
            },
            mapType: 'hybrid'
        }
        //Display a map on the page
        map = new google.maps.Map(document.getElementById("src_map"), mapOptions);
        //multiple marker

        var locations = [
<?php
$all_location = "";
if (isset($src_result)) {
    foreach ($src_result as $item_location) {
        $all_location.="[" . $item_location->lat . "," . $item_location->lng . "],";
    }
    echo substr($all_location, 0, -1);
}
?>
        ];
        var windowContent = [<?php
$all_content = "";
if (isset($src_result)) {
    foreach ($src_result as $item_location) {
        $link = "<a href=" . base_url() . "search/" . $item_row->id . " target=_blank>";
        $all_content.="['<div class=container id=map-container><div class=col-md-4 id=iw-image>" . $link;
        if ($item_location->image_path != null) {
            $all_content.='<img src="' . base_url() . $item_location->image_path . '" alt="' . $item_location->title . '" class="img-responsive" style="height:30px; overflow:hidden;"/>';
        } else {
            $all_content.='<img src="' . base_url() . 'statics/images/no_photo.png" alt="' . $item_location->title . '" style="height:30px; overflow:hidden;"/>';
        }
        if ($item_location->total_rating != null) {
            $rating = $item_location->total_rating;
        } else {
            $rating = 0;
        }
        $all_content.="</a><div class=starrr stars-existing data-rating=" . $rating . " id=iw-starrr></div></div><div class=col-md-8 id=iw-content><div class=iw-title style=display:block;>" . substr($item_location->title, 0,16) . "..</div><div class=iw-price style=display:block;text-align:right;>" . format_money($item_location->price, ".", ",", "Rp. ") . "</div></div></div>'],";
    }
    echo substr($all_content, 0, -1);
}
?>];
        var infoWindows = [];
        var markers = [];
        for (var i = 0; i < locations.length; i++) {
            var infoWindow = new google.maps.InfoWindow({
                content: windowContent[i][0]
            });
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                map: map,
                icon: '<?php echo base_url() . 'img/icon/android-icon-36x36.png'; ?>',
            });
            markers.push(marker);
            infoWindows.push(infoWindow);
            bounds.extend(markers[i].getPosition());
            google.maps.event.addListener(marker, 'click', (function (markers, i, infoWindows) {
                return function () {
                    infoWindows[i].close();
                    map.setZoom(17);
                    map.setCenter(markers[i].getPosition());
                    infoWindows[i].open(map, markers[i]);
                };
            })(markers, i, infoWindows));
            infoWindows[i].open(map, markers[i]);
            google.maps.event.addListener(infoWindows[i], 'domready', function () {
                initStar('.starrr#iw-starrr',9);
                // Reference to the DIV which receives the contents of the infowindow using jQuery
                var iwOuter = $('.gm-style-iw');

                /* The DIV we want to change is above the .gm-style-iw DIV.
                 * So, we use jQuery and create a iwBackground variable,
                 * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().
                 */
                var iwBackground = iwOuter.prev();

                // Remove the background shadow DIV
                iwBackground.children(':nth-child(2)').css({'display': 'none'});

                // Remove the white background DIV
                iwBackground.children(':nth-child(4)').css({'display': 'none'});
                var iwCloseBtn = iwOuter.next();

                // Apply the desired effect to the close button
                iwCloseBtn.css({
                    right: '60px', top: '29px' // button repositioning
                });

            });
        }
        map.fitBounds(bounds);
        var markerCluster = new MarkerClusterer(map, markers,
                {imagePath: '<?php echo base_url() . 'statics/marker-cluster/images/m' ?>'}
        );
    }
    function initStar(selector,width) {
        $stars = $(selector);
        $stars.each(function () {
            $(this).rateYo({
                rating: $(this).attr('data-rating'),
                ratedFill: '#FFD119',
                starWidth: width+"px",
                readOnly: true
            });
        });
    }
</script>