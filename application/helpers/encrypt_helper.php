<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('shortCRC32') ) {
    function shortCRC32($data) {
        return strtr(rtrim(base64_encode(pack('H*', crc32($data))), '='), '+/', '-_');
    }
}