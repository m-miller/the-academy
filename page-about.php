<?php
/*
 Template Name: About Us Page
 *
 *
 */


//var_dump(get_field('about_us'));

/*
array(5) { [0]=> array(2) { ["acf_fc_layout"]=> string(11) "top_of_page" ["top_of_page"]=> array(4) { ["au_page_heading"]=> string(8) "About Us" ["au_intro_text"]=> string(464) "

" ["au_cta"]=> array(3) { ["au_cta_display"]=> array(1) { [0]=> string(3) "Yes" } ["au_cta_text"]=> string(13) "Join the Team" ["au_cta_link"]=> string(20) "http://academy.local" } ["au_icon_grid"]=> array(4) { [0]=> array(3) { ["au_grid_icon"]=> int(142) ["au_icon_grid_heading"]=> string(34) "Leading Health System Exclusivity" ["au_icon_grid_text"]=> string(114) "The Academy restricts its health system membership to largest and most progressive organizations in the country. " } [1]=> array(3) { ["au_grid_icon"]=> int(123) ["au_icon_grid_heading"]=> string(26) "Executive Leadership Focus" ["au_icon_grid_text"]=> string(73) "All programs exclusively focus on the most senior health system leaders. " } [2]=> array(3) { ["au_grid_icon"]=> int(130) ["au_icon_grid_heading"]=> string(23) "Intimate Peer-Learning" ["au_icon_grid_text"]=> string(89) "The Academy fosters uniquely incisive discourse by focusing on intimate peer interaction." } [3]=> array(3) { ["au_grid_icon"]=> int(146) ["au_icon_grid_heading"]=> string(19) "Relationship Focus" ["au_icon_grid_text"]=> string(105) "The Academy believes the most productive partnerships occur when there is strong rapport and connection. " } } } } [1]=> array(2) { ["acf_fc_layout"]=> string(13) "icon_info_box" ["info_box"]=> array(1) { [0]=> array(2) { ["ib_icon"]=> bool(false) ["ib_text"]=> string(0) "" } } } [2]=> array(4) { ["acf_fc_layout"]=> string(10) "principles" ["pr_heading"]=> string(0) "" ["icon_list"]=> bool(false) ["pr_photo"]=> bool(false) } [3]=> array(2) { ["acf_fc_layout"]=> string(10) "leadership" ["leadership"]=> bool(false) } [4]=> array(2) { ["acf_fc_layout"]=> string(12) "square-cards" ["cards"]=> bool(false) } }

*/

//$about = get_field('about_us');

if( have_rows('about_us') ):

    while ( have_rows('about_us') ) : the_row();

        if( get_row_layout() == 'top_of_page' ):
			
            $top = get_sub_field('top_of_page');

        endif;

    endwhile;

else :

endif;

 get_header(); ?>

<div class="content">

	<div class="inner-content wrap cf">

		<main class="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<section style="display: flex;" id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<header class="article-header" style="flex: 1 0 50%;">
						
						<h1 class="page-title" style="margin-bottom: 1em;" itemprop="headline"><?php echo $top['au_page_heading'] ?></h1>
						
						<?php 
						$cta = $top['au_cta'];
					//var_dump($cta['au_cta_text']);
					//if ( $cta['au_cta_display'] == 'Yes' ) {  //wtf??
						//echo '<button type="button" class="orange-button">' . $cta['au_cta_text'] . '</button>';
						//}
				
					 echo $top['au_intro_text']; 
					 
					 echo '<a style="margin-top: 1em;" class="orange-button" href="' . $cta['au_cta_link'] . '">' . $cta['au_cta_text'] . '</a>';
					
					
					
					
					?>
					
					</header> 
					
					<?php
					/*
					echo '<div style="display: flex; flex: 0 0 50%; flex-wrap: wrap">'; // photo...
					$formid = $top['au_form'];
					echo '<script src="//app-ab42.marketo.com/js/forms2/js/forms2.min.js"></script><form id="mktoForm_'.$formid.'"></form><script>MktoForms2.loadForm("//app-ab42.marketo.com", "754-GLN-078", '.$formid.');</script>';
					
					 echo '</div>';
					 */
					 ?>
					
				</section>

					<?php	// icon grid

					//echo '<div style="display: flex; flex: 0 0 50%; flex-wrap: wrap">'; // main wrapper 4 items
					
					echo '<section style="margin-top: 2em;">';
					
					$icgrid = $top['au_icon_grid'];
					
					foreach ( $icgrid as $igrid ) :

							$icon = $igrid['au_grid_icon'];
							$heading = $igrid['au_icon_grid_heading'];
							$text = $igrid['au_icon_grid_text'];
							
							//echo '<div class="au-grid-wrap" style="flex: 1 0 50%; justify-content: center; align-items: center; text-align: center;">'; // container
							
							//echo '<div style="margin:1em;">';
							
							//echo '<div style="">' . wp_get_attachment_image( $icon, 'acad-thumb-50', array("class"=>"img-responsive") ) . '</div>'; 
							
							//echo '<p style="font-weight: 800; line-height: 1.4; margin-bottom: 0;">' . $heading . '</p>';
							
							//echo '<p style="font-size: .8em; line-height: 1.5;">' . $text . '</p>';
							
							//echo '</div></div>';
							
							//endwhile;
							

							echo '<div class="homecard m-all t-1of2 d-1of4">'; 
			 	
							echo '<div class="icon">';
								
									//$img = get_sub_field('icon');
									//if( !empty( $img ) ) {
							echo wp_get_attachment_image( $icon, 'acad-thumb-75', array("class"=>"img-responsive") ); 
									//}
								
							echo '</div>'; 
							
							echo '<h2>'. $heading . '</h2>';
							echo '<p>' .$text. '</p>';
							
							echo '</div>'; 
						
							
							
					endforeach;
						
					echo '</section>';
					
					?>
							 	 
				
				</section>
			
				<?php 
				
				// info box section 
				
				if( have_rows('about_us') ):

				    while ( have_rows('about_us') ) : the_row();

				        if( get_row_layout() == 'icon_info_box' ):
							
							echo '<h2 style="text-align: center;">' . get_sub_field('info_box_heading') . '</h2>';
						
							echo '<section class="about-history">';	
							
				            $icon_infobox = get_sub_field('info_box');
							
							foreach ( $icon_infobox as $iconbox ):
								
								echo '<div class="aboutinfobox"  data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">'; 
								
			 						echo '<div style="margin: 1em;">';
								
										echo '<div class="icon">';
								
											$img = $iconbox['ib_icon'];
									
												if( !empty( $img ) ) {
										
													echo wp_get_attachment_image( $img, 'acad-thumb-75', array("class"=>"img-responsive") ); 
												}
								
										echo '</div>'; 
							
										//echo '<h2><a href="'.get_sub_field('link').'">'. get_sub_field('title') . '</a></h2>';
										echo '<p style="font-size: .8em; line-height: 1.4; margin: 0;">' .$iconbox['ib_text']. '</p>';
						
									echo '</div>';
									
								echo '</div>'; 
							
							endforeach;
							
				        endif;

				    endwhile;

				else :

				endif;
				
					?>
					
				</section>
				
				<section>
					
				<?php 
				
				if( have_rows('about_us') ):

				    while ( have_rows('about_us') ) : the_row();

				        if( get_row_layout() == 'principles' ):
			
				            echo '<h2 style="text-align: center;">' . get_sub_field('pr_heading') . '</h2>';
							
							echo '<div class="principles-wrap">';
							
							echo '<div class="principles-inner">'; // wrap
								
								if( have_rows('pr_icons') ):  //numbers 
									
								    while ( have_rows('pr_icons') ) : the_row();	
										
										echo '<div style="display: flex; align-items: center;">'; 
										
			 							//echo '<div style="justify-content: flex-start;">'; // wrap
										
										echo '<div class="icon" style="margin-right: 1em;">';
										// numbers 1 - n 
											$img = get_sub_field('pr_icon');
											if( !empty( $img ) ) {
												echo wp_get_attachment_image( $img, 'acad-thumb-75', array("class"=>"img-responsive") ); 
											}
										
										echo '</div>'; // icon 
							
										echo '<p style="flex: 0 0 75%; font-size: .8em; line-height: 1.4; margin: 0;">' .get_sub_field('pr_icon_text'). '</p>';
										//echo '</div>'; //wrap
										echo '</div>';
										
						
									endwhile; 
									
								endif;
								
								echo '</div>';
								
								echo '<div class="principles-photo">';
								$img = get_sub_field('pr_photo');
								if( !empty( $img ) ) {
									echo wp_get_attachment_image( $img, 'acad-600', array("class"=>"img-responsive") ); 
								}
							
								echo '</div>';	
								
							echo '</div>';
							
							
						
				        endif;

				    endwhile;

				else :

				endif;
				
					?>

				</section>
				
				

				
				
				<section class="entry-content" id="cards" style="display: flex; justify-content: space-around; flex-wrap: wrap; align-items: center;">
					
				<?php 
				
				if( have_rows('about_us') ):

				    while ( have_rows('about_us') ) : the_row();

				        if( get_row_layout() == 'square-cards' ):  
							
							if( have_rows('cards') ):

							    while ( have_rows('cards') ) : the_row();
							
							
							
							?>
							 <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" class="square">
							<div class="big-block"> 

								<!--<div class="icon">
								<?php
								/*	$img = get_sub_field('icon');
									if( !empty( $img ) ) {
										echo wp_get_attachment_image( $img, 'acad-thumb-75', array("class"=>"img-responsive") ); 
									} 
								*/
								?>
								</div> -->
							<?php
				
								echo '<p style="font-size: 1.25em; margin: 0;">' .get_sub_field('sqcard_text'). '</p>';
								//echo '<p><a href="'.get_sub_field('link').'">'. get_sub_field('title') . '</a></p>';
							?>
							</div> 
						</div>
							
							<?php
							
						endwhile;
						
					endif;
							
						endif;
						
					endwhile;
					
				endif;
				
				?>
				
				<section id="leadership">
					
				<?php 
				
				if( have_rows('about_us') ):

				    while ( have_rows('about_us') ) : the_row();

				        if( get_row_layout() == 'leadership' ):
			
				            echo '<h2 style="text-align: center;margin-bottom: 1.5em;">' . get_sub_field('lead_heading') . '</h2>';
							
							
							
							
							echo '<div style="display: flex; justify-content: space-evenly; flex-flow: row wrap;">';
							
							//echo '<div style="">'; // wrap
								
								if( have_rows('leadership') ):
									
								    while ( have_rows('leadership') ) : the_row();	
										
										echo '<div style="flex: 1 0 200px; text-align: center; margin: 0 .5em 1em;">'; // item wrap
										
			 							//echo '<div style="justify-content: flex-start;">'; // wrap
										
										echo '<div class="lead-photo">';
								
											$img = get_sub_field('lead_photo');
											if( !empty( $img ) ) {
												echo wp_get_attachment_image( $img, 'acad-600', array("class"=>"img-responsive") ); 
											}
										
										echo '</div>'; // photo 
							
										echo '<p style="font-size: .8em; line-height: 1.4; margin: 0;">' .get_sub_field('lead_name'). '</p>';
										
										echo '<p style="font-size: .8em; line-height: 1.4; margin: 0;">' .get_sub_field('lead_title'). '</p>';
										//echo '</div>'; //wrap
										echo '</div>';
										
						
									endwhile; 
									
								endif;
								
								echo '</div>';	
								
							//echo '</div>';
							
							
						
				        endif;

				    endwhile;

				else :

				endif;
				
					?>	

					
				</section>

					
					
	</main>

</div> <!-- inner-content 2 -->

<?php get_template_part( 'partials/contact-us-above-footer' ); ?>

</div>

<?php get_footer();