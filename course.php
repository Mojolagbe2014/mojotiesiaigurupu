<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "course-detail");
require('classes/WebPage.php'); //Set up page as a web page
require 'swiftmailer/lib/swift_required.php';//Swift Mailer
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;
$courseObj = new Course($dbObj);
$categoryObj = new CourseCategory($dbObj);
$quoteObj = new Quote($dbObj);

include('includes/other-settings.php');
require('includes/page-properties.php');
$errorArr = array(); //Array of errors
$msg = ''; $msgStatus = '';

//Booking Handler
if(isset($_POST['submit'])){
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) :  ''; 
    if($email == "") {array_push ($errorArr, "valid email ");}
    $name = filter_input(INPUT_POST, 'name') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'name')) :  ''; 
    if($name == "") {array_push ($errorArr, " name ");}
    $phone = filter_input(INPUT_POST, 'phone') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'phone')) :  ''; 
    if($phone == "") {array_push ($errorArr, " phone number ");}
    $address = filter_input(INPUT_POST, 'address') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'address')) :  ''; 
    if($address == "") {array_push ($errorArr, " address ");}
    $body = filter_input(INPUT_POST, 'message') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'message')) :  ''; 
    if($body == "") {array_push ($errorArr, " message ");}
    $subject = filter_input(INPUT_POST, 'course') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'course')) :  ''; 

    if(count($errorArr) < 1)   {
        $emailAddress = COMPANY_EMAIL;//iadet910@iadet.net
        $subject = "Booking for ".$subject." By $name";	
        $body = "<div><p><u><strong>Course Booking Information</strong></u></p>
                <p><strong>COURSE</strong>: $subject</p>
                <p><strong>USER NAME</strong>: $name</p>
                <p><strong>EMAIL: </strong> <a href='mailto:$email'>$email</a></p>
                <p><strong>PHONE NO: </strong> $phone</p>
                <p><strong>ADDRESS</strong>: $address</p>
                <p><strong>MESSAGE</strong>: $body</p>
                <p>&nbsp;</p>
                <p>Message sent from <a href='http://tsigroups.com/'>TSI Groups Limited Website</a></p>
                </div>";
        
        $transport = Swift_MailTransport::newInstance();
        $message = Swift_Message::newInstance();
        $message->setTo(array($emailAddress => "TSI Limited Admin"));
        $message->setSubject($subject);
        $message->setBody($body);
        $message->setFrom($email, $name);
        $message->setContentType("text/html");
        $mailer = Swift_Mailer::newInstance($transport);
        $mailer->send($message);
        $msgStatus = 'success';
        $msg = $thisPage->messageBox('Your course booking message has been sent.', $msgStatus);
    }else{ $msgStatus = 'error'; $msg = $thisPage->showError($errorArr); }
}

//get the course id; if failed redirect to course-categories page
$thisCourseId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) : $thisPage->redirectTo('courses');
foreach ($courseObj->fetchRaw("*", " status = 1 AND id = $thisCourseId ") as $course) {
    $courseData = array('id' => 'id', 'name' => 'name', 'code' => 'code', 'image' => 'image', 'media' => 'media', 'amount' => 'amount', 'shortName' => 'short_name', 'category' => 'category', 'startDate' => 'start_date', 'endDate' => 'end_date', 'description' => 'description', 'status' => 'status');
    foreach ($courseData as $key => $value){
        switch ($key) { 
            case 'image': $courseObj->$key = MEDIA_FILES_PATH1.'course-image/'.$course[$value];break;
            case 'media': $courseObj->$key = MEDIA_FILES_PATH1.'course/'.$course[$value];break;
            case 'startDate': $dateParam = explode('-', $course[$value]);
                              $dateObj   = DateTime::createFromFormat('!m', $dateParam[1]);
                              $courseObj->$key = $dateParam[2].' '.$dateObj->format('F').', '.$dateParam[0].'.';;
                              break;
            case 'endDate': $dateParam = explode('-', $course[$value]);
                              $dateObj   = DateTime::createFromFormat('!m', $dateParam[1]);
                              $courseObj->$key = $dateParam[2].' '.$dateObj->format('F').', '.$dateParam[0].'.';;
                              break;
            default     :   $courseObj->$key = $course[$value]; break; 
        }
    }
}
//Override page-properties
$thisPage->title = StringManipulator::trimStringToFullWord(62, stripslashes(strip_tags($courseObj->name." Course - ". WEBSITE_AUTHOR)));
$thisPage->description = StringManipulator::trimStringToFullWord(150, trim(stripslashes(strip_tags($courseObj->description))));
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <?php include('includes/meta-tags.php'); ?>
    <script type="text/javascript"> window._wpemojiSettings = { "baseUrl":"http:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"http:\/\/tsigroups.com\/tsi-new1\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.3.1"}}; !function(a,b,c){function d(a){var c=b.createElement("canvas"),d=c.getContext&&c.getContext("2d");return d&&d.fillText?(d.textBaseline="top",d.font="600 32px Arial","flag"===a?(d.fillText(String.fromCharCode(55356,56812,55356,56807),0,0),c.toDataURL().length>3e3):(d.fillText(String.fromCharCode(55357,56835),0,0),0!==d.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);</script>
    <style type="text/css"> img.wp-smiley, img.emoji { display: inline !important; border: none !important; box-shadow: none !important; height: 1em !important; width: 1em !important; margin: 0 .07em !important; vertical-align: -0.1em !important; background: none !important; padding: 0 !important; } </style>
    <link rel='stylesheet' id='rs-plugin-settings-css'  href='plugins/revslider/public/assets/css/settings5bca.css?ver=5.0.4.1' type='text/css' media='all' />
    <style id='rs-plugin-settings-inline-css' type='text/css'>.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}</style>
    <link rel='stylesheet' id='wp-pagenavi-css'  href='<?php echo SITE_URL; ?>plugins/wp-pagenavi/pagenavi-css44fd.css?ver=2.70' type='text/css' media='all' />
    <link rel='stylesheet' id='google-font-css'  href='http://fonts.googleapis.com/css7405.css?family=Roboto%3A400%2C300%2C500%2C400italic%2C700%2C500italic%2FScript%3Alatin-ext%7CBitter&amp;ver=4.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css'  href='<?php echo SITE_URL; ?>css/university/css/bootstrap.min5b31.css?ver=4.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-css'  href='<?php echo SITE_URL; ?>plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min83b6.css?ver=4.6.2' type='text/css' media='screen' />
    <link rel='stylesheet' id='owl-carousel-css'  href='<?php echo SITE_URL; ?>css/university/js/owl-carousel/owl.carousel5b31.css?ver=4.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='owl-carousel-theme-css'  href='<?php echo SITE_URL; ?>css/university/js/owl-carousel/owl.theme5b31.css?ver=4.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='style-css'  href='<?php echo SITE_URL; ?>css/university/style5b31.css?ver=4.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='et-builder-modules-style-css'  href='<?php echo SITE_URL; ?>plugins/divi-builder/framework/styles/frontend-builder-plugin-style5152.css?ver=1.0' type='text/css' media='all' />
    <link rel='stylesheet' id='magnific-popup-css'  href='<?php echo SITE_URL; ?>plugins/divi-builder/framework/styles/magnific_popup5152.css?ver=1.0' type='text/css' media='all' />
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/jqueryc1d8.js?ver=1.11.3'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/revslider/public/assets/js/jquery.themepunch.tools.min5bca.js?ver=5.0.4.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/revslider/public/assets/js/jquery.themepunch.revolution.min5bca.js?ver=5.0.4.1'></script>
    <!--[if IE 8]><link rel="stylesheet" type="text/css" href="plugins/js_composer/assets/css/vc-ie8.css" media="screen"><![endif]-->
    <link href="<?php echo SITE_URL; ?>css/additional-style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_URL; ?>css/facebox.css" rel="stylesheet" type="text/css"/>
    <noscript><style> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
    <link href="<?php echo SITE_URL; ?>sweet-alert/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_URL; ?>sweet-alert/facebook.css" rel="stylesheet" type="text/css"/>
</head>
<body class="single single-u_event postid-2897 full-width custom-background-empty single-author wpb-js-composer vc_responsive et_divi_builder">
    <a name="top" style="height:0; position:absolute; top:0;" id="top-anchor"></a>
    <div id="body-wrap">
        <div id="wrap">
            <header>
                <?php include('includes/header.php'); ?>
            </header>	    
            <div class="page-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <h1><?php echo $courseObj->name; ?></h1>
                        </div>
                        <div class="pathway col-md-4 col-sm-4 hidden-xs text-right">
                            <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
                                <a href="<?php echo SITE_URL; ?>index" rel="v:url" property="v:title">Home</a> \ <a href="<?php echo SITE_URL; ?>courses" rel="v:url" property="v:title">Courses</a> \ 
                                <span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="#"><?php if(!empty($courseObj->shortName)){ echo $courseObj->shortName;} else{ echo StringManipulator::trimStringToFullWord(20, $courseObj->name);} ?></a></span>
                            </div><!-- .breadcrumbs -->                
                        </div>
                    </div><!--/row-->
                </div><!--/container-->
            </div>
            <!--/page-heading-->
            <?php include('includes/sidebar-top.php'); ?>
            <!--/Top sidebar-->    
            <div id="body">
                <div class="container">
                    <div class="content-pad-3x">
                        <div class="row">
                            <div id="content" class="col-md-9">
                                <article class="row single-event-content">
                                    <div class="col-md-4 col-sm-5">
                                        <div class="content-pad single-event-meta">
                                            <div class="item-thumbnail">
                                                <img width="263" height="263" src="<?php echo $courseObj->image; ?>" class="attachment-thumb_263x263 wp-post-image" alt="FraudDetectPrevent" />    
                                            </div><!--/item-thumbnail-->
                                            <div class="event-description"> <?php echo StringManipulator::trimStringToFullWord(300, trim(stripcslashes(strip_tags($courseObj->description)))); ?>..</div>
                                            <div class="event-action"><button id="book-now" class="btn btn-primary text-default">Book Now!!!</button></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-7">
                                        <div class="content-pad single-event-detail">
                                            <div class="event-detail">
                                                <div class="event-speaker"></div><!--/event-speaker-->
                                                <div class="event-info row content-pad">
                                                    <div class="col-md-6 col-sm-6">
                                                        <h4 class="small-text"><i class="fa fa-calendar"></i> Start Date:</h4>
                                                        <p><?php echo $courseObj->startDate; ?></p>
                                                        <h4 class="small-text"><i class="fa fa-calendar"></i> End Date:</h4>
                                                        <p><?php echo $courseObj->endDate; ?></p>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <h4 class="small-text"><i class="fa fa-money"></i> Amount: </h4>
                                                        <p><span class="naira">N</span><?php echo number_format($courseObj->amount, 2); ?></p>
                                                        <h4 class="small-text"><i class="fa fa-briefcase"></i> Category: </h4>
                                                        <p><a href="category?id=<?php echo $courseObj->category; ?>"><?php echo CourseCategory::getName($dbObj, $courseObj->category); ?></a></p>
                                                    </div>
                                                </div><!--/event-info-->
                                            </div><!--/event-detail-->
                                            <div class="event-content">
                                                <div class="content-dropcap">
                                                    <?php echo $courseObj->description; ?>
                                                    <div class="event-action"><button id="book-now" class="btn btn-primary text-default">Book Now!!!</button></div>
                                                </div>
                                               
                                                <div class="event-more-detail">
                                                    <h4>MORE DETAIL</h4>
                                                    <h6 class="small-text">Phone Number:</h6>
                                                    <p><a href="tel:<?php echo COMPANY_HOTLINE; ?>"><?php echo COMPANY_HOTLINE; ?></a></p>
                                                    <h6 class="small-text">Email:</h6>
                                                    <p><a href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a></p>
                                                </div>
                                                <div class="event-cta"> </div>
                                                <div class="related-event ">
                                                    <h3>Related Courses</h3>
                                                    <div class="ev-content">
                                                        <div class="row">
                                                            <?php 
                                                            $relatedCourseObj = new Course($dbObj);
                                                            foreach ($relatedCourseObj->fetchRaw("*", " category = $courseObj->category AND id != $courseObj->id ", " RAND() LIMIT 2 ") as $relatedCourse) {
                                                                $courseData = array('id' => 'id', 'name' => 'name', 'code' => 'code', 'image' => 'image', 'media' => 'media', 'amount' => 'amount', 'shortName' => 'short_name', 'category' => 'category', 'startDate' => 'start_date', 'endDate' => 'end_date', 'description' => 'description', 'status' => 'status');
                                                                foreach ($courseData as $key => $value){
                                                                    switch ($key) { 
                                                                        case 'image': $relatedCourseObj->$key = MEDIA_FILES_PATH1.'course-image/'.$relatedCourse[$value];break;
                                                                        case 'media': $relatedCourseObj->$key = MEDIA_FILES_PATH1.'course/'.$relatedCourse[$value];break;
                                                                        case 'startDate': $dateParam = explode('-', $relatedCourse[$value]);
                                                                                          $dateObj   = DateTime::createFromFormat('!m', $dateParam[1]);
                                                                                          $relatedCourseObj->$key = $dateParam[2].' '.$dateObj->format('F').', '.$dateParam[0].'.';
                                                                                          break;
                                                                        case 'endDate': $dateParam = explode('-', $relatedCourse[$value]);
                                                                                          $dateObj   = DateTime::createFromFormat('!m', $dateParam[1]);
                                                                                          $relatedCourseObj->$key = $dateParam[2].' '.$dateObj->format('F').', '.$dateParam[0].'.';
                                                                                          break;
                                                                        default     :   $relatedCourseObj->$key = $relatedCourse[$value]; break; 
                                                                    }
                                                                }
                                                            ?>
                                                            <div class="col-md-6 col-sm-6 related-item">
                                                                <div class="thumb">
                                                                    <a href="<?php echo SITE_URL; ?>course/<?php echo $relatedCourseObj->id."/".StringManipulator::slugify($relatedCourseObj->name); ?>/">
                                                                        <img width="80" height="80" src="<?php echo $relatedCourseObj->image; ?>" class="attachment-thumb_80x80 wp-post-image" alt="<?php echo $relatedCourseObj->name; ?>" />
                                                                    </a>
                                                                </div>
                                                                <h4 class="ev-title">
                                                                    <a href="<?php echo SITE_URL; ?>course/<?php echo $relatedCourseObj->id."/".StringManipulator::slugify($relatedCourseObj->name); ?>/" class="related-ev-title main-color-1-hover"><?php echo $relatedCourseObj->name; ?></a>
                                                                </h4>
                                                                <div class="ev-start small-text"><?php echo $relatedCourseObj->startDate; ?></div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <?php } ?> 
                                                        </div>
                                                   </div>
                                                </div>
                                            </div><!--/event-content-->
                                            
                                        </div><!--/single-event-detail-->																	
                                    </div>
                                </article>
                            </div><!--/content-->
                            <?php include('includes/sidebar.php'); ?>
                        </div><!--/row-->
                    </div><!--/content-pad-3x-->
                </div><!--/container-->
            </div>
            <!--/body-->
            <div id="facebox" class="et_pb_module et_pb_contact_form_container clearfix  et_pb_contact_form_0">
                <div><h4 class="et_pb_contact_main_title">Book for <?php echo $courseObj->name; ?></h4>
                </div>
                <div class="et_pb_contact">
                    <form action="" method="POST">
                        <div class="et_pb_contact_left">
                            <input type="hidden" name="course" value="<?php echo $courseObj->name; ?>"/>
                            <p class="clearfix"><input name="name" type="text" value="" placeholder="Full Name" size="48" required /></p>
                            <p class="clearfix"><input name="email" type="email" placeholder="Enter your email" size="48" required /></p>
                            <p class="clearfix"><input name="phone" type="text" placeholder="Enter your phone number" size="48" required /></p>
                            <p class="clearfix"><input name="address" type="text" placeholder="Enter your address" size="48" required /></p>
                            <p class="clearfix"><textarea name="message" placeholder="Enter your message" cols="45" required="required"></textarea></p>
                            <input type="submit" name="submit" value="Book Now"/> &nbsp; &nbsp; &nbsp; <input type="button" class="close btn btn-danger btn-sm" value="Close"/>
                        </div>
                        
                    </form>
                </div>
            </div>
            <?php include('includes/sidebar-bottom.php'); ?>
            <?php include('includes/footer.php'); ?>
        </div><!--wrap-->
    </div><!--/body-wrap-->
    <?php include('includes/mobile-menu.php'); ?>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/u-shortcodes/shortcodes/calendar-js/format-datetime-master/jquery.formatDateTime.min5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/u-shortcodes/shortcodes/calendar-js/underscore/underscore-min5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/jquery-migrate.min1576.js?ver=1.2.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/divi-builder/framework/scripts/frontend-builder-global-functions5152.js?ver=1.0'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/js_composer/assets/lib/waypoints/waypoints.min83b6.js?ver=4.6.2'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>css/university/js/bootstrap.min5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>css/university/js/owl-carousel/owl.carousel.min5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/comment-reply.min5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>css/university/js/SmoothScroll5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>css/university/js/cactus-themes5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/u-event/js/custom5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/divi-builder/framework/scripts/jquery.fitvids5152.js?ver=1.0'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/divi-builder/framework/scripts/jquery.magnific-popup5152.js?ver=1.0'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/divi-builder/framework/scripts/frontend-builder-scripts5152.js?ver=1.0'></script>
    <script src="js/jquery/jqueryc1d8.js" type="text/javascript"></script>
    <?php if(!empty($msg)) {  $swalTitle = 'Message Sent!'; if($msgStatus!='success'){ $swalTitle = 'Message Not Sent!';}     ?>
    <script src="<?php echo SITE_URL; ?>sweet-alert/sweetalert.min.js" type="text/javascript"></script>
    <script>
        swal({
            title: '<?php echo $swalTitle; ?>',
            text: '<?php echo $msg; ?>',
            confirmButtonText: "Okay",
            customClass: 'facebook',
            html: true,
            type: '<?php echo $msgStatus; ?>'
        });
    </script>
    <?php  $msg =''; $msgStatus ='';  } ?>
    <script src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(e) {
            jQuery(".book-now, #book-now").click(function() {
                $("#facebox").overlay().load();
            });
            // select the overlay element - and "make it an overlay"
            $("#facebox").overlay({
                top: 150,// custom top position
                mask: {// some mask tweaks suitable for facebox-looking dialogs
                color: '#fff',// you might also consider a "transparent" color for the mask
                loadSpeed: 200,// load mask a little faster
                opacity: 0.5 // very transparent
                },
                closeOnClick: true,// disable this for modal dialog-type of overlays
                load: false // load it immediately after the construction
            });
        });	
    </script>
</body>
</html>
