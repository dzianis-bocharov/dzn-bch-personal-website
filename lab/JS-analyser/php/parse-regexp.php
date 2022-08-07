<?php

    function parse_regexp($file_lines_array,$element,$all_lines){

        $external_elements = $all_lines;
        $internal_elements = [];
        $reserved_elements = [];
        $type_of_parent = trim($element[0]);
        $result_main = [];
        $curly_braces_indicator = 0;
        $count = 0;
        if ($type_of_parent == 'class') {
            for($x = (int)$element[2]-1; $x<=(int)$element[3]-1; $x++){
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
            }
        }
        elseif ($type_of_parent == 'method') {
            // $result_main = ['test1', 'test2','test3'];


            for($x = (int)$element[2]-1; $x<=(int)$element[3]-1; $x++){

                //----------добавление внутренних констант в массив $internal_elements----------
                
                                if(preg_match_all("/^[^=]+=/", $file_lines_array[$x], $found)){
                                    if(preg_match_all("/^const.+/", trim(implode($found[0])), $found2)){
                                        $a = implode($found2[0]);
                                        $b = strlen($a);
                                        $c = trim(substr($a,5,$b-5-1));
                                        // echo $c.'<br>';
                                        array_push($internal_elements,'const '.$c);
                                    }
                
                //----------this с левой стороны - ничего не делать----------
                
                                    elseif (preg_match_all("/^this./", trim(implode($found[0])), $found2)) {
                                    } 
                
                //----------                 
                                    
                                    elseif(preg_match_all("/.+\[/", trim(implode($found[0])), $found2)){
                                        $a = $found2[0][0];
                                        $b = strlen($a);
                                        $c = substr($a,0,$b-1);
                                        foreach($external_elements as $value){
                                            if(trim($value[1]) == $c){
                                                // echo '<br><br><br><br><br>'.$c.'<br><br><br><br><br>';
                
                                                // echo $c.'<br>';
                
                                                array_push($result_main,$value[0],$value[1],$value[2],$value[3]);//НЕ УДАЛЯТЬ!!!
                
                
                                            }
                                        };
                                    }
                                    else {
                                        echo '<br>Error!<br><br>';
                                        echo $file_lines_array[$x];
                                        exit();
                                    };
                                };
                            };
                




        }
        

        // echo 'New York City<br><br><br>';//УДАЛИТЬ!
        // print_r($result_main);//УДАЛИТЬ!
        if(count($internal_elements)){
            // echo '<br><br><br>';//УДАЛИТЬ!
            // print_r($internal_elements);
            // echo '<br><br><br>';//УДАЛИТЬ!
        };

        return $result_main;
    };
?>