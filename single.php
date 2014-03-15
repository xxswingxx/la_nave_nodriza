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
                echo '<header role="banner" style="background-image:url('. $thumbnail[0] . ')">';
	    	?>
	    <? else :?>
			<header role="banner">
	    <?php endif; ?>
	        <div class="content">
	            <!-- course heading -->
	            <div class="course-heading">
	                <h1><?php the_title(); ?></h1>
	            </div>                          
	            <!-- course heading -->
	        </div>
	    </header>
	    <br>
	    <!-- /header --> 
		<div id="main" role="main">
			<div class="content">
				<!-- content -->
				<?php the_content();  ?>
				<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
				<?php la_nave_nodriza_post_nav(); ?>
				<!-- /content -->
			</div>
		</div>		
	<?php endwhile; ?>
    <!-- /course info -->                 
    <hr>
    <?php comments_template(); ?>
	<?php get_footer(); ?>