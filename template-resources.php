<?php
/*
 Template Name: Resources
 *
*/



get_header(); ?>
<!-- resources -->
			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'alm cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header" style="padding: 1.5em 0;">

									<h1 class="page-title" style="margin-bottom: 1em;"><?php the_title(); ?></h1>

									<!--<p class="byline vcard">
										<?php //printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>-->
									<div style="margin-top: 3em;">
										<div style="display: inline-block; float: left; margin-right: 3em; width: 12em;">
									<?php
										
									$categories = get_categories('taxonomy=resources_cat');
 
									  $select = "<select name='cat' id='cat' class='postform'>";
									  $select.= "<option value='-1'>All Types</option>";
 
									  foreach($categories as $category){
									    if($category->count > 0){
									        $select.= "<option value='".$category->slug."'>".$category->name."</option>";
									    }
									  }
									  $select.= "</select>";
 
									  echo $select;
									?>
 
									<script>
									    var dropdown = document.getElementById("cat");
									    function onCatChange() {
									        if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
									            location.href = "<?php echo home_url();?>/resources-category/"+dropdown.options[dropdown.selectedIndex].value+"/";
									        }
									    }
									    dropdown.onchange = onCatChange;
									</script>
									</div>
									<div style="display: inline-block; float: left; width: 12em;">
									<?php	
									$categories = get_categories('taxonomy=resources_topic');
 
									  $select = "<select name='topic' id='topic' class='postform'>";
									  $select.= "<option value='-1'>All Topics</option>";
 
									  foreach($categories as $category){
									    if($category->count > 0){
									        $select.= "<option value='".$category->slug."'>".$category->name."</option>";
									    }
									  }
									  $select.= "</select>";
 
									  echo $select;
									?>
 
									<script>
									    var dropdown = document.getElementById("topic");
									    function onCatChange() {
									        if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
									            location.href = "<?php echo home_url();?>/resources-category/"+dropdown.options[dropdown.selectedIndex].value+"/";
									        }
									    }
									    dropdown.onchange = onCatChange;
									</script>
									</div>
								</div>
								</header>

								<section class="resource-section">	
									<?php
									
									$args = array ('post_type' => 'resources'); // order by custom field date!

									$query = new WP_Query($args);
									//var_dump($query->max_num_pages);
									if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
									
									?>
										
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
								
								<?php endwhile; endif; ?>
								</section>
							

							</article>

								<?php 
						
					          $max = $query->max_num_pages;
							  //var_dump($query->max_num_pages);
					          if ($max >= 2 ):
								 //var_dump(wp_doing_ajax());
					        ?>
					          <div id="loadres" style="margin: 0 auto 2em; display: block;" class="grey-button" data-next-page="2" data-type="load" data-post-type="resources"><?php _e('Load More', 'academy'); ?></div>


								<?php endif;

						
							
							wp_reset_postdata(); 
							
							?>

						</main>

						<?php //get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
