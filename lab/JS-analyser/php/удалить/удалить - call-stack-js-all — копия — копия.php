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

        print_r($call_stack);








    //     function build_call_stack_list($call_stack, $type_of_parent) {
    //         echo $type_of_parent;

    //         foreach ($call_stack as $k => $v) {
    //             if (!is_array($call_stack[$k])) {




                    
    //                 echo $type_of_parent;
    //                 // echo '<br><br><br>';
    //                 print_r($call_stack[$k]);
    //                 // echo '<br><br><br>';

    //                 $type_of_parent = $type_of_parent;

    //                 if($k==0){
    //                     echo $v.'&nbsp;';
    //                 }
    //                 elseif($k==1){
    //                     echo $v;
    //                 }
    //                 elseif ($k==2 && $call_stack[0]=='method'){
    //                     $brakets = '()';
    //                     echo $brakets;
    //                 }
    //                 elseif ($k==2 && $call_stack[0]=='class'){
    //                     $brakets = ' {}';
    //                     echo $brakets;
    //                 }
    //                 elseif ($k==3){
    //                     print_r($type_of_parent);
    //                      if($type_of_parent !=='empty') {
    //                          echo '<br>---</br>' . $type_of_parent ;
    //                      };
    //                      $type_of_parent = $call_stack[0] . ' ' . $call_stack[1] . $brakets;
    //                      echo '<br><br>';
    //                 }
    //                 ;



    //             } else {
    //                 $type_of_parent =  $call_stack[0][0];
    //                 build_call_stack_list($v, $type_of_parent);
    //             }
    //         };
    //     };
    //     $type_of_parent = 'empty';
    //     build_call_stack_list($call_stack, $type_of_parent);
    };
?>