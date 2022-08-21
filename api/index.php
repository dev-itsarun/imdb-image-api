<?php

error_reporting(0);

include "simple_html_dom.php";

$file = $_GET["file"];

if (!empty($file)) {

    $html = file_get_html($file);

    $items = $html->find('meta[property=og:image]');

    $src =  $items[0]->content;

    $final_source = str_replace("._V1_FMjpg_UX1000_", "", $src);

    $data = ["src" => $final_source , "api developer" => "unknown"];
    
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json; charset=utf-8");

    echo json_encode($data);


} 
else {
    http_response_code(400);
}
