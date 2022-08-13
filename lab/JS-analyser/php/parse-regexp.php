<?php
    function parse_regexp($file_lines_array,$element,$all_lines){
        $external_elements = $all_lines;
        $internal_elements = [];
        $reserved_elements = [];
        $type_of_parent = $element['type_of_element'];
        $result = [];
        $curly_braces_indicator = 0;
        $count = 0;

        // if($element['path'] == 'empty'){$path = '';};

        if($element['type_of_element']=='class'){
            $braces = ' {}';
        }elseif($element['type_of_element']=='method'){
            $braces = '()';
        }else{
            $braces = null;
        };

        $path = $element['path'].$element['type_of_element'].' '.trim($element['name_of_element']).$braces.' / ';
        // $path = 

        if ($type_of_parent == 'class') {
            for($x = (int)$element["first_line"]-1; $x<=(int)$element["last_line"]-1; $x++){
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
                            $result[$count]['type_of_element'] = 'method';
                            $result[$count]['name_of_element'] = $str_result;
                            $result[$count]['first_line'] = $x+1;
                        };
                    }
                    $curly_braces_indicator = $curly_braces_indicator + preg_match_all("/{/",$file_lines_array[$x]) - preg_match_all("/}/",$file_lines_array[$x]);
                    if ($curly_braces_indicator == 1 && !preg_match("/class\s{1,}\S*\s{/i", $file_lines_array[$x], $found)) {
                        $result[$count]['path'] = $path;
                        $result[$count]['last_line'] = $x+1;
                        $result[$count]['children'] = 'no';
                        $count++;
                    };
                };
            }
        } elseif ($type_of_parent == 'method') {
            for($x = (int)$element["first_line"]-1; $x<=(int)$element["last_line"]-1; $x++){

//----------добавление внутренних констант в массив $internal_elements----------

                    if(preg_match_all("/^[^=]+=/", $file_lines_array[$x], $found)){
                        if(preg_match_all("/^const.+/", trim(implode($found[0])), $found2)){
                            $a = implode($found2[0]);
                            $b = strlen($a);
                            $c = trim(substr($a,5,$b-5-1));
                            array_push($internal_elements,'const '.$c);
                        }
                        
//----------this с левой стороны - ничего не делать----------

                    elseif (preg_match_all("/^this/", trim(implode($found[0])), $found2)) {
                    } 
                    elseif(preg_match_all("/.+\[/", trim(implode($found[0])), $found2)){
                        $a = $found2[0][0];
                        $b = strlen($a);
                        $c = substr($a,0,$b-1);
                        foreach($external_elements as $value){
                            if(trim($value[1]) == $c){
                                $result[$count]['type_of_element'] = $value[0];
                                $result[$count]['name_of_element'] = $value[1];
                                $result[$count]['first_line'] = $value[2];
                                $result[$count]['last_line'] = $value[3];
                                $result[$count]['path'] = $path;
                                $result[$count]['children'] = 'no';
                                $count++;
                            }
                        };
                    }

//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------


                    elseif (preg_match_all("/^me\./", trim(implode($found[0])), $found2)) {

                        // echo $file_lines_array[$x].'<br>';                   

                    } 



//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------

                    else {
//                         echo '<br>Error!<br><br>';//ВКЛЮЧИТЬ!!!
//                         echo $file_lines_array[$x];//ВКЛЮЧИТЬ!!!
//                         echo '<br><br>';//ВКЛЮЧИТЬ!!!
//                         echo $x+1;//ВКЛЮЧИТЬ!!!
//                         exit();//ВКЛЮЧИТЬ!!!
                    };
                };
            };
        };
        return $result;
    };
?>