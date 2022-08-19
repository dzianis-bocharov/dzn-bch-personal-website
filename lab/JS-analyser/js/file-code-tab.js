function file_code_tab() {
    $('.div-file-code').html('');
      // var file_data = new FormData();
      // var file_js = $('#file2')[0].files[0];
      // file_data.append('file_js',file_js);
      $.ajax({
          url: 'php/js-file-code.php',
          type: 'POST',
          // data: file_data,
          // contentType: false,
          // processData: false,
          success: function(response){
            $('.div-file-code').append(response);
          }
      });
  };
  export {file_code_tab};