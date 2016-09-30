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

                    <?php echo form_open('search', 'class="form-horizontal form-label-left input_mask" id="mainForm"') ?>
                    <div class="col-md-6 col-xs-6 form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="category">
                            <option value="<?php echo KOSAN ?>">Kosan</option>
                            <option value="<?php echo KONTRAKAN ?>">Kontrakan</option>
                            <option value="<?php echo RUSUN ?>">Rusun</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-xs-6 form-group">
                        <label>Tipe</label>
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
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-default disabled" type="button">From</button>
                                </span>
                                <input type="number" class="form-control" placeholder="Masukan harga" id="priceFrom"/>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-default disabled" type="button">To</button>
                                </span>
                                <input type="number" class="form-control" placeholder="Masukan harga" id="priceTo"/>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                        <div class="col-md-12 col-xs-12 text-center">
                            <button class="btn btn-default" id="btnPrice">Ubah</button>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <input type="text" id="price" value="" name="price" />
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="btn-group btn-group-justified gap" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn btn-success"><i class="fa fa-search"></i> Cari</button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn btn-success" data-toggle="modal" data-target="#subscribeModal"><i class="fa fa-rss"></i> Subscribe</button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="text-center">
            <small>Available On</small>
        </div>
        <a class="and-img" href="#"></a>

    </div>

</div>
<div class="modal fade" id="subscribeModal" role="dialog" aria-labelledby="subscribeModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content  text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-rss"></i> Subscribe</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="x_panel">
                        <div class="text-center">
                            <h2>Beritahu Berdasarkan Kireteria</h2>
                            <div class="x_title">
                            </div>
                        </div>

                        <?php echo form_open('', 'class="form-horizontal form-label-left input_mask" id="subscribeForm"') ?>
                        <div class="col-md-6 col-xs-6 form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="categories">
                                <option value="<?php echo KOSAN ?>">Kosan</option>
                                <option value="<?php echo KONTRAKAN ?>">Kontrakan</option>
                                <option value="<?php echo RUSUN ?>">Rusun</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-xs-6 form-group">
                            <label>Tipe</label>
                            <select class="form-control" name="types">
                                <?php foreach ($type_list as $row) {
                                    ?>
                                    <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12 text-left">Lokasi</label>
                            <div class="col-md-10 col-sm-10 col-xs-12"><select class="select2_group form-control" name="cities">
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
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Input Your Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Phone <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type='tel' pattern='[\+][0-9]{1,30}' title='Phone Number (Format: +99999999)' name="phone" required="required" maxlength="20" class="form-control col-md-7 col-xs-12" placeholder="Input Your Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="email" type="email" name="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="Input Your Email">
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 grid_slider form-group">
                            <div class=" text-center">
                                <label>Harga</label>
                            </div>
                            <input type="text" id="priceSubscribe" value="" name="price" />
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <div class="btn-group text-center  gap" role="group">
                                <button type="submit" class="btn btn btn-success" id="subscribeButton"><i class="fa fa-send"></i> Send</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
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
            grid: true,
            prefix: "Rp ",
            force_edges: true
        });
        $("#priceSubscribe").ionRangeSlider({
            type: "double",
            min: 0,
            max: 99999999,
            grid: true,
            prefix: "Rp ",
            force_edges: true
        });
        var mainSlider = $("#price").data("ionRangeSlider");
        var subSlider = $("#priceSubscribe").data("ionRangeSlider");
        $("#btnPrice").click(function (e) {
            e.preventDefault();
            mainSlider.update({
                from: $('#priceFrom').val(),
                to: $('#priceTo').val()
            });
        });

        $(".select2_group").select2();
        $('#subscribeModal').on('shown.bs.modal', function (event) {
            event.preventDefault();
            $(".select2_group").select2().val($("#mainForm :input[name='cities']").val()).change();
            subSlider.update({
                from: mainSlider.old_from,
                to: mainSlider.old_to
            });
            $("#subscribeForm :input[name='categories']").val($("#mainForm :input[name='category']").val());
            $("#subscribeForm :input[name='types']").val($("#mainForm :input[name='type']").val());
//            $("#subscribeForm :input[name='cities']").val($("#mainForm :input[name='cities']").val());
        });
    });
</script>
<script>
    $(document).ready(function () {
        var $btnSubscribe = $('#subscribeButton');
        $('#subscribeForm').submit(function (event) {
            event.preventDefault();
            PNotify.removeAll();
            var fields = $("#subscribeForm :input");
            var value = {};
            $.each(fields, function (i, field) {
                //alert("name : "+$(this).attr("name")+" , value : "+$(this).val());
                value[$(this).attr("name")] = $(this).val();
            });
            $btnSubscribe.addClass('disabled');
            $btnSubscribe.html('<i class="fa fa-send"></i> Sending...');
            var post = $.post('<?php echo base_url() . 'subscribe' ?>', value);
            post.done(function (res) {
                console.log(JSON.stringify(res));
                var option = {
                    title: 'Subscribe Info',
                    styling: 'bootstrap3',
                    nonblock: {
                        nonblock: true
                    }
                };
                if (JSON.parse(res).status == 1) {
                    option.text = "Permintaan berlangganan telah aktif, cek email mu";
                    option.type = "success";
                } else {
                    option.text = "Permintaan berlangganan gagal, email telah dipakai";
                }
                $btnSubscribe.html('<i class="fa fa-send"></i> Send');
                $btnSubscribe.removeClass('disabled');
                new PNotify(option);
            });
            post.fail(function (a, b, c) {
            });
        });
    });
</script>
