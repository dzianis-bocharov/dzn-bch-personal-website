<?php

    function extractor($file_lines_array, $element){

        $curly_braces_indicator = 0;

        // for($x = $element[2]-1; $x<=$element[3]-1; $x++){

        //    echo $file_lines_array[$x] . '<br>';










        $all_lines = [];
        $all_lines_element_counter = -1;
        $all_lines_element__method_counter = -1;
        $number_of_line = 0;

        // $file = fopen("../js/js-files-examples/class-chart.js", "r"); 

        $file = fopen("../js/js-files-examples/class-chart.js", "r"); 


        $curly_braces_indicator = 0;
        while(!feof($file)) {
            $number_of_line++;
            $line = fgets($file);
            if(preg_match("/class\s{1,}\S*\s{/i", $line, $found)){
                $dzianis1 = strlen($found[0]) - 8;
                $result = substr($found[0],6, $dzianis1);
                $all_lines_element_counter++;
                $all_lines[$all_lines_element_counter] = $result;
                $curly_braces_indicator++;
            }
            elseif(preg_match("/class\s*\S*\s*extends\s/i", $line, $found)){
                $dzianis1 = strlen($found[0]) - 15;
                $result = substr($found[0],6, $dzianis1);
                $all_lines_element_counter++;
                $all_lines[$all_lines_element_counter] = $result;
                $curly_braces_indicator++;
                
            }
            if(!preg_match("/class\s{1,}\S*\s{/i", $line, $found)){
                if($curly_braces_indicator==1) {
                    if(preg_match("/.*{/i", $line, $found)){
                        preg_match("/.*\(/i", $line, $found);
                        $str_found = trim(implode('', $found));
                        $strlen = strlen($str_found) - 1;
                        $str_result = substr($str_found, 0, $strlen);
                        if(preg_match("/get /i", $line, $found)){
                            echo 'get / ' . trim(substr($str_result,4)) . "<br>";
                        } elseif(preg_match("/set /i", $line, $found)) {
                            echo 'set / ' . trim(substr($str_result,4)) . "<br>";
                        } else {
                            echo $str_result . "<br>";
                        };
                    };
                }
                $curly_braces_indicator = $curly_braces_indicator + preg_match_all("/{/",$line) - preg_match_all("/}/",$line);
            }
        }
        fclose($file);




















        // };

        // return $element;

    };

//---------- парковка / временный раздел -----------------------------------------------------------------------------------
        
// $call_stack_fill_toggle = true;
//---------- extractor -----------------------------------------------------------------------------------------------------

        // function extractor('элемент', 'уровень вложенности', $call_stack, $file_lines_array) {

        //     //проверка на принадлежность текущего элемента к типу "класс"

        //     //извлечь методы

        //     //добавить методы в конец элемента

        // };

//---------- eval() / временный раздел -------------------------------------------------------------------------------------

//---------- цикл для извлечения -------------------------------------------------------------------------------------------



//---------- регулярное выражение для извлечения / временный раздел --------------------------------------------------------

        // if(!preg_match("/class\s{1,}\S*\s{/i", $line, $found)){
        //     if($curly_braces_indicator==1) {
        //         if(preg_match("/.*{/i", $line, $found)){
        //             preg_match("/.*\(/i", $line, $found);
        //             $str_found = trim(implode('', $found));
        //             $strlen = strlen($str_found) - 1;
        //             $str_result = substr($str_found, 0, $strlen);
        //             if(preg_match("/get /i", $line, $found)){
        //                 echo 'get / ' . trim(substr($str_result,4)) . "<br>";
        //             } elseif(preg_match("/set /i", $line, $found)) {
        //                 echo 'set / ' . trim(substr($str_result,4)) . "<br>";
        //             } else {
        //                 echo $str_result . "<br>";
        //             };
        //         };
        //     }
        //     $curly_braces_indicator = $curly_braces_indicator + preg_match_all("/{/",$line) - preg_match_all("/}/",$line);
        // }


?>