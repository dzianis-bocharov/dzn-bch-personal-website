<?php
    function parse_regexp($file_lines_array,$element,$all_lines){
        $external_elements = $all_lines;
        $internal_elements = [];
        $reserved_elements = [];
        $type_of_parent = $element['type_of_element'];
        $result = [];
        $curly_brackets_indicator = 0;
        $round_brackets_indicator = 0;
        $count = 0;
        if($element['type_of_element']=='class'){
            $braces = ' {}';
        }elseif($element['type_of_element']=='method'){
            $braces = '()';
        }else{
            $braces = null;
        };
        $path = $element['path'].$element['type_of_element'].' '.trim($element['name_of_element']).$braces.' / ';
        if ($type_of_parent == 'class') {
            for($x = (int)$element["first_line"]-1; $x<=(int)$element["last_line"]-1; $x++){
                if(preg_match("/class\s{1,}\S*\s{/i", $file_lines_array[$x], $found)){
                    $curly_brackets_indicator++;
                }
                if(!preg_match("/class\s{1,}\S*\s{/i", $file_lines_array[$x], $found)){
                    if($curly_brackets_indicator==1) {
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
                    $curly_brackets_indicator = $curly_brackets_indicator + preg_match_all("/{/",$file_lines_array[$x]) - preg_match_all("/}/",$file_lines_array[$x]);
                    if ($curly_brackets_indicator == 1 && !preg_match("/class\s{1,}\S*\s{/i", $file_lines_array[$x], $found)) {
                        $result[$count]['path'] = $path;
                        $result[$count]['last_line'] = $x+1;
                        $result[$count]['children'] = 'no';
                        $count++;
                    };
                };
            }
        } elseif ($type_of_parent == 'method') {
            for($x = (int)$element["first_line"]-1; $x<=(int)$element["last_line"]-1; $x++){

//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------

                if(preg_match_all("/^[^=]+=/", $file_lines_array[$x], $found)){
                    //----------function----------
                    if(preg_match_all("/^[a-z]+\(/i",trim(implode($found[0])), $found9)){
                        $round_brackets_indicator = $round_brackets_indicator + preg_match_all("/\(/",$file_lines_array[$x]) - preg_match_all("/\)/",$file_lines_array[$x]);
                        $found_element1 = substr(trim(implode($found9[0])),0,-1);
                        //----------проверка наличия элемента в массиве $internal_elements----------
                        $indicator_of_existance = false;
                        foreach($external_elements as $element4){
                            if($element4[1]==$found_element1){
                                $indicator_of_existance = true;
                                $result[$count]['type_of_element'] = $element4[0];
                                $result[$count]['name_of_element'] = $element4[1];
                                $result[$count]['first_line'] = $element4[2];
                                $result[$count]['last_line'] = $element4[3];
                                $result[$count]['path'] = $path;
                                $result[$count]['children'] = 'no';
                                $count++;
                            };
                        };
                        if(!$indicator_of_existance){
                            echo '<br>Error! Третий уровень!!!'.'<br>';
                            echo $found_element1 . '<br>';
                            echo $file_lines_array[$x]."<br><br>";
                            echo $x+1;
                        };
                    }elseif(preg_match_all("/^for/",trim(implode($found[0])), $found9)){
                        $round_brackets_indicator = $round_brackets_indicator + preg_match_all("/\(/",$file_lines_array[$x]) - preg_match_all("/\)/",$file_lines_array[$x]);
                    }else{
                        if($round_brackets_indicator==0){
                            //----------временные сложные исключения----------
                            if(preg_match_all("/^metasets\.|^meta|^if|^left|^right|^top|^bottom|^return|^e/",trim(implode($found[0])), $found3)){
                                // echo '<br><br><br>Dzianis Bocharov<br><br><br>';
                                $round_brackets_indicator = $round_brackets_indicator + preg_match_all("/\(/",$file_lines_array[$x]) - preg_match_all("/\)/",$file_lines_array[$x]);
                            }
                            //----------const / внутренний элемент----------
                            elseif(preg_match_all("/^const.+/", trim(implode($found[0])), $found2)){
                                $a = implode($found2[0]);
                                $b = strlen($a);
                                $c = trim(substr($a,5,$b-5-1));
                                $d = ['type_of_element'=>'const ','name_of_element'=>$c];
                                array_push($internal_elements,$d);
                            //----------let / внутренний элемент----------
                            } elseif (preg_match_all("/^let.+/", trim(implode($found[0])), $found2)){
                            }
                            //----------this----------
                            elseif (preg_match_all("/^this/", trim(implode($found[0])), $found2)) {
                            //----------слово с квадратной скобкой----------------------------------------------------------------
                            }elseif(preg_match_all("/^.+\[/", trim(implode($found[0])), $found2)){
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
                            //----------слово с точкой----------
                            elseif (preg_match_all("/^(\b[^=]+\.)/",trim(implode($found[0])), $found7)) {
                                $found_element1 = substr(trim(implode($found7[0])),0,-1);
                                //----------проверка наличия элемента в массиве $internal_elements----------
                                $indicator_of_existance = false;
                                foreach($internal_elements as $element3){
                                    if($element3['name_of_element']==$found_element1){
                                        $indicator_of_existance = true;
                                    };
                                };
                                if(!$indicator_of_existance){
                                    echo '<br>Error! Второй уровень!!!'.'<br>';
                                    echo $found_element1 . '<br>';
                                    echo $file_lines_array[$x]."<br>";
                                    echo $x+1;
                                    echo'<br>';
                                };
                            } 
                            //----------слово и знак равно----------
                            elseif(preg_match_all("/^[a-z]+[\s]*\=/i",trim(implode($found[0])), $found12)){
                            }
                            else {
                                echo '<br>Error!<br><br>';
                                echo '<br>совпадений с регулярными выражениями не найдено<br><br>';
                                echo $found_element1 . '<br>';
                                echo $file_lines_array[$x];
                                echo '<br><br>';
                                echo $x+1;
                                exit();
                            };
                        };
                        $round_brackets_indicator = $round_brackets_indicator + preg_match_all("/\(/",$file_lines_array[$x]) - preg_match_all("/\)/",$file_lines_array[$x]);
                    };
                };

//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
            };
        };
        return $result;
    };
?>