<?php
    function js_elements_extractor($file_js, $all_lines, $the_only_class_return){
        $call_stack = [];
        $the_only_class_return_element = $all_lines[array_search($the_only_class_return, array_column($all_lines, 1))];
        array_push($call_stack, $the_only_class_return_element);

        require 'parse-regexp.php';
        $file_lines_array = file($file_js);

//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------

        function recursive_extractor($file_lines_array, $call_stack, $all_lines, $type_of_parent) {
            foreach ($call_stack as $key=>$value) {
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
                        array_push($call_stack,$extracted_elements);
                    };
                };
            };


            $call_stack123 = [];

            // print_r($call_stack[4][0]);


            foreach ($call_stack[4][0] as $key=>$value) {
                if(!is_array($value)) {
                    if ($key==0){
                        $element1 = [];
                        array_push($element1, $value);
                    } elseif($key==1){
                        array_push($element1, $value);
                    } elseif($key==2){
                        array_push($element1, $value);
                    } elseif($key==3){
                        array_push($element1, $value);
                        $extracted_elements = parse_regexp($file_lines_array, $element1, $all_lines);
                        array_push($call_stack123,$extracted_elements);



                                    
                    };
                };
            };

            echo '<br><br><br>';
            print_r($call_stack123[0]);
            echo '<br><br><br>';


            // echo '<br><br><br>Манхэттен<br><br><br>';
            // print_r($call_stack[4]);
            // echo '<br><br><br><br>';

            // if(isset($call_stack[4])){
                // $type_of_parent = 'method';
                // recursive_extractor($file_lines_array, $call_stack[4], $all_lines, $type_of_parent);
            // };

            //     if (is_array($value)) {
            //         $type_of_parent = 'new parent';
            //         recursive_extractor($file_lines_array, $value, $all_lines, $type_of_parent);
            //     } else {
            //         if ($key==0) {
            //             echo '<br><br><br><br><br>';
            //             // print_r($value);
            //             echo $call_stack[0];
            //             echo '<br><br><br><br><br>';
            //             parse_regexp($file_lines_array, $value, $type_of_parent,$all_lines);
            //         };
            //     };
            // };


            // recursive_extractor($file_lines_array, $value, $all_lines, $type_of_parent);

                // print_r($call_stack[4][0]);
                echo'<br><br><br>';

            return $call_stack;

        };

//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------


        $type_of_parent = 'empty';

        $g = recursive_extractor($file_lines_array, $call_stack[0], $all_lines, $type_of_parent);

        // echo '<br><br><br>';
        // print_r($call_stack[0]);
        // print_r($g);

        // echo '<br><br><br>';
        // $g2 = $g[4][0];
        // print_r($g2);
        // echo '<br><br><br>';

        return $g;
    };
?>