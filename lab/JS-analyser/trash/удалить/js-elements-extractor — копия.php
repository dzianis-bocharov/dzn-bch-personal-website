<?php




                      print_r($value);

                      $type_of_parent = $call_stack[0];

                      print_r($type_of_parent);

                array_push($call_stack[$key], parse_regexp($file_lines_array, $value, $type_of_parent,$all_lines));

             };

//                 // $call_stack[$key][4] = extractor($file_lines_array, $value);

//                 // $call_stack[$key][4] = extractor($file_lines_array, $value);





//                 // array_push($call_stack[$key],extractor($file_lines_array, $value));

//                 // $call_stack[$key] = 

//                 // print_r($call_stack[$key][4]);

                
                

//                 if (is_array($call_stack[$key][4])) {
                    

// //----------------------------------------------------------------------------------------------------
// //----------------------------------------------------------------------------------------------------
// //----------------------------------------------------------------------------------------------------

//                     if(isset($call_stack[$key][4][0])){
//                         // echo '<br><br>';
//                         // print_r([$call_stack[$key][4][0]]);
//                         // echo '<br><br>';

//                         echo "type of parent"."<br>";
                        
//                         echo $call_stack[$key][0];
                
//                         $type_of_parent = $call_stack[$key][0];
//                         recursive_extractor($file_lines_array,[$call_stack[$key][4][0]],$type_of_parent, $all_lines);
//                         // echo '<br><br>';
//                     };

// //----------------------------------------------------------------------------------------------------
// //----------------------------------------------------------------------------------------------------
// //----------------------------------------------------------------------------------------------------


//                 //     // if(true){exit();};
//                     //   print_r($call_stack[$key][4][0]);

//                 };


//                 // rec_extractor($file_lines_array,$call_stack[$key]);

//                 // echo '<br><br>';

//                 // // print_r($call_stack[$key][4][0]);

//                 // echo '<br><br>';

//             // $call_stack[$key][4] = extractor($file_lines_array, $value);

//                // if(is_array($call_stack[$key][4])) {
//                    // rec_extractor($file_lines_array, $call_stack);
//              //   };

//             };

        



           

         };

         $type_of_parent = 'empty';

         $call_stack = recursive_extractor($file_lines_array, $call_stack, $type_of_parent,$all_lines);

//         // print_r($call_stack);
//         // echo '<br><br>';


        // print_r($call_stack);

        // echo '<br><br><br>';



//         // $arr = [
//         //     'arr1' => ['1.1', '1.2', '1.3'],
//         //     'arr2' => ['2.1', ['2.1.1', '2.1.2', '2.1.3', ['2.5', '2.6', ['2.7', '2.8', ['2.9', '2.10']]]], '2.2', '2.3'],
//         //     'arr3' => ['3.1', '3.2', '3.3'],
//         // ];
        
        
//         // function rec ($arr, $level = 0) {
//         //     $res = [];
//         //     foreach ($arr as $k => $v) {
//         //         if (is_array($arr[$k])) {
//         //             rec($v, $level + 1); // увеличиваем уровень вложенности, если текущий элемент массив
//         //         } else {
//         //             if($level > 1) 
//         //                 echo str_repeat('  ', $level - 1); // делаем отступ в зависимости от вложенности
//         //             echo $v.PHP_EOL; // PHP_EOL перенос строки
//         //         }
//         //     };
//         // };
        
//         // rec($arr);







    };
?>