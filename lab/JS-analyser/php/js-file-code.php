<?php
    $file = fopen("c:\Users\dzian\dzn-bch-personal-website\lab\JS-analyser\js\js-files-examples\chart.js", "r");
        while(! feof($file)) {
            $line = fgets($file);
            echo '<pre>'.$line.'<pre>';
        }
    fclose($file);
?>