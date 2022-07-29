<?php
    function extractor($file_lines_array, $element){
        $result_main = [];
        $curly_braces_indicator = 0;
        $count = 0;
        for($x = $element[2]-1; $x<=$element[3]-1; $x++){
            if(preg_match("/class\s{1,}\S*\s{/i", $file_lines_array[$x], $found)){
                $curly_braces_indicator++;
            }
            if(!preg_match("/class\s{1,}\S*\s{/i", $file_lines_array[$x], $found)){
                if($curly_braces_indicator==1) {
                    if(preg_match("/.*{/i", $file_lines_array[$x], $found)){
                        preg_match("/.*\(/i", $file_lines_array[$x], $found);
                        $str_found = trim(implode('', $found));
                        $strlen = strlen($str_found) - 1;
                        $str_result = substr($str_found, 0, $strlen);
                        $result_main[$count] = ['method', $str_result, $x+1];
                        $count++;
                    };
                }
                $curly_braces_indicator = $curly_braces_indicator + preg_match_all("/{/",$file_lines_array[$x]) - preg_match_all("/}/",$file_lines_array[$x]);

                if ($curly_braces_indicator == 1 && !preg_match("/class\s{1,}\S*\s{/i", $file_lines_array[$x], $found)) {
                    $result_main[$count-1][3] = $x+1;
                };
            };
        };
        return $result_main;
    };
?>