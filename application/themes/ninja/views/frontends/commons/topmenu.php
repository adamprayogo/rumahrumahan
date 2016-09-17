<div class="container">
    <!-- Split button -->
    <div class="btn-group pull-right">
        <button type="button" class="btn btn-default fl-head"><i class="fl fl-ind"></i></button>
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#"><i class="fl fl-ind"></i><label class="fl-label">Indonesia</label></a></li>
            <li><a href="#"><i class="fl fl-en"></i><label class="fl-label" >English</label></a></li>
        </ul>
    </div>
</div>
<?php

function mod_price($price) {
    $current_price = $price;
    $symbol_price = '';
    while ($current_price % 1000 == 0) {
        $price = substr($current_price, 0, -3);
        $symbol_price.='k';
        $current_price = $price;
    }
    return $current_price . '#' . $symbol_price;
}
?>