			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer">
					<div id="footer-left">
						
						<div id="logo-footer" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src="/wp-content/uploads/2020/04/academy-logo.png" alt="The Academy Logo"></a></div>
						
					<?php
						
					echo '<div style="margin-top: 1em;"><span style="margin-right: .5em; font-size: 1.5em;">' .get_field('get_in_touch', 'option') . '</span>';
					
					if( have_rows('social_links','option') ):

						while ( have_rows('social_links', 'option') ) : the_row();

					 		$icon = get_sub_field('social_icon', 'option');
					 
					 		if( !empty( $icon )  ) {
								echo '<span class="soc-icon"><a href="'.get_sub_field('social_link','option').'" rel="nofollow noreferrer">' . wp_get_attachment_image( $icon, array('30x30'), array("class"=>"img-responsive") ) . '</a></span>'; 
							} 

					    endwhile;

					else :

					endif;
					
					echo '</div>';
						
					echo '<p><a href="' . get_field('address_map_link', 'option') . '">'. get_field('address', 'option') . '<br />';
					
					echo  get_field('city_state_zip', 'option') . '</a></p>';
					
					echo '<p>P: '. get_field('phone', 'option') . '</p>';
	
					?>
					
					
					
				</div>
					<nav role="navigation">
						<h3>Explore and Connect</h3>
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'academy' ),   // nav name
    					'menu_class' => 'footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => '',  // fallback function
						//'walker' => new TwoC_Walker_Nav_Menu
						)); ?>
					</nav>
					
				
					
				</div>
				
				
				<div id="inner-footer-bottom">
					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'description' ); ?>. All Rights Reserved</p>
					
					<div >
						<nav role="navigation">
							<?php wp_nav_menu(array(
	    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
	    					'container_class' => 'footer-submenu cf',         // class of container (should you choose to use it)
	    					'menu' => __( 'Footer Submenu', 'academy' ),   // nav name
	    					'menu_class' => 'nav cf',            // adding custom nav class
	    					'theme_location' => 'footer-submenu',             // where it's located in the theme
	    					'before' => '',                                 // before the menu
	    					'after' => '',                                  // after the menu
	    					'link_before' => '',                            // before each link
	    					'link_after' => '',                             // after each link
	    					'depth' => 0,                                   // limit the depth of the nav
	    					'fallback_cb' => '',  // fallback function
							//'walker' => new TwoC_Walker_Nav_Menu
							)); ?>
						</nav>
					</div>
				</div>
			
			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->