<?php
    function js_elements_extractor($file_js, $all_lines, $the_only_class_return){
        $call_stack = [];
        $the_only_class_return_element = $all_lines[array_search($the_only_class_return, array_column($all_lines, 1))];
        $file_lines_array = file($file_js);
        array_push($call_stack, $the_only_class_return_element);
        require 'extractor.php';
        
        function rec_extractor($file_lines_array, $element) {
            $extracted_elements = extractor($file_lines_array, $element);
            return $extracted_elements;
        };

        $extracted_elements = rec_extractor($file_lines_array, $the_only_class_return_element);
        $call_stack[0][4] = $extracted_elements;
        return $call_stack;
    };
?>