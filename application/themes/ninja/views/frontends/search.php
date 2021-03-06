<?php
//var_dump($src_result);
?>

<div class="main_container">
    <!-- page content -->
    <div class="content_wrapper" role="main">
        <div class="container gap">
            <div class="map">
                <div class="col-md-3 col-xs-12" id="searchform">
                    <div class="x_panel">
                        <div class="text-center">
                            <h2>Cari Berdasarkan Kireteria</h2>
                            <div class="x_title">
                                <!--<div class="clearfix"></div>-->
                            </div>
                        </div>

                        <?php echo form_open('default/home/search', 'class="form-horizontal form-label-left input_mask"') ?>
                        <div class="col-md-6 col-xs-6 form-group">
                            <label>Tipe</label>
                            <select class="form-control" name="category">
                                <?php
                                if ($category == KOSAN) {
                                    ?>
                                    <option value="<?php echo KOSAN ?>">Kosan</option>
                                    <option value="<?php echo KONTRAKAN ?>">Kontrakan</option>
                                    <option value="<?php echo RUSUN ?>">Rusun</option>
                                    <?php
                                } else if ($category == KONTRAKAN) {
                                    ?>
                                    <option value="<?php echo KONTRAKAN ?>">Kontrakan</option>
                                    <option value="<?php echo KOSAN ?>">Kosan</option>
                                    <option value="<?php echo RUSUN ?>">Rusun</option>
                                    <?php
                                } else if ($category == RUSUN) {
                                    ?>
                                    <option value="<?php echo RUSUN ?>">Rusun</option>
                                    <option value="<?php echo KOSAN ?>">Kosan</option>
                                    <option value="<?php echo KONTRAKAN ?>">Kontrakan</option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 col-xs-6 form-group">
                            <label>Untuk</label>
                            <select class="form-control" name="type">
                                <?php
                                $head = '';
                                $body = '';
                                foreach ($type_list as $row) {
                                    if ($row->id == $type) {
                                        $head .= '<option value="' . $row->id . '">' . $row->name . '</option>';
                                    } else {
                                        $body .= '<option value="' . $row->id . '">' . $row->name . '</option>';
                                    }
                                }
                                echo $head . $body;
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
                                $selected = '';
                                foreach ($cities_list as $row) {
                                    if ($row->cities_id == $cities) {
                                        $selected = 'selected="selected"';
                                    }
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
                                            <option value="<?php echo $row->cities_id; ?>" <?php echo $selected; ?>><?php echo $row->cities_name; ?></option>
                                            <?php
                                            $closeTag = false;
                                        } else {
                                            $openTag = false;
                                            ?>
                                            <option value="<?php echo $row->cities_id; ?>" <?php echo $selected; ?>><?php echo $row->cities_name; ?></option>
                                            <?php
                                        }
                                        $selected = '';
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
                <h2>Hasil Pencaharian</h2>
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
                                <div class="x_panel" style="height:200px">
                                    <div class="cover-img">';
                            if ($item_row->image_path != null) {
                                $content_row.='<img src="' . base_url() . $item_row->image_path . '" alt="' . $item_row->title . '" class="img-responsive img-rounded" style="max-height:95px;"/>';
                            } else {
                                $content_row.='<img class="img-responsive img-rounded" style="max-height:95px;" src="' . base_url() . 'statics/images/no_photo.png" alt="' . $item_row->title . '"/>';
                            }
                            $price = explode('#', mod_price($item_row->price));
                            if ($item_row->total_rating != null) {
                                $rating = $item_row->total_rating;
                            } else {
                                $rating = 0;
                            }
                            $content_row.='</div>
                                <div class="content">
                                    <div class="title">' . $item_row->title . '</div>
                                    <div class="desc">Lorem Ipsum Dolor Sir..</div>
                                    <div class="col-md-6 col-xs-6 itm-rating"><div class="starrr stars-existing" data-rating="' . $rating . '"></div></div>
                                    <div class="col-md-6 col-xs-6 itm-price">Rp' . $price[0] . '<b>' . $price[1] . '</b></div>
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
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-2 col-xs-12">
                <div class="x_panel text-center">
                    <h2>Pencarian Sejenis</h2>
                    <div class="x_title"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var locations = [
<?php
$all_location = "";
if (isset($src_result)) {
    foreach ($src_result as $item_location) {
        $all_location.="['<b>TESTING</b>'," . $item_location->lat . "," . $item_location->lng . "],";
    }
    echo substr($all_location, 0, -1);
}
?>
    ];
    $(document).ready(function () {
        $("#price").ionRangeSlider({
            type: "double",
            min: 0,
            max: 99999999999,
            from: <?php echo $price_1; ?>,
            to: <?php echo $price_2; ?>,
            grid: true,
            prefix: "Rp ",
            force_edges: true
        });
        initMap();
        var $selection = $(".select2_group").select2({});
    });
    //Maps Google//
    function initMap() {
        var mapDiv = document.getElementById('src_map');
        var map = new google.maps.Map($('#src_map')[0], {
            scrollwheel: false,
            mapTypeControl: true,
            mapTypeControlOption: {
            }
        });

        var bounds = new google.maps.LatLngBounds();

        for (i = 0; i < locations.length; i++) {
            var infowindow = new google.maps.InfoWindow({
                content: locations[i][0]
            });
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            bounds.extend(marker.position);

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    //infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }

        map.fitBounds(bounds);

        var listener = google.maps.event.addListener(map, "idle", function () {
            map.setZoom(3);
            google.maps.event.removeListener(listener);
        });
    }
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