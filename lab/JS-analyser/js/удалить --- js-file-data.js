// function js_file_data(file_js) {

//   //СТЕРЕТЬ!
//   $('.element-numbers-of-lines-inside').html('');

//   var file_data = new FormData();
//   file_data.append('file_js',file_js);
//   $.ajax({
//       url: 'php/js-file-data.php',
//       type: 'POST',
//       data: file_data,
//       contentType: false,
//       processData: false,
//       success: function(response){

//         $('.element-code-inside').append('New York City');
//         // //---#1/имя файла---
//         // let file_name = response['file_name'];
//         // $('.element-code-inside').append('имя файла<br><br>' + file_name + '<br><br><br>----------------------------------------------------------------------------------------------------<br><br>');

//         // //---#2/массив со всеми строками файла---
//         // let all_lines = JSON.stringify(response['all_lines'])
//         // $('.element-code-inside').append('строки кода<br><br>' + all_lines + '<br><br><br>----------------------------------------------------------------------------------------------------<br><br>');


//         // //---#3/массив с функциями---
//         // let list_of_functions = JSON.stringify(response['list_of_functions'])
//         // $('.element-code-inside').append('масив с функциями<br><br>' + list_of_functions + '<br><br><br><br><br>');

//         // //---#4/массив со стеком вызова---

//       },
//       dataType: 'json'
//   });
//   return ['USA'];
  
// };
// export {js_file_data};