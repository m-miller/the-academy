<?php
/*
 Template Name: Who's Who Page
 *
 *
 */

$whos = get_field('whos_who_page');


 get_header(); ?>

<div class="content">

	<div class="inner-content wrap cf">

		<main class="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<section class="resp-section" style="display: flex;" id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<header class="article-header" style="flex: 1 0 50%;">
						
						<h1 class="page-title" itemprop="headline"><?php echo $whos['whos_page_heading'] ?></h1>
						
						<?php 
						//$cta = $top['au_cta'];
					//var_dump($cta['au_cta_text']);
					//if ( $cta['au_cta_display'] == 'Yes' ) {  //wtf??
						//echo '<button type="button" class="orange-button">' . $cta['au_cta_text'] . '</button>';
						//}
				
					 echo $whos['whos_intro_text']; ?>
					
					</header> 

					<?php	// icon grid

					echo '<div style="display: flex; flex: 0 0 50%; flex-wrap: wrap">'; // main wrapper 4 items
					
					$icgrid = $whos['whos_icon_grid'];
					
					foreach ( $icgrid as $igrid ) :

							$icon = $igrid['whos_grid_icon'];
							$heading = $igrid['whos_icon_heading'];
							$text = $igrid['whos_icon_text'];
							
							echo '<div class="au-grid-wrap" style="">'; // container
							
							echo '<div style="margin:1em;">';
							
							echo '<div style="">' . wp_get_attachment_image( $icon, 'acad-thumb-50', array("class"=>"img-responsive") ) . '</div>'; 
							
							echo '<p style="font-weight: 800; line-height: 1.4; margin: 0; font-size: 2.5em;">' . $heading . '</p>';
							
							echo '<p style="font-size: .9em; line-height: 1.5;">' . $text . '</p>';
							
							echo '</div></div>';
							
					endforeach;
						
					echo '</div>';
					
					?>
							 	 
				
				</section>
				
				
   				<?php    // map  ?>
				
				
   			<!-- <section id="whosmap">
				 
				 
   				 <div>
				 
   				 <?php  /* $mapimg = $whos['whos_map'];
   				 if( !empty( $mapimg ) ) {
   					   echo wp_get_attachment_image( $mapimg, array('600'), array("class"=>"img-responsive") ); 
   				} 
				 */
   				 ?>
   				 </div>
				 
   			 </section> -->
				
				
				<?php // callouts    
				
				//$callouts = $whos['whos_callouts'];
				
				//var_dump($callouts);
				?>
				
				<section class="entry-content" style="display: flex; flex-direction: row; flex-wrap: wrap; align-items: flex-start; justify-content: space-evenly;">
					
					
				<?php 
				
				if ( have_rows('whos_who_page')) :
					
					while ( have_rows('whos_who_page')): the_row();  
				
						if ( have_rows('whos_callouts')) :
					
							while ( have_rows('whos_callouts')): the_row();
							
							echo '<div data-aos="zoom-in-right" class="squarewrap">';
							
							echo '<div class="who-callout" style="">';
					
								echo '<p>' . get_sub_field('whos_callout_heading') . '</p>';
					
								if ( have_rows('whos_callout_list')) :
			
									echo '<ul>';
			
									while ( have_rows('whos_callout_list')): the_row();
			
										echo '<li>' . get_sub_field('whos_callout_list_item') . '</li>';
				
									endwhile;
			
									echo '</ul></div></div>';
									
								endif;
					
							endwhile;
				
						endif;
			
					endwhile;
		
				endif;
				
					?>
					
				</section>
				
				
				<section class="entry-content" style="display: flex; flex-direction: row; flex-wrap: wrap; align-items: flex-start; justify-content: space-evenly;">
					
					<?php
					$members = $whos['network_members'];
						foreach ($members as $member ) {
							
							echo '<div class="network-member">' . $member['network_member'] . '</div>';
							
							
							
							
						}
					?>
					
					
					
					
				</section>
				
					

				
		
				

					
					
	</main>

</div> <!-- inner-content 2 -->

<?php get_template_part( 'partials/contact-us-above-footer' ); ?>

</div>

<?php get_footer();