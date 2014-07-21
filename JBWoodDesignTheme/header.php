<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title><?php wp_title( '|', true, 'right' ); ?><?php echo get_bloginfo( 'name' ); ?></title>
		
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
		
		<?php wp_head() ?>
		
		<!--[if gte IE 9]>
		  <style type="text/css">
		    .gradient {
		       filter: none;
		    }
		  </style>
		<![endif]-->
		
	</head>
<body <?php body_class($class); ?>>
	<div class="container">
		
		<header>
			<div class="block">
				<a href="<?php echo get_bloginfo( 'url' ); ?> "><h1>JB Wood Design</h1></a>
			</div>
			<div class="block">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

				<a href="https://www.facebook.com/pages/JB-wood-design/261777427363871?fref=ts"  target="_blank"><span class="social facebook"></span></a>
								
				<a href="<?php bloginfo('url'); ?>/?page_id=201"><span class="social search"></span></a>
			</div>
		<div class="clear"></div>
		</header>
		
		<section>