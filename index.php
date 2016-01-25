<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "home");
require('classes/WebPage.php'); //Set up page as a web page
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;
$courseObj = new Course($dbObj);
$categoryObj = new CourseCategory($dbObj);
$quoteObj = new Quote($dbObj);

include('includes/other-settings.php');
require('includes/page-properties.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <?php include ('includes/meta-tags.php'); ?>
    <script type="text/javascript">  window._wpemojiSettings = {"baseUrl":"http:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"<?php echo SITE_URL; ?>\/js\/wp-emoji-release.min.js?ver=4.3.1"}}; !function(a,b,c){function d(a){var c=b.createElement("canvas"),d=c.getContext&&c.getContext("2d");return d&&d.fillText?(d.textBaseline="top",d.font="600 32px Arial","flag"===a?(d.fillText(String.fromCharCode(55356,56812,55356,56807),0,0),c.toDataURL().length>3e3):(d.fillText(String.fromCharCode(55357,56835),0,0),0!==d.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);</script>
    <style type="text/css"> img.wp-smiley, img.emoji { display: inline !important; border: none !important; box-shadow: none !important; height: 1em !important; width: 1em !important; margin: 0 .07em !important; vertical-align: -0.1em !important; background: none !important; padding: 0 !important; } </style>
    <link rel='stylesheet' id='rs-plugin-settings-css'  href='plugins/revslider/public/assets/css/settings5bca.css?ver=5.0.4.1' type='text/css' media='all' />
    <style id='rs-plugin-settings-inline-css' type='text/css'> .tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}</style>
    <link rel='stylesheet' id='wp-pagenavi-css'  href='plugins/wp-pagenavi/pagenavi-css44fd.css?ver=2.70' type='text/css' media='all' />
    <link rel='stylesheet' id='google-font-css'  href='http://fonts.googleapis.com/css7405.css?family=Roboto%3A400%2C300%2C500%2C400italic%2C700%2C500italic%2FScript%3Alatin-ext%7CBitter&amp;ver=4.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css'  href='css/university/css/bootstrap.min5b31.css?ver=4.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-css'  href='plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min83b6.css?ver=4.6.2' type='text/css' media='screen' />
    <link rel='stylesheet' id='owl-carousel-css'  href='css/university/js/owl-carousel/owl.carousel5b31.css?ver=4.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='owl-carousel-theme-css'  href='css/university/js/owl-carousel/owl.theme5b31.css?ver=4.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='style-css'  href='css/university/style5b31.css?ver=4.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='js_composer_front-css'  href='plugins/js_composer/assets/css/js_composer83b6.css?ver=4.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='et-builder-modules-style-css'  href='plugins/divi-builder/framework/styles/frontend-builder-plugin-style5152.css?ver=1.0' type='text/css' media='all' />
    <link rel='stylesheet' id='magnific-popup-css'  href='plugins/divi-builder/framework/styles/magnific_popup5152.css?ver=1.0' type='text/css' media='all' />
    <script type='text/javascript' src='js/jquery/jqueryc1d8.js?ver=1.11.3'></script>
    <script type='text/javascript' src='plugins/revslider/public/assets/js/jquery.themepunch.tools.min5bca.js?ver=5.0.4.1'></script>
    <script type='text/javascript' src='plugins/revslider/public/assets/js/jquery.themepunch.revolution.min5bca.js?ver=5.0.4.1'></script>
    <link href="css/additional-style.css" rel="stylesheet" type="text/css"/>
    <style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1446382855269{margin-bottom: 0px !important;padding-top: 60px !important;padding-bottom: 40px !important;background-image: url(uploads/2014/07/sectn-background-e1446382780520f91d.jpg?id=2946) !important;}.vc_custom_1446646772748{padding-top: 100px !important;padding-bottom: 60px !important;background-image: url() !important;background-position: center;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1405672977211{padding-bottom: 20px !important;}.vc_custom_1406879121968{margin-bottom: 0px !important;background-color: #eaeaea !important;}.vc_custom_1446471785681{padding-bottom: -20px !important;}.vc_custom_1406883081686{padding-bottom: 60px !important;}</style>
    <noscript><style> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
</head>

<body class="home page page-id-989 page-template page-template-page-templates page-template-front-page page-template-page-templatesfront-page-php full-width template-front-page custom-background-empty single-author wpb-js-composer js-comp-ver-4.6.2 vc_responsive et_divi_builder">
    <a name="top" style="height:0; position:absolute; top:0;" id="top-anchor"></a>
    <div id="pageloader" class="dark-div" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:99999; background:#015391;">   
        <div class="spinner"> <div class="cube1"></div> <div class="cube2"></div></div>
    </div>
    <div id="body-wrap">
        <div id="wrap">
            <header>
                <?php include('includes/header.php'); ?>		
                <?php include('includes/homepage-slider.php'); ?>
                <style type="text/css" scoped="scoped"> #slider{ height:500px; } </style>
            </header>	
            <?php include('includes/sidebar-top.php'); ?>
            <div id="body" >
                <div class="row">
                    <div id="content" class="col-md-12" role="main">
                        <article class="single-page-content">
                            <div class="u_row u_full_row u_paralax">
                                <div class="container">
                                    <div data-vc-parallax="1.5" class="vc_row wpb_row vc_row-fluid vc_custom_1446382855269 vc_general vc_parallax vc_parallax-content-moving">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element  vc_custom_1446471785681 wpb_animate_when_almost_visible wpb_left-to-right">
                                                    <div class="wpb_wrapper">
                                                        <h1 style="text-align: center;">Upcoming Training Courses</h1>
                                                        <h4 style="text-align: center;">Our solutions and training help clients improve performance and delivers excellent business result.</h4>
                                                    </div> 
                                                </div>     	
                                                <section class="un-post-carousel un-post-carousel-1429 wpb_bottom-to-top wpb_animate_when_almost_visible" data-delay=1.0>
                                                    <div class="section-inner">
                                                        <div class="post-carousel-wrap">
                                                            <div class="is-carousel carousel-has-control " data-items=4 data-navigation=1>
                                                                <?php 
                                                                foreach($courseObj->fetchRaw("*", "status=1 AND featured = 1 ", " RAND() LIMIT 10")as $course) { 
                                                                    $dateParam = explode('-', $course['start_date']);
                                                                    $dateObj   = DateTime::createFromFormat('!m', $dateParam[1]);
                                                                ?>
                                                                <div class="post-carousel-item grid-item">
                                                                    <div class="grid-item-inner">
                                                                        <div class="grid-item-content event-item dark-div">
                                                                            <div class="event-thumbnail">
                                                                                <a href="course/<?php echo $course['id']."/".StringManipulator::slugify($course['name']); ?>/" title="<?php echo $course['name']; ?>">
                                                                                <img src="<?php echo MEDIA_FILES_PATH1.'course-image/'.$course['image'] ?>" width="554" height="674" title="<?php echo $course['name']; ?>" alt="<?php echo $course['name']; ?>">
                                                                                </a>
                                                                            </div>
                                                                            <div class="date-block ">
                                                                                <div class="month"><?php echo substr($dateObj->format('F'), 0, 3); ?></div>
                                                                                <div class="day"><?php echo $dateParam[2]; ?></div>
                                                                                <div class="year"><?php echo $dateParam[0]; ?></div>
                                                                            </div>
                                                                            <div class="event-overlay">
                                                                                <a class="overlay-top" href="course/<?php echo $course['id']."/".StringManipulator::slugify($course['name']); ?>/" title="<?php echo $course['name']; ?>">
                                                                                <h4><?php echo $course['name']; ?></h4>
                                                                                <span class="price yellow"> <span class="naira">N</span><?php echo number_format($course['amount'], 2); ?></span>
                                                                                </a>
                                                                                <div class="overlay-bottom">
                                                                                    <div><?php echo StringManipulator::trimStringToFullWord(250, trim(stripcslashes(strip_tags($course['description'])))); ?></div>
                                                                                </div>
                                                                            </div>
                                                                        </div><!--/event-item-->
                                                                    </div>
                                                                </div><!--/post-carousel-item-->
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div><!--/section-inner-->
                                                </section><!--/u-post-carousel-->
                                            </div>
                                        </div>
                                    </div>    	        	
                                </div>
                            </div><!--/u_row-->
                            <div class="u_row u_full_row dark-div u_paralax">
                                <div class="container">
                                    <div data-vc-parallax="1.5" data-vc-parallax-image="<?php echo SITE_URL; ?>uploads/2015/10/university-background-04-e1446464946637.jpg" class="vc_row wpb_row vc_row-fluid vc_custom_1446646772748 vc_general vc_parallax vc_parallax-content-moving">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="wpb_wrapper">
                                                <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1406883081686">
                                                    <?php 
                                                    $siteWidgetParams = array('_ICON', '_HEADER', '_TEXT', '_LINK');
                                                    $siteWidgetItems = array('HOMEPAGE_WHO_WE_ARE','HOMEPAGE_CORE_SOLUTION','HOMEPAGE_COURSE_CATEGORIES','HOMEPAGE_DOWNLOAD_BROCHURE');
                                                    foreach($siteWidgetItems as $siteWidgetItem){
                                                    ?>
                                                    <div class="wpb_column vc_column_container vc_col-sm-3">
                                                        <div class="wpb_wrapper">    	
                                                            <div id="un-icon-box-1" class="media un-icon-box dark dark-div wpb_left-to-right wpb_animate_when_almost_visible" data-delay=0.25>
                                                                <div class="text-center">
                                                                <div class="un-icon">
                                                                    <i class="fa fa-<?php echo Setting::getValue($dbObj, $siteWidgetItem.$siteWidgetParams[0]) ? trim(stripcslashes(strip_tags(Setting::getValue($dbObj, $siteWidgetItem.$siteWidgetParams[0])))) : ''; ?>"></i>
                                                                </div>
                                                                </div>
                                                                <div class="media-body text-center">
                                                                    <?php if($siteWidgetItem == 'HOMEPAGE_DOWNLOAD_BROCHURE'){ ?>
                                                                    <h4 class="media-heading"><a href="<?php echo MEDIA_FILES_PATH1.'brochure/'.CourseBrochure::getCurrent($dbObj); ?>" ><?php echo Setting::getValue($dbObj, $siteWidgetItem.$siteWidgetParams[1]) ? trim(stripcslashes(strip_tags(Setting::getValue($dbObj, $siteWidgetItem.$siteWidgetParams[1])))) : ''; ?></a></h4>
                                                                    <?php } else { ?>
                                                                    <h4 class="media-heading"><a href="<?php echo Setting::getValue($dbObj, $siteWidgetItem.$siteWidgetParams[3]) ? trim(stripcslashes(strip_tags(Setting::getValue($dbObj, $siteWidgetItem.$siteWidgetParams[3])))) : ''; ?>" ><?php echo Setting::getValue($dbObj, $siteWidgetItem.$siteWidgetParams[1]) ? trim(stripcslashes(strip_tags(Setting::getValue($dbObj, $siteWidgetItem.$siteWidgetParams[1])))) : ''; ?></a></h4>
                                                                    <?php } ?>
                                                                    <p><?php echo Setting::getValue($dbObj, $siteWidgetItem.$siteWidgetParams[2]) ? trim(stripcslashes(strip_tags(Setting::getValue($dbObj, $siteWidgetItem.$siteWidgetParams[2])))) : ''; ?></p>            
                                                                </div>
                                                            </div>
                                                            <style scoped="scoped"> #un-icon-box-1 .un-icon{ background: #ffffff}#un-icon-box-1 .un-icon:hover{ background: #f71111}#un-icon-box-1 .media-heading{ color: #dddddd}#un-icon-box-1 .media-body p{ color: #f4f4f4}        </style>
                                                                
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    	        	
                                </div>
                            </div><!--/u_row-->
                            <div class="u_row u_full_row">
                                <div class="container">
                                    <div class="vc_row wpb_row vc_row-fluid vc_custom_1405672977211">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="wpb_wrapper">    	
                                                <section class="un-post-listing shortcode-blog-9589 wpb_bottom-to-top wpb_animate_when_almost_visible" data-delay=0>
                                                    <div class="section-inner">
                                                        <div class="section-header">
                                                            <h1 class="pull-left main-color-2">Course Categories</h1>                                        
                                                            <a class="btn btn-default btn-lighter pull-right" href="course-categories" style="color:black;">VIEW ALL<i class="fa fa-angle-right"></i></a>
                                                            <div class="clearfix"></div>
                                                        </div><!--/section-header-->
                                                        <div class="section-body">
                                                            <div class="row">
                                                                <?php 
                                                                foreach($categoryObj->fetchRaw("*", " 1=1 ", " RAND() LIMIT 4 ")as $category) { 
                                                                ?>
                                                                <div class="col-md-6 col-sm-6 col-xs-12 shortcode-blog-item">
                                                                    <div class="content-pad">
                                                                        <div class="post-item row">
                                                                            <div class="col-md-6 col-sm-12">
                                                                                <div class="content-pad">
                                                                                    <div class="item-thumbnail">
                                                                                    <a href="courses/" title="<?php echo $category['name']; ?>">
                                                                                        <img src="<?php echo MEDIA_FILES_PATH1.'category/'.$category['image']; ?>" width="500" height="500" title="<?php echo $category['name']; ?>" alt="<?php echo $category['name']; ?>">
                                                                                        <span class="thumbnail-overlay"><?php echo Course::getSingleCategoryCount($dbObj, $category['id']); ?> Course(s) in <?php echo $category['name']; ?></span>
                                                                                    </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-12">
                                                                                <div class="content-pad">
                                                                                    <div class="item-content">
                                                                                        <h3 class="item-title"><a href="<?php echo SITE_URL; ?>category/<?php echo $category['id']."/".StringManipulator::slugify($category['name']); ?>/" title="<?php echo $category['name']; ?>" class="main-color-1-hover"><?php echo $category['name']; ?></a></h3>
                                                                                        <div class="shortcode-blog-excerpt"><?php echo StringManipulator::trimStringToFullWord(250, trim(stripcslashes(strip_tags($category['description'])))); ?></div>
                                                                                        <div class="item-meta">
                                                                                            <a class="btn btn-default btn-lighter" href="<?php echo SITE_URL; ?>category/<?php echo $category['id']."/".StringManipulator::slugify($category['name']); ?>/" title="<?php echo $category['name']; ?>">DETAILS <i class="fa fa-angle-right"></i></a>
                                                                                            <a href="category?id=<?php echo $category['id']; ?>" class="main-color-1-hover" title="View comments"></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div><!--/post-item-->
                                                                    </div>
                                                                </div><!--/shortcode-blog-item-->
                                                                <?php } ?>
                                                            </div><!--/row-->
                                                        </div><!--/section-body-->
                                                    </div>
                                                </section><!--/un-blog-listing-->
                                            </div>
                                        </div>
                                    </div>    	        	
                                </div>
                            </div><!--/u_row-->
                            <div class="u_row u_full_row">
                                <div class="container">
                                    <div class="vc_row wpb_row vc_row-fluid vc_custom_1406879121968">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="wpb_wrapper">		
                                                <section class="testimonials testimonials-5419 wpb_top-to-bottom wpb_animate_when_almost_visible" data-delay=0>
                                                    <div class="section-inner">
                                                        <h3 class="text-center">QUOTES</h3>
                                                        <div class="testimonial-carousel owl-carousel is-carousel single-carousel"  >
                                                            
                                                            <?php foreach($quoteObj->fetchRaw("*", " 1=1 ", " RAND() LIMIT 10") as $quote) { ?>
                                                            <div class="carousel-item testimonial-item-4632">
                                                                <div class="testimonial-item text-center">
                                                                    <p class="minion"><br /> <?php echo $quote['content']; ?></p>
                                                                    <div class="media professor">
                                                                        <div class="pull-left">
                                                                        <img src="<?php echo MEDIA_FILES_PATH1.'quote/'.$quote['image']; ?>" width="50" height="50" alt="<?php echo $quote['author']; ?>">
                                                                        </div>
                                                                        <div class="media-body">
                                                                        <h6 class="media-heading main-color-2"><?php echo $quote['author']; ?></h6>
                                                                        <span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!--/carousel-item-->
                                                            <?php } ?>
                                                        </div>
                                                        
                                                    </div>
                                                </section><!--/testimonial-->
                                            </div>
                                        </div>
                                    </div>    	        	
                                </div>
                            </div><!--/u_row-->
                        </p>
                        </article>
                    </div><!--/content-->
                </div><!--/row-->
            </div><!--/body-->
            <?php include('includes/sidebar-bottom.php'); ?>
            <?php include('includes/footer.php'); ?>
        </div><!--wrap-->
    </div>
    <!--/body-wrap-->
    <?php include('includes/mobile-menu.php'); ?>

    <script type='text/javascript' src='plugins/u-shortcodes/shortcodes/calendar-js/format-datetime-master/jquery.formatDateTime.min5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='plugins/u-shortcodes/shortcodes/calendar-js/underscore/underscore-min5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='js/jquery/jquery-migrate.min1576.js?ver=1.2.1'></script>
    <script type='text/javascript' src='plugins/divi-builder/framework/scripts/frontend-builder-global-functions5152.js?ver=1.0'></script>
    <script type='text/javascript' src='plugins/js_composer/assets/lib/waypoints/waypoints.min83b6.js?ver=4.6.2'></script>
    <script type='text/javascript' src='css/university/js/bootstrap.min5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='css/university/js/owl-carousel/owl.carousel.min5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='js/comment-reply.min5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='css/university/js/SmoothScroll5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='css/university/js/cactus-themes5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='plugins/u-event/js/custom5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='plugins/divi-builder/framework/scripts/jquery.fitvids5152.js?ver=1.0'></script>
    <script type='text/javascript' src='plugins/divi-builder/framework/scripts/jquery.magnific-popup5152.js?ver=1.0'></script>
    <script type='text/javascript' src='plugins/divi-builder/framework/scripts/frontend-builder-scripts5152.js?ver=1.0'></script>
    <script type='text/javascript' src='plugins/js_composer/assets/js/js_composer_front83b6.js?ver=4.6.2'></script>
    <script type='text/javascript' src='plugins/js_composer/assets/lib/bower/skrollr/dist/skrollr.min83b6.js?ver=4.6.2'></script>
</body>
</html>