<?php
    function extractor($file_lines_array, $element){
        $result_main = [];
        $curly_braces_indicator = 0;
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
                        if(preg_match("/get /i", $file_lines_array[$x], $found)){
                            $value = 'get / ' . trim(substr($str_result,4));
                            array_push($result_main, $value);
                        } elseif(preg_match("/set /i", $file_lines_array[$x], $found)) {
                            $value = 'set / ' . trim(substr($str_result,4));
                            array_push($result_main, $value);
                        } else {
                            $value = $str_result;
                            array_push($result_main, $value);
                        };
                    };
                }
                $curly_braces_indicator = $curly_braces_indicator + preg_match_all("/{/",$file_lines_array[$x]) - preg_match_all("/}/",$file_lines_array[$x]);
            }
        };
        return $result_main;
    };
?>