<?php get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
$attr = array(
	'src'	=> $src,
);
global $count;
			if ($count % 2 == 0) {
				?>
				<!-- begin product <?php echo $post->ID ?>-->
					<div class="product">
						<div class="large">
							<div class="columnz2">
								<div class="bigdesc">
									<h1><?php echo the_title() ?> <span>(<?php echo  get_post_meta($post->ID, 'maten', true);?>cm)</span></h1>
								<div class="divider"></div>
								<?php echo apply_filters('the_content', get_post_field('post_content', $post->ID)) ?>
								</div>
								<img src="<?php echo  get_post_meta($post->ID, 'klein', true);?>" alt="prod_one_small" width="337" height="142">
							</div>
							<div class="column1">
								<div class="infor">
									<div class="desc"><p><?php echo get_the_title( $post->ID ); ?></p><p><?php echo  get_post_meta($post->ID, 'maten', true);?>cm</p></div>
								<div class="price"><p><?php echo get_post_meta($post->ID, 'prijs', true);?></p></div>
								</div>
								<?php echo get_the_post_thumbnail( $post->ID, array(663,380) ) ?>
							</div>
						</div>
					</div>
				<!-- end product -->
				<?php
			}else{
		    	?>
		    	<!-- begin product <?php echo $post->ID ?>-->
				<div class="product">
					<div class="large">
						<div class="column1">
							<div class="infol">
								<div class="desc"><p><?php echo get_the_title( $post->ID ); ?></p><p><?php echo  get_post_meta($post->ID, 'maten', true);?>cm</p></div>
								<div class="price"><p><?php echo  get_post_meta($post->ID, 'prijs', true);?></p></div>
							</div>
							<!-- POST THUMBNAIL -->
							<?php echo get_the_post_thumbnail( $post->ID, array(663,380) ) ?>
						</div>
						<div class="column2">
							<div class="bigdesc">
								<h1><?php echo get_the_title( $post->ID ) ?> <span>(<?php echo  get_post_meta($post->ID, 'maten', true);?>cm)</span></h1>
								<div class="divider"></div>
								<?php echo apply_filters('the_content', get_post_field('post_content', $post->ID)) ?>
							</div>
							<img src="<?php echo  get_post_meta($post->ID, 'klein', true);?>" alt="prod_one_small" width="337" height="142">
						</div>
					</div>
				</div>
				<!-- end product -->
		    	<?php
		    	}
		    	$count++;
		    	?>
<?php endwhile; ?>

<?php else : ?>

	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h1>Niets gevonden</h1>
	</div>

<?php endif; ?>

<?php get_footer() ?>