<!doctype html>
<html xml:lang="ar" dir="rtl">

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 ie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8 ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9 ie8" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<head profile="http://gmpg.org/xfn/11">
	<meta charset="utf-8">

	<!-- Use the .htaccess and remove these lines to avoid edge case issues. More info: h5bp.com/b/378 -->

	  <title><?php echo $meta_title ; ?></title>
	  <meta charset="UTF-8" />
	  <!-- <meta name="robots" content="noindex" />  stop indexing -->
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="alternate" type="application/rss+xml" title="aufait &raquo; Feed" href="#" />
	  <?php echo $faceimg ?>
	  <?php echo $facetitle ?>
	  <?php echo $faceurl ?>
	  <?php echo $facedesc ?>


	<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
	<?php echo $this->Html->css(array('frontend/style','http://fonts.googleapis.com/earlyaccess/droidarabickufi.css','http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700&#038;subset=latin&#038;ver=3.5.1','http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css')); ?>
	<?php echo $this->Html->css(array('frontend/skins/blue/style-1')); ?>
	<!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

	<!-- All JavaScript at the bottom, except this Modernizr build incl. Respond.js
	     Respond is a polyfill for min/max-width media queries. Modernizr enables HTML5 elements & feature detects; 
	     for optimal performance, create your own custom Modernizr build: www.modernizr.com/download/ -->
	<?php echo $this->Html->script(array('frontend/libs/modernizr-2.0.6.custom.min.js'));?>		
	<script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.2/webfont.js"></script>
	<!-- <script>
	    WebFont.load({
	      google: {
	        families: ['Droid Arabic Kufi', 'tahoma']
	      }
	    });
	</script> -->
</head>
<body>
	<div id="fb-root"></div>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/ar_AR/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!-- Header -->
	<div id="header-container" class="clearfix">
		<div id="header">
				<div id="header-ads">
				<?php echo $this->Html->image('frontend/upload/header-ads.png',array("style"=>"width: 688px;float: left;"));?>
			</div>
				
			<div id="logo">
				<a href="index-2.html">
					<?php echo $this->Html->image('frontend/logo.png');?>
				</a>
			</div>
			
			<div id="main-menu">
				<?php echo $this->element("shared/menus")?>
			</div>
		</div>
	</div>
	<!-- End Header -->
	<div id="container">
		<?php  echo $content_for_layout;?>
		
        <!-- Copyright-->
        <div id="copyright">
        	Copyright © 2013 - All Rights Reserved
        </div>
        <!-- Copyright-->

        <div class="space-container"></div>
	</div>
	
	<?php echo $this->Html->script(array('frontend/jquery.min.js','frontend/jquery.superfish.js','frontend/jquery.flexslider.js','frontend/jquery.jcarousel.min.js','frontend/jquery.fancybox.js','frontend/jquery.masonry.min.js','frontend/jquery.selectbox.js','frontend/demo.js','frontend/script.js','frontend/jquery.cookie.js'));?>
	
	<script type="text/javascript">
		 var _gaq = _gaq || [];
		 _gaq.push(['_setAccount', 'UA-31561727-1']);
		 _gaq.push(['_trackPageview']);

		 (function() {
		   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		 })();
	</script>
</body>

</html>
