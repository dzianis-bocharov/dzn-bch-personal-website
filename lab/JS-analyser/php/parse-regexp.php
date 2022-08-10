<?php
    function parse_regexp($file_lines_array,$element,$all_lines,$id,$parent_id){
        $external_elements = $all_lines;
        $internal_elements = [];
        $reserved_elements = [];
        $type_of_parent = $element[0]['type_of_element'];
        $result = [];
        $curly_braces_indicator = 0;
        $count = 0;
        if ($type_of_parent == 'class') {
            for($x = (int)$element[0]["first_line"]-1; $x<=(int)$element[0]["last_line"]-1; $x++){
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
                            $id++;
                            $result[$count]['id'] = $id;
                            $result[$count]['parent_id'] = $parent_id;
                            $result[$count]['type_of_element'] = 'method';
                            $result[$count]['name_of_element'] = $str_result;
                            $result[$count]['first_line'] = $x+1;
                        };
                    }
                    $curly_braces_indicator = $curly_braces_indicator + preg_match_all("/{/",$file_lines_array[$x]) - preg_match_all("/}/",$file_lines_array[$x]);
                    if ($curly_braces_indicator == 1 && !preg_match("/class\s{1,}\S*\s{/i", $file_lines_array[$x], $found)) {
                        $result[$count]['last_line'] = $x+1;
                        $count++;

                    };
                };
            }
        }



//----------ВРЕМЕННО ОТКЛЮЧЕНО----------
//------------------------------
//------------------------------
        // elseif ($type_of_parent == 'method') {
        //     // $result_main = ['test1', 'test2','test3'];
        //     for($x = (int)$element[2]-1; $x<=(int)$element[3]-1; $x++){
        //         //----------добавление внутренних констант в массив $internal_elements----------
        //                         if(preg_match_all("/^[^=]+=/", $file_lines_array[$x], $found)){
        //                             if(preg_match_all("/^const.+/", trim(implode($found[0])), $found2)){
        //                                 $a = implode($found2[0]);
        //                                 $b = strlen($a);
        //                                 $c = trim(substr($a,5,$b-5-1));
        //                                 // echo $c.'<br>';
        //                                 array_push($internal_elements,'const '.$c);
        //                             }
        //         //----------this с левой стороны - ничего не делать----------
        //                             elseif (preg_match_all("/^this./", trim(implode($found[0])), $found2)) {
        //                             } 
        //                             elseif(preg_match_all("/.+\[/", trim(implode($found[0])), $found2)){
        //                                 $a = $found2[0][0];
        //                                 $b = strlen($a);
        //                                 $c = substr($a,0,$b-1);
        //                                 foreach($external_elements as $value){
        //                                     if(trim($value[1]) == $c){
        //                                         // echo '<br><br><br><br><br>'.$c.'<br><br><br><br><br>';
        //                                         // echo $c.'<br>';
        //                                         array_push($result,$value[0],$value[1],$value[2],$value[3]);//НЕ УДАЛЯТЬ!!!
        //                                     }
        //                                 };
        //                             }
        //                             else {
        //                                 // echo '<br>Error!<br><br>';
        //                                 // echo $file_lines_array[$x];
        //                                 //exit();
        //                             };
        //                         };
        //                     };
        // }
//------------------------------
//------------------------------
//------------------------------

        $result['id'] = $id;

        return $result;
    };
?>