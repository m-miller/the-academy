<?php
/*
 Template Name: Calendar
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/



get_header(); ?>
<!-- calendar -->
			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'alm cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header" style="padding: 1.5em 0;">

									<h1 class="page-title" style="margin-bottom: 1em;"><?php the_title(); ?></h1>

									<!--<p class="byline vcard">
										<?php //printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>-->
									<?php
										
									$categories = get_categories('taxonomy=calendar_cat');
 
									  $select = "<select name='cat' id='cat' class='postform'>";
									  $select.= "<option value='-1'>Type of Program</option>";
 
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
									            location.href = "<?php echo home_url();?>/calendar-category/"+dropdown.options[dropdown.selectedIndex].value+"/";
									        }
									    }
									    dropdown.onchange = onCatChange;
									--></script>

								</header>

								
									<?php
									
									$args = array ('post_type' => 'calendar'); // order by custom field date!

									$query = new WP_Query($args);
									if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
									?>
									
									<section class="calendar">
										<?php
										$cals = get_field('calendar_items');
										$month = date("F", strtotime($cals['start_date']));
										$stdate = date("d", strtotime($cals['start_date']));
										$enddate = date("d", strtotime($cals['end_date']));
										//var_dump($enddate);
										
										echo '<div class="calendar-wrap">';
										
										//echo '<div style="align-self: center; width:75px; height: 75px; border-radius:50%; background-color: #ccc; display: inline-block; text-align: center; margin-right: 2em; padding-top: 1.8em; font-size: small;line-height:1.3;">' . $month . '<br />'. $stdate .'-'.$enddate . '</div>'; 
										
										echo '<div class="calendar-icon">' . wp_get_attachment_image( $cals['type'], 'acad-thumb-75', array("class"=>"img-responsive") ) . '</div>'; 
										
										echo '<div class="calendar-content-wrap">';
										
											echo '<h2>' . get_the_title() . '</h2>';
										
											echo '<p style="margin: .5em 0 0 0;justify-content: flex-start;">'. $cals['location'] . '</p>';
										
										echo '</div>';
										
										echo '<a href="'.get_permalink($query->ID).'"<button type="button" class="orange-button head-cta">Learn More</button></a>';
										
										echo '</div>';

										
										
										/*wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'academy' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );*/
									?>
								</section>
								<?php endwhile; 
										endif;

								 ?>

							</article>

					<?php
						
		          $max = $query->max_num_pages;
				  //var_dump($max);
		          if ($max >= 2):
					//  var_dump(wp_doing_ajax());
		        ?>
		          <div id="load" style="margin: 0 auto 2em; display: block;" class="grey-button" data-next-page="2" data-type="load" data-post-type="calendar"><?php _e('Load More', 'academy'); ?></div>


							<?php endif; 
							
							wp_reset_postdata(); 
							
							?>

						</main>

						<?php //get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
