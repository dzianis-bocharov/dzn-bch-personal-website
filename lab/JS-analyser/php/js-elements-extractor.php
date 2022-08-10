<?php
    function js_elements_extractor($file_js, $all_lines, $the_only_class_return){
        echo '<br>$call_stack / эксперимент<br><br>';
        $call_stack = [];
        $the_only_class_return_element = $all_lines[array_search($the_only_class_return, array_column($all_lines, 1))];
        $id = 1;
        $parent_id = 0;
        $call_stack[0]['id'] = $id;
        $call_stack[0]['parent_id'] = $parent_id;
        $call_stack[0]['type_of_element'] = $the_only_class_return_element[0];
        $call_stack[0]['name_of_element'] = $the_only_class_return_element[1];
        $call_stack[0]['first_line'] = $the_only_class_return_element[2];
        $call_stack[0]['last_line'] = $the_only_class_return_element[3];
        $call_stack[0]['children'] = 'no';
        foreach($call_stack[0] as $key=>$value) {
            echo $key.' --- '.$value.'<br>';
        };

//---------------------------------------------------------------------------------------------------- 

        require 'parse-regexp.php';
        $file_lines_array = file($file_js);
        $element = $call_stack;
        $parent_id = $parent_id + 1;


        // function recursive_extractor() {

        // };




        $extracted_elements = parse_regexp($file_lines_array,$element,$all_lines,$id,$parent_id);
        // echo '<br>';
        // echo 'извлеченные методы'.'<br>';
        // echo '<br>';
        foreach($extracted_elements as $key=>$value){
            array_push($call_stack, $extracted_elements[$key]);
        };
        // print_r($call_stack[53]);
        // echo '<br><br>';
        echo '<br>ID --- ' . $extracted_elements['id'].'<br>';

//----------------------------------------------------------------------------------------------------
        
        echo '<br>----------------------------------------------------------------------------------------------------<br>';
        return $call_stack;
    };
?>