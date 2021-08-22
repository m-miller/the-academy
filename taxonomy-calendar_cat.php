<?php
/*
 * Calendar Taxonomy Template
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
									<?php 
										$cals = get_field('calendar_items');
										$month = date("F", strtotime($cals['start_date']));
										$stdate = date("d", strtotime($cals['start_date']));
										$enddate = date("d", strtotime($cals['end_date']));
										//var_dump($enddate);
										
										echo '<div style="display: flex; justify-content: flex-start;align-items: center; line-height: 1;padding-bottom: 1.5em ;border-bottom: 1px dotted #ccc;">';
										
										echo '<div style="align-self: center; width:75px; height: 75px; border-radius:50%; background-color: #ccc; display: inline-block; text-align: center; margin-right: 2em; padding-top: 1.8em; font-size: small;line-height:1.3;">' . $month . '<br />'. $stdate .'-'.$enddate . '</div>'; 
										
										echo '<div style="display: inline-block; margin: 0 2em 0 0;">' . wp_get_attachment_image( $cals['type'], 'acad-thumb-75', array("class"=>"img-responsive") ) . '</div>'; 
										
										echo '<div style="display: flex; flex-direction: column; margin-bottom: 1em; align-self: flex-end;">';
										
											echo '<h2 style="margin: 0;"><a href="'. get_the_permalink() .'" rel="bookmark" title="' . get_the_title() .'">' . get_the_title() . '</a></h2>';
										
											echo '<p style="margin: .5em 0 0 0;justify-content: flex-start;">'. $cals['location'] . '</p>';
										
										echo '</div>';
										
										echo '<a style="margin-left: auto;margin-right:5em;" href="'.get_permalink($query->ID).'"<button type="button" class="orange-button head-cta">Learn More</button></a>';
										
										echo '</div>';
										?>

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
