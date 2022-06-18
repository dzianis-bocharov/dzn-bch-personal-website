<?php
    function js_elements_extractor($file_js, $all_lines, $the_only_class_return){
        $call_stack = [];
        $the_only_class_return_element = $all_lines[array_search($the_only_class_return, array_column($all_lines, 1))];
        $call_stack = [$the_only_class_return_element];
        $file_lines_array = file($file_js);

//---------- extractor() -------------------------------------------------------------------------------------------------
        
        require 'extractor.php';
        $element = $the_only_class_return_element;
        print_r(extractor($file_lines_array, $element));

//------------------------------------------------------------------------------------------------------------------------
    };
?>