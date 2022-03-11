<?php

    function call_stack_js_all($file_js){

//---------- список элементов и их количество --------------------------------------------------------

        echo '----------------------------------------------------------------------------------------------------'.'<br>';
        require 'js-elements-all-old.php';
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
        echo '----------------------------------------------------------------------------------------------------'.'<br>';

//---------- поиск единственного возвращаемого класса ------------------------------------------------

        require 'find-the-only-class-return.php';
        $the_only_class_return = find_the_only_class_return($file_js);

//---------- call-stack ------------------------------------------------------------------------------

        require 'js-elements-extractor.php';
        $call_stack = js_elements_extractor($file_js, $all_lines, $the_only_class_return);
        echo '<br>';
        function call_stack_show_recursive($call_stack) {
            foreach($call_stack as &$element){
                $braces = null;
                $path=$element['path'];
                if($element['path']) {
                    $dotted_line = '<br>----------<br>';
                    $path = substr(trim($element['path']), 0, -1); 
                }else{
                    $dotted_line = null;
                };

                if($element['type_of_element']=='class'){
                    $braces = ' {}';
                }elseif($element['type_of_element']=='method'){
                    $braces = '()';
                };
                echo $element['type_of_element'].' '.$element['name_of_element'].$braces.$dotted_line.' '.$path.'<br><br>';
                if($element['children']!=='no'){
                    call_stack_show_recursive($element['children']);
                };
            }
        };
        $path = null;
        call_stack_show_recursive($call_stack);
    };
?>