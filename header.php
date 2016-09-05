<!doctype html>
<!--[if lte IE 10]><html class="ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 10]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<!--[if lte IE 10]>
			 <link href="<?php echo get_template_directory_uri(); ?>/ie.css" rel="stylesheet" media="all">
		<![endif]-->

		<?php wp_head(); ?>
		
		<script src="https://use.typekit.net/vrs8rsa.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		
		<link rel="apple-touch-icon" sizes="57x57" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/apple-touch-icon-57x57.png?v=wAA9d4m0x8">
		<link rel="apple-touch-icon" sizes="60x60" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/apple-touch-icon-60x60.png?v=wAA9d4m0x8">
		<link rel="apple-touch-icon" sizes="72x72" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/apple-touch-icon-72x72.png?v=wAA9d4m0x8">
		<link rel="apple-touch-icon" sizes="76x76" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/apple-touch-icon-76x76.png?v=wAA9d4m0x8">
		<link rel="apple-touch-icon" sizes="114x114" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/apple-touch-icon-114x114.png?v=wAA9d4m0x8">
		<link rel="apple-touch-icon" sizes="120x120" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/apple-touch-icon-120x120.png?v=wAA9d4m0x8">
		<link rel="apple-touch-icon" sizes="144x144" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/apple-touch-icon-144x144.png?v=wAA9d4m0x8">
		<link rel="apple-touch-icon" sizes="152x152" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/apple-touch-icon-152x152.png?v=wAA9d4m0x8">
		<link rel="apple-touch-icon" sizes="180x180" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/apple-touch-icon-180x180.png?v=wAA9d4m0x8">
		<link rel="icon" type="image/png" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/favicon-32x32.png?v=wAA9d4m0x8" sizes="32x32">
		<link rel="icon" type="image/png" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/favicon-194x194.png?v=wAA9d4m0x8" sizes="194x194">
		<link rel="icon" type="image/png" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/favicon-96x96.png?v=wAA9d4m0x8" sizes="96x96">
		<link rel="icon" type="image/png" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/android-chrome-192x192.png?v=wAA9d4m0x8" sizes="192x192">
		<link rel="icon" type="image/png" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/favicon-16x16.png?v=wAA9d4m0x8" sizes="16x16">
		<link rel="manifest" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/manifest.json?v=wAA9d4m0x8">
		<link rel="mask-icon" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/safari-pinned-tab.svg?v=wAA9d4m0x8" color="#0d77b7">
		<link rel="shortcut icon" href="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/favicon.ico?v=wAA9d4m0x8">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="msapplication-TileImage" content="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/mstile-144x144.png?v=wAA9d4m0x8">
		<meta name="msapplication-config" content="http://sodisgro.fr/wp-content/themes/sodisgro16/img/favicon/browserconfig.xml?v=wAA9d4m0x8">
		<meta name="theme-color" content="#0d77b7">

	</head>
	<body <?php body_class(); ?>>
	
	
		<div class="svg-wrapper" aria-hidden="true">
			<?php echo file_get_contents(get_template_directory_uri().'/img/svg-prod/sprite/svgs.svg'); ?>
		</div>


		<!-- header -->
		<header class="header clear" role="banner">

				<!-- logo -->
				<div class="logo">
					<a href="<?php echo home_url(); ?>">
						<svg><use xlink:href="#icon-logo"/></svg>
					</a>
				</div>
				<!-- /logo -->
	

				<!-- nav -->
				<nav class="nav" role="navigation">
					<?php html5blank_nav(); ?>
				</nav>
				<!-- /nav -->

				<a class="header-phone" href="tel:+338504222" title="Appeler Sodisgro à Rosheim">
				<svg><use xlink:href="#icon-phone"/></svg>03 88 50 42 22</a>

				<?php //get_template_part('searchform'); ?>
				<?php get_product_search_form(); ?>
				
				<?php echo do_shortcode('[woocommerce_product_search]');?>

				<a class="header-devis" href="<?php echo WC()->cart->get_cart_url(); ?>" title="Accéder à mon devis">
				
					<span class="titre-devis">Mon devis</span>
					
					<span class="wrapper-cart">
						<svg><use xlink:href="#icon-cart"/></svg>
						<span class="count-devis"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
					</span>
				</a>
			

		</header>
		<!-- /header -->
	
