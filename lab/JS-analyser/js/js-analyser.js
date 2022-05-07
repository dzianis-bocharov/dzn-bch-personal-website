$('document').ready(function(){
    
  function setupCanvas(canvas) {
    var dpr = window.devicePixelRatio || 1;
    var rect = canvas.getBoundingClientRect();
    canvas.width = rect.width * dpr;
    canvas.height = rect.height * dpr;
    var ctx = canvas.getContext('2d');
    ctx.scale(dpr, dpr);
    return ctx;
  }
    
  var ctx = setupCanvas(document.querySelector('#mainCanvas'));

  ctx.font = "24px serif";

  ctx.fillText("...", 5, 14);

  $('#launch').on('click', (event)=>{

    event.preventDefault();

//      $('.tabs-ierarchy')[0].click();

//----------схема для файла----------------------------------------------------------------------------------------------

    ctx.clearRect(0, 0, ctx.canvas.width,  ctx.canvas.height);

    $.ajax({
      type: "GET",
      url: "php/jsFileToArrayOld.php",
      dataType: "script",
      success: function (data) {
        ctx.font = "18px serif";
        const list_of_functions = javascript_array;
        let x = 3;
        let w = 0;
        ctx.canvas.height = list_of_functions.length*70+20;
        const z = window.devicePixelRatio;
        ctx.scale(z, z);
        $('.wideDiv').removeClass('btn-scroll-no').addClass('btn-scroll-yes');
        for (let i = 0; i < list_of_functions.length; i++) {
          ctx.font = "16px serif";
          ctx.fillText(list_of_functions[w], 10, 20 + i * 20);
          w++;
        }
      }
    });

//----------стек вызова------------------------------------------------------------------------------------------------


    // $('.submit').on('click', (event) => {
    //   event.preventDefault();

    $('.div-call-stack').html('');


    var file_data = new FormData();
    var files = $('#file2')[0].files[0];
    file_data.append('file',files);

    $.ajax({
        url: 'php/js_file_name.php',
        type: 'POST',
        data: file_data,
        contentType: false,
        processData: false,
        success: function(response){
          $('.div-call-stack').append(response);
        }
    });

    // });











  $.ajax({
    type: "GET",
    url: "php/js_file_to_array.php",
    dataType: "script",
    success: function () {

      const call_stack_array_filter_class = call_stack_array.filter((item) => {return item[0] =='class';}).length;
      const call_stack_array_filter_function = call_stack_array.filter((item) => {return item[0] =='function';}).length;
      const call_stack_array_filter_var = call_stack_array.filter((item) => {return item[0] =='var';}).length;
      const call_stack_array_filter_let = call_stack_array.filter((item) => {return item[0] =='let';}).length;
      const call_stack_array_filter_const = call_stack_array.filter((item) => {return item[0] =='const';}).length;

      // $('.div-call-stack').html("test123.js<br>----------------------------------------------------------------------------------------------------<br>class - 40 шт.<br>function - 368 шт.<br>var - 20 шт.<br>let - 2 шт.<br>const - 94 шт.<br>----------------------------------------------------------------------------------------------------<br>..." + '<br>' + call_stack_array.length);

      $('.div-call-stack').append("<br>----------------------------------------------------------------------------------------------------<br>class - " + call_stack_array_filter_class + " шт.<br>function - " + call_stack_array_filter_function + " шт.<br>var - " + call_stack_array_filter_var + " шт.<br>let - " + call_stack_array_filter_let + " шт.<br>const - " + call_stack_array_filter_const + " шт.<br>----------------------------------------------------------------------------------------------------<br>..." + '<br>');

      // + '<br>' + call_stack_array.toString()

    }
  });

    // $('.submit').on('click', (event) => {
    //   event.preventDefault();
    //   var file_data = new FormData();

    //   var files = $('#file')[0].files[0];
      
    //   file_data.append('file',files);

    //   $.ajax({
    //       url: 'file-to-php.php',
    //       type: 'POST',
    //       data: file_data,
    //       contentType: false,
    //       processData: false,
    //       success: function(response){
    //           $(".message").html(response);
    //       }
    //   });
    // });

//---------------------------------------------------------------------------------------------------------------------

    })
});