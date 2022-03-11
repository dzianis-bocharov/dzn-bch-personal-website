<?php

//----------имя файла JavaScript--------------------------------------------------------------------------------------------

   // $file_js = $_FILES['file_js'];//ВКЛЮЧИТЬ!!!


    //$file_name = $file_js['name']; //ВКЛЮЧИТЬ!!!

    $file_name ="chart.js";//УДАЛИТЬ!!!


   echo $file_name . '<br>';
   // $file_js_path = $file_js["tmp_name"];//ВКЛЮЧИТЬ!!!

 // $file_js_path = realpath(dirname("..\js\js-files-examples\chart.js",1));

 $file_js_path = "c:\Users\dzian\dzn-bch-personal-website\lab\JS-analyser\js\js-files-examples\chart.js";



 //   echo $file_js_path;



//----------анализ всего файла JavaScript без выполнения его кода-----------------------------------------------------------

    require 'call-stack-js-all.php';
    call_stack_js_all($file_js_path);

?>