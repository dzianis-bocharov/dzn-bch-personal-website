<?php

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