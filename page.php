<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since La Nave Nodriza 1.0
 */

	get_header(); ?>
	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
	    <!-- header -->
	    <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
	    	<?php 
	    		$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full' );
	    		$metadata = get_page_metadata((int)$post->ID);
	    	?>
	    	<? echo '<header role="banner" style="background-image:url('. $thumbnail[0] . ')">' ?>
	    <? else :?>
	    	<header role="banner">
	    <?php endif; ?>
	        <div class="content">       

	            <!-- courses navigation -->
	            <ul class="courses-navigation">
	            	<?php
	            		$ids = get_prev_next();
					?>
					<?php if (!empty($ids['prev'])) { ?>
		                <li>
		                    <a href="<?php echo get_permalink($ids['prev']); ?>" class="previous">Anterior</a>
		                </li>
		            <?php } ?>
		            <?php if (!empty($ids['next'])) { ?>
		                <li>
							<a href="<?php echo get_permalink($ids['next']); ?>" class="next">Siguiente</a>
		                </li>
		            <?php } ?>       
	            </ul>
	            <!-- /courses navigation -->
	            
	            <!-- share -->
	            <div id="fb-root"></div>
		        <script>(function(d, s, id) {
		          var js, fjs = d.getElementsByTagName(s)[0];
		          if (d.getElementById(id)) return;
		          js = d.createElement(s); js.id = id;
		          js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=140978915248";
		          fjs.parentNode.insertBefore(js, fjs);
		        }(document, 'script', 'facebook-jssdk'));</script>
	            <div class="share">
		        	<div class="fb-like" data-href="http://www.lanavenodriza.com" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
	            </div>
	            <!-- /share -->                       
	            
	            <!-- course heading -->
	            <div class="course-heading">
	                <h1><?php the_title(); ?></h1>
	                <h2><?php echo $metadata['subtitle']; ?></h2>
	                <div class="pricing">
	                    <div class="call-to-action">
	                        <a href="#" class="button">Reservar plaza <span class="availability">- <?php echo $metadata['remaining']; ?> -</span></a>
	                    </div>
	                    <div class="price">
	                        <strong><?php echo $metadata['price']; ?></strong>€
	                    </div>
	                </div>
	            </div>                          
	            <!-- course heading -->
	        </div>
	    </header>
	    <!-- /header --> 
		<div id="main" role="main">
			<!-- content -->
			<?php
				$content = split_content();
				echo $content[0];
				get_template_part('sticky-sidebar');
				echo $content[1];
			?>
			<!-- /content -->
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

			<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
		</div>		
	<?php endwhile; ?>

        <!-- /course info -->                 
    <hr>
    <!-- more courses -->                 
    <?php get_template_part( 'related-pages', 'page' ); ?>   
    <!-- /more courses -->        

	<?php get_template_part( 'contact-form-footer', 'page' ); ?>