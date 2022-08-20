<?php
	// We need to use sessions, so you should always start sessions using the below.
	session_start();
	// If the user is not logged in redirect to the login page... 
	if (!isset($_SESSION['loggedin'])) {
		header('Location: phplogin/index.html');
		exit;
	}
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta charset='utf-8'>
        <link rel='stylesheet' href='css/reset.css'>
        <link rel='stylesheet' href='css/style.css'>
        <link rel='shortcut icon' type='image/ico' href='favicon-lab.ico'>
        <script type='text/javascript' src='js/jquery.js'></script>
        <script type='module' src='js/app.js'></script>
    </head>
    <body>

<!----------no-small-error-window---------------------------------------------------------------------------------------->

        <div class='no-small-screen-error-window-box'>
            <div class='no-small-screen-error-window-container'>
                <div class='no-small-screen-error-window unselectable'>
                    Приложение <i class="error-italic">JS-analyser</i> не работает на экранах меньше 1200px!
                </div>
            </div>
        </div>

<!----------------------------------------------------------------------------------------------------------------------->

        <div id='mainContainer'>
            <h1 class = 'unselectable'>JS-analyser</h1>
            <br>
            <div id='controls-buttons' class="unselectable">
                <div id='ctrlWhiteFrame1' class="border-radius-all">
                    <form method="post" enctype="multipart/form-data">
                        <span class='sector-label'>Рычаги управления</span>
                        <hr class="white-line-1">
                        Скрипт /// on - выполнить / off - не выполнять
                        <br>
                        <label id='switch'>
                            <input id='test1' type='checkbox' class='' checked>
                            <span id='slider'>
                            <span id='circle'></span>
                            </span>
                        </label>
                        <br>
                        <div id='fileInputHTMLwrapper'>
                            <label>Файл HTML / загрузить</label>
                            <br>
                            <div class='wrapper'>
                                <input type='file' id='file1'>
                                <div id=''>
                                <input tabindex="-1" type='text' id='file-name1' class = 'fileNames border-radius-left' value='...' readonly='readonly'>
                                <input tabindex="-1" type='button' value='Файл' id='file-btn1' class='input-file-btn unselectable border-radius-right'>
                                </div> 
                            </div>
                            <br>
                        </div>
                        <label>Файл JavaScript / загрузить</label>
                        <br>
                        <div class='wrapper'>
                            <input type='file' id='file2'>
                            <div>
                            <input tabindex="-1" type='text' id='file-name2' class = 'fileNames border-radius-left' value='...' readonly='readonly'>
                            <input tabindex="-1" type='button' value='Файл' id='file-btn2' class='input-file-btn unselectable border-radius-right'>
                            </div> 
                        </div>
                        <br>
                        <input tabindex="-1" type='submit' id='launch' class='control-btn border-radius-all' value="ЗАПУСК"> 
                        <button tabindex="-1" id='reset' class='control-btn unselectable border-radius-all'>Сброс</button>
                    </form>
                </div>
                <a tabindex="-1" id='a1' href='../MainPage.php'>Навигация /// Lab / Home</a>
            </div>
            <div id='result' class="normalWidthIerarchyScheme border-radius-all">
                <span class='sector-label unselectable'>Иерархия функций в анализируемом скрипте</span>
                <button tabindex="-1" class='copyText unselectable border-radius-all'>Копировать<br>текст</button>
                <button tabindex="-1" class='wideDiv btn-scroll-no unselectable border-radius-all'  id='expandIerarchyScheme'>Развернуть на<br> ширину окна</button>
                <hr class="white-line-2">
                <div>
                    <div id='tab-fileScheme' class='tabs-ierarchy tab-ierarchyScheme-active border-radius-up'>Схема для файла</div>
                    <div id='tab-fileCode' class='tabs-ierarchy tab-ierarchyScheme-normal border-radius-up'>Код файла</div>
                    <div id='tab-elementScheme' class='tabs-ierarchy tab-ierarchyScheme-normal border-radius-up'>Схема для элемента</div>
                    <div id='tab-elementCode' class='tabs-ierarchy tab-ierarchyScheme-normal border-radius-up'>Код элемента</div>
                    <div id='tab-callStack' class='tabs-ierarchy tab-ierarchyScheme-normal border-radius-up'>Cтек вызова</div>
                </div>
                <div id='ierarchyScheme' class="border-radius-bottom">
                    <div tabindex="0" class="div-main-canvas div-result">
                        <canvas id='mainCanvas' class='smallSizeCanvas'></canvas>
                    </div>
                    <div id='file-code' tabindex="0" class="div-file-code div-result div-result-hide">...</div>
                    <div tabindex="0" class="div-element-scheme div-result div-result-hide">...</div>
                    <div id='element-code' tabindex="0" class="div-element-code div-result div-result-hide">...</div>
                    <div id='call-stack' tabindex="0" id='div-call-stack' class="div-call-stack div-result div-result-hide">...</div>
                </div>
            </div>
        </div>

<!----------Window Error------------------------------------------------------------------------------------------------>

        <div id="error_box" class="error_window_normal">
            <div class='error_container'>
                <div id="error_window" class="border-radius-all">
                    <div id="error_message" class='unselectable'></div>
                    <button id="button_error_ok" class='unselectable border-radius-all'>Ок</button>
                </div>
            </div>
        </div>
       
<!---------------------------------------------------------------------------------------------------------------------->

    <body>
</html>