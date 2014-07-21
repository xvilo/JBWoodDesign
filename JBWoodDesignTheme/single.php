<?php get_header() ?>
	<div id="post">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
$attr = array(
	'src'	=> $src,
);
?>
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <div class="header">
                <h3><?php the_title(); ?></h3>
            </div>
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