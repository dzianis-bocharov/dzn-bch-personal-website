<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;" charset="windows-1252">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Personal website of Dzianis Bocharov front end web developer from New York City.">
        <meta name="keywords" content=" Dzianis Bocharov, front end web developer">
        <link rel='shortcut icon' type='image/ico' href='favicon.ico'>
        <link rel="stylesheet" type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="navMenuButtons.js"></script>
        <script type="text/javascript" src="smallMenu.js"></script>
        <script  type="text/javascript" src="mailScript.js"></script>
        <script>
            $(document).ready(
                function(){
                    $('#menuButton').click(function(){
                        $('#smallMenu').css('display', 'block')
                    });
                    $('#smallMenuExit').click(
                        function(){
                            $('#smallMenu').css('display', 'none')
                        }
                    );
                    $('.navButton').click(
                        function(){
                            $('#smallMenu').css('display', 'none')
                        }
                    );
                }
            );
        </script>
        <title>Dzianis Bocharov - Front End Web Developer</title>
        <style>
            @media only screen and (max-width: 992px) {
                div.binContact{
                    width: 50%;
                }
                #binMessage {
                    width: 100%;
                } 
                #innerBinMessage {
                    padding-left:15%;
                    padding-right:15%;
                }
                #innerPhotoshopSkills{
                    padding-left: 35%;
                }
                #divSkills {
                    height: auto;
                }
                *.binSkills {
                    float: left;
	                width: 50%;
                    height: auto;
                }
                #photoshopSkills {
                    width: 100%;
                }
                #divHomeWrapper {
                    height: auto;
                    padding-bottom: 1em;
                }
                div#signatureBin, #shieldBin, #formResumeBin {
                    width: auto;
                    display: block;
                }
                div#binMyPhoto {
                    width: 40%;
                    height: 300px;
                }
                
                #shieldBin {
                    margin-top: 80px;
                    top: -40px;
                    position: relative;
                    display: flex;
                    font-size: 2em;
                    height: 300px;
                    align-items: center;    
                 }
                #resumeButton {
                    width: 40%;
                    margin-left: 2.5%;
                    float: left;
                    margin-top: 2%;
                    height: 2.65em;
                }
                #h3photoshop {
                    text-align: left;
                }
                #signature {
                    margin-top: 0;
                    float:right;
                    margin-right:15%;
                    width: 25%;
                    height: 25%;
                }
                div.innerBinContact {
                    height: 520px;
                }
                #divSkills {
                    height: 700px;
                    position: relative;
                }
                img.imageBinAbout {
                    width: 15%;
                }
            }
            @media only screen and (max-width: 768px) {
                div#navLarge {
                    display: none;
                }        
                #menuButton {
                    display: block;
                }
                #menuButtonImage {
                    width: 40px;
                    height: 40px;
                    float: left;
                    margin-left: 5px;
                    margin-top: 5px;
                }     
                h1#logoName {
                    position: relative;
                    float: left;
                    top: -15px;
                    margin-left: 15px;
                    width: 80%;
                    text-align: center;
                }   
                #smallMenu {
                    display: block;
                    z-index:1;
                    background-color: maroon;
                    position: fixed;
                	top: 0;
	                left: 0;
	                width: 100%;
                    height: 100%;
                    font-size: 3em;
                    line-height: 2em;
                    padding-top: 1em;
                    padding-left: 10%;
                    display: none;
                }
                li.smallMenuLi {display: inline;}
                #headerWrapper {
                    position: absolute;
                    height: 70px;
                    overflow: hidden;
                }
                #smallMenuExit{
                    position: absolute;
                    margin-left: 50%;
                    width: 50px;
                    height: 50px;
                }
            }
            @media only screen and (max-height: 500px) {
                #headerWrapper {
                    position: absolute;
                }                
            }
            @media only screen and (min-width: 1200px) {
                /*#divHomeWrapper {
                    height: 1000px;
                }*/
            }
            @media only screen and (max-width: 576px) {
                #innerPhotoshopSkills{
                    padding-left: 20px;
                }
                #signature {
                    margin-top: 35px;
                }
                #h3photoshop {
                    text-align: center;
                }
                #innerBinMessage {
                    padding-left:4%;
                    padding-right:6%;
                    width: 83%;
                }

                #photoshopSkills {
                    width: 98%;
                }
                div#binMyPhoto {
                	position: relative;
	                width: 90%;
                    height: 200px;
                    margin-left: 5%;
                    margin-top: 35px;
                    overflow: hidden;
                    float: left;

                }
                img#myFacePhoto {
                	position: absolute;
                    width:100%;
                    height: auto;
                    left: -9999px;
                    right: -9999px;
                    margin: auto;
                    top: -5000px;
                    bottom:-5000px;
                }
                #resumeButton {
	                margin-top: 15px;

                }
                div#navLarge {
                    display: none;
                }
                h1#logoName {
                    position: relative;
                    text-align: center;
                    left: 0px;
                }
                div#divHomeWrapper {
                    height: auto;
                }
                #shield {
                    position: relative;
                    top: 0;
                    left: 0;
                    font-size: 2.45em;
                    text-align: center;
                    line-height: 1.2em;
                }
                #resumeButton {
                    position: relative;
                    top: 0;
                    left: 0;
                    height: 60px;
                    width: 90%;
                    margin-left: 5%;
                    margin-right: 5%;
                    margin-top: 20px;
                }
                #signature {
                    position: relative;
                    top: 0;
                    left: 0;
                    width: 60%;
                    height: 60%;
                    margin-left: 20%;
                    margin-right: 20%;
                    margin-top: 20px;
                    margin-bottom: 20px;
                }
                *.binSkills {
                    width: 98%;
                    margin-left: 1%;
                    margin-right: 1%;
                    height: auto;
                }
                div.innerBinSkills {
	                height: auto;
                }
                #divAbout {
	              	height: auto;
                	position: relative;
                }
                div.binContact {
                    width: 98%;
                    margin-left: 1%;
                    margin-right: 1%;
                }    
                #divContact {
                    height: auto;
                }  
                #separator {
                    display: inline;
                }
                #shield {
                    margin-top: 20px;
                }   
                #shieldBin {
                    margin-top: 0px;
                    position: relative;
                    width: 100%;
                    display: block;
                    font-size: 0.8em;
                    height: auto;
                    top:0px;
                }
                div#formResumeBin {
                    width: 100%;
                    display: block;
                }
                #menuButton {
                    display: block;
                }
                #menuButtonImage {
                    width: 40px;
                    height: 40px;
                    float: left;
                    margin-left: 5px;
                    margin-top: 5px;
                }
                h1#logoName {
                    position: relative;
                    line-height: 1.2em;
	                font-size: 1.35em;
                }
                #smallMenu {
                    display: block;
                    z-index:1;
                    background-color: maroon;
                    position: fixed;
                	top: 0;
	                left: 0;
	                width: 100%;
                    height: 100%;
                    font-size: 3em;
                    line-height: 2em;
                    padding-top: 1em;
                    padding-left: 10%;
                    display: none;
                }
                li.smallMenuLi {display: inline;}
                #headerWrapper {
                    position: absolute;
                    height: 70px;
                    overflow: hidden;
                }
                *.binSkills {
                    height: auto;
                }
                div.alignerAbout {
            	    width: 98%;
            	    margin-left: 1%;
                }
                img#imageBinAboutExperience {
                	margin-bottom: 1em;
                }
                img.imageBinAbout {
                    position: relative;
                    width: 44%;
                    margin-left: 28%;
                    margin-top: 1em;
                    margin-bottom: 1em;
                    padding-bottom: 0;
                    float: none;
                }
                input#sendButton {
                    border:none;
                    background-image:none;
                    background-color:maroon;
                    -webkit-box-shadow: none;
                    -moz-box-shadow: none;
                    box-shadow: none;
                    border-radius: 0px;
                }
                h1#logoName {
                    position: relative;
                    float: left;
                    top: -15px;
                    margin-left: 15px;
                    width: 80%;
                    text-align: center;
                }
                #smallMenuExit{
                    position: absolute;
                    margin-left: 50%;
                    width: 50px;
                    height: 50px;
                }
                *.anchor {
                    top: 0px;
                    display: block;
                }
                #an9 {
                    position: relative;
                    top: -4em;
                }
                div.innerBinContact {
                    height: auto;
                }
                #reactSkills {
                    width: 98%;
                    margin-left: 1%;
                    margin-right: 1%;
                    height: auto;
                }
            }


            #duck {
            	width: 100%;
            }


        </style>
    </head>
    <body>
        <header>
            <nav>
                <div id='headerWrapper'>
                    <div id='binHeader'>
                        <div id='menuButton'>
                            <img src='menuButton.jpg' alt='menuButton' id='menuButtonImage'>
                        </div>
                        <h1 id='logoName'>
                            <span>Dzianis Bocharov</span>
                        </h1>
                        <div id='navLarge'>
                            <ul id='navMenu'>
                                <li><a href='#an1' class='navButton' title='test'>Home</a></li>
                                <div id='menu1'>
                                    <li><a href='#an2'class='navButton'>Skills</a></li>
                                    <li><a href='#an9' class='navButton'>About<a></li>
                                    <li><a href='#an4' class='navButton'>Contact</a></li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div id='divHomeWrapper'>
            <div id='divHome'>
                <a class='anchor' id='an1'></a>
                <div id='binMyPhoto'>
                    <img id='myFacePhoto' src='myFaceTest.jpg' alt='Dzianis Bocharov'>
                </div>
                <div id='shieldBin'>
                    <div id='shield'>
                        Hi, my name is DZIANIS BOCHAROV.
                        <br>I'm FRONT END 
                        <br id='separator'> 
                        WEB DEVELOPER
                        <br>
                        from New York City.
                    </div>
                </div>
                <div id='flexResumeSignature'>
                    <div id='formResumeBin'>
                        <form id='formResume' action='dzianis_bocharov_resume.pdf'>
                            <button id='resumeButton'>Grab The Resume (PDF)</button>
                        </form>
                    </div>
                    <div id='signatureBin'>
                        <image id='signature' src='signature.jpg'>
                    </div>
                </div>
             </div>
        </div>
        <div id='divSkills'>
            <a class='anchor' id='an2'></a>
            <div class='chapterName'>
                <h2 >Skills</h2>
            </div>
            <div class='binSkills'>
                <div class='innerBinSkills'>
                    <h3>HTML</h3>
                    <ul>
                        <li class='liSkills'>using of <i class='myItalic'>Document Object Model</i>;</li>
                        <li class='liSkills'>creating of markup for webpage by making blocks with text, tables, forms, inserting images, video and audio, using frames</li>
                        <li class='liSkills'>using of semantic tags;</li>
                    </ul>
                </div>
            </div>
            <div class='binSkills'>
                <div class='innerBinSkills'>
                    <h3>CSS</h3>
                    <ul>
                        <li class='liSkills'>responsive web design;</li>
                        <li  class='liSkills'>customizing the appearance and position of elements on the web page such as text, image, table, form, block, frame;
                        </li>                
                        <li  class='liSkills'>animation effects for web page interface
                        </li>
                    </ul>
                </div>
            </div>
            <div class='binSkills'>
                <div class='innerBinSkills'>
                    <h3>Bootstrap</h3>
                    <ul>
                        <li class='liSkills'>creating of interface elements;</li>
                        <li class='liSkills'>setting of CSS;</li>
                        <li class='liSkills'>creating a page with a responsive design;</li>
                        <li class='liSkills'>using of themes</li>
                    </ul>
                </div>
            </div>
            <div class='binSkills'>
                <div class='innerBinSkills'>
                    <h3>JavaScript</h3>
                    <ul>
                        <li class='liSkills'>making the interactive web page;</li>
                        <li class='liSkills'>writing of code for the interface of web application;</li>
                        <li class='liSkills'>making animation effects;</li>
                        <li class='liSkills'>using of AJAX</li>
                    </ul>
                </div>
            </div>
            <div class='binSkills'>
                <div class='innerBinSkills'>
                    <h3>jQuery</h3>
                    <ul>
                        <li class='liSkills'>interaction with <i class='myItalic'>DOM</i> elements;</li>
                        <li class='liSkills'>writing code for <i class='myItalic'>AJAX</i>;</li>
                        <li class='liSkills'>creating the visual effects for the web page interface</li>
                    </ul>
                </div>
            </div>
            <div class='binSkills'>
                <div class='innerBinSkills'>
                    <h3>React</h3>
                    <ul>
                        <li class='liSkills'>creation of an interactive user interface;</li>
                        <li class='liSkills'>using of components;</li>
                        <li class='liSkills'>creationg of web application;</li>
                        <li class='liSkills'>using of state</li>
                    </ul> 
                </div>
            </div>
            <div class='binSkills'>
                <div class='innerBinSkills'>
                    <h3>PHP</h3>
                    <ul>
                        <li class='liSkills'>interaction between a form on web page and a database on server;</li>
                        <li class='liSkills'>error handling;</li>
                        <li class='liSkills'>writing of code for processing data from web application</li>    
                    </ul>
                </div>
            </div>
            <div class='binSkills'>
                <div class='innerBinSkills'>
                    <h3>MySQL</h3>
                    <ul>
                        <li class='liSkills'>creating of database;</li>
                        <li class='liSkills'>setting up access privileges for user;</li>
                        <li class='liSkills'>writing code for inserting data to the server and retrieving them</li>
                    </ul>
                </div>
            </div>
            <div class='binSkills'>
                <div class='innerBinSkills'>
                    <h3>Drupal</h3>
                    <ul>
                        <li class='liSkills'>installing and using of modules;</li>
                        <li class='liSkills'>content management;</li>
                        <li class='liSkills'>using templates;</li>
                        <li class='liSkills'>theme customization</li>
                    </ul>
                </div>
            </div>
            <div id = 'reactSkills' class='binSkills' class='desktopView' style='/*width: 50%;*/'>
                <div class='innerBinSkills'>
                    <h3>Git</h3>
                    <ul>
                        <li class='liSkills'>making versions of software accordingly to progress of web development;</li>
                        <li class='liSkills'>working with a remote repository;</li>
                        <li class='liSkills'>creating branches and writing code for dedicated components of web application</li>
                    </ul>
                </div>
            </div>

            <div class='binSkills' id='photoshopSkills' class='desktopView' style='/*width: 50%;*/' id='duck'>
                <div class='innerBinSkills' id='innerPhotoshopSkills'>
                    <h3 id='h3photoshop'>Photoshop</h3>
                    <ul>
                        <li class='liSkills'>web page layout creation;</li>
                        <li class='liSkills'>color processing;</li>
                        <li class='liSkills'>using of layer masks;</li>
                        <li class='liSkills'>work with filters</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id='divAbout'>
            <a class='anchor' id='an3'></a>
            <div class='chapterName' id='chapterAbout'><h2>About</h2></div>
            <a class='anchor' id='an9'></a>
            <div class='aboutData' id='divAboutDataProfile'>
                <img src='profileFolder.jpg' class='imageBinAbout' id='imageBinAboutProfile'>
                <div class='alignerAbout'>
                    <h3 class='about-h3'>Profile</h3>
                    <br>
                    Able to use such programs and languages as HTML, CSS, Bootstrap, JavaScript, jQuery, React, PHP, MySQL, Git, Drupal and Photoshop for creating contemporary websites. 
                    <br>
                    Perfect verbal and written communication skills. 
                    <br>
                    Highly motivated, good team player, quickly learns new technologies.
                    <br>
                </div>
            </div>
            <div class='aboutData' id='divAboutDataEducation'>
                <img src='educationHat.jpg' class='imageBinAbout'>
                <div class='alignerAbout'>
                    <h3 class='about-h3'>Education</h3>
                    <br>
                    <span class='myBold'>Belarusian National Technical University, Minsk, Belarus</span>
                    <br>
                    Bachelor's Degree in Industrial Engineering
                    <br>
                    September 2003 - June 2008
                    <br>
                    <br>
                    <span class='myBold'>Minsk Machine-Building College, Minsk Belarus</span>
                    <br>
                    Associate's Degree in Economics and Enterprise Management
                    <br>
                    September 1999 - June 2001      
                </div>           
            </div>
            <div class='aboutData' id='divAboutDataExperience'>
                <img src='experienceImage.jpg' class='imageBinAbout' id='imageBinAboutExperience'>
                <div class='alignerAbout'>
                    <h3 class='about-h3'>Experience</h3>
                    <br>

                    <span class='myBold'>Part Time Warehouse Agent JFK | DHL Express, New York City, USA | November 2020 - Now</span>
                    <br>
                    <ul>
                        <li class='liAbout'>loading and unloading containers;</li>
                        <li class='liAbout'>sorting of packages</li>                    
                    </ul> 
                    <br>
                    <span class='myBold'>Electrician | Self-Employment, New York City, USA | February 2015 - March 2020</span>
                    <br>
                    <ul>
                        <li class='liAbout'>reading the blueprints;</li>
                        <li class='liAbout'>electrical residential wiring;</li>                    
                        <li class='liAbout'>connecting of equipment such as engines, pumps, HVAC;</li>                    
                        <li class='liAbout'>searching and repairing of malfunctions</li>                    
                    </ul> 
                    <br>
                    <span class='myBold'>Warehouse Worker | United Air & Parcel, New York City, USA | March 2013 - August 2014</span>
                    <br>
                    <ul>
                        <li class='liAbout'>packing of parcels;</li>
                        <li class='liAbout'>loading and unloading trucks</li>                    
                    </ul>                
                    <br>
                    <span class='myBold'>Senior Economist | State Enterprise 'Aqua-Minsk', Minsk, Belarus | July 2005 - November 2012</span>
                    <br>
                    <ul>
                        <li class='liAbout'>determination of the price level for services;</li>
                        <li class='liAbout'>calculation of indicators of economic efficiency of the enterprise;</li>
                        <li class='liAbout'>writing business plans for enterprise development</li>
                    <ul>
                    <br>

                    <span class='myBold'>Economist | Unitary Enterprise "FOK Serebryanka", Minsk, Belarus | September 2003 - July 2005</span>
                    <br>
                    <ul>
                        <li class='liAbout'>preparation of contracts with customers for the sale of services;</li>
                        <li class='liAbout'>creating of state statistical reports;</li>
                        <li class='liAbout'>accounting revenue coming from services</li>
                    </ul>
               </div>
            </div>
        </div>
        <div id='divContact'>
            <a class='anchor' id='an4'></a>
            <div class='chapterName'><h2>Contact</h2></div>
            <div class='binContact'>
                <div class='innerBinContact' id='innerBinContactMap'>
                    <div id='binAddress'>                    
                        <h3 class='contactInnerGroup'>Address:</h3>
                        Dzianis Bocharov, 1683 58th St, #3B 
                        <br>              
                        Brooklyn, NY 11204, United States
                    </div>
                    <img src='mapTest.jpg' id='mapAddress'>
                </div>
            </div>
            <div class='binContact'>
                <div class='innerBinContact'>
                    <div class='contactData'>
                        <a href="tel://+17182192033" class='contactLink'>
                            <img src='phoneImage.jpg' class='imageBinContact'>
                            <h3 class='contactInnerGroup' class=>Phone:</h3>
                            <div class='highLine'>718-219-2033</div>
                        </a>
                    </div>
                    <div class='contactData'>          
                        <a href='https://www.facebook.com/DzianisBacharou' class='contactLink'>
                            <img src='facebookImage.jpg' class='imageBinContact'>
                            <h3 class='contactInnerGroup'>Facebook:</h3>
                            https://www.facebook.com/
                            <br>
                            DzianisBacharou
                        </a>
                    </div>
                    <div class='contactData'>
                        <a href="https://www.linkedin.com/in/dzianis-bocharov-65958965" class='contactLink'>
                            <img src='linkedinImage.jpg' class='imageBinContact'>
                            <h3 class='contactInnerGroup'>LinkedIn:</h3>
                            https://www.linkedin.com/in/dzianis-bocharov-65958965
                        </a>
                    </div>
                    <div class='contactData'>
                        <a href="skype:terminator_dan?call" class='contactLink'>
                            <img src='skypeImage.jpg' class='imageBinContact'>
                            <h3 class='contactInnerGroup'>Skype:</h3>
                            <div class='highLine'>termainator_dan</div>
                        </a>
                    </div>
                    <div class='contactData'>
                        <a href='mailto:fewd-nyc@dzianis-bocharov.com' class='contactLink'>
                            <img src='envelopeImage.jpg' class='imageBinContact'>
                            <h3 class='contactInnerGroup'>Email:</h3>
                            <div class='highLine'>
                                fewd-nyc@dzianis-bocharov.com
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class='binContact' id='binMessage'>
                <div class='innerBinContact' id='innerBinMessage'>
                    <div id='binNotice'><div id='noticeMessageSent'>duck</div></div>
                    <div id='formBin'>
                        <h3 class='contactInnerGroup'>Send a Message:</h3>
                        <form id='formMessage' method='post' action='sendMail.php'>
                            <label for='inputSenderName'>Name</label>
                            <br>
                            <input type='text' class='inputMessageForm' name='senderName' id='inputSenderName' maxlength='50' required>
                            <br>
                            <label for='inputSenderEmail'>Email</label>
                            <br>
                            <input type='email' class='inputMessageForm' name='senderEmail' id='inputSenderEmail' maxlength='50' required>
                            <br>
                            <label for='inputSubject'>Subject</label>
                            <br>
                            <input type='text' class='inputMessageForm' name='subject' id='inputSubject' maxlength='50' required>
                            <br>                        
                            <label id='inputMessage'>Message</label>
                            <br>
                            <textarea id = 'messageToMe' name='textareaMessage' maxlength='350' maxlength='50' required> </textarea>
                            <br>
                            <input type = 'submit' value='Send' id='sendButton'>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id='smallMenu'>
            <img id='smallMenuExit' src='smallMenuExit.jpg'>
            </ul>
                <li class='smallMenuLi'><a href='#an2'class='navButton'>Skills</a></li><br>
                <li class='smallMenuLi'><a href='#an9' class='navButton'>About<a></li><br>
                <li class='smallMenuLi'><a href='#an4' class='navButton'>Contact</a></li>
            </ul>            
        </div>
        <footer id='binFooter'>
            <hr id='footerLine'>
            <div id='divFooter'>© 2021 Dzianis Bocharov</div>
        </footer>
    </body>
</html>