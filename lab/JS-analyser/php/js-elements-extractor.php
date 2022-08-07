<?php
    function js_elements_extractor($file_js, $all_lines, $the_only_class_return){
        $call_stack = [];
        $the_only_class_return_element = $all_lines[array_search($the_only_class_return, array_column($all_lines, 1))];
        array_push($call_stack, $the_only_class_return_element);

        // echo '<br><br><br>';
        // print_r($call_stack);
        // echo '<br><br><br>';

        require 'parse-regexp.php';
        $file_lines_array = file($file_js);
        function recursive_extractor($file_lines_array, $call_stack, $all_lines) {

            foreach($call_stack as $key1=>$value1){

                foreach ($call_stack[$key1] as $key=>$value) {
                    // if(!is_array($value)) {
                        if ($key==0){
                            $element = [];
                            array_push($element, $value);
                        } elseif($key==1){
                            array_push($element, $value);
                        } elseif($key==2){
                            array_push($element, $value);
                        } elseif($key==3){
                            $extracted_elements = [];
                            array_push($element, $value);
                            $extracted_elements = parse_regexp($file_lines_array, $element, $all_lines);
                            array_push($call_stack[$key1],$extracted_elements);
    
    
                            // echo '<br><br><br>';
                            // print_r($extracted_elements);
                            // echo '<br><br><br>';
    
    
                            if(count($extracted_elements)) {
    
    
                                foreach ($call_stack[$key1][4][0] as $key=>$value) {
                                    if(!is_array($value)) {
                                        if ($key==0){
                                            $element = [];
                                            array_push($element, $value);
                                        } elseif($key==1){
                                            array_push($element, $value);
                                        } elseif($key==2){
                                            array_push($element, $value);
                                        } elseif($key==3){
                                            array_push($element, $value);
                                            $extracted_elements = parse_regexp($file_lines_array, $element, $all_lines);
                                            array_push($call_stack[$key1][4][0],$extracted_elements);
    
    
                                            // echo '<br><br><br>';
                                            // print_r($extracted_elements);
                                            // echo '<br><br><br>';
                
    
                                        };
                                    };
                                };
                    
    
    
    
                            };
    
    
    
    
                        };
                    // };
                };
    
            };








//----------------------------------------------------------------------------------------------------            
//----------------------------------------------------------------------------------------------------            
//----------------------------------------------------------------------------------------------------            

            // echo '<br><br><br>Dzianis Bocharov<br><br><br>';
            // print_r($call_stack);
            // echo '<br><br><br>';


//----------------------------------------------------------------------------------------------------            
//----------------------------------------------------------------------------------------------------            
//----------------------------------------------------------------------------------------------------            

            return $call_stack;
        };
        // $type_of_parent = 'empty';
        $g = recursive_extractor($file_lines_array, $call_stack, $all_lines);
        // print_r($g);
        return $g;
    };
?>