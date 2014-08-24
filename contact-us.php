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
$resultMessageSuccess = "ส่งข้อมูลการลาสำเร็จ";

$resultNotifyError = "color: #b94a48; background-color: #f2dede; border:solid 1px; #eed3d7;";
$resultMessageError = "ส่งข้อมูลการลาไม่สำเร็จ";

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

        <title>Pianoforte - Contact Us</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/default.css" rel="stylesheet">

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
                                            <li class="last"><a href="information-en.php">English Page</a></li>
                                            <li><a href="contact-us.php" class="active">Contact Us</a></li>
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
                            <h4 class="black">โรงเรียนดนตรีเปียโนฟอร์เต้</h4>
                            <div class="contact-summary">
                                <table width="100%">
                                    <tr>
                                        <td>โทร</td>
                                        <td><a class="tel" href="tel:021010558;">02-1010-558</a></td>
                                    </tr>
                                    <tr>
                                        <td>มือถือ</td>
                                        <td><a class="tel" href="tel:0863149150;">086-3149-150</a></td>
                                    </tr>
                                    <tr>
                                        <td>อีเมล์</td>
                                        <td><a href="mailto:pianofortethai@gmail.com" target="_blank">pianofortethai@gmail.com</a></td>
                                    </tr>
                                </table>
                            </div>
                            <br />

                            <h4 class="black">วันและเวลาทำการ</h4>
                            <p class="normal">
                                เปิดบริการวันอังคาร ถึง วันศุกร์ <br />
                                เวลา 11:00 – 19:00 น. <br /><br />
                                เปิดบริการเสาร์ และ อาทิตย์ <br />
                                เวลา 9:00 – 19:00 น. <br /><br />
                                ปิดทำการทุกวันจันทร์ของสัปดาห์
                            </p>
                            <br />

                            <h4 class="orange">* หยุดประจำปีในวันสงกรานต์ และวันปีใหม่ *</h4><br />
                            <h4 class="black">โรงเรียนดนตรีเปียโนฟอร์เต้</h4>
                            <p class="normal">
                                ห้องเลขที่  723 ชั้น 7 <br />
                                ศูนย์การค้าเซ็นทรัลพลาซา แจ้งวัฒนะ
                                เลขที่ 99, 99/9 หมู่ที่2 ถนนแจ้งวัฒนะ <br />
                                ตำบลบางตลาด อำเภอปากเกร็ด 
                                นนทบุรี 11120
                            </p>
                            <br />

                            <img src="assets/img/left_bg.jpg" class="center" />
                        </div>
                        <div class="col-md-9 col-page-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 id="contact-form-header" class="page-topic black">โรงเรียนดนตรีเปียโนฟอร์เต้</h3>
                                    <br />
                                    <div class="contact-form">
                                        <h4 class="orange">แบบฟอร์มการแจ้งลา</h4>
                                        <form method="post" action="#contact-form-header">
                                            <div style="<?=$resultNotify?> width: 50%; padding:5px; border-radius: 4px;">
                                                <span><?=$resultMessage?><br /></span>
                                            </div>
                                            <table width="100%">
                                                <tr valign="top">
                                                    <td>ชื่อ-นามสกุล *</td>
                                                    <td><input name="txtName" style='<?=$invName?>' type="text" maxlength="100" value="<?=$name?>" /></td>
                                                    <td>เบอร์ติดต่อ</td>
                                                    <td><input name="txtMobile" type="text" maxlength="30" value="<?=$mobile?>" /></td>
                                                    <td style="width:125px;" rowspan="4">
                                                        <input name="btnSubmit" type="image" src="assets/img/submit.gif" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>อีเมล์</td>
                                                    <td><input name="txtEmail" type="text" maxlength="250" value="<?=$email?>"  /></td>
                                                    <td>วันที่ต้องการลา *</td>
                                                    <td><input name="txtAbsentDate" style="<?=$invAbsendDate?>" type="text" maxlength="20" value="<?=$absentDate?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td>วิชา *</td>
                                                    <td><input name="txtSubject" style="<?=$invSubject?>" type="text" maxlength="50" value="<?=$subject?>" /></td>
                                                    <td>เวลา *</td>
                                                    <td><input name="txtTime" style="<?=$invTime?>" type="text" maxlength="20" value="<?=$time?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td>อาจารย์ผู้สอน *</td>
                                                    <td><input name="txtTeacher" style="<?=$invTeacher?>" type="text" maxlength="50" value="<?=$teacher?>" /></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                            <br />
                                            <p class="hint">
                                                แบบฟอร์มการลานี้สำหรับนักเรียน 1 คน ต่อ 1 วิชา เท่านั้น หากต้องการลามากกว่า 1 คน หรือ 1 วิชา กรุณากรอกแบบฟอร์มใหม่อีกครั้ง สำหรับนักเรียนท่านอื่น หรือวิชาอื่น
                                                ทางโรงเรียนขอสงวนสิทธิ์ในการยกเลิกใบลาของท่านในกรณีที่ใช้สิทธิ์ในการลาครบแล้ว
                                                (ลงทะเบียนเรียน 12 ครั้ง ลาได้ 2 ครั้ง)
                                            </p>
                                        </form>
                                    </div>
                                    <br />

                                    <p>ร่วมงานกับเรา</p>
                                    <p class="normal">ทางโรงเรียนให้ความสนใจเป็นอย่างยิ่งกับบุคคลากรที่มีความรู้ความสามารถทางด้านดนตรี โดยเฉพาะอย่างยิ่งสำหรับผู้ที่ผ่านการสอบ Trinity และ Rock School ในระดับเกรด 6-8 หรือผู้ที่ผ่านการศึกษาทางด้านดนตรี ในระดับปริญญาตรี หรือ ระดับปริญญาโท </p>
                                    <br />

                                    <p>สนใจเป็นคุณครูสอนวิชาดนตรี</p>
                                    <p class="normal">
                                        กรุณาส่ง ประวัติ พร้อมรายละเอียด และประสบการณ์สอนของท่านมาที่
                                        <a href="mailto:pianofortethai@gmail.com" target="_blank">pianofortethai@gmail.com</a>
                                        หลังจากพิจารณารายละเอียดของท่านแล้ว ทางโรงเรียนจะติดต่อกลับไปเพื่อนัดสัมภาษณ์ และ ทดสอบความสามารถ
                                    </p>
                                    <br />

                                    <p>สนใจสมัครเป็นเจ้าหน้าที่หรือพนักงาน</p>
                                    <p class="normal">
                                        กรุณาส่ง ประวัติ การสมัครงาน พร้อมเอกสารแนบ ประกอบการพิจารณา มาที่
                                        <a href="mailto:pianofortethai@gmail.com" target="_blank">pianofortethai@gmail.com</a>
                                    </p>
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
            $(document).ready(function() {
                initialize();
                function initialize() {
                    var latlng = new google.maps.LatLng(13.903596, 100.528174);
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