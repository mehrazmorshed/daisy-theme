<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Daisy
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php echo razia_photography_category(); ?>

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; 
		?>


		<?php
		if ( 'post' === get_post_type() ) : ?>
				<?php 
					razia_posted_by();
					razia_posted_on(); 
				?>
		<?php endif; ?>

		<?php razia_post_thumbnail(); ?>

		<div class="<?php if ( is_active_sidebar( 'sidebar-1' ) && is_single() ) : ?>col-lg-8<?php else: ?>col-lg-12<?php endif; ?>">
			
					<?php

					if(is_single( )){
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'razia' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);
					}else{
						the_excerpt(); ?>

				            <?php
				            echo'<a href="'.esc_url ( get_the_permalink( $post->ID ) ).'"><span>'.esc_html__('Read More','razia-photography').'</span></a>'; 
				            ?>

				      <?php 
					} 

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'razia-photography' ),
							'after'  => '</div>',
						)
					);
					?>

				<?php if ( is_singular() ) : ?>
						<?php razia_entry_footer(); ?>
				<?php endif; ?>
		</div>

		<?php if ( is_active_sidebar( 'sidebar-1' ) && is_single() ) : ?>
            <?php get_sidebar(); ?>
        <?php endif; ?>
</article>