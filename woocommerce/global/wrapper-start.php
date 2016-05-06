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
			<div class="wrapperBigHeader">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1><?php woocommerce_page_title(); ?></h1>
				<?php endif; ?>
				
				<?php the_field('contenu_header'); ?>
			</div>
			
			<?php if(have_rows('images_de_fond')): ?>
			
			<div class="bigHeader-fond" aria-hidden="true">
			
				<?php while ( have_rows('images_de_fond') ) : the_row();?>
					<?php $image = get_sub_field('image_de_fond'); ?>
					<div style="background-image: url('<?php echo $image['sizes']['bigHeaderimg']; ?>');"></div>
				<?php endwhile; ?>
				
			</div>
			
			<?php endif;?>
			
		</section>
		
		<div class="content-wrapper">

			<nav role="navigation" class="sidemenu">
			
				<?php get_product_search_form(); ?>
				
				<ul>
			<?php $wcatTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'ASC',  'parent' =>0)); //, 'exclude' => '17,77'
				foreach($wcatTerms as $wcatTerm) : 
					$wthumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
				?>
				
					<li>
						<a href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>"><?php echo $wcatTerm->name; ?></a>
						<ul class="sub-menu">
						<?php
						$wsubargs = array(
						   'hierarchical' => 1,
						   'show_option_none' => '',
						   'hide_empty' => 0,
						   'parent' => $wcatTerm->term_id,
						   'taxonomy' => 'product_cat'
						);
						$wsubcats = get_categories($wsubargs);
						foreach ($wsubcats as $wsc):
						?>
							<li><a href="<?php echo get_term_link( $wsc->slug, $wsc->taxonomy );?>"><?php echo $wsc->name;?></a></li>
						<?php
						endforeach;
						?>  
						</ul>
					</li>
				
			<?php 
				endforeach; 
			?>
			</ul>
			</nav>
			
			<div class="cat_grid">

<?php
