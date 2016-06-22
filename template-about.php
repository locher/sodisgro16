<?php /* Template Name: About Template */ get_header(); ?>
	
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
					<li><a href="#presentation"><?php the_field('titre_presentation');?></a></li>
					<li><a href="#equipe"><?php the_field('titre_equipe');?></a></li>
					<li><a href="#horaires"><?php the_field('titre_horaires');?></a></li>
					<li><a href="#catalogues"><?php the_field('titre_catalogues');?></a></li>

				</ul>
			</nav>
			
			<div class="content about">
			
				<section class="presentation" id="presentation">
					<h2><?php the_field('titre_presentation');?></h2>
					<?php the_field('contenu_presentation');?>
				</section>
				
				<section class="equipe" id="equipe">
				
					<h2><?php the_field('titre_equipe');?></h2>
					
					<?php the_field('texte_equipe');?>
					
					<ul>
					
						<?php while(have_rows('membres_equipe') ) : the_row(); ?>
						
						<?php $photo = get_sub_field('photo'); ?>
						
						<li>
						
							<?php if($photo):?>
							<div class="photo">
								<img src="<?php echo $photo['sizes']['personne']; ?>" alt="Photo de <?php the_sub_field('nom');?> ">
							</div><!--
							--><?php endif;?><div class="text-membre">
								<span class="name"><?php the_sub_field('nom');?></span>
								<span class="role"><?php the_sub_field('poste');?></span>
								<span class="phone">
									<svg><use xlink:href="#icon-phone"/></svg>
									<a href="tel:+33<?php the_sub_field('telephone');?>"><?php the_sub_field('telephone');?></a>
								</span>
								<span class="mail">
									<svg><use xlink:href="#icon-mail"/></svg>
									<a href="mailto:<?php the_sub_field('email');?>"><?php the_sub_field('email');?></a>
								</span>
							</div>
						</li>											
						<?php endwhile;?>
								
					</ul>
				</section>
				
				<section class="horaires" id="horaires">
					<h2><?php the_field('titre_horaires');?></h2>
					<?php the_field('horaires'); ?>
				</section>
				
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
								<a href="<?php echo $file['url']; ?>">Télécharger en PDF <span><?php echo getSize( get_attached_file( $file['ID'] ) );?></span></a>
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
