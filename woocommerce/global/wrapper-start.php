<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$template = get_option( 'template' );

?>

<main role="main">

		<section class="big-header commun-header">
		
			<?php if ( is_product_category()): ?>
			
			<?php
			
			 global $wp_query;
			
			    // get the query object
				$cat = $wp_query->get_queried_object();

				// get the thumbnail id using the queried category term_id
				$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );

				// get the image URL
				$image = wp_get_attachment_image_src( $thumbnail_id, 'background' ); 			
			?>
			
			
			<div class="wrapperBigHeader">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1><?php woocommerce_page_title(); ?></h1>
				<?php endif; ?>
				
				<?php the_field('contenu_header'); ?>
			</div>
			
			<div class="bigHeader-fond" aria-hidden="true">			
				<div style="background-image: url('<?php echo $image[0]; ?>');"></div>
			</div>
			
			<?php else:?>
			
			<div class="wrapperBigHeader">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1><?php woocommerce_page_title(); ?></h1>
				<?php endif; ?>
				
				<?php the_field('contenu_header'); ?>
			</div>
			
			<?php endif;?>
			
			
			
		</section>
		
		<div class="content-wrapper">

			<nav role="navigation" class="sidemenu">
			
				<?php get_product_search_form(); ?>
				
				<ul class="cat-list">					
				
					<?php 
						$args = array(
							'taxonomy' => 'product_cat',
							'title_li' => '',
							'hide_title_if_empty' => true,
						);
					?>

					<?php wp_list_categories($args);?>
				
				</ul>
			
			</nav>
			
			<div class="cat_grid">

<?php
