<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "contact-us");
require('classes/WebPage.php'); //Set up page as a web page
require 'swiftmailer/lib/swift_required.php';
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;
$courseObj = new Course($dbObj);
$categoryObj = new CourseCategory($dbObj);
$quoteObj = new Quote($dbObj);
$errorArr = array(); //Array of errors
$msg = ''; $msgStatus = '';

include('includes/other-settings.php');
require('includes/page-properties.php');
if(isset($_POST['submit'])){
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) :  ''; 
    if($email == "") {array_push ($errorArr, "valid email ");}
    $name = filter_input(INPUT_POST, 'name') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'name')) :  ''; 
    if($name == "") {array_push ($errorArr, " name ");}
    $body = filter_input(INPUT_POST, 'message') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'message')) :  ''; 
    if($body == "") {array_push ($errorArr, " message ");}
    $subject = filter_input(INPUT_POST, 'subject') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'subject')) :  ''; 

    if(count($errorArr) < 1)   {
        $emailAddress = COMPANY_EMAIL;//iadet910@iadet.net
        if(empty($subject)) $subject = "Message From: $name";	
        $transport = Swift_MailTransport::newInstance();
        $message = Swift_Message::newInstance();
        $message->setTo(array($emailAddress => "TSI Limited Admin"));
        $message->setSubject($subject);
        $message->setBody($body);
        $message->setFrom($email, "Website Guest");
        $message->setContentType("text/html");
        $mailer = Swift_Mailer::newInstance($transport);
        $mailer->send($message);
        $msgStatus = 'success';
        $msg = $thisPage->messageBox('Your message has been sent.', $msgStatus);
    }else{ $msgStatus = 'error'; $msg = $thisPage->showError($errorArr); }
}
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
    <noscript><style> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
    <link href="<?php echo SITE_URL; ?>sweet-alert/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_URL; ?>sweet-alert/facebook.css" rel="stylesheet" type="text/css"/>
</head>
<body class="page page-id-15 page-template-default full-width custom-background-empty single-author wpb-js-composer js-comp-ver-4.6.2 vc_responsive et_divi_builder">
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
                            <h1><?php echo stripslashes(strip_tags(WebPage::getSingleByName($dbObj, 'title', CURRENT_PAGE))); ?></h1>
                        </div>
                        <div class="pathway col-md-4 col-sm-4 hidden-xs text-right">
                            <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
                                <a href="<?php echo SITE_URL; ?>index" rel="v:url" property="v:title">Home</a> \ 
                                <span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="#"><?php echo stripslashes(strip_tags(WebPage::getSingleByName($dbObj, 'title', CURRENT_PAGE))); ?></a></span>
                            </div><!-- .breadcrumbs -->                
                        </div>
                    </div><!--/row-->
                </div><!--/container-->
            </div>
            <!--/page-heading-->

            <?php include('includes/sidebar-top.php'); ?>
            <!--/Top sidebar-->    
            <div id="body" >
                <div class="container">
                    <div class="content-pad-3x">
                        <div class="row">
                            <div class="row">
                                <div id="content" class="col-md-12" role="main">
                                    
                                    <article class="single-page-content">
                                            <div class="et_builder_outer_content" id="et_builder_outer_content">
                                            <div class="et_builder_inner_content et_pb_gutters3">
                                                    <div class="et_pb_section et_pb_fullwidth_section  et_pb_section_0 et_section_regular et_section_transparent">



                                                    <div class="et_pb_module et_pb_map_container  et_pb_fullwidth_map_0">
                                            <div class="et_pb_map" data-center-lat="6.451397100000019" data-center-lng="3.3963982000000215" data-zoom="16" data-mouse-wheel="on"></div>

            <div class="et_pb_map_pin" data-lat="6.451397099999999" data-lng="3.3963982000000215" data-title="">
                                            <div class="infowindow"> </div>
                                    </div>

                                    </div>

                                    </div> <!-- .et_pb_section --><div class="et_pb_section  et_pb_section_1 et_section_regular et_section_transparent">



                                                    <div class=" et_pb_row et_pb_row_0">

                                            <div class="et_pb_column et_pb_column_1_2 et_pb_column_0">

                                    <div id="et_pb_contact_form_0" class="et_pb_module et_pb_contact_form_container clearfix  et_pb_contact_form_0">
                                            <h1 class="et_pb_contact_main_title">Do you have any question?</h1>
                                            <div class="et_pb_contact">
                                                <form class=" clearfix" method="post" action="<?php echo SITE_URL; ?>contact-us/">
                                                    <div class="et_pb_contact_left">
                                                        <p class="clearfix">
                                                                <label for="name" class="et_pb_contact_form_label">Name</label>
                                                                <input type="text" id="name" class="input et_pb_contact_name" value="" placeholder="Name" name="name" required="required"/>
                                                        </p>
                                                        <p class="clearfix">
                                                                <label for="email" class="et_pb_contact_form_label">Email Address</label>
                                                                <input type="email" id="email" class="input et_pb_contact_email" value="" placeholder="Email Address" name="email" required="required"/>
                                                        </p>
                                                    </div> <!-- .et_pb_contact_left -->
                                                            <div class="clear"></div>
                                                            <p class="clearfix">
                                                                    <label for="message" class="et_pb_contact_form_label">Message</label>
                                                                    <textarea name="message" id="message" class="et_pb_contact_message input" placeholder="Message" required="required"></textarea>
                                                            </p>
                                                            <button type="submit" class="et_pb_contact_submit et_pb_button" name="submit">Submit</button>
                                                    </form>
                                            </div> <!-- .et_pb_contact -->
                                    </div> <!-- .et_pb_contact_form_container -->

                                    </div> <!-- .et_pb_column --><div class="et_pb_column et_pb_column_1_2 et_pb_column_1">
                                            <div class="et_pb_blurb et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_blurb_0 et_pb_blurb_position_left">
                                            <div class="et_pb_blurb_content">
                                                    <div class="et_pb_main_blurb_image"><span class="et-pb-icon et-waypoint et_pb_animation_left" style="color: #7EBEC5;">&#xe01e;</span></div>
                                                    <div class="et_pb_blurb_container">
                                                        <h4><i class="fa fa-home"></i> Office Address</h4>
                                                        <p><?php echo COMPANY_ADDRESS; ?></p>
                                                    </div>
                                            </div> <!-- .et_pb_blurb_content -->
                                    </div> <!-- .et_pb_blurb --><div class="et_pb_blurb et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_blurb_1 et_pb_blurb_position_left">
                                            <div class="et_pb_blurb_content">
                                                    <div class="et_pb_main_blurb_image"><span class="et-pb-icon et-waypoint et_pb_animation_left" style="color: #7EBEC5;">&#xe090;</span></div>
                                                    <div class="et_pb_blurb_container">
                                                            <h4><i class="fa fa-phone"></i> Tel</h4>
                                                            <p><?php echo COMPANY_NUMBERS; ?></p>
                                                    </div>
                                            </div> <!-- .et_pb_blurb_content -->
                                    </div> <!-- .et_pb_blurb --><div class="et_pb_blurb et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_blurb_2 et_pb_blurb_position_left">
                                            <div class="et_pb_blurb_content">
                                                    <div class="et_pb_main_blurb_image"><span class="et-pb-icon et-waypoint et_pb_animation_left" style="color: #7EBEC5;">&#xe076;</span></div>
                                                    <div class="et_pb_blurb_container">
                                                            <h4><i class="fa fa-envelope"></i> Email Address</h4>
                                                            <p><?php echo COMPANY_OTHER_EMAILS; ?></p>
                                                    </div>
                                            </div> <!-- .et_pb_blurb_content -->
                                    </div> <!-- .et_pb_blurb -->
                                    </div> <!-- .et_pb_column -->

                                    </div> <!-- .et_pb_row -->

                                    </div> <!-- .et_pb_section -->

                                            </div>
                                    </div>                        </article>
                                </div><!--/content-->
                                    </div><!--/row-->
                        </div><!--/row-->
                    </div><!--/content-pad-3x-->
                </div><!--/container-->
            </div><!--/body-->
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
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/bootstrap.min.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/owl-carousel/owl.carousel.min.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/SmoothScroll.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/cactus-themes.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/apps/divi-builder/framework/scripts/jquery.fitvids.js?ver=1.0'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/divi-builder/framework/scripts/jquery.magnific-popup.js?ver=1.0'></script>
    <script type='text/javascript'>
    /* <![CDATA[ */
    var et_custom = {};
    /* ]]> */
    </script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/divi-builder/framework/scripts/frontend-builder-scripts5152.js?ver=1.0'></script>
    <script type='text/javascript' src='http://maps.google.com/maps/api/js?v=3&#038;ver=1.0#038;sensor=false'></script>
    <script src="<?php echo SITE_URL; ?>js/jquery/jquery-migrate.min1576.js" type="text/javascript"></script>
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
</body>
</html>
