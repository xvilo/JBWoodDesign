<?php get_header() ?>


 <?php if ( have_posts() ) : ?>
 
               <h1><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                
 
                <?php shape_content_nav( 'nav-above' ); ?>
 
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
 
                    <?php get_template_part( 'content', 'search' ); ?>
 
                <?php endwhile; ?>
 
                <?php shape_content_nav( 'nav-below' ); ?>
 
            <?php else : ?>
 
                <h1>Geen resultaten voor de zoekopdracht </h1>
 
            <?php endif; ?>


<?php get_footer() ?>
