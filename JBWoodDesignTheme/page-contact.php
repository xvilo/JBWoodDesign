<?php
/*
Template Name: page-contact
*/
?><?php get_header() ?>
<iframe class="map" frameBorder='0' src='<?php echo get_post_meta($post->ID,'map_url',true) ?>'></iframe>
<div class="contact">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
$attr = array(
	'src'	=> $src,
);
?>
    
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <div class="content">
            <?php the_content(); ?>
            </div>
        </div>
      
<?php endwhile; ?>

<?php else : ?>

	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h1>Not Found</h1>
	</div>

<?php endif; ?>
</div>

<?php get_footer() ?>