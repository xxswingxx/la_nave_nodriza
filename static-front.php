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

    <div class="content">
        <div id="what" class="flexslider carrousel">
            <ul class="slides">
                <li><span>Image 01</span></li>
                <li><span>Image 02</span></li>
                <li><span>Image 03</span></li>
                <li><span>Image 04</span></li>
                <li><span>Image 05</span></li>
                <li><span>Image 06</span></li>
                <li><span>Image 07</span></li>
                <li><span>Image 08</span></li>
                <li><span>Image 09</span></li>
                <li><span>Image 10</span></li>
                <li><span>Image 11</span></li>
            </ul>
            <div class="what-it-is">
                <div class="what-explanation">
                    <h1>
                        Todos tenemos algo que aprender
                    </h1>
                    <div class="extra">
                        <?php 
                            $pages = get_active_list();
                            $length = count($pages);
                            $pages_links = get_pages_links_with_titles($pages);
                        ?>
                        <?php for($i = 0; $i < $length && $i < 2; $i++) { ?>
                            <? $metadata = get_page_metadata($pages[$i]->ID); ?>
                            <h2>
                                <?php if (isset($metadata['state'])){ ?>
                                    <span> <?php echo $metadata['state'] ?></span>
                                 <? } ?>
                                <?php echo $metadata['type'] . ': ' .  $pages_links[$i]; ?> 
                            </h2>
                        <? } ?>
                    </div><br>
                    <a href="#contact">
                    <div class="button">Contáctanos</div></a>
                </div>
            </div>
        </div>
        <section id="la-nave">
            <div class="section-content">
                <h1>— ¿Qué es Lanavenodriza.com? —</h1>
                <div class="double-column">
                    <div class="column">
                        <p>Lanavenodriza.com surge con la vocación de crear nuevas experiencias formativas en el campo del diseño, formas diferentes de aprender. Perseguimos la idea de crear un entorno donde estudiantes y ponentes trabajen juntos, dando forma a un modelo educativo que sea útil tanto a la academia como a la industria, y donde la práctica tenga un papel fundamental.</p>
                        <p>Los que organizamos esto llevamos a nuestras espaldas varios años impartiendo formación en otros másters, talleres, cursos y seminarios de diversas escuelas y universidades. Somos amigos, y la gente que sale de aquí forma parte de ese nuevo núcleo de amistad.</p>
                    </div>
                    <div class="column">
                        <blockquote>
                            “Queremos crear un espacio de aprendizaje artesanal, humano, promovido por gente normal y honesta, con amplia experiencia en el sector digital.”
                        </blockquote>
                        <p>La primera misión de Lanavenodriza.com es el Curso de diseño de productos digitales, pero ya tenemos en marcha otros formatos: seminarios, talleres, cursos de fin de semana e incluso eventos del sector también tendrán su sitio aquí, en un ambiente cómodo, agradable e inspirador.</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="founders" class="grey">
            <div class="section-content">
                <h1>— A los mandos del timón —</h1>
                <div class="three-column">
                    <div class="column first">
                        <div class="who-info">
                            <div class="avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/ignacio-buenhombre.jpg" alt="Ignacio Buenhombre">
                            </div>
                            <div class="name">
                                <h3>Ignacio Buenhombre</h3>
                            </div>
                            <div class="description">
                                Haciendo siempre honor a su apellido, Ignacio es de esas personas que realmente saben transmitir confianza al equipo. Los años de profesión (y la barba) le han convertido en un viejo lobo al que da gusto escuchar, y sus batallitas siempre esconden sabias enseñanzas.
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="who-info">
                            <div class="avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/juan-leal.jpg" alt="Juan Leal">
                            </div>
                            <div class="name">
                                <h3>Juan Leal</h3>
                            </div>
                            <div class="description">
                                Juan ha navegado por todo el mundo intentando hacer la tecnología más humana y amigable, y basta pasarse por <a href="http://www.seisdeagosto.com/indica/" target="_blank">su blog</a> para ver la multitud de pecios que ha encontrado a lo largo de todas estas singladuras. Ahora espera repartir todo su botín en Lanavenodriza.com.
                            </div>
                        </div>
                    </div>
                    <div class="column last">
                        <div class="who-info">
                            <div class="avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/ludita.jpg" alt="Isabel Inés (Ludita)">
                            </div>
                            <div class="name">
                                <h3>Isabel Inés (Ludita)</h3>
                            </div>
                            <div class="description">
                                Aventurera de corazón, Isa lleva años viajando por los remotos mares del diseño. Ha pasado de aprendiz a maestra casi sin darse cuenta: cuanto más sabe, más ve todo lo que le falta por aprender. Lanavenodriza.com. le permite seguir explorando tierras desconocidas.
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </section>
        <section id="program" class="">
            <div class="section-content">
                <h1>— Nuestras singladuras —</h1>
                <div class="three-block">
                    <div class="three-column">
                        <?php for($i = 0; $i < $length && $i < 3; $i++){ ?>
                            <div class="column first">
                                <div class="program-img">
                                    <?php $metadata = get_page_metadata($pages[$i]->ID);
                                        $thumbnail = get_thumbnail($pages[$i]->ID)
                                    ?>
                                    <?php if($thumbnail != false) { ?>
                                        <img src="<?php echo $thumbnail[0] ?>" >
                                    <? } ?>
                                    <h2> 
                                        <?php if (isset($metadata['state'])){ ?>
                                            <span> <?php echo $metadata['state'] ?></span>
                                        <? } ?>
                                        <? echo $metadata['type']; ?>  
                                    </h2>
                                    <h3>
                                        <? echo $pages_links[$i]; ?> 
                                        <span><? echo $metadata['extra'] ?></span>
                                    </h3>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                    <div class="three-column">
                        <?php for($i = 0; $i < $length && $i < 3; $i++){ ?>
                            <div class="column first">
                                <p> 
                                    <? echo $pages[$i]->post_excerpt; ?>
                                    </br>
                                    <a href="<? echo get_permalink($pages[$i]->ID); ?>"> Leer más </a>.
                               </p>
                       
                            </div>
                        <? } ?>
                    </div>
                </div>
                <?php if ($length > 3) { ?>
                    <div class="three-block">
                        <div class="three-column">
                            <?php for($j = $i; $j < $length; $j++){ ?>
                                <div class="column first">
                                    <div class="program-img">
                                        <?php $metadata = get_page_metadata($pages[$j]->ID);
                                            $thumbnail = get_thumbnail($pages[$j]->ID)
                                        ?>
                                        <?php if($thumbnail != false) { ?>
                                            <img src="<?php echo $thumbnail[0] ?>" >
                                        <? } ?>
                                        <h2> 
                                            <?php if (isset($metadata['state'])){ ?>
                                                <span> <?php echo $metadata['state'] ?></span>
                                            <? } ?>
                                            <? echo $metadata['type']; ?>  
                                        </h2>
                                        <h3>
                                            <? echo $pages_links[$j]; ?> 
                                            <span><? echo $metadata['extra'] ?></span>
                                        </h3>
                                    </div>
                                </div>
                            <? } ?>
                        </div>
                        <div class="three-column">
                            <?php for($j = $i; $j < $length; $j++){ ?>
                                <div class="column first">
                                    <p> 
                                        <? echo $pages[$j]->post_excerpt; ?>
                                        </br>
                                        <a href="<? echo get_permalink($pages[$j]->ID); ?>"> Leer más </a>.
                                   </p>
                           
                                </div>
                            <? } ?>
                        </div>
                    </div>
                <? } ?>
            </div>
        </section>
        <section id="to-whom" class="">
            <div class="section-content">
                <h1>— ¿A quién está dirigido? —</h1>
                <div class="double-column">
                    <div class="column">
                        <p>Buscamos gente ilusionada con la idea de compartir nuestras singladuras, con ganas de aprender y de aportar. Por cursos anteriores han pasado psicólogos, ilustradores, diseñadores gráficos, programadores, gente de IT, de marketing, newbies y lobos de mar… Creemos que en la variedad está gran parte de la esencia de todo esto.</p>
                    </div>
                    <div class="column">
                        <p>Navegamos en torno al diseño y la tecnología, por eso todos nuestros talleres y cursos están ligados de una manera u otra al diseño de productos digitales. Queremos en la Nave embarquen personas interesadas en aprender, compartir y, por supuesto, enseñarnos un poco más de todo esto.</p>
                    </div>
                </div>
            </div>
        </section>

        <?php get_template_part( 'contact-form', 'page' ); ?>
        <?php get_footer(); ?>
