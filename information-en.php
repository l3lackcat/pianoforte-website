<?php
require_once 'module_sendmail.php';

//page variable;
$name = "";
$mobile = "";
$email = "";
$absentDate = "";
$subject = "";
$time = "";
$teacher = "";

$invName = "";
$invAbsendDate = "";
$invSubject = "";
$invTime = "";
$invTeacher = "";

function resetParam(){
    $name = "";
    $mobile = "";
    $email = "";
    $absentDate = "";
    $subject = "";
    $time = "";
    $teacher = "";

    $invName = "";
    $invAbsendDate = "";
    $invSubject = "";
    $invTime = "";
    $invTeacher = "";
}

$resultNotifySuccess = "color:#468847; background-color: #dff0d8; border:solid 1px; #d6e9c6;";
$resultMessageSuccess = "Successfully sent absentee's note";

$resultNotifyError = "color: #b94a48; background-color: #f2dede; border:solid 1px; #eed3d7;";
$resultMessageError = "Error while seding absentee's note";

$resultNotify = "display:none;";
$resultMessage = "";

if (!empty($_POST)) {
    // && $_SESSION['prevent_doublepost']
    $isNotError = true;
    
    $name = $_POST['txtName'];
    $mobile = $_POST['txtMobile'];
    $email = $_POST['txtEmail'];
    $absentDate = $_POST['txtAbsentDate'];
    $subject = $_POST['txtSubject'];
    $time = $_POST['txtTime'];
    $teacher = $_POST['txtTeacher'];
    
    //### validate
    if ($name == "") { $isNotError = false; $invName = $styleInvalid; } else { $invName = ""; }
    if ($absentDate == "") { $isNotError = false; $invAbsendDate = $styleInvalid; } else { $invAbsendDate = ""; }
    if ($subject == "") { $isNotError = false; $invSubject = $styleInvalid; } else { $invSubject = ""; }
    if ($time == "") { $isNotError = false; $invTime = $styleInvalid; } else { $invTime = ""; }
    if ($teacher == "") { $isNotError = false; $invTeacher = $styleInvalid; } else { $invTeacher = ""; }
    
    //save to database
    if ($isNotError) {
        
        $mailTo = "pianofortethai@gmail.com";
        $mailSubject = $name." มีการแจ้งลาวิชา ".$subject;
        $mailBody = "รายละเอียดการลา\n\n";
        $mailBody.= "ชื่อ: ".$name."\n";
        $mailBody.= "วิชา: ".$subject."\n";
        $mailBody.= "ครูผู้สอน: ".$teacher."\n";
        $mailBody.= "วันที่ลา: ".$absentDate."\n";
        $mailBody.= "เวลา: ".$time."\n";
        $mailBody.= "โทร: ".$mobile."\n";
        $mailBody.= "อีเมล์: ".$email."\n";
        
        $result = smtpmail($mailTo, $mailSubject, $mailBody);
        if ($result == 1) {
            $resultNotify = $resultNotifySuccess;
            $resultMessage = $resultMessageSuccess;
            resetParam();
        }else{
            $resultNotify = $resultNotifyError;
            $resultMessage = $resultMessageError;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="keyword" content="" />
        <!--<meta name="msvalidate.01" content="" />
        <meta name="google-site-verification" content="" />-->

        <title>Pianoforte - Information</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/default.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    </head>
    <body>

        <div class="wrapper">
            <header>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div id="logo">
                                        <h1>
                                            <span>Pianoforte The School of Music</span>
                                            <a href="index.php">
                                                <img src="assets/img/logo.gif" alt="Piano Forte" title="Pianoforte The School of Music">
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                                <div class="col-md-9 main-menu-container">
                                    <div class="sub-nav">
                                        <a href="mailto:pianofortethai@gmail.com" target="_blank" title="contact us"><img src="assets/img/subnav_email.gif"/></a>
                                        <a href="https://www.facebook.com/Pianoforteclub" target="_blank" title="Piano Forte Facebook Fanpage"><img src="assets/img/subnav_fb.gif"/></a>
                                    </div>
                                    <div class="main-nav">
                                        <ul>
                                            <li class="last"><a href="information-en.php" class="active">English Page</a></li>
                                            <li><a href="contact-us.php">Contact Us</a></li>
                                            <li><a href="our-course.php">Our Course</a></li>
                                            <li><a href="our-school.php">Our School</a></li>
                                            <li><a href="index.php">Home</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <section id="top-banner">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="visual"></div>
                        <!--<img src="assets/img/banner.jpg" />-->
                    </div>
                </div>
            </section>

            <section id="main-content">
                <div class="container container-other">
                    <div class="row">
                        <div class="col-md-3 col-contact">
                            <h4 class="black">Pianoforte The School of Music</h4>
                            <div class="contact-summary">
                                <table width="100%">
                                    <tr>
                                        <td>Tel</td>
                                        <td><a class="tel" href="tel:021010558;">02-1010-558</a></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td><a class="tel" href="tel:0863149150;">086-314-3150</a></td>
                                    </tr>
                                    <tr>
                                        <td>Facsimile</td>
                                        <td><a class="tel" href="tel:0863149150;">086-314-3150</a></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><a href="mailto:pianofortethai@gmail.com" target="_blank">pianofortethai@gmail.com</a></td>
                                    </tr>
                                </table>
                            </div>
                            <br />
                            
                            <h4 class="black">OUR HOURS</h4>
                            <p class="normal">
                                Tuesday-Friday 11am-7pm <br /><br />
                                Saturday-Sunday 9am-7pm <br /><br />
                                Closed on Mondays, 
                                Songkran festivals and new year holidays.
                            </p>
                            <br />
                            
                            <h4 class="black">OUR LOCATION <a href="#map_canvas"><img style="vertical-align:top;" src="assets/img/ico-map.jpg" title="see map"/></a></h4>
                            <p class="normal">
                                Pianoforte The School of Music <br />
                                Room no. 723, 7th floor <br />
                                Central Plaza ChaengWattana 
                                99, 99/9 Moo 2, ChaengWattana Rd. Bang Talad, Pak Kred, Nonthaburi 11120
                            </p>
                            <br />
                            
                            <h4 class="black">MANAGED BY</h4>
                            <p class="normal">
                                Pianoforte Co. Ltd. <br />
                                144/92 Moo 1 Pak Kret, Pak KretNonthaburi 11120
                            </p>
                            <br />
                            
                            <!--<h4 class="black">MAP</h4>
                            <a href="#map_canvas"><img src="assets/img/ico-map.jpg"/></a>
                            <br />-->
                            
                            <img src="assets/img/left_bg.jpg" class="center" />
                        </div>
                        <div class="col-md-9 col-page-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="page-topic black">Music… the beginning of ingenuity</h3>
                                    <br />
                                    
                                    <p class="normal">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Everyone wish for a perfect development for their children, to see them grow intelligently and intuitively. We never cease to wonder in what way we can raise our children to be what we hope for.
                                    </p>
                                    <br />
                                    
                                    <h4 class="orange"><i class="fa fa-chevron-circle-right"></i> &nbsp;Do you know that learning music will stimulate the genius in your child? </h4>
                                    <p class="highlight normal">
                                        <strong>"Pianoforte has the answer"</strong><br />
                                        Music has the elements to simultaneously stimulate both hemispheres of the brain
                                    </p>
                                    <p class="left-30 normal">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;While the brain's left hemisphere is responsible for mathematical, scientific, literacy, logic and analytical skills, the right hemisphere offers emotional complexity, imagination and creativity. While harmony, musical ambience and textures stimulate the right hemisphere, the contours of the melodies and rhythms will stimulate the left hemisphere
                                    </p>
                                    <br />
                                    
                                    <h4 class="orange"><i class="fa fa-chevron-circle-right"></i> &nbsp;Music promotes a child's development</h4>
                                    <p class="left-30 normal">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;While there are many types of music, the music suitable for children should contain systematic arrangements of rhythm, melodies and harmony which, will improve logical thinking, even for prenatal babies. The parents can introduce music to children as early as 5 months in utero, whereas the sonic vibrations of music will hasten the development of the part of the nervous system related to hearing.
                                    </p>
                                    <br />
                                    
                                    <h4 class="orange"><i class="fa fa-chevron-circle-right"></i> &nbsp;Why classical music education is the most suitable for child development?</h4>
                                    <p class="left-30 normal">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Numerous researches show: classical music positively affects brain cells involved in spatial intelligence, an ability to connect thoughts through shapes and textures which will, in turn, improve mathematical and logical abilities. Children under 7 in constant musical training and education are found perform better at relating thought concepts, mathematics, sciences and languages compared to children without musical education. Thus, music education is one of the key elements to develop a child's ingenuity and with proper monitoring and constructive learning stimuli, music will enhance child development significantly.
                                    </p>
                                    <br />
                                    
                                    <hr />
                                    
                                    <h4 class="black left-30">Our school</h4>
                                    <p class="left-30 normal">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pianoforte the School of music is founded on the ideals of excellence in music education and a friendly atmosphere suitable for each individual's development. Pianoforte's teachers receive constant, rigorous training courses to improve the ability to educate children, all for the sake of the quality of the education and to be one of the most distinguished music schools of the present. 
                                    </p>
                                    <br />
                                    
                                    <h4 class="black left-30">Our confidence in quality comes from measurable results</h4>
                                    <p class="left-30 normal">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pianoforte continuously give the teachers training courses to introduce them to updated musical knowledge and teaching methods for the latest music courses, and also the most fundamental element: better musical performance skills. Constant support ensures that each of Pianoforte's teachers are teaching at maximum efficiency as they also receive education from the best professional musicians and music instructors of their own fields. Pianoforte also thoroughly audition each teacher before providing your child with our carefully selected educator.
                                    </p>
                                    <br />
                                    
                                    <h4 class="black left-30">"Discover the genius in your child with institutionally-certified teachers"</h4>
                                    <p class="left-30 normal">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From the best colleges and conservatories of music in Thailand and Trinity College London / Trinity Rock School
                                    </p>
                                    <br />
                                    
                                    <div class="our-course-list">
                                        <div class="course">
                                            <kbd>PIANO</kbd> <span>Bachelor's degree of Music, Trinity College London Grade 6 - LCTL</span>
                                        </div>
                                        <div class="course">
                                            <kbd>VIOLINES</kbd> <span>Bachelor's degree of Music, Trinity College London Grade 8</span>
                                        </div>
                                        <div class="course">
                                            <kbd>CLASSICAL GUITAR</kbd> <span>Master's degree of Music, Trinity College London Grade 8</span>
                                        </div>
                                        <div class="course">
                                            <kbd>DRUMS</kbd> <span>Bachelor's degree of Music, Trinity Rock School Grade 8</span>
                                        </div>
                                        <div class="course">
                                            <kbd>ELECTRIC GUITAR</kbd> <span>Bachelor's degree of Music, Trinity Rock School Grade 8</span>
                                        </div>
                                    </div><br />
                                    
                                    <h4 class="black left-30">Pianoforte's Examinations</h4>
                                    <p class="left-30 normal">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Examination is one the most important element in education as to inform the parents of the success and improvements of your children. In classical and popular music coursed, Pianoforte provides institutional instructors from abroad to give examinations and evaluations. Students are also required to give a public performance at Pianoforte's recitals at least once a year.
                                    </p>
                                    <br />
                                    
                                    <h4 class="black left-30">World-class Examinations</h4>
                                    <p class="left-30 normal">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pianoforte the School of Music provides and encourages students to take examinations from acclaimed international institutions such as Trinity College London / Trinity Rock School and London School of Music, University of West London. Pianoforte will be your intermediary to care for your registration and examinations, according to students' and parents' own decisions.
                                    </p>
                                    <br />
                                    
                                    <h4 class="black left-30">Our Courses</h4>
                                    <p class="center normal">3 Courses to enhance your child's ingenuity</p>
                                    <img src="assets/img/3-course-type.jpg" class="center" />
                                    <br />
                                    
                                    <div class="course-desc">
                                        <h4 class="course-head orange course-head-a"><span>Music for Children: for children age 4-6 </span></h4>
                                        <br />
                                        <p class="normal left-30">
                                            1. Music for little Mozart (MLM): Piano basics for early children Music for little Mozart will provide simple and fun learning for children with games and activities including books, musical note flashcards, audio CD and various animal puppets. <br /><br />
                                            2. The Little Violinist: Violin basics for early children The Little Violinist will introduce children to the violin, starting from the instrument, itself and proper ways of handling and bowing, sitting and standing stances for playing a violin, fingerings and playing various simple tunes selected for children.
                                        </p>
                                    </div>
                                    
                                    <div class="course-desc">
                                        <h4 class="course-head orange course-head-b"><span>Classical Music</span></h4>
                                        <br />
                                        <p class="normal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our classical music course is essentially tailored for students who loves classical music and considering starting a fresh journey into classical music performance, requiring no musical experiences to start learning. This course is suitable for children age 7 and above Pianoforte provides 5 different majors is our classical music courses:</p>
                                        <p class="normal left-30">
                                            1. Piano <br />
                                            2. Violins <br />
                                            3. Classical Guitar <br />
                                            4. Woodwinds <br />
                                            5. Music Theory
                                        </p>
                                    </div>
                                    
                                    <div class="course-desc">
                                        <h4 class="course-head orange course-head-c"><span>Contemporary Music</span></h4>
                                        <br />
                                        <p class="normal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This course is open to students of all ages who are interested in contemporary and popular music styles, a perfect course for those who play music as a hobby or as an entertainer. Pianoforte provides 4 majors in our contemporary music courses:</p>
                                        <p class="normal left-30">
                                            1. Popular style piano <br />
                                            2. Voice <br />
                                            3. Electric Guitars <br />
                                            4. Drums
                                        </p>
                                    </div>
                                    
                                    <hr />
                                    
                                    <h4 class="black left-30">Absentee's Note Form</h4>
                                    <p class="left-30 normal">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This form is used for only one student per one subject. Please fill another form if more than one student will be absent or a student will be absent for more than one subject. Pianoforte holds the right to deny an absentee's form if the student has filled the quota of absents 
                                        <br /><strong>(2 absents per 12 registered classes)</strong>
                                    </p>
                                    <br />
                                    
                                    <div class="img-container">
                                        <img src="assets/img/music_img.gif" class="right" />
                                    </div>
                                    <div class="contact-form">
                                        <h4 id="contact-form-header" class="orange">Absentee's Note Form</h4>
                                        <form method="post" action="#contact-form-header">
                                            <div style="<?=$resultNotify?> width: 50%; padding:5px; border-radius: 4px;">
                                                <span><?=$resultMessage?><br /></span>
                                            </div>
                                            <table width="100%">
                                                <tr valign="top">
                                                    <td>Name-Surname</td>
                                                    <td><input name="txtName" style='<?=$invName?>' type="text" maxlength="100" value="<?=$name?>" /></td>
                                                    <td>Mobile</td>
                                                    <td><input name="txtMobile" type="text" maxlength="30" value="<?=$mobile?>" /></td>
                                                    <td style="width:125px;" rowspan="4">
                                                        <input name="btnSubmit" type="image" src="assets/img/submit.gif" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><input name="txtEmail" type="text" maxlength="250" value="<?=$email?>"  /></td>
                                                    <td>Absent date</td>
                                                    <td><input name="txtAbsentDate" style="<?=$invAbsendDate?>" type="text" maxlength="20" value="<?=$absentDate?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Subject</td>
                                                    <td><input name="txtSubject" style="<?=$invSubject?>" type="text" maxlength="50" value="<?=$subject?>" /></td>
                                                    <td>Time</td>
                                                    <td><input name="txtTime" style="<?=$invTime?>" type="text" maxlength="20" value="<?=$time?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Teacher</td>
                                                    <td><input name="txtTeacher" style="<?=$invTeacher?>" type="text" maxlength="50" value="<?=$teacher?>" /></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                            <br />
                                            <p class="hint">
                                                This form is used for only one student per one subject. Please fill another form if more than one student will be absent or a student will be absent for more than one subject. Pianoforte holds the right to deny an absentee's form if the student has filled the quota of absents (2 absents per 12 registered classes)
                                            </p>
                                        </form>
                                    </div>
                                    <br />
                                    
                                    <div id="map_canvas"></div>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left">
                                <span class="bold">PianoForte The School of Music</span><br />
                                PianoForte 7th floor Education Zone Central Plaza Chaengwattana<br />
                                Tel: 02-1010-588 Mobile: 086-314-9150 Fax: 02-1010-589<br />
                                <span class="grey">E-mail:</span>&nbsp;<a href="mailto:pianofortethai@gmail.com" target="_blank" class="grey">pianofortethai@gmail.com</a>
                            </p>
                        </div>
                        <!-- <div class="col-md-3 mobile-app">
                            <p>
                            <span class="bold">Get the App </span>
                            <a href="http://goo.gl/dTuIje" target="_blank" title="Find us on App Store">
                                <img src="assets/img/appstore-mini.png" /> App Store
                            </a>
                            <a href="http://goo.gl/M8Ncj9" target="_blank" title="Find us on Play Store">
                                <img src="assets/img/playstore-mini.png" /> Google Play
                            </a>
                            </p>
                        </div> -->
                        <div class="col-md-6">
                            <p class="right">
                                <span class="head">CALL US</span><br />
                                <a class="tel" href="tel:021010558;">02-1010-558</a><br />
                                <span class="bold">
                                    Tuesday-Friday 11am-7pm<br />
                                    Saturday-Sunday 9am-7pm
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.1&sensor=false"></script>
        <script type="text/javascript"> 
            $(document).ready(function(){
                initialize();
                function initialize() {
                    var latlng = new google.maps.LatLng(13.903596,100.528174);
                    var myOptions = {
                        zoom: 15,
                        center: latlng,
                        mapTypeControl: false,
                        navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                }
            });
	</script>
    </body>
</html>