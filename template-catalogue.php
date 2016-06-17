<?php /* Template Name: Catalogue Template */ get_header(); ?>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	

	<main role="main">

		<section class="big-header commun-header">
			<div class="wrapperBigHeader">
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
		
		<div class="content-wrapper content-about">
		
			<nav role="navigation" class="sidemenu">
					
					<div class="insidemenu">

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
					
					</div>

				</nav>
				
				<div class="cat_grid"> 
					<?php the_content();?>
				</div>
			
		</div>
	
	</main>
	
	<?php endwhile; endif; ?>
	


			
			

<?php get_footer(); ?>
