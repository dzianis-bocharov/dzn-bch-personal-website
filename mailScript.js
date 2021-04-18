$(document).ready(function(){

    var form = $('#formMessage');
    var formMessages = $('#noticeMessageSent');
    
    $(form).submit(function(event) {
        event.preventDefault(); 
        var formData = $(form).serialize();
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
            success: function(response){
                $(formMessages).text(response);
                $('#inputSenderName').val('');
                $('#inputSenderEmail').val('');
                $('#inputSubject').val('');
                $('#messageToMe').val('');
                document.getElementById('formBin').style.display = "none"; 
                document.getElementById('binNotice').style.display = "block";
                document.getElementById('noticeMessageSent').style.display = "block";                
            },
            error: function() {
                $(formMessages).text('An error occured and your message could not be sent.');
            }
        })
    });
});