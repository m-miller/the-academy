<?php
/*
 * Single-resources
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header('nohero'); 

$formid = get_field('res_marketo_form_id');

?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="article-header" style="display: flex;">
									<?php 
									//echo '<div style="margin-right: 1em;">' . get_the_post_thumbnail( $post->ID, 'acad-thumb-100', array( 'class' => 'img-responsive' ) ) . '</div>'; ?>
									
									<div style="display: flex; flex-direction: column; justify-content: flex-end;">
										
										
									
									<h2 class="single-title custom-post-type-title"><?php the_title(); ?></h2>
									
									
									<?php $terms = get_the_terms($post->ID, 'resources_cat'); ?>
									<p>
										
									<?php //var_dump($terms); 
									foreach ($terms as $term) {
										//echo count($terms);
										
										echo $term->name;
									}
									
									?>
									
									</p>
									
									
								</div>
									<!--<p class="byline vcard"><?php
										//printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'academy' ), get_the_time( 'Y-m-j' ), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) ), get_the_term_list( $post->ID, 'custom_cat', ' ', ', ', '' ) );
									?></p>-->

								</header>

								<section class="entry-content" style="display: flex;">
									<div style="flex: 0 0 50%; margin-right: 2em;">
									<?php
										echo '<p class="tags">'. get_the_term_list( $post->ID, 'resources_topic', '<span class="tags-title">' . __( 'Topics:', 'academy' ) . '</span> ', ', ' ) . '</p>';
										the_content();

										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'academy' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</div>
								
								<div style="border: 1px solid #ccc; flex: 0 0 40%; margin-left: 3em; padding: 2em;">
									<?php 
									echo '<script src="//app-ab42.marketo.com/js/forms2/js/forms2.min.js"></script><form id="mktoForm_'.$formid.'"></form><script>MktoForms2.loadForm("//app-ab42.marketo.com", "754-GLN-078", '.$formid.');</script>';
									?>
									
								</div>
								
								</section> <!-- end article section -->

								<footer class="article-footer">
									

								</footer>

								<?php //comments_template(); 
								//var_dump(get_the_term_list($post->ID, 'resources_topic'));
								
								?>

							</article>

							<?php endwhile; ?>

							<?php else : ?>

									

							<?php endif; ?>

						</main>

						<?php get_sidebar(); 
						
						
						
						
						
						
						?>

				</div>

			</div>

<?php get_footer(); ?>
