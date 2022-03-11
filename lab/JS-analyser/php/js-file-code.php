<?php

    //ВКЛЮЧИТЬ!!!
    // $file_js = $_FILES['file_js'];/
    //$file_name = $file_js['name'];
    // $file_js_path = $file_js["tmp_name"];

    echo '<code>';
    $file = fopen("c:\Users\dzian\dzn-bch-personal-website\lab\JS-analyser\js\js-files-examples\chart.js", "r");
        $i=0;
        while(! feof($file)) {
            $i++;
            $line = fgets($file);
            echo "<pre><span class='unselectable'>".$i."</span>".'  '.$line.'</pre>';
        }
    fclose($file);
    echo '</code>';
    
?>