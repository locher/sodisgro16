<?php get_header(); ?>
	
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
		
		<div class="content-wrapper">
			<div class="content">
				<?php the_content();?>
			</div>			
		</div>
			
	</main>
	
	<?php endwhile; endif;?>

<?php get_footer(); ?>
