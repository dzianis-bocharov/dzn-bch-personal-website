<?php

    //ВКЛЮЧИТЬ!!!
    // $file_js = $_FILES['file_js'];
    // $file_name = $file_js['name'];
    // $file_js_path = $file_js["tmp_name"];

    //---СТЕРЕТЬ!---
    $file_js_path = "c:\Users\dzian\dzn-bch-personal-website\lab\JS-analyser\js\js-files-examples\chart.js";

    require 'js-file-data-all.php';
    $result = js_file_data_all($file_js_path);
    echo json_encode($result,JSON_FORCE_OBJECT);
?>