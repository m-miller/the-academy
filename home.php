<?php 
/*
 * Template Name: Blog Page
 *
 *
 */


get_header(); ?>
<!-- blog index -->
			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header" style="padding: 1.5em 0;">

									<h1 class="page-title">Featured Articles</h1>

									<section  style="display: flex; justify-content: space-around; flex-wrap: wrap; align-items: center; margin-top: 3em;">	
									<?php   //featured (3)
									//  loop for just featured
									$args = array ('post_type' => 'post', 'category_name' => 'featured', 'post_status' => 'publish', 'posts_per_page' => 2 ); // order by custom field date!

									$query = new WP_Query($args);
									if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();  ?>
									
									<div style="background-color: #e4e6eb; flex: 0 0 40%;">
										
										<div style="padding: 3em;">
											
									<div style="margin-right: 1em;"><?php echo get_the_post_thumbnail( $post->ID, array('400','250'), array( 'class' => 'img-responsive' ) ); ?></div>
									
									<?php 
									$term_obj_list = get_the_terms( $post->ID, 'category' );
									//var_dump($term_obj_list); // rm featured...
									$terms_string = join(', ',wp_list_pluck($term_obj_list, 'name'));
									$terms = str_replace("Featured, ", "", $terms_string);
									echo $terms;
									
									//$terms = get_the_terms($post->ID, 'category'); ?>
									<p>
									
								</p>
									<h3 class="entry-title single-title"  itemprop="headline" rel="bookmark"><?php the_title(); ?></h3>
									
									<?php
								
									echo '<p style="margin: 0;"><a href="'. get_the_permalink() .'" rel="bookmark" title="' . get_the_title() .'">Read More</a></p>';
								
									?>
								</div>
								</div>
									
									<?php
									
									endwhile;
									endif;
									?>
										</section>
										
										
									
									<div style="margin-top: 3em;">
										<div style="display: inline-block; float: left; margin-right: 3em; width: 12em;">
									<?php
										
									$categories = get_categories('taxonomy=category');
 
									  $select = "<select name='cat' id='cat' class='postform'>";
									  $select.= "<option value='-1'>All Categories</option>";
 
									  foreach($categories as $category){
									    if($category->count > 0){
									        $select.= "<option value='".$category->slug."'>".$category->name."</option>";
									    }
									  }
									  $select.= "</select>";
 
									  echo $select;
									?>
 
									<script type="text/javascript"><!--
									    var dropdown = document.getElementById("cat");
									    function onCatChange() {
									        if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
									            location.href = "<?php echo home_url();?>/category/"+dropdown.options[dropdown.selectedIndex].value+"/";
									        }
									    }
									    dropdown.onchange = onCatChange;
									--></script>
									</div>
									
								</div>
								</header>
								
									<section  class="resource-section">	  <?php // style="display: flex; justify-content: space-around; flex-wrap: wrap; align-items: center; margin-top: 3em;"?>
								
									<?php
									
									$args = array ('post_type' => 'post', 'category__not_in' => array( 24 )); // order by custom field date!

									$query = new WP_Query($args);
									if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
									?>

										
										<div class="resource-wrap"> <?php //style="background-color: #e4e6eb; flex: 0 0 30%; margin-bottom: 3em;" ?>
											
											<div style="padding: 3em;">
												
										<div style="margin-right: 1em;"><?php echo get_the_post_thumbnail( $post->ID, 'acad-300', array( 'class' => 'img-responsive' ) ); ?></div>
										
										<?php $terms = get_the_terms($post->ID, 'category'); ?>
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
										<?php
										// in cards ...
										
										//the_content();
										/*
										$cals = get_field('calendar_items');
										$month = date("F", strtotime($cals['start_date']));
										$stdate = date("d", strtotime($cals['start_date']));
										$enddate = date("d", strtotime($cals['end_date']));
										//var_dump($enddate);
										
										echo '<div style="display: flex; justify-content: flex-start;align-items: center; line-height: 1;padding-bottom: 1.5em ;border-bottom: 1px dotted #ccc;">';
										
										echo '<div style="align-self: center; width:75px; height: 75px; border-radius:50%; background-color: #ccc; display: inline-block; text-align: center; margin-right: 2em; padding-top: 1.8em; font-size: small;line-height:1.3;">' . $month . '<br />'. $stdate .'-'.$enddate . '</div>'; 
										
										echo '<div style="display: inline-block; margin: 0 2em 0 0;">' . wp_get_attachment_image( $cals['type'], 'acad-thumb-75', array("class"=>"img-responsive") ) . '</div>'; 
										
										echo '<div style="display: flex; flex-direction: column; margin-bottom: 1em; align-self: flex-end;">';
										
											echo '<h2 style="margin: 0;" class="">' . get_the_title() . '</h2>';
										
											echo '<p style="margin: .5em 0 0 0;justify-content: flex-start;">'. $cals['location'] . '</p>';
										
										echo '</div>';
										
										echo '<a style="margin-left: auto;margin-right:5em;" href="'.get_permalink($query->ID).'"<button type="button" class="orange-button head-cta">Learn More</button></a>';
										
										echo '</div>';
										
										*/

									
									?>
								
								<?php endwhile; else : ?>
									
									</section>

								<footer class="article-footer">

                  <?php //the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer>

								<?php //comments_template(); ?>

							</article>

							

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Blog posts Not Found!', 'academy' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php //_e( 'Uh Oh. Something is missing. Try double checking things.', 'academy' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php //_e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; 
							
							wp_reset_postdata(); 
							
							?>

						</main>

						<?php //get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
