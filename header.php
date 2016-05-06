<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		
		<script src="https://use.typekit.net/vrs8rsa.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>

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
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
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

				<a class="header-devis" href="<?php echo WC()->cart->get_cart_url(); ?>" title="Accéder à mon devis">
				
					<span class="titre-devis">Mon devis</span>
					
					<span class="wrapper-cart">
						<svg><use xlink:href="#icon-cart"/></svg>
						<span class="count-devis"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
					</span>
				</a>
			

		</header>
		<!-- /header -->
	
