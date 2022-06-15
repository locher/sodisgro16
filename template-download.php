<?php /* Template Name: Download Template */ get_header(); ?>
	
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
				<ul>
					<li><a href="#catalogues"><?php the_field('titre_catalogues');?></a></li>

				</ul>
			</nav>
			
			<div class="content about">
				
				<section class="cataloguesPdf" id="catalogues">
				
					<h2><?php the_field('titre_catalogues');?></h2>
				
					<?php the_field('texte_catalogue'); ?>
					
					<ul>
					
						<?php while(have_rows('catalogue') ) : the_row(); ?>
						<?php 
							$couverture = get_sub_field('image_de_couverture');
							$file = get_sub_field('fichier_pdf');
						?>
						
					
						<li>
							<img src="<?php echo $couverture['sizes']['couverture']; ?>" alt="Couverture de <?php the_sub_field('titre_catalogue');?>"><!--
							--><div class="text-cataloguePdf">
								<h3><?php the_sub_field('titre_catalogue');?></h3>
								<p><?php the_sub_field('description_catalogue');?></p>

								<?php $link = get_sub_field('lien_externe');?>

								<?php if(!isset($link) or $link == ''):?>
								<a href="<?php echo $file['url']; ?>" download>Télécharger en PDF <span><?php echo getSize( get_attached_file( $file['ID'] ) );?></span></a>
								<?php else:?>
								<a href="<?php echo $link; ?>">Télécharger</a>
								<?php endif;?>
							</div>
						</li>
						
						<?php endwhile; ?>
						
					</ul>
				</section>
				
			</div>
			
		</div>
	
	</main>
	
	<?php endwhile; endif; ?>
	
	


<?php get_footer(); ?>
