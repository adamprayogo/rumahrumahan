<?php

function app_encode($string) {
    $CI = & get_instance();
    $CI->load->library('encrypt');
    $encode = $CI->encrypt->encode($string);
//    echo $CI->encrypt->_get_cipher();
    return str_replace(array('+', '/', '='), array('-', '_', '~'), $encode);
}

function app_decode($encode_string) {
    $CI = & get_instance();
    $CI->load->library('encrypt');
    $decode = str_replace(array('-', '_', '~'), array('+', '/', '='), $encode_string);
    return $CI->encrypt->decode($decode);
}
?>