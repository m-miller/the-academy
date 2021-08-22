<?php 

// Generic page template

get_header(); ?>

<!-- page -->

	<div id="content">

		<div id="inner-content" class="wrap cf">

			<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<?php if (have_posts()) : 

					while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<section class="entry-content" itemprop="articleBody" >

						<?php

							$id = get_the_ID();

							if ( have_rows( 'flexible_layouts', $id ) ) :

								while ( have_rows( 'flexible_layouts', $id ) ) : the_row();

									get_template_part( 'partials/flexible-layouts/' . get_row_layout() );  // autoload: layout partial filename matches layout slug 

								endwhile;

							//elseif ( get_the_content() ) :

							endif;

						?>

						</section> <?php // end article section ?>

						<footer class="article-footer cf">

						</footer>

					<?php //comments_template(); ?>

					</article>

				<?php 

					endwhile; 

				endif; 
				
				?>

			</main>

			<?php //get_sidebar(); ?>

		</div>

	</div>
	
<?php get_template_part( 'partials/contact-us-above-footer' ); 

get_footer(); ?>
