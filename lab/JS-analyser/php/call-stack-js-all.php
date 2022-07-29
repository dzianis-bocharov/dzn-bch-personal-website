<?php

    function call_stack_js_all($file_js){

//---------- список элементов и их количество --------------------------------------------------------

        echo '----------------------------------------------------------------------------------------------------'.'<br>';
        require 'js-elements-all.php';
        $all_lines = js_elements_all($file_js, "r");

        function all_lines_filter_element_callback($elements_array, $type_of_element) {
            $all_lines_filter_items_array = [];
            $all_elements_quantity = count($elements_array);
            for ($x = 0; $x <= ($all_elements_quantity - 1); $x++) {
                if($elements_array[$x][0] == $type_of_element) {
                    array_push($all_lines_filter_items_array, $elements_array[$x]);
                };
            }
            return $all_lines_filter_items_array;
        };

        echo 'class - ' . count(all_lines_filter_element_callback($all_lines, 'class')) . ' шт.' . '<br>';
        echo 'function - ' . count(all_lines_filter_element_callback($all_lines, 'function')) . ' шт.' . '<br>';
        echo 'var - ' . count(all_lines_filter_element_callback($all_lines, 'var')) . ' шт.' . '<br>';
        echo 'let - ' . count(all_lines_filter_element_callback($all_lines, 'let')) . ' шт.' . '<br>';
        echo 'const - ' . count(all_lines_filter_element_callback($all_lines, 'const')) . ' шт.' . '<br>';
        echo '----------------------------------------------------------------------------------------------------'.'<br><br>';

//---------- поиск единственного возвращаемого класса ------------------------------------------------

        require 'find-the-only-class-return.php';
        $the_only_class_return = find_the_only_class_return($file_js);

//---------- call-stack ------------------------------------------------------------------------------

        require 'js-elements-extractor.php';
        $call_stack = js_elements_extractor($file_js, $all_lines, $the_only_class_return);

        function rec ($arr, $type_of_parent) {
            foreach ($arr as $k => $v) {
                if (!is_array($arr[$k])) {
                    if($k==0){
                        echo $v.'&nbsp;';
                    }
                    elseif($k==1){
                        echo $v;
                    }
                    elseif ($k==2 && $arr[0]=='method'){
                        $brakets = '()';
                        echo $brakets;
                    }
                    elseif ($k==2 && $arr[0]=='class'){
                        $brakets = ' {}';
                        echo $brakets;
                    }
                    elseif ($k==3){
                        if($type_of_parent !=='empty') {
                            echo ' --- ' . $type_of_parent;
                        };
                        $type_of_parent = $arr[0] . ' ' . $arr[1] . $brakets;
                        echo '<br><br>';
                    };
                } else {
                    rec($v, $type_of_parent);
                }
            };
        };

        $type_of_parent = 'empty';
        rec($call_stack, $type_of_parent);

    };
?>