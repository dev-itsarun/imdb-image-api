<?php

error_reporting(0);

include "simple_html_dom.php";

$file = $_GET["file"];

if (!empty($file)) {

    $html = file_get_html($file);

    $items = $html->find('meta[property=og:image]');

    $src =  $items[0]->content;

    $final_source = str_replace("._V1_FMjpg_UX1000_", "", $src);

    // basic headers
    header("Content-type: image/jpeg");
    
    // get the file name
    $file= file_get_contents($final_source);
    
    echo $file;


} 
else {
    http_response_code(400);
}
