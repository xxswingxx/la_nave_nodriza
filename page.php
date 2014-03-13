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
	    	<?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full' );?>
	    	<? echo '<header role="banner" style="background-image:url('. $thumbnail[0] . ')">' ?>
	    <? else :?>
	    	<header role="banner">
	    <?php endif; ?>
	        <div class="content">       
	            <!-- courses navigation -->
	            <ul class="courses-navigation">
	                <li>
	                    <a href="#" class="previous">Anterior</a>
	                </li>
	                <li>
	                    <a href="#" class="next">Siguiente</a>
	                </li>             
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
	                <h2>La fórmula secreta para explicar, convencer y vender tus ideas sin fricciones.</h2>
	                <div class="pricing">
	                    <div class="call-to-action">
	                        <a href="#" class="button">Reservar plaza <span class="availability">- Quedan 3 -</span></a>
	                    </div>
	                    <div class="price">
	                        <strong>750</strong>€
	                    </div>
	                </div>
	            </div>                          
	            <!-- course heading -->
	        </div>
	    </header>
	    <!-- /header --> 
		<div id="main" role="main">

			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

			<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
		</div>		
	<?php endwhile; ?>

        <!-- /course info -->                 
    <hr>
    <!-- more courses -->                 
    <section class="more">
        <div class="content" role="complementary">            
            <h2>Otras formaciones</h2>
            <h3>Narrativa, UX, Talleres express…</h3>

            <div class="three-col">
                <div class="col">
                    <div class="image">
                        <a href="#"><img src="img/courses/sample_01.jpg" alt="sample_01" width="540" height="250"></a>
                    </div>
                    <h3><a href="#">Primera edición del curso de diseño de productos digitales</a></h3>
                    <p>Hemos creado un lugar especial, donde las personas son las auténticas protagonistas: 80 metros diáfanos, con wifi para todos, suelo técnico, pizarra en todas las paredes... y un montón de accesorios para convertirse en cada momento en lo que la clase necesite: paneles divisorios, mesas para trabajo en grupo, sillas cómodas... y hasta rincón de pensar.</p>                    
                </div>

                <div class="col">
                    <div class="image">
                        <a href="#"><img src="img/courses/sample_02.jpg" alt="sample_02" width="540" height="249"></a>
                    </div>                        
                    <h3><a href="#">Taller de narrativa en proyectos digitales</a></h3>
                    <p>Hemos creado un lugar especial, donde las personas son las auténticas protagonistas: 80 metros diáfanos, con wifi para todos, suelo técnico, pizarra en todas las paredes... y un montón de accesorios para convertirse en cada momento en lo que la clase necesite: paneles divisorios, mesas para trabajo en grupo, sillas cómodas... y hasta rincón de pensar.</p>                  
                </div>                

                <div class="col">
                    <div class="image">
                        <a href="#"><img src="img/courses/sample_03.jpg" alt="sample_03" width="540" height="249"></a>
                    </div>                        
                    <h3><a href="#">Cinco talleres de especialización de fin de semana</a></h3>
                    <p>Hemos creado un lugar especial, donde las personas son las auténticas protagonistas: 80 metros diáfanos, con wifi para todos, suelo técnico, pizarra en todas las paredes... y un montón de accesorios para convertirse en cada momento en lo que la clase necesite: paneles divisorios, mesas para trabajo en grupo, sillas cómodas... y hasta rincón de pensar.</p>                  
                </div>
            </div>
        </div>
    </section>       
    <!-- /more courses -->        

	<?php get_template_part( 'contact-form-footer', 'page' ); ?>