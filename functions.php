<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
	
	add_image_size('bigHeaderimg', 700, '', true); // Pour les images de fond du big header
	add_image_size('background', 2000, '', true); // Fond 100%
	add_image_size('etape', 300, '', true); // Fond 100%
	add_image_size('personne', 150, 150, true); // Fond 100%
	add_image_size('couverture', 150, '', true); // Couverture des catalogues

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {	
		
		wp_register_script('myscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('myscripts'); // Enqueue it!
		
		wp_register_script('uie', get_template_directory_uri() . '/js/ie.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('uie'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_product()){
		wp_register_script('lightbox', get_template_directory_uri() . '/js/lib/lightbox.min.js', array('jquery'), '2.8.2', true);
        wp_enqueue_script('lightbox');
		
		wp_register_script('flickity', get_template_directory_uri() . '/js/lib/flickity.pkgd.min.js', array('jquery'), '1.2.1');
        wp_enqueue_script('flickity');
    }
	
	if(is_product() or is_shop() or is_product_category() or is_page('a-propos')){
		wp_register_script('waypoints', get_template_directory_uri() . '/js/lib/jquery.waypoints.min.js', array('jquery'), '4.0.0', true);
        wp_enqueue_script('waypoints');
	}
	
	if(is_product() or is_shop() or is_product_category()){
		wp_register_script('scriptWoo', get_template_directory_uri() . '/js/scripts-woo.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('scriptWoo');
	}
	
	if(is_product()){
		wp_register_script('scriptSingleWoo', get_template_directory_uri() . '/js/scripts-productPage.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('scriptSingleWoo');
	}
}

// Load HTML5 Blank styles
function html5blank_styles()
{

	$version = filemtime(get_template_directory() . '/style.css');

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), $version, 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

// Woocommerce

//Virer le fil d'ariane
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

function woocommerce_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => '',
		'menu'            => 'woocommerce',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Virer les styles par défaut
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

//Virer les tris sur la page catégorie
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0);

//Virer le'affichage du résultat sur la page catégorie
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0);

//Ajouter un texte récap dans liste produits
add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_single_excerpt', 5);

//Ajouter quantité et options dans la liste produitss
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_single_add_to_cart', 10, 0);

//Virer le prix des pages
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price');
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price');

//Virer le lien ajouter au panier
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

// Hover produit
function wrapper_hover_product_before()
{
    echo '<div class="overlay_product"><button title="Fermer cette fenêtre" class="close_overlay"><svg><use xlink:href="#icon-close"/></svg></button><div class="ct_overlay"><p class="title_ajoutdevis">Ajouter directement à mon devis</p>';
}

add_action('woocommerce_after_shop_loop_item', 'wrapper_hover_product_before', 5);

function wrapper_hover_product_after()
{
    echo('</div></div>');
}

add_action('woocommerce_after_shop_loop_item', 'wrapper_hover_product_after', 15);

// Les liens sous chaque produit (le overlay)

function link_cat_products()
{
	echo('<button class="bt_add_devis">Ajouter à mon devis</button>');
	echo('<span class="ou">ou</span>');
	echo('<a href="'.get_the_permalink().'" class="link_product" title="'.get_the_title().'">Voir le détail du produit</a>');
}

add_action('woocommerce_after_shop_loop_item', 'link_cat_products', 20);

/* Remove Checkout Fields et modifs*/
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
//unset($fields['billing']['billing_country']);
unset($fields['billing']['billing_state']);
unset($fields['billing']['billing_phone']);
$fields['order']['order_comments']['placeholder'] = '';
$fields['order']['order_comments']['label'] = 'Message facultatif';
return $fields;
}

// Modif contenu du bouton de commande

add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' ); 

function woo_custom_order_button_text() {

    return __( 'Envoyer ma demande de devis', 'woocommerce' ); 

}

// Virer la description de la catégorie
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);



/////// SINGLE PRODUCT //////

// Virer les avis produits

add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
 unset($tabs['reviews']);
 return $tabs;
}

//Construire la page

add_filter( 'woocommerce_topRproduct', 'woocommerce_template_single_title', 5 );
add_filter( 'woocommerce_topRproduct', 'woocommerce_template_single_excerpt', 10 );
add_filter( 'woocommerce_topRproduct', 'woocommerce_template_single_meta', 15 );

add_filter( 'woocommerce_bottomRproduct', 'woocommerce_template_single_add_to_cart', 10 );




// Fonction pour afficher la taille des PDF

function getSize($file){
$bytes = filesize($file);
$s = array('o', 'Ko', 'Mo', 'Go');
$e = floor(log($bytes)/log(1024));
return sprintf('%.1f '.$s[$e], ($bytes/pow(1024, floor($e))));}


// Modif Admin

function custom_menu_page_removing() {
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'edit.php' );

}
add_action( 'admin_menu', 'custom_menu_page_removing' );

//Customize WYSIWYG

function my_format_TinyMCE( $in ) {
	$in['paste_remove_spans'] = true;

    $in['block_formats'] = "Paragraphe=p; Titre 2=h2; Titre 3=h3; Titre 4=h4; Titre 5=h5";
	$in['toolbar1'] = 'bold,italic,strikethrough,bullist,numlist,link,unlink,spellchecker,wp_fullscreen,wp_adv';
	$in['toolbar2'] = 'formatselect,pastetext,removeformat,charmap,table,undo,redo,wp_help ';
	return $in;
}

// Add tab to woocommerce product

function add_woo_tabs(){

	global $post;

	if(!empty(get_field('titre_de_longlet', $post->ID))){	
		add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
		function woo_new_product_tab( $tabs ) {		
			$tabs['test_tab'] = array(
				'title' 	=> get_field('titre_de_longlet', $post->ID),
				'priority' 	=> 50,
				'callback' 	=> 'woo_new_product_tab_content'
			);

			return $tabs;

		}
		
		function woo_new_product_tab_content() {

			// The new tab content
			echo get_field('contenu_onglet', $post->ID);
			
		}
	}
}

add_action('wp', 'add_woo_tabs');

// Ajouter un wrapper dans les archives images

// Add the opening div to the img
function add_img_wrapper_start() {
    echo '<div class="archive-img-wrap">';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'add_img_wrapper_start', 5, 2 );
// Close the div that we just added
function add_img_wrapper_close() {
    echo '</div>';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'add_img_wrapper_close', 12, 2 );
