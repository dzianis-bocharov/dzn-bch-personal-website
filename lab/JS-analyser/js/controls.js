import {canvas_blur_fix} from './canvas-blur-fix.js';
import {file_ierarchy_scheme_tab} from './file-ierarchy-scheme-tab.js';
//---СТЕРЕТЬ!---
// import {file_code_tab} from './file-code-tab.js';
import {element_code_tab } from './element-code-tab.js';
import {call_stack_tab} from './call-stack-tab.js';
import {error_window_open, error_window_close} from './error-window.js';
//---СТЕРЕТЬ!---
// import {js_file_data} from './js-file-data.js';
import {no_small_screen_error_window_for_unload, no_small_screen_error_window_for_resize} from './no-small-screen-error-window.js';
import {file_code_tab } from './file-code-tab.js';

//----------выделение текста внутри div---------------------------------------------------------------

function selectText(containerid) {
    if (document.selection) { // IE
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select();
    } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
    }
}

//----------главное состояние-------------------------------------------------------------------------


const main_state = {

    tab_position: 1,

    file_name : '',
    all_lines : '',
    list_of_functions : '',
    call_stack : '',
    current_element : ''
    
};

// import {css_element_check_tool} from './css-element-check-tool.js';

function controls(main_canvas_id) {
    
    no_small_screen_error_window_for_unload();
    no_small_screen_error_window_for_resize();

//----------схема для файла / начальное состояние / рисование трех точек----------------------------------------------------

    var ctx = canvas_blur_fix(document.querySelector('#mainCanvas'));
    ctx.clearRect(0, 0, ctx.canvas.width,  ctx.canvas.height);
    $('#mainCanvas').attr('height',$('.div-main-canvas').height()-20);
    $('#mainCanvas').css('height',$('.div-main-canvas').height()-20);
    $('#mainCanvas').attr('height','20');
    $('#mainCanvas').css('height','20');
    ctx.font = "18px serif";
    ctx.fillText("...", 5, 18);


//----------прикрепление скриптов к кнопкам---------------------------------------------------------------------------------

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
<<<<<<< HEAD
    $('.input-file-btn').on('click', (event) => {
        const btnInputId = event.target.id
        const inputFileId = '#file' + btnInputId.substring(btnInputId.length-1);
        $(inputFileId).trigger('click');
        const inputFileName = '#file-name' + btnInputId.substring(btnInputId.length-1)
=======
   
     $('.input-file-btn').on('click', (event) => {
        const btnInputId = event.target.id
        const inputFileId = '#file' + btnInputId.substring(btnInputId.length-1);
        $(inputFileId).trigger('click'); 
        const inputFileName = '#file-name' + btnInputId.substring(btnInputId.length-1) 
>>>>>>> e1df849 (js-analyser / show list of classes)
        $(inputFileId).on('change', function () {
            const fileName = $(this)[0].files[0].name;
            $(inputFileName).val(fileName);
        });
<<<<<<< HEAD
    });
    function reset(event){
        event.preventDefault();
        selectText('h1');
        $('.div-result').scrollTop(0);
        document.getElementById('file1').value = '';
        document.getElementById('file2').value = '';
        $('.file-numbers-of-lines-inside').html('...');
        $('.element-numbers-of-lines-inside').html('...');
        $('.file-code-inside').html('');
        $('.element-code-inside').html('');
        $('.div-call-stack').html('...');
        $('.fileNames').val('...');
        $('#error_message').html('');
        const inputSwitchChecked = document.getElementById("test1").checked;
        if(!inputSwitchChecked) {
            $('#switch').trigger('click');
            $('#fileInputHTMLwrapper').removeClass('notVisibleFileInputHTML');
        };
        var ctx = canvas_blur_fix(document.querySelector('#mainCanvas'));
        ctx.canvas.height = 100;
        const z = window.devicePixelRatio;
        ctx.scale(z, z);
        $('.wideDiv').removeClass('btn-scroll-yes').addClass('btn-scroll-no');
        ctx.clearRect(0, 0, ctx.canvas.width,  ctx.canvas.height);
        $('.tabs-ierarchy')[0].click();
        var ctx = canvas_blur_fix(document.querySelector('#mainCanvas'));
        $('#mainCanvas').attr('height',$('.div-main-canvas').height()-20);
        $('#mainCanvas').css('height',$('.div-main-canvas').height()-20);
        $('#mainCanvas').attr('height','20');
        $('#mainCanvas').css('height','20');
        ctx.font = "16px serif";
        ctx.fillText("...", 5, 18);
    };
    $('#reset').on('click', (event) => {reset(event);});
    $('#expandIerarchyScheme').on('click', ()=>{
        if($('#result').hasClass('normalWidthIerarchyScheme')) {
            $('#result').removeClass('normalWidthIerarchyScheme').addClass('largeWidthIerarchyScheme');
            $('#expandIerarchyScheme').html('Свернуть');
        }
        else {
            $('#result').removeClass('largeWidthIerarchyScheme').addClass('normalWidthIerarchyScheme');
            $('#expandIerarchyScheme').html('Развернуть на<br> ширину окна');
        };
    });
    $('.tabs-ierarchy').on('click', (e) => {
        let tabs = $('.tabs-ierarchy');
        let divsResult = $('.div-result');//
        for(let i = tabs.length - 1; i>-1;i--){
            if(tabs[i]==e.target){
                if(!$(tabs[i]).hasClass('tab-ierarchyScheme-active')){
                        $(tabs[i]).addClass('tab-ierarchyScheme-active');
                };
                if($(tabs[i]).hasClass("tab-ierarchyScheme-normal")){
                        $(tabs[i]).removeClass("tab-ierarchyScheme-normal");
                }
                if($(divsResult[i]).hasClass('tab-back')){
                    $(divsResult[i]).removeClass('tab-back');
                    $(divsResult[i]).addClass('tab-forward');
                };
                main_state.tab_position = i+1;
                if(i == 0) {
                    $('.div-main-canvas').focus();
                }else if(i == 1) {
                    $('.div-file-code').focus();
                }else if(i == 2) {
                    $('.div-element-scheme').focus();
                }else if(i == 3){
                    $('.div-element-code').focus();
                }else if(i == 4){
                    $('.div-call-stack').focus();
                };
            }
            else{
                if(!$(tabs[i]).hasClass('tab-ierarchyScheme-notmal')){
                        $(tabs[i]).addClass('tab-ierarchyScheme-normal');
                };
                if($(tabs[i]).hasClass("tab-ierarchyScheme-active")){
                        $(tabs[i]).removeClass("tab-ierarchyScheme-active");
                    }
                if(!$(divsResult[i]).hasClass('tab-back')){
                    $(divsResult[i]).removeClass('tab-forward');
                    $(divsResult[i]).addClass('tab-back');
                };
            }
        };
    });

//----------запуск------------------------------------------------------------------------------------

    $('#launch').on('click', (event)=>{
        reset(event);
        event.preventDefault();
        $('.div-result').scrollTop(0);
        $('#error_message').html('');
        $('.tabs-ierarchy')[1].click(); // поменять на 0

//----------ВКЛЮЧИТЬ----------------------------------------------------------------------------------
        // if($('#test1').is(':checked') && (!$('#file1')[0].files[0] || !$('#file2')[0].files[0])){
        //     if(!$('#file2')[0].files[0]){
        //         error_window_open('<p>Не выбран файл JavaScript!</p>');
        //     };
        //     if(!$('#file1')[0].files[0]){
        //         error_window_open('<p>Не выбран файл HTML!</p>');
        //     };
        // }
        // else if(!$('#test1').is(':checked') && !$('#file2')[0].files[0]) {
        //     error_window_open('<p>Не выбран файл JavaScript!</p>');
        // }
        // else
//----------------------------------------------------------------------------------------------------

        // {

            let file_js = $('#file2')[0].files[0];

            //const extracted_data = js_file_data(file_js);

            // console.log(exracted_data);

            //---название файла---
            //---единственный возвращаемый класс---
            //---массив с функциями---
            //---массив со всеми строками---
            //---массив со стеком вызова---

//----------------------------------------------------------------------------------------------------            
//----------------------------------------------------------------------------------------------------            
//----------------------------------------------------------------------------------------------------            


//---состояние---

    



        function extract_data() {
         $('.file-numbers-of-lines-inside').html('');
            //---ВКЛЮЧИТЬ!---
            // var file_data = new FormData();
            // var file_js = $('#file2')[0].files[0];
            // file_data.append('file_js',file_js);
            $.ajax({
                url: 'php/js-file-data.php',
                type: 'POST',
                //---ВКЛЮЧИТЬ!---
                // data: file_data,
                // contentType: false,
                // processData: false,
                success: function(response){
                    file_code_tab(response);

                    element_code_tab();
                    element_code_tab();
                    call_stack_tab();

                    file_ierarchy_scheme_tab(ctx, main_canvas_id);

                },
                dataType: "json"
            });
        };




//----------------------------------------------------------------------------------------------------            
//----------------------------------------------------------------------------------------------------            
//----------------------------------------------------------------------------------------------------            


            extract_data();


        // }
    })

    $('.copyText').on('click', (event)=>{
        event.preventDefault();
        var file_code = $('.file-code-inside').text();
        function copyToClipboard(text) {
            var dummy = document.createElement("textarea");
            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
        }
        copyToClipboard(file_code);
        $('.tabs-ierarchy')[main_state.tab_position-1].click();
    });


    $('#button_error_ok').on('click', () => {
        error_window_close();
    });

//----------горячие кнопки----------

    document.addEventListener ("keydown", function (zEvent) {
        if (!zEvent.ctrlKey && zEvent.key === "1") {
            $('.tabs-ierarchy')[0].click();
        };
        if (!zEvent.ctrlKey && zEvent.key === "2") {
            $('.tabs-ierarchy')[1].click();
        };
        if (!zEvent.ctrlKey && zEvent.key === "3") {
            $('.tabs-ierarchy')[2].click();
        };
        if (!zEvent.ctrlKey && zEvent.key === "4") {
            $('.tabs-ierarchy')[3].click();
        };
        if (!zEvent.ctrlKey && zEvent.key === "5") {
            $('.tabs-ierarchy')[4].click();
        };
        if (!zEvent.ctrlKey && zEvent.code === 'KeyF') {
            $('#expandIerarchyScheme').click();
        };
        if (zEvent.key === ' ') {
            zEvent.preventDefault();
            $('#launch').click();
        };
        if (!zEvent.ctrlKey && zEvent.code === 'KeyC') {
            $('.copyText').click();
        };
        if (zEvent.code === 'KeyR') {
            $('#reset').click();
        };



        if (zEvent.ctrlKey && zEvent.code === 'KeyA') {
            zEvent.preventDefault();
            selectText('file-code-inside'); 
        };



    });

//----------переключение вкладок с помощью знаков '<' и '>'----------

    document.addEventListener ("keydown", function (zEvent) {
        if (zEvent.ctrlKey && zEvent.code === "Comma") {
            if(main_state.tab_position>1){
                $('.tabs-ierarchy')[main_state.tab_position-2].click();
            }
        } else if (zEvent.ctrlKey && zEvent.code === "Period") {
            if(main_state.tab_position<5){
                $('.tabs-ierarchy')[main_state.tab_position].click();
            }
        };

    });
    let g = new ResizeObserver(entries => {
    for (let entry of entries) {
        const cr = entry.contentRect;
        if($('#mainCanvas').attr('height')>20){
            file_ierarchy_scheme_tab(ctx, main_canvas_id)
        };
    }
    });
    g.observe(document.getElementById('result')); 
};
export {controls};
=======
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
        if($('#ierarchyScheme').hasClass('normalWidthIerarchyScheme')) {
            $('#ierarchyScheme').removeClass('normalWidthIerarchyScheme').addClass('largeWidthIerarchyScheme');
            $('#expandIerarchyScheme').html('Свернуть');
        }
        else {
            $('#ierarchyScheme').removeClass('largeWidthIerarchyScheme').addClass('normalWidthIerarchyScheme');
            $('#expandIerarchyScheme').html('Развернуть на<br> ширину окна');
        };
    })
    
});
>>>>>>> e1df849 (js-analyser / show list of classes)
