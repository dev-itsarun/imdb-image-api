<?php

error_reporting(0);

include "simple_html_dom.php";

$file = $_GET["file"];

if (!empty($file)) {

    $html = file_get_html($file);

    $items = $html->find('meta[property=og:image]');

    $src =  $items[0]->content;

    $final_source = str_replace("._V1_FMjpg_UX1000_", "", $src);

    $image = imagecreatefromjpeg($final_source);

    header('Content-type: image/jpeg');

    imagejpeg($image);
    imagedestroy($image);
} 
else {
    http_response_code(400);
}
