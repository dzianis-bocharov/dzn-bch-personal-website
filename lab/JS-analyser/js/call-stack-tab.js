function call_stack_tab() {
  $('.div-call-stack').html('');
    var file_data = new FormData();
    var file_js = $('#file2')[0].files[0];
    file_data.append('file_js',file_js);
    $.ajax({
        url: 'php/call-stack.php',
        type: 'POST',
        data: file_data,
        contentType: false,
        processData: false,
        success: function(response){
          $('.div-call-stack').append(response);
        }
    });
};
export {call_stack_tab};