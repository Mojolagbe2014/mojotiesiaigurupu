<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "course-categories");
require('classes/WebPage.php'); //Set up page as a web page
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;
$courseObj = new Course($dbObj);
$categoryObj = new CourseCategory($dbObj);
$eventObj = new Event($dbObj);
$quoteObj = new Quote($dbObj);

include('includes/other-settings.php');
require('includes/page-properties.php');
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
</head>
<body class="page page-id-17 page-template-default full-width custom-background-empty single-author wpb-js-composer js-comp-ver-4.6.2 vc_responsive et_divi_builder">
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
                                <a href="<?php echo SITE_URL; ?>" rel="v:url" property="v:title">Home</a> \ 
                                <span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="#"><?php echo stripslashes(strip_tags(WebPage::getSingleByName($dbObj, 'title', CURRENT_PAGE))); ?></a></span>
                            </div><!-- .breadcrumbs -->                
                        </div>
                    </div><!--/row-->
                </div><!--/container-->
            </div>

            <?php include('includes/sidebar-top.php'); ?>           
            <!--/Top sidebar-->    
            <div id="body" >
    	    	<div class="container">
                    <div class="content-pad-3x">
                        <div class="row">
                            <div id="content" class="col-md-9" role="main">
                                <article class="single-page-content">
                                    <?php 
                                    foreach($categoryObj->fetchRaw("*", " 1=1 ", " RAND() ")as $category) { 
                                    ?>
                                    <div class="u_row">
                                        <div class="vc_row wpb_row vc_row-fluid">
                                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                                <div class="wpb_wrapper">    
                                                    <div class="un-heading un-heading-heading_7527 wpb_left-to-right wpb_animate_when_almost_visible" data-delay=0>
                                                        <div class="un-heading-wrap">
                                                            <span class="un-heading-line un-heading-before"><span></span></span>
                                                            <span class='btn btn-default btn-lg btn-lighter un-heading-content' style="color:#000">
                                                                <a href="<?php echo SITE_URL.'category/'.$category['id'].'/'.StringManipulator::slugify($category['name']); ?>/"><?php echo $category['name']; ?></a>
                                                            </span>
                                                            <span class="un-heading-line un-heading-after"><span></span></span>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                    
                                                    <section class="un-post-carousel un-post-carousel-6327 " data-delay=0>
                                                        <div class="section-inner">
                                                            <div class="post-carousel-wrap">
                                                                <div class="is-carousel carousel-has-control " data-items=4 data-navigation=1>
                                                                    <?php 
                                                                    foreach($courseObj->fetchRaw("*", "status=1 AND category=".$category['id'], " RAND() ")as $course) { 
                                                                        $dateParam = explode('-', $course['start_date']);
                                                                        $dateObj   = DateTime::createFromFormat('!m', $dateParam[1]);
                                                                    ?>
                                                                    <div class="post-carousel-item grid-item">
                                                                        <div class="grid-item-inner">
                                                                            <div class="grid-item-content event-item dark-div">
                                                                                <div class="event-thumbnail">
                                                                                    <a href="<?php echo SITE_URL; ?>course/<?php echo $course['id']."/".StringManipulator::slugify($course['name']); ?>/" title="<?php echo $course['name']; ?>">
                                                                                    <img src="<?php echo MEDIA_FILES_PATH1.'course-image/'.$course['image'] ?>" width="554" height="674" title="<?php echo $course['name']; ?>" alt="<?php echo $course['name']; ?>">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="date-block ">
                                                                                    <div class="month"><?php echo substr($dateObj->format('F'), 0, 3); ?></div>
                                                                                    <div class="day"><?php echo $dateParam[2]; ?></div>
                                                                                    <div class="year"><?php echo $dateParam[0]; ?></div>
                                                                                </div>
                                                                                <div class="event-overlay">
                                                                                    <a class="overlay-top" href="<?php echo SITE_URL; ?>course/<?php echo $course['id']."/".StringManipulator::slugify($course['name']); ?>/" title="<?php echo $course['name']; ?>">
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
                                    </div><!--/u_row-->
                                    <?php } ?>
                                </article>
                            </div><!--/content-->
                            <?php include('includes/sidebar.php'); ?> <!--#sidebar-->
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
    <script type='text/javascript' src='<?php echo SITE_URL; ?>css/university/js/cactus-themes5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/u-event/js/custom5b31.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/divi-builder/framework/scripts/jquery.fitvids5152.js?ver=1.0'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/divi-builder/framework/scripts/jquery.magnific-popup5152.js?ver=1.0'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/divi-builder/framework/scripts/frontend-builder-scripts5152.js?ver=1.0'></script>
</body>
</html>