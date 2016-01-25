<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "partners");
require('classes/WebPage.php'); //Set up page as a web page
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;
$courseObj = new Course($dbObj);
$categoryObj = new CourseCategory($dbObj);
$quoteObj = new Quote($dbObj);
$partnerObj = new Sponsor($dbObj);

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
                            <div id="content" class="col-md-12">
                                <div class="project-listing">
                                    <div class="row">
                                        <?php 
                                        foreach ($partnerObj->fetchRaw("*", " status = 1 ", " RAND() ") as $partner) {
                                            $partnerData = array('id' => 'id', 'name' => 'name', 'logo' => 'logo', 'product' => 'product', 'website' => 'website', 'image' => 'image', 'dateAdded' => 'date_added', 'description' => 'description');
                                            foreach ($partnerData as $key => $value){
                                                switch ($key) { 
                                                    case 'logo': $partnerObj->$key = MEDIA_FILES_PATH1.'sponsor/'.$partner[$value];break;
                                                    case 'image': $partnerObj->$key = MEDIA_FILES_PATH1.'sponsor-image/'.$partner[$value];break;
                                                    default     :   $partnerObj->$key = $partner[$value]; break; 
                                                }
                                            }
                                        ?>
                                        <div class="col-md-3">
                                            <div class="project-item main-color-1-bg-hover project-item-1600">
                                                    <div class="item-thumbnail dark-div">
                                                        <a href="<?php echo $partnerObj->website; ?>" target="_blank" title="<?php echo $partnerObj->name; ?>">
                                                            <img src="<?php echo $partnerObj->image; ?>" style="max-height:258px;max-width:409px"  width="409" height="258" title="<?php echo $partnerObj->product; ?>" alt="<?php echo $partnerObj->product; ?>">
                                                        </a>
                                                    <div class='thumbnail-hoverlay main-color-1-bg'></div>
                                                    <div class='thumbnail-hoverlay-icon'>
                                                        
                                                        <a href="<?php echo $partnerObj->website; ?>" target="_blank" title="<?php echo $partnerObj->name; ?>"><i class="fa fa-link"></i></a>
                                                    </div>
                                                </div><!--item-thumbnail-->
                                                <div class="project-item-content text-center">
                                                    <div class="project-item-title">
                                                            <div class="project-item-title-inner">
                                                            
                                                            <h4 class="item-title"><img src="<?php echo $partnerObj->logo; ?>" width="40" height="40" style="height:40px;width:40px" title="<?php echo $partnerObj->product; ?>" alt="<?php echo $partnerObj->product; ?>"> <a href="<?php echo $partnerObj->website; ?>" title="<?php echo $partnerObj->name; ?>"><?php echo $partnerObj->name; ?></a></h4>
                                                            <div class="project-item-tax small-text">
                                                                <strong>PRODUCT: </strong> <a href="<?php echo $partnerObj->website; ?>" target="_blank" class="cat-link"><?php echo $partnerObj->product; ?></a><br/>
                                                                
                                                                <strong class="fa fa-globe"></strong> <a target="_blank" href="<?php echo $partnerObj->website; ?>" class="cat-link"><?php echo $partnerObj->website; ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="project-item-excerpt">
                                                            <div class="exerpt-text"><?php echo $partnerObj->description; ?></div>
                                                    </div>
                                                </div><!--item-content-->
                                            </div>
                                        </div><!--col-md-3-->
                                        <?php } ?>
                                    </div>
                                </div>
                            </div><!--/content-->
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
    <script type='text/javascript' src='<?php echo SITE_URL;  ?>js/bootstrap.min.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL;  ?>js/owl-carousel/owl.carousel.min.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL;  ?>js/comment-reply.min.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL;  ?>js/SmoothScroll.js?ver=4.3.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL;  ?>js/cactus-themes.js?ver=4.3.1'></script>
    <script src="<?php echo SITE_URL;  ?>plugins/divi-builder/framework/scripts/jquery.fitvids.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL;  ?>plugins/divi-builder/framework/scripts/jquery.magnific-popup.js" type="text/javascript"></script>
    <script type='text/javascript'>
    /* <![CDATA[ */
    var et_custom = {};
    /* ]]> */
    </script>
    <script src="<?php echo SITE_URL;  ?>plugins/divi-builder/framework/scripts/frontend-builder-scripts5152.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL;  ?>plugins/divi-builder/framework/scripts/jquery.hashchange5152.js" type="text/javascript"></script>
</body>
</html>
