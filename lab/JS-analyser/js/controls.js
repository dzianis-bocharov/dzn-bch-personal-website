$(document).ready(function(){
   
    $('#switch').click(() => {
        const inputSwitchChecked = document.getElementById("test1").checked;
        if(inputSwitchChecked) {
            $('#fileInputHTMLwrapper').removeClass('notVisibleFileInputHTML');
        }
        else {
            $('#fileInputHTMLwrapper').addClass('notVisibleFileInputHTML');
            document.getElementById('file1').value = null;
            document.getElementById('file-name1').value = '...';
        }
    });
   
     $('.input-file-btn').on('click', (event) => {
        const btnInputId = event.target.id
        const inputFileId = '#file' + btnInputId.substring(btnInputId.length-1);
        $(inputFileId).trigger('click'); 
        const inputFileName = '#file-name' + btnInputId.substring(btnInputId.length-1) 
        $(inputFileId).on('change', function () {
            const fileName = $(this)[0].files[0].name;
            $(inputFileName).val(fileName);
        });
    });

    $('#reset').on('click', () => {
        $('.fileNames').val('...');
        $("input[type='file']").val = null;
        const inputSwitchChecked = document.getElementById("test1").checked;
        if(!inputSwitchChecked) {
            $('#switch').trigger('click');
            $('#fileInputHTMLwrapper').removeClass('notVisibleFileInputHTML');
        };
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
        ctx.canvas.height = 100;
        const z = window.devicePixelRatio;
        ctx.scale(z, z);
        $('.wideDiv').removeClass('btn-scroll-yes').addClass('btn-scroll-no');
        ctx.clearRect(0, 0, ctx.canvas.width,  ctx.canvas.height);      
        ctx.font = "24px serif";
        ctx.fillText("...", 5, 20);
    })

    $('#expandIerarchyScheme').on('click', ()=>{
        if($('#result').hasClass('normalWidthIerarchyScheme')) {
            $('#result').removeClass('normalWidthIerarchyScheme').addClass('largeWidthIerarchyScheme');
            $('#expandIerarchyScheme').html('Свернуть');
        }
        else {
            $('#result').removeClass('largeWidthIerarchyScheme').addClass('normalWidthIerarchyScheme');
            $('#expandIerarchyScheme').html('Развернуть на<br> ширину окна');
        };
    })

    $('.tabs-ierarchy').on('click', (e) => {
        let tabs = $('.tabs-ierarchy');
        for(let i = tabs.length - 1; i>-1;i--){
            if(tabs[i]==e.target){
                if(!$(tabs[i]).hasClass('ttab-ierarchyScheme-active')){
                        $(tabs[i]).addClass('tab-ierarchyScheme-active');
                };
                if($(tabs[i]).hasClass("tab-ierarchyScheme-normal")){
                        $(tabs[i]).removeClass("tab-ierarchyScheme-normal");
                }
            }
            else{
                if(!$(tabs[i]).hasClass('tab-ierarchyScheme-notmal')){
                        $(tabs[i]).addClass('tab-ierarchyScheme-normal');
                };
                if($(tabs[i]).hasClass("tab-ierarchyScheme-active")){
                        $(tabs[i]).removeClass("tab-ierarchyScheme-active");
                    }
            }
        };
    });

});