<?php
//    var_dump($type_list);
//    var_dump($county_list
//var_dump($cities_list);
//var_dump($max_price);
?>
<div class="main_container">
    <!-- page content -->
    <div class="content_wrapper" role="main">
        <div class="container">
            <div class="col-md-4 col-md-offset-4 col-sm-12">
                <center>
                    <img src="<?php echo base_url(); ?>img/logo.png" class="img-responsive" style="max-height: 110px;"/>
                </center>
                <div class="x_panel">
                    <div class="text-center">
                        <h2>Cari Berdasarkan Kireteria</h2>
                        <div class="x_title">
                            <!--<div class="clearfix"></div>-->
                        </div>
                    </div>

                    <?php echo form_open('home/search', 'class="form-horizontal form-label-left input_mask"') ?>
                    <div class="col-md-6 col-xs-6 form-group">
                        <label>Tipe</label>
                        <select class="form-control" name="category">
                            <option value="<?php echo KOSAN ?>">Kosan</option>
                            <option value="<?php echo KONTRAKAN ?>">Kontrakan</option>
                            <option value="<?php echo RUSUN ?>">Rusun</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-xs-6 form-group">
                        <label>Untuk</label>
                        <select class="form-control" name="type">
                            <?php foreach ($type_list as $row) {
                                ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                            <?php }
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
                                        <option value="<?php echo $row->cities_id; ?>"><?php echo $row->cities_name; ?></option>
                                        <?php
                                        $closeTag = false;
                                    } else {
                                        $openTag = false;
                                        ?>
                                        <option value="<?php echo $row->cities_id; ?>"><?php echo $row->cities_name; ?></option>
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
        </div>
        <div class="text-center">
            <small>Available</small>
        </div>
        <a class="and-img" href="#"></a>

    </div>

</div>
<!-- /page content -->




<!-- Ion.RangeSlider -->
<script>
    $(document).ready(function () {
        $("#price").ionRangeSlider({
            type: "double",
            min: 0,
            max: 99999999999,
            grid: true,
            prefix: "Rp ",
            force_edges: true
        });
    });
</script>
<!-- /Ion.RangeSlider -->
<!-- Select2 -->
<script>
    $(document).ready(function () {
        $(".select2_group").select2({});
    });
</script>
<!-- /Select2 -->

