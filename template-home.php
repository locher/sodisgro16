<?php /* Template Name: Home Template */ get_header(); ?>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<main role="main">

		<section class="big-header">
			<div class="wrapperBigHeader">
				<?php the_field('contenu_header'); ?>

				<?php if(get_field('boutons')):?>
				<div class="wrapperBigHeader__links">
					<?php foreach(get_field('boutons') as $link): ?>
						<a href="<?php echo $link['lien']['url'];?>"><?php echo $link['lien']['title'];?></a>						
					<?php endforeach;?>
				
				</div>
				<?php endif;?>

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
		
		<section class="tuto-devis content">
		
			<?php the_field('texte_devis'); ?>
			
			<?php if(have_rows('etapes_de_devis')): ?>
			
			<ul class="step-devis">
			
				<?php while(have_rows('etapes_de_devis') ) : the_row(); ?>
				<li>
					<div class="wrapSvg">
						<svg><use xlink:href="#icon-<?php the_sub_field('icone'); ?>"/></svg>
					</div>
					<?php the_sub_field('texte_explication'); ?>
				</li>
				<?php endwhile; ?>

			</ul>
			
			<?php endif; ?>
			
		</section>
		
		<?php //Si y a une photo de fond on l'affiche, sinon non ?>
		
		<section class="avant-home content">
			<div class="wrapper-avant"><?php the_field('texte_mise_en_avant');?></div>			
			<?php if(get_field('image_de_fond')): $img_avant = get_field('image_de_fond'); ?>
				<div aria-hidden="true" class="img-avant" style="background-image:url('<?php echo $img_avant['sizes']['background'];?>');"></div><?php endif?>
		</section>
		
		<section class="about-home content">
		
			<div class="wrap-about">
				<?php the_field('contenu_qui_sommes_nous');?>
			</div>			
			
			<?php if(have_rows('etapes_qui_sommes_nous')): ?>
			
			<ul>
			
				<?php while(have_rows('etapes_qui_sommes_nous') ) : the_row(); ?>
			
				<li>
					<?php if(get_sub_field('image_etape')): $img_etape = get_sub_field('image_etape'); ?>
					<div class="about-img" aria-hidden="true" style="background-image: url('<?php echo $img_etape['sizes']['etape'];?>')"></div>
					<?php endif; ?>
					<h3><?php the_sub_field('titre_etape');?></h3>
					<?php the_sub_field('contenu_etape');?>
				</li>
				
				<?php endwhile;?>

			</ul>
			
			<?php endif;?>
			
		</section>

	</main>
	
	<?php endwhile; endif; ?>
	
	


<?php get_footer(); ?>
