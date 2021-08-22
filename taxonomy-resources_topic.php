<?php
/*
 * Resources Taxonomy Template
 *
*/
?>

<?php get_header(); ?>
<!-- calendar_cat -->
			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<h1 class="archive-title h2"><span><?php _e( 'Program Calendars:', 'academy' ); ?></span> <?php single_cat_title(); ?></h1>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="article-header">

								<!--	<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<p class="byline vcard"><?php
										//printf(__('Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(__('F jS, Y', 'academy')), bones_get_the_author_posts_link(), get_the_term_list( get_the_ID(), 'custom_cat', "", ", ", "" ));
									?></p> -->

								</header>

								<section>
									<div class="resource-wrap">
										
										<div style="padding: 3em;">
											<div style="margin-right: 1em;"><?php echo get_the_post_thumbnail( $post->ID, 'acad-300', array( 'class' => 'img-responsive' ) ); ?></div>
									
											<?php $terms = get_the_terms($post->ID, 'resources_cat'); ?>
											<p>
									
												<?php //var_dump($terms); 
												foreach ($terms as $term) {
													//echo count($terms);
									
													echo $term->name;
												}
								
												?>
											</p>
											<h3 class="entry-title single-title"  itemprop="headline" rel="bookmark"><?php the_title(); ?></h3>
									
											<?php
								
											echo '<p style="margin: 0;"><a href="'. get_the_permalink() .'" rel="bookmark" title="' . get_the_title() .'">Read More</a></p>';
								
											?>
										</div>
									</div>
								</section>

							</article>

							<?php endwhile; 

									

								else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Nothing Found!', 'academy' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'academy' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php //_e( 'This is the error message in the taxonomy-custom_cat.php template.', 'academy' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

						<?php //get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
