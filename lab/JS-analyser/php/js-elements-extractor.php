<?php
    function js_elements_extractor($file_js, $all_lines, $the_only_class_return){
        $call_stack = [];
        $the_only_class_return_element = $all_lines[array_search($the_only_class_return, array_column($all_lines, 1))];
        $id = 1;
        $parent_id = 0;
        $call_stack[0]['type_of_element'] = $the_only_class_return_element[0];
        $call_stack[0]['name_of_element'] = $the_only_class_return_element[1];
        $call_stack[0]['first_line'] = $the_only_class_return_element[2];
        $call_stack[0]['last_line'] = $the_only_class_return_element[3];
        $call_stack[0]['children'] = 'no';

//---------------------------------------------------------------------------------------------------- 

        require 'parse-regexp.php';
        $file_lines_array = file($file_js);
        function recursive_extractor($file_lines_array,$elements,$all_lines) {
            $сhildren = [];
             foreach($elements as &$element){
                $сhildren = parse_regexp($file_lines_array,$element,$all_lines);
                if($сhildren!==[]){
                    $element['children'] = $сhildren;
                    $element['children'] = recursive_extractor($file_lines_array,$element['children'],$all_lines);
                };
             };
             return $elements;
        };
        $elements = $call_stack;
        $call_stack = recursive_extractor($file_lines_array,$elements,$all_lines);

//----------------------------------------------------------------------------------------------------
        
        return $call_stack;
    };
?>