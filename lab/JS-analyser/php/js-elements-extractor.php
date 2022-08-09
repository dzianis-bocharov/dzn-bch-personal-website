<?php
    function js_elements_extractor($file_js, $all_lines, $the_only_class_return){
        echo '<br>$call_stack / эксперимент<br><br>';
        $call_stack = [];
        $the_only_class_return_element = $all_lines[array_search($the_only_class_return, array_column($all_lines, 1))];
        $id = 1;
        $id_parent = 0;
        $call_stack['id'] = $id;
        $call_stack['parent_id'] = $id_parent;
        $call_stack['type_of_element'] = $the_only_class_return_element[0];
        $call_stack['name_of_element'] = $the_only_class_return_element[1];
        $call_stack['first_line'] = $the_only_class_return_element[2];
        $call_stack['last_line'] = $the_only_class_return_element[3];
        foreach($call_stack as $key=>$value) {
            echo $key.' --- '.$value.'<br>';
        };
        echo '<br>----------------------------------------------------------------------------------------------------<br>';
        return $call_stack;
    };
?>