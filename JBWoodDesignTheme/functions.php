<?php
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}

add_action( 'init', 'register_my_menu' );

add_theme_support( 'post-thumbnails' ); 

function allow_more_pubs( $limit ) {
    return 30;
}
add_filter( 'wppa_list_limit', 'allow_more_pubs' );

function CatagoryShortcode( $atts ) {
    $a = $atts;
		    $movies = get_posts( array(
			   'numberposts' => -1, // we want to retrieve all of the posts
			   'category' => $atts['id']
			) );
			$catinfo = get_cat_name( $atts['id'] );
			echo "<h2 class='catinfo'>".$catinfo."</h2>";
			foreach ( $movies as $movie) {
			global $count;
			if ($count % 2 == 0) {
				?>
				<!-- begin product <?php echo $movie->ID ?>-->
					<div class="product">
						<div class="large">
							<div class="columnz2">
								<div class="bigdesc">
									<h1><?php echo get_the_title( $movie->ID ) ?> <span>(<?php echo  get_post_meta($movie->ID, 'maten', true);?>cm)</span></h1>
								<div class="divider"></div>
								<?php echo apply_filters('the_content', get_post_field('post_content', $movie->ID)) ?>
								</div>
								<img src="<?php echo  get_post_meta($movie->ID, 'klein', true);?>" alt="prod_one_small" width="337" height="142">
							</div>
							<div class="column1">
								<div class="infor">
									<div class="desc"><p><?php echo get_the_title( $movie->ID ); ?></p><p><?php echo  get_post_meta($movie->ID, 'maten', true);?>cm</p></div>
								<div class="price"><p><?php echo  get_post_meta($movie->ID, 'prijs', true);?></p></div>
								</div>
								<?php echo get_the_post_thumbnail( $movie->ID, array(663,380) ) ?>
							</div>
						</div>
					</div>
				<!-- end product -->
				<?php
			}else{
		    	?>
		    	<!-- begin product <?php echo $movie->ID ?>-->
				<div class="product">
					<div class="large">
						<div class="column1">
							<div class="infol">
								<div class="desc"><p><?php echo get_the_title( $movie->ID ); ?></p><p><?php echo  get_post_meta($movie->ID, 'maten', true);?>cm</p></div>
								<div class="price"><p><?php echo  get_post_meta($movie->ID, 'prijs', true);?></p></div>
							</div>
							<!-- POST THUMBNAIL -->
							<?php echo get_the_post_thumbnail( $movie->ID, array(663,380) ) ?>
						</div>
						<div class="column2">
							<div class="bigdesc">
								<h1><?php echo get_the_title( $movie->ID ) ?> <span>(<?php echo  get_post_meta($movie->ID, 'maten', true);?>cm)</span></h1>
								<div class="divider"></div>
								<?php echo apply_filters('the_content', get_post_field('post_content', $movie->ID)) ?>
							</div>
							<img src="<?php echo  get_post_meta($movie->ID, 'klein', true);?>" alt="prod_one_small" width="337" height="142">
						</div>
					</div>
				</div>
				<!-- end product -->
		    	<?php
		    	}
		    	$count++;
		    }
}
			
add_shortcode( 'cat', 'CatagoryShortcode' );




/**REBRAND WP LOGIN**/ 

function childtheme_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/admin.css" />';
}

add_action('login_head', 'childtheme_custom_login');
add_action('admin_head', 'childtheme_custom_login');

// Custom WordPress Footer
function remove_footer_admin () {
	echo '&copy; 2014 - D3, Sem Schilder';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Add a widget in WordPress Dashboard
function wpc_dashboard_widget_function() {
	// Entering the text between the quotes
	echo "<ul>
	<li>Release Date: Juli 2014</li>
	<li>Author: Sem Schilder</li>
	<li>Support: <a href='mailto:Support@ThisIsD3.com'>D3 Support</a></li>
	</ul>";
}
function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'Support', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );

function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );

// Use your own external URL logo link
function wpc_url_login(){
	return "http://ThisIsD3.com/"; // your URL here
}
add_filter('login_headerurl', 'wpc_url_login');
?>