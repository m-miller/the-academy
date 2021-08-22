<?php
/*
 * Single-calendar
 *
*/
?>

<?php get_header('nohero'); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php //$args = array ('post_type' => 'calendar'); // order by custom field date!

									//$query = new WP_Query($args);
									//if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 
									if (have_posts()) : while (have_posts()) : the_post(); 
									
									
									$cals = get_field('calendar_items');
									$month = date("F", strtotime($cals['start_date']));
									$stdate = date("d", strtotime($cals['start_date']));
									$enddate = date("d", strtotime($cals['end_date']));
									
									$formid = $cals['cal_marketo_form_id'];
									
									//var_dump($cals);
									
									?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="article-header">
									<?php
									echo '<div style="display: flex; justify-content: flex-start;align-items: center; line-height: 1;padding-bottom: 1.5em ;">';
									echo '<div style="display: inline-block; margin: 0 2em 0 0;">' . wp_get_attachment_image( $cals['type'], 'acad-thumb-75', array("class"=>"img-responsive") ) . '</div>'; 
									
									
									?>
									<div style="flex-direction: column;"><h2 class="single-title custom-post-type-title"><?php the_title(); ?></h2> 
									<?php
									echo '<p style="margin: .5em 0 0 0;justify-content: flex-start;">'. $cals['location'] . '</p></div>';
									?>
									<!--<p class="byline vcard"><?php
										//printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) ), get_the_term_list( $post->ID, 'custom_cat', ' ', ', ', '' ) );
									?></p>-->
									</div>
								</header>

								<section class="entry-content" style="display: flex;">
									<div style="flex: 0 0 50%; margin-right: 2em;">
									<?php
										// the content (pretty self explanatory huh)
										//the_content();
										//echo '<p>' . $month . ' ' . $stdate .'-'.$enddate . '</p>'; 
										
										echo '<div>' . $cals['details'] . '</div>';
										
									?>
								</div>
								
								
								<div style="flex: 0 0 40%; margin-top: -1em;">
									<div style="margin: 0 auto">
									<?php 
									echo '<script src="//app-ab42.marketo.com/js/forms2/js/forms2.min.js"></script><form style="margin: 0 auto;" id="mktoForm_'.$formid.'"></form><script>MktoForms2.loadForm("//app-ab42.marketo.com", "754-GLN-078", '.$formid.');</script>';
									?>
								</div>
								</div>
									
								</section> <!-- end article section -->

								<footer class="article-footer">
									<p class="tags"><?php //echo get_the_term_list( get_the_ID(), 'custom_tag', '<span class="tags-title">' . __( 'Custom Tags:', 'bonestheme' ) . '</span> ', ', ' ) ?></p>

								</footer>

								<?php //comments_template(); ?>

							</article>

							<?php endwhile; ?>

							<?php else : ?>

									
							<?php endif; ?>

						</main>

						<?php //get_sidebar(); 

						
						?>

				</div>

			</div>

<?php get_footer(); ?>
