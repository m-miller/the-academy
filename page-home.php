<?php
/*
 Template Name: Home Page
 *
 *
 */

 get_header(); ?>

<div class="content">

	<div class="inner-content wrap cf">

		<main class="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<section class="m-all t-1of2 d-1of2" id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<header class="article-header">
						<h1 class="page-title" itemprop="headline"><?php the_field('headline') ?></h1>
					</header> 
				</section>
							
				<section class="m-all t-2of2 d-2of2 entry-content cf" itemprop="articleBody">
					<?php the_field('description'); ?>
				</section> <?php // end article section ?>

				<section class="m-all t-2of2 d-2of2 entry-content cf" style="margin-bottom: 4em;">
								
					<?php	echo '<a class="orange-button" href="' . get_field('cta_link') . '">' . get_field('cta') . '</a>';
							
				endwhile; endif; ?>
							 	 
				</section>
					
				<section>
				<?php if( have_rows('cards') ):
						while ( have_rows('cards') ) : 
							the_row(); 
					?>
							<div class="homecard m-all t-1of2 d-1of4"> 
			 	
								<div class="icon">
								<?php
									$img = get_sub_field('icon');
									if( !empty( $img ) ) {
										echo wp_get_attachment_image( $img, 'acad-thumb-75', array("class"=>"img-responsive") ); 
									}
								?>
								</div> 
							<?php
								echo '<h2><a href="'.get_sub_field('link').'">'. get_sub_field('title') . '</a></h2>';
								echo '<p>' .get_sub_field('text'). '</p>';
							?>
							</div> 
						<?php
			 
						endwhile;

						else :

						endif;

						?>
				</section>
</main>
</div>
					<!-- map needs to be centered, blue background edge to edge -->
					
				 <?php 
				 
				 echo '<h2 style="text-align: center; padding-top: 1em;">' . get_field('partners_header') . '</h2>';  
				 
				 ?>
					
					
						 <section id="map">
							 
							 
							 <div>
							 
							 <?php  $mapimg = get_field('map');
							 if( !empty( $mapimg ) ) {
								   echo wp_get_attachment_image( $mapimg, array('1200x400'), array("class"=>"img-responsive") ); 
							} 
							 
							 ?>
							 </div>
						 </section>
						 
						 
<div class="inner-content wrap cf">
	
						 <section>
						 
						 <div style="display: flex; justify-content: space-evenly;"> 
						 
						 <?php
						 if( have_rows('below_map_callouts') ):

						  	// loop through the rows of data
						     while ( have_rows('below_map_callouts') ) : the_row();  ?>  
							 <div class="homecard m-all t-1of2 d-1of3" style="border: none; margin: 2em 3em 0 0"> 
							 
							<div class="icon">
							<?php
						         $img = get_sub_field('icon');
								 if( !empty( $img ) ) {
									 echo wp_get_attachment_image( $img, 'acad-thumb-75', array("class"=>"img-responsive") );   //echo wp_get_attachment_image( $img, array('100x100'), array("class"=>"img-responsive") ); 
								} 
							?>
							</div> 
							<?php
								echo '<h2>'. get_sub_field('intro_text') . '</h2>';
								echo '<p>' .get_sub_field('text'). '</p>';
								 ?>
								 
							 </div> <?php
							 
						     endwhile;

						 else :

						 endif;
						 
						 
						 ?>
					 </div>
					 </section>
					 
					 
						 <section>
							 <?php
							 // echo '<h2 style="text-align: center">' . get_field('partners_header') . '</h2>';

							 if ( have_rows( 'members_slide' ) ) { ?>
							   
								  <div class="members-slide">
							     <?php 
								  while ( have_rows( 'members_slide' ) ) { 
									  the_row();
									  $logo = get_sub_field( 'logo' ); 
								 ?>
							       
								 <div>
							         <?php echo wp_get_attachment_image($logo, 'slick', false, array('class' => 'img-responsive' ) ); ?>
								   </div>
							       
							     <?php } //endforeach; ?>
							   </div>
							 <?php } //endif; ?>
							 
							 
						 </section>
						 
						<!--</main>-->

						<?php //get_sidebar(); ?>

				<!--</div>  .inner-content -->
</div> <!-- inner-content 2 -->

<?php get_template_part( 'partials/contact-us-above-footer' ); ?>

</div>

<?php get_footer();