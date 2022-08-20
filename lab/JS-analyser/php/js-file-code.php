<?php
    $file = fopen("c:\Users\dzian\dzn-bch-personal-website\lab\JS-analyser\js\js-files-examples\chart.js", "r");
        $i=0;
        while(! feof($file)) {
            $i++;
            $line = fgets($file);
            echo '<pre>'.$i.'   '.$line.'<pre>';
        }
    fclose($file);
?>