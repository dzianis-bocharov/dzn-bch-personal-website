$(document).ready(function(){
   
    $('#switch').click(() => {
        const inputSwitchChecked = document.getElementById("test1").checked;
        if(inputSwitchChecked) {
            $('#orangeShield1').addClass('notVisible');
        }
        else {
            $('#orangeShield1').removeClass('notVisible');
        }
    });

    $("input:radio[name='myRadios']").change(function() {
        if (this.value == 'reportNewFile') {
            $('#orangeShield2').removeClass('notVisible');
        }
        else if (this.value == 'reportExistingFile')  {
            $('#orangeShield2').addClass('notVisible');
        }
    });

    $('#file-btn').on('click', () => {
        $('#file').trigger('click');
      });  
      
      $('#file').on('change', function () {
        const fileName = $(this)[0].files[0].name;
        $('#file-name').val(fileName);
      });

      $('#reset').on('click', () => {
          alert('Test1');
      })

});