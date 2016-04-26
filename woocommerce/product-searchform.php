<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="Rechercher un produit..." value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
	<button type="submit">
		<svg><use xlink:href="#icon-search"/></svg>
	</button>
	<input type="hidden" name="post_type" value="product" />
</form>
