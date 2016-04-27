<?php /* Template Name: Home Template */ get_header(); ?>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<main role="main">

		<section class="big-header">
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
		
		<section class="tuto-devis">
			<h2>Devis en ligne</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
			
			<ul class="step-devis">
				<li>
					<svg><use xlink:href="#icon-cart"/></svg>
					<p>Ajoutez à votre panier tous les produits dont vous avez besoin.</p>
				</li>
				<li>
					<svg><use xlink:href="#icon-cart"/></svg>
					<p>Validez votre panier et remplissez vos cordonnées.</p>
				</li>
				<li>
					<svg><use xlink:href="#icon-cart"/></svg>
					<p>Vous recevez votre devis personnalisé en 1 jour ouvrable !</p>
				</li>
			</ul>
		</section>
		
		<section class="avant-home">
			<h2>Développement durable</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
			<a href="#" class="bt">Découvrez la gamme</a>
		</section>
		
		<section class="about-home">
			<h2>Qui sommes-nous ?</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
			
			<ul>
				<li>
					<h3>Votre grossiste hygiène</h3>
					<p>Notre gamme de produits couvre tous vos besoins en produits et matériels d’hygiène, brosserie, essuyage…</p>
				</li>
				<li>
					<h3>Votre grossiste hygiène</h3>
					<p>Notre gamme de produits couvre tous vos besoins en produits et matériels d’hygiène, brosserie, essuyage…</p>
				</li>
								<li>
					<h3>Votre grossiste hygiène</h3>
					<p>Notre gamme de produits couvre tous vos besoins en produits et matériels d’hygiène, brosserie, essuyage…</p>
				</li>
								<li>
					<h3>Votre grossiste hygiène</h3>
					<p>Notre gamme de produits couvre tous vos besoins en produits et matériels d’hygiène, brosserie, essuyage…</p>
				</li>
			</ul>
		</section>

	</main>
	
	<?php endwhile; endif; ?>
	
	


<?php get_footer(); ?>
