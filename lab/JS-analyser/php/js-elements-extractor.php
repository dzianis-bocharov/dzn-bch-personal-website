<?php
    function js_elements_extractor($file_js, $all_lines, $the_only_class_return){
        echo '<br>$call_stack / эксперимент<br><br>';
        $call_stack = [];
        $the_only_class_return_element = $all_lines[array_search($the_only_class_return, array_column($all_lines, 1))];
        $id = 1;
        $parent_id = 0;
        $call_stack['id'] = $id;
        $call_stack['parent_id'] = $parent_id;
        $call_stack['type_of_element'] = $the_only_class_return_element[0];
        $call_stack['name_of_element'] = $the_only_class_return_element[1];
        $call_stack['first_line'] = $the_only_class_return_element[2];
        $call_stack['last_line'] = $the_only_class_return_element[3];
        foreach($call_stack as $key=>$value) {
            echo $key.' --- '.$value.'<br>';
        };

//----------------------------------------------------------------------------------------------------

        require 'parse-regexp.php';
        $file_lines_array = file($file_js);
        $element = $call_stack;
        $parent_id = $parent_id + 1;
        $x = parse_regexp($file_lines_array,$element,$all_lines,$id,$parent_id);
        echo '<br>';
        echo 'извлеченные методы'.'<br>';
        echo '<br>';
        print_r($x[52]);
        echo '<br>';

//----------------------------------------------------------------------------------------------------

        
        echo '<br>----------------------------------------------------------------------------------------------------<br>';
        return $call_stack;
    };
?>