<?php  // header.php  


// do this by env...

nocache_headers();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>
<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(' | '); ?></title>

		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
		<meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

		<?php // drop Google Analytics Here ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">
			
			<header class="header short no-bg" role="banner" itemscope itemtype="http://schema.org/WPHeader" >
				
				<a class="toggle-nav" data-close="&#935;" data-open="&#9776;" href="#">&#9776;</a>
				<nav class="mobilenav">
				    <!--<div class="skip-link screen-reader-text">
				        <a href="#content" title="<?php // esc_attr_e( 'Skip to content', 'academy' ); ?>">
				            <?php // _e( 'Skip to content', 'academy' ); ?>
				        </a>
				    </div>-->
				    <?php wp_nav_menu( array( 
				        'container_class' => 'mobile-nav', 
						'menu' => __( 'Main Menu', 'academy' ),  // nav name
				        'theme_location' => 'main-nav'
				    ) );
					
				    wp_nav_menu( array( 
				        'container_class' => 'mobile-login', 
						'menu' => __( 'Login', 'academy' ),  // nav name
				        'theme_location' => 'login'
				    ) ); ?>
				</nav><!-- .main -->
				
				<div id="inner-header" class="wrap">
					
					<div id="logo" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src="/wp-content/uploads/2020/04/academy-logo.png" alt="The Academy Logo"></a></div>


					<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						
						<?php wp_nav_menu(array(
    					         'container' => true,                            // remove nav container
    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
    					         'menu' => __( 'Main Menu', 'academy' ),    // nav name
    					         'menu_class' => 'nav top-nav cf',               // adding custom nav class
    					         'theme_location' => 'main-nav',                 // where it's located in the theme
    					         'before' => '',                                 // before the menu
        			             'after' => '',                                  // after the menu
        			             'link_before' => '',                            // before each link
        			             'link_after' => '',                             // after each link
        			             'depth' => 0,                                   // limit the depth of the nav
    					         'fallback_cb' => ''                             // fallback function (if there is one)
						)); 
						 // login link
					    wp_nav_menu( array( 
					        'container_class' => 'menu-login', 
							'menu' => __( 'Login', 'academy' ),  // nav name
					        'theme_location' => 'login'
					    ) );
						
						?>

					</nav>
					<div class="head">
						<?php /*
						if( $contents['hc_header_style'] == "Standard" ) {
							if (!empty($contents['hc_heading'])) {
								
								echo '<div><h1>'.$contents['hc_heading'].'</h1></div>';
							}
							if (!empty($contents['hc_heading_cta'])) {
								echo '<a class="orange-button head-cta" href="' . $contents['hc_heading_cta_link'] . '">' . $contents['hc_heading_cta_text']. '</a>';
							}
						} */
						?>
					</div>
				</div>
				
				
				
			</header>
			
			<?php  	//if ( $cl == "no-bg" ) { 
						echo '<div id="swoosh" class="nbg"> <img src="/wp-content/themes/academy/library/images/Website_HeaderSwoosh.svg" alt="swoosh decoration"/> </div>';
						//} else {
					//	echo '<div id="swoosh" class="sbg"> <img src="/wp-content/themes/academy/library/images/Website_HeaderSwoosh.svg" alt="swoosh decoration"/> </div>';
					//}