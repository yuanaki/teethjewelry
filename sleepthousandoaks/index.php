<?php
defined('_JEXEC') or die;

/**
 * Template for Joomla! CMS, created with Artisteer.
 * See readme.txt for more details on how to use the template.
 */

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions.php';

// Create alias for $this object reference:
$document = $this;

// Shortcut for template base url:
$templateUrl = $document->baseurl . '/templates/' . $document->template;

Artx::load("Artx_Page");

// Initialize $view:
$view = $this->artx = new ArtxPage($this);

// Decorate component with Artisteer style:
$view->componentWrapper();

JHtml::_('behavior.framework', true);

?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo $document->language; ?>">
<head>
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/system.css" />
    <link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/general.css" />

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.css" media="screen" type="text/css" />
    <!--[if lte IE 7]><link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.ie7.css" media="screen" /><![endif]-->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin" />

    <script>if ('undefined' != typeof jQuery) document._artxJQueryBackup = jQuery;</script>
    <script src="<?php echo $templateUrl; ?>/jquery.js"></script>
    <script>jQuery.noConflict();</script>

    <script src="<?php echo $templateUrl; ?>/script.js"></script>
    <script src="<?php echo $templateUrl; ?>/modules.js"></script>
    <?php $view->includeInlineScripts() ?>
    <script>if (document._artxJQueryBackup) jQuery = document._artxJQueryBackup;</script>
    
    <script src="<?php echo $templateUrl; ?>/js/jquery-1.11.0.min.js"></script>
  <link rel="stylesheet" href="<?php echo $templateUrl; ?>/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $templateUrl; ?>/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
  <script><script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script></script>
  </head>
<body>

<div id="art-main">
<header class="art-header"><?php echo $view->position('header', 'art-nostyle'); ?>

    <div class="art-shapes">
        
            </div>






                
                    
</header>
<?php if ($view->containsModules('user3', 'extra1', 'extra2')) : ?>
<nav class="art-nav">
    <div class="art-nav-inner">
    
<?php if ($view->containsModules('extra1')) : ?>
<div class="art-hmenu-extra1"><?php echo $view->position('extra1'); ?></div>
<?php endif; ?>
<?php if ($view->containsModules('extra2')) : ?>
<div class="art-hmenu-extra2"><?php echo $view->position('extra2'); ?></div>
<?php endif; ?>
<?php echo $view->position('user3'); ?>
 
        </div>
    </nav>
<?php endif; ?>

<?php if ($view->containsModules('home-banner')) : ?>
<div class="home-banner"><?php echo $view->position('home-banner'); ?></div>
<?php endif; ?>
<div class="art-sheet clearfix">

            <?php echo $view->position('banner1', 'art-nostyle'); ?>
<?php echo $view->positions(array('top1' => 33, 'top2' => 33, 'top3' => 34), 'art-block'); ?>
<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <?php if ($view->containsModules('left')) : ?>
<div class="art-layout-cell art-sidebar1">
<?php echo $view->position('left', 'art-block'); ?>




                        </div>
<?php endif; ?>
                        <div class="art-layout-cell art-content">
<?php
  echo $view->position('banner2', 'art-nostyle');
  if ($view->containsModules('breadcrumb'))
    echo artxPost($view->position('breadcrumb'));
  echo $view->positions(array('user1' => 50, 'user2' => 50), 'art-article');
  echo $view->position('banner3', 'art-nostyle');
  echo artxPost(array('content' => '<jdoc:include type="message" />', 'classes' => ' art-messages'));
  echo '<jdoc:include type="component" />';
  echo $view->position('banner4', 'art-nostyle');
  echo $view->positions(array('user4' => 50, 'user5' => 50), 'art-article');
  echo $view->position('banner5', 'art-nostyle');
?>



                        </div>
                        <?php if ($view->containsModules('right')) : ?>
<div class="art-layout-cell art-sidebar2">
<?php echo $view->position('right', 'art-block'); ?>


                        </div>
<?php endif; ?>
                    </div>
                </div>
            </div>
<?php echo $view->positions(array('bottom1' => 33, 'bottom2' => 33, 'bottom3' => 34), 'art-block'); ?>
<?php echo $view->position('banner6', 'art-nostyle'); ?>



</div>

    
</div>


<?php if ($view->containsModules('home-bottom')) : ?>
<div class="home-bottom" style="width:100%;"><?php echo $view->position('home-bottom'); ?></div>
<?php endif; ?>

<footer class="art-footer">
<?php if ($view->containsModules('copyright')) : ?>
    <div class="copyright"><?php echo $view->position('copyright', 'art-nostyle'); ?></a>
<?php else: ?>
<a title="RSS" class="art-rss-tag-icon" style="position:absolute;bottom:25px;left:6px" href="#"></a><div style="position:relative;padding-left:48px;padding-right:10px"><p><a href="#">Link1</a> | <a href="#">Link2</a> | <a href="#">Link3</a></p><p>Copyright © 2014. All Rights Reserved.</p></div>
    <?php endif; ?>
<p class="art-page-footer">
        <span id="art-footnote-links"></span>
    </p>
</footer>

<?php echo $view->position('debug'); ?>
  
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57341812-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>