<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Doyel Grid Two Column
 */
if ( ! is_singular( ) ) : ?>
<div class="col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="list_inner">
			<?php if ( has_post_thumbnail () ): ?>
			<div class="image">
				<?php doyel_post_thumbnail(); ?>
			</div>
			<?php endif; ?>
			<div class="details">
				<div class="metabox">
					<?php doyel_grid_two_column_posted_by(); ?>
					<?php doyel_grid_two_column_posted_on(); ?>
				</div>	
				<div class="title">
					<?php
						the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					?>
				</div>
				<?php
		           	echo'<a href="'.esc_url ( get_the_permalink( $post->ID ) ).'" class="read-more"><span><i class="fa fa-long-arrow-right"></i>'.'</span></a>'; 
		            ?>									
			</div>									
		</div>
	</article>	
</div>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php doyel_post_thumbnail(); ?>
	<div class="single-content">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );

			endif; 

			if ( 'post' === get_post_type() ) : ?>
				<div class="footer-meta">

					<?php 
						doyel_posted_by();
						doyel_posted_on(); 
					?>
				</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

			if(is_single( )){
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'doyel-grid-two-column' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
			}
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'doyel-grid-two-column' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<?php if ( is_singular() ) : ?>
			<footer class="entry-footer">
				<?php doyel_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>