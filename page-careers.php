<?php
/*
 Template Name: Careers Page
 *
 *
 */
$jobs = get_field('careers');

//$jobs_gallery = $jobs['jobs_gallery'];

//var_dump($jobs);

 get_header(); ?>

<div class="content">

	<div class="inner-content wrap cf">

		<main class="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<section id="career-head" id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<header class="article-header careers-header">
						
						<h1 class="page-title" itemprop="headline"><?php echo $jobs['jobs_page_heading'] ?></h1>
					
					</header> 

					<?php	
					
					echo '<div class="career-intro">'; // main wrapper 4 items
					
					echo $jobs['jobs_intro_text'];
					
					?>
							 	 
				
				</section>
			
			<?php 

			echo '<section style="margin-top: 3em;">';

			echo '<div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" id="careers-mosaic" class="mosaic">';
			
			if( have_rows('careers') ):

				while ( have_rows('careers') ) : the_row();

					if( have_rows('jobs_gallery') ):

						while ( have_rows('jobs_gallery') ) : the_row();
		
							$img = wp_get_attachment_image_src( get_sub_field('jobs_image') );
		
							echo '<div class="photo" data-high-res-image-src="' . $img[0] . '">' . wp_get_attachment_image( get_sub_field('jobs_image'), '', array("class"=>"img-responsive") ) . '</div>'; 
		
						endwhile;

					else :

					endif;
			
				endwhile;
		
			endif;

			echo '</div>';

			//echo '</div>';

			?>

			</section>
				
				
				
				
				<section style="display: flex; flex-direction: row; justify-content: space-evenly; flex-flow: row wrap;">
					
				<?php 
				// grid section 
				
			
				        echo '<h2 style="text-align: center;margin-bottom: 1em;">' . $jobs['jobs_culture_heading'] . '</h2>';
							
	   					echo '<div style="display: flex; flex: 0 0 100%; flex-wrap: wrap">'; // main wrapper 4 items
					
	   					$icgrid = $jobs['jobs_culture'];
					
	   					foreach ( $icgrid as $igrid ) :

	   							$icon = $igrid['jobs_culture_icon'];
	   							$heading = $igrid['jobs_culture_heading'];
	   							$text = $igrid['jobs_culture_text'];
							
	   							echo '<div class="au-grid-wrap">'; // container
							
	   							echo '<div style="margin:1em;">';
							
	   							echo '<div style="">' . wp_get_attachment_image( $icon, 'acad-thumb-50', array("class"=>"img-responsive") ) . '</div>'; 
							
	   							echo '<p style="font-weight: 800; line-height: 1.4; margin-bottom: 0;">' . $heading . '</p>';
							
	   							echo '<p style="font-size: .8em; line-height: 1.5;">' . $text . '</p>';
							
	   							echo '</div></div>';
							
	   							//endwhile;

	   					// No value.
	   					//else :
	   					    // Do something...
	   					endforeach;
						
	   					echo '</div>';
							
				
					?>

				</section>
				
				
				<section id="core-values">
					
				<?php 
				
				
				$cv = $jobs['jobs_core_values'];
				
				//if( have_rows('careers') ):
					//var_dump($cv);
				//    while ( have_rows('careers') ) : the_row();

				        //if( get_row_layout() == 'core-values' ):
							
							
			
				            echo '<h2 style="text-align: center;margin-bottom: 1em;">' . $cv['cv_header'] . '</h2>';
							
							echo '<div style="display: flex;">';
							
							
							echo '<div style="margin: 0 auto;">';
							$img = $cv['cv_image'];
							if( !empty( $img ) ) {
								echo wp_get_attachment_image( $img, '', array("class"=>"img-responsive") ); 
							}
						
							echo '</div>';	
							
							/*$icons = $cv['cv_icon_list'];
							echo '<div style="flex-direction: column;">'; // wrap
								
								//if( have_rows('cv_icon_list') ):
									
								   // while ( have_rows('cv_icon_list') ) : the_row();	
								   
								   foreach ($icons as $icon):
										
										echo '<div style="display: flex; align-items: center; margin-bottom: 1em;">'; 
										
			 							//echo '<div style="justify-content: flex-start;">'; // wrap
										
										echo '<div class="icon-50" style="margin-right: 1em;">';
								
											$img = $icon['cv_icon'];
											if( !empty( $img ) ) {
												echo wp_get_attachment_image( $img, 'acad-thumb-40', array("class"=>"img-responsive") ); 
											}
										
										echo '</div>'; // icon 
							
										echo '<p style="flex: 0 0 75%; font-size: 1em; line-height: 1.4; margin: 0;">' . $icon['cv_icon_text']. '</p>';
										//echo '</div>'; //wrap
										echo '</div>';
										
									endforeach;
									//endwhile; 
									
									//endif;
								
								echo '</div>';
								
								
								
							echo '</div>';
							
							*/
						
				       // endif;

				   // endwhile;

				//else :

					//endif;
				
					?>
 
				</section>  
				
				
				
				
				
				<section class="entry-content ">  
					
					
					<?php  // cards   this needs to be a slide 
					echo '<h2 style="text-align: center;margin-bottom: 1em;">' . $jobs['love_the_academy_header'] . '</h2>';
					$cards = $jobs['why_we_love'];
					echo '<div class="career-slide">';
					foreach ( $cards as $card ):
					
					echo '<div class="careers-wwl">';
					
					echo '<p>' . $card['wwl_text'] . '</p>';
					
					echo '<div style="display: inline-block; margin-right: 10px; float: left;">' . wp_get_attachment_image(  $card['wwl_image'], 'acad-thumb-75 headshot', array("class"=>"img-responsive") ) . '</div>'; 
					echo '<p class="pname">' . $card['wwl_name'] . '</p>';
					echo '<p class="ptitle">' . $card['wwl_title'] . '</p>';
					
					echo '</div>';
					
					
				endforeach;
				echo '</div>';
					?>
				
				</section>	
				
				<section>
					<?php  // show open positions
					$openpositions = $jobs['open_positions'];
					echo '<h2 id="jobs" style="text-align: center;margin-bottom: 1em;">' . $openpositions['open_positions_heading'] . '</h2>';
					echo $openpositions['embed_code'];
					
					
					?>
				</section>
				
				
	</main>

</div> <!-- inner-content 2 -->

<?php get_template_part( 'partials/contact-us-above-footer' ); ?>

</div>

<?php get_footer();