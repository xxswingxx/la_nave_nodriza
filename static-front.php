<?php
/* Template Name: Home */

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since La Nave Nodriza 1.0
 */

    get_header(); ?>

    <!-- slider -->
    <header role="banner" id="home">
        <div class="flexslider carrousel">
            <ul class="slides">
                <li><span>01></span></li>
                <li><span>02></span></li>
                <li><span>03</span></li>
                <li><span>04</span></li>
                <li><span>05</span></li>
                <li><span>06</span></li>
                <li><span>07</span></li>
                <li><span>08</span></li>
                <li><span>09</span></li>
                <li><span>10></span></li>
                <li><span>11</span></li>
            </ul>
            <div class="splash-wrapper">
                <div class="splash">
                    <h1>Todos tenemos algo que aprender</h1>
                    <div class="latest">
                        <?php 
                            $pages = get_active_list();
                            $length = count($pages);
                            $pages_links = get_pages_links_with_titles($pages);
                        ?>
                        <?php for($i = 0; $i < $length && $i < 2; $i++) { ?>
                            <? $metadata = get_page_metadata($pages[$i]->ID); ?>
                            <h2>
                                <?php if (isset($metadata['state'])){ ?>
                                    <em> <?php echo $metadata['state'] ?></em>
                                 <? } ?>
                                <?php echo $pages_links[$i]; ?> 
                            </h2>
                        <? } ?>
                    </div>
                    <div class="contact-button">
                        <a href="#contact" class="button">Contáctanos</a>
                    </div>
                </div>
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
            </div>
        </div>
    </header>
    <!-- /slider --> 
    
    <hr>

    <div id="main" role="main">
      
        <section id="la-nave-nodriza">
            <div class="content">
                <h1>— ¿Qué es Lanavenodriza.com? —</h1>
                <div class="two-col">
                    <div class="col">
                        <p>Lanavenodriza.com surge con la vocación de crear nuevas experiencias formativas en el campo del diseño, formas diferentes de aprender. Perseguimos la idea de crear un entorno donde estudiantes y ponentes trabajen juntos, dando forma a un modelo educativo que sea útil tanto a la academia como a la industria, y donde la práctica tenga un papel fundamental.</p>
                        <p>Los que organizamos esto llevamos a nuestras espaldas varios años impartiendo formación en otros másters, talleres, cursos y seminarios de diversas escuelas y universidades. Somos amigos, y la gente que sale de aquí forma parte de ese nuevo núcleo de amistad.</p>
                    </div>
                    <div class="col">
                        <blockquote>
                            “Queremos crear un espacio de aprendizaje artesanal, humano, promovido por gente normal y honesta, con amplia experiencia en el sector digital.”
                        </blockquote>
                        <p>La primera misión de Lanavenodriza.com es el Curso de diseño de productos digitales, pero ya tenemos en marcha otros formatos: seminarios, talleres, cursos de fin de semana e incluso eventos del sector también tendrán su sitio aquí, en un ambiente cómodo, agradable e inspirador.</p>
                    </div>
                </div>
                <div id="position-founders"></div>
            </div>
        </section>
        
        <hr>
        <section class="highlighted-gray three-col" id="founders">
            <div class="content">

                <h1>— A los mandos del timón —</h1>
                <!-- buenhombre -->                 
                <div class="col">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/teachers/sample_02.jpg" alt="Ignacio Buenhombre">
                    </div>
                    <div class="info">
                        <h2>Ignacio Buenhombre</h2>
                        <p>Haciendo siempre honor a su apellido, Ignacio es de esas personas que realmente saben transmitir confianza al equipo. Los años de profesión (y la barba) le han convertido en un viejo lobo al que da gusto escuchar, y sus batallitas siempre esconden sabias enseñanzas.</p>
                    </div>
                </div>
                <!-- /buenhombre -->                 
                
                <!-- leal --> 
                <div class="col">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/teachers/sample_03.jpg" alt="Ignacio Buenhombre">
                    </div>
                    <div class="info">
                        <h2>Juan Leal</h2>
                        <p>Juan ha navegado por todo el mundo intentando hacer la tecnología más humana y amigable, y basta pasarse por <a href="http://www.seisdeagosto.com/indica/" rel="external">su blog</a> para ver la multitud de pecios que ha encontrado a lo largo de todas estas singladuras. Ahora espera repartir todo su botín en Lanavenodriza.com.</p>                             
                    </div>
                </div>
                <!-- /leal --> 

                <!-- ludita --> 
                <div class="col">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/teachers/sample_04.jpg" alt="Ignacio Buenhombre">
                    </div>
                    <div class="info">
                        <h2>Isabel Inés (Ludita)</h2>
                        <p>Aventurera de corazón, Isa lleva años viajando por los remotos mares del diseño. Ha pasado de aprendiz a maestra casi sin darse cuenta: cuanto más sabe, más ve todo lo que le falta por aprender. Lanavenodriza.com. le permite seguir explorando tierras desconocidas.</p>
                    </div>
                </div>
                <!-- /ludita -->
            </div>
            <div id="position-courses"></div>
        </section>

        <hr>

        <!-- courses -->
        <section class="highlighted-dark" id="courses">
            <div class="content">
                <h1>— Nuestras singladuras —</h1>
                <!-- first pages row-->
                <div class="three-col">
                    <?php for($i = 0; $i < $length && $i < 3; $i++){ ?>
                        <div class="col">
                            <div class="image">
                                <?php $metadata = get_page_metadata($pages[$i]->ID);
                                    $thumbnail = get_thumbnail($pages[$i]->ID, 'medium')
                                ?>
                                <?php if($thumbnail != false) { ?>
                                    <a href="<?php echo get_permalink($pages[$i]->ID) ?>">
                                        <img src="<?php echo $thumbnail[0] ?>" >
                                    </a>
                                <? } ?>
                            </div>
                            <div class="course-intro">
                                <a href="<?php echo get_permalink($pages[$i]->ID) ?>">
                                    <?php if (isset($metadata['state'])){ ?>
                                        <em> <?php echo $metadata['state'] ?></em>
                                    <? } ?>
                                    <? echo $metadata['type']; ?>
                                </a>
                            </div> 
                            <h2><? echo $pages_links[$i]; ?></h2>
                            <h3><?php echo (isset($metadata['extra']) ? $metadata['extra'] : '' ); ?></h3>
                        </div>
                    <? } ?>
                </div>
                <div class="three-col">
                    <?php for($i = 0; $i < $length && $i < 3; $i++){ ?>
                        <div class="col">
                            <p> 
                                <? echo $pages[$i]->post_excerpt; ?>
                                </br>
                                <a href="<? echo get_permalink($pages[$i]->ID); ?>"> Leer más </a>.
                           </p>
                        </div>
                    <? } ?>
                </div>

                <!-- /first pages row-->
                <!-- second pages row-->
                <div class="three-col">
                    <?php for($j = $i; $j < $length && false; $j++){ ?>
                        <div class="col">
                            <div class="image">
                                <?php $metadata = get_page_metadata($pages[$j]->ID);
                                    $thumbnail = get_thumbnail($pages[$j]->ID, 'medium')
                                ?>
                                <?php if($thumbnail != false) { ?>
                                    <a href="<?php echo get_permalink($pages[$j]->ID) ?>">
                                        <img src="<?php echo $thumbnail[0] ?>" >
                                    </a>    
                                <? } ?>
                            </div>
                            <div class="course-intro">
                                <a href="<?php echo get_permalink($pages[$i]->ID) ?>">
                                    <?php if (isset($metadata['state'])){ ?>
                                        <em> <?php echo $metadata['state'] ?></em>
                                    <? } ?>
                                    <? echo $metadata['type']; ?>
                                </a>
                            </div> 
                            <h2><? echo $pages_links[$j]; ?></h2>
                            <h3><? echo $metadata['extra'] ?></h3>
                        </div>
                    <? } ?>
                </div>
                <div class="three-col">
                    <?php for($j = $i; $j < $length  && false; $j++){ ?>
                        <div class="col">
                            <p> 
                                <? echo $pages[$j]->post_excerpt; ?>
                                </br>
                                <a href="<? echo get_permalink($pages[$j]->ID); ?>"> Leer más </a>.
                           </p>
                        </div>
                    <? } ?>
                </div>
                <!-- /second pages row -->
            </div>
            <div id="position-who-is-for"></div>
            <!-- /active workshops -->
        </section>
        <!-- /courses -->
        <hr>

        <section class="two-col" id="who-is-for">
            <div class="content">
                <h1>— ¿A quién está dirigido? —</h1>
                <div class="col">
                    <p>Buscamos gente ilusionada con la idea de compartir nuestras singladuras, con ganas de aprender y de aportar. Por cursos anteriores han pasado psicólogos, ilustradores, diseñadores gráficos, programadores, gente de IT, de marketing, newbies y lobos de mar… Creemos que en la variedad está gran parte de la esencia de todo esto.</p>
                </div>
                <div class="col">
                    <p>Navegamos en torno al diseño y la tecnología, por eso todos nuestros talleres y cursos están ligados de una manera u otra al diseño de productos digitales. Queremos en la Nave embarquen personas interesadas en aprender, compartir y, por supuesto, enseñarnos un poco más de todo esto.</p>
                </div>
            </div>
        </section>
    </div>
    
    <?php get_template_part( 'contact-form-footer', 'page' ); ?>
