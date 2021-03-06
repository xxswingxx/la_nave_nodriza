<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since La Nave Nodriza 1.0
 */
?>
         <!-- footer -->
        <footer role="contentinfo" id="contact">
            <div class="content">        
                <h2>— Contacta con nosotros —</h2>
                
                <!-- form sent successfully -->             
                <div class="success">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/done.png" alt="done">
                    <h2>¡Muchas gracias!</h2>
                    <h3>Hemos recibido el formulario correctamente. <span class="br">Pronto nos pondremos en contacto contigo ;-)</span></h3>
                </div>
                <!-- /form sent successfully  -->             
    
                <div class="two-col contact-form">
                    <!-- contact address --> 
                    <?php get_template_part('contact-form-message', 'page'); ?>
                    <!-- /contact address -->
                    
                    <!-- contact form --> 
                    <div class="col">
                        <form id="contact_form" action="http://lanavenodriza.us7.list-manage.com/subscribe/post" target="hidden_iframe" method="POST">
                            <input type="hidden" name="u" value="8dfad4817d60eb0bab9c73582">
                            <input type="hidden" name="id" value="034d784be3">
                            <div class="field-block" id="mailchimp">
                                <label>Hello friendlybot!</label>
                                <!-- real people should not fill this in and expect good things -->
                                <input type="text" name="b_8dfad4817d60eb0bab9c73582_034d784be3" value="">
                            </div>
                            <legend class="hidden">Envíanos un mensaje</legend>
                            <div class="field-block inline-fields">
                                <label>¿Cómo te llamas?</label>
                                <input type="text" name="MERGE1" id="first_name" aria-required="true" placeholder="Nombre">
                                <input type="text" name="MERGE2" id="last_name" placeholder="Apellidos">
                                <small class="error">Campo obligatorio</small>
                            </div>
                            <div class="field-block inline-fields">
                                <label for="email">Déjanos al menos tu email para que podamos contactar contigo</label>
                                <input id="email" name="MERGE0" type="email" placeholder="Un email"  aria-required="true">
                                <input id="tel" name="MERGE9" type="tel" placeholder="Un teléfono">
                                <small class="error">Campo obligatorio</small>
                            </div>
                            <div class="field-block">
                                <label for="interested">Estás interesado en…</label>
                                <input type="text" name="MERGE10" id="interested_in" aria-required="true" style="display:none">

                                <div class="btn-group custom-select undefined open">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="filter-option pull-left">Cuéntanos...</div>
                                        &nbsp;
                                        <div class="add-on"><span>›</span></div>
                                    </div>
                                    <ul class="dropdown-menu" role="menu" style="display:none; overflow-y: auto; min-height: 154px; max-height: 272px;">
                                        <li rel="0" class="selected" >
                                            <a tabindex="0" class="notshow" style=""><span class="text">Cuéntanos...</span></a>
                                        </li>
                                        <?php $pages = get_active_list();
                                            $length = count($pages);
                                        ?>
                                        <?php for($i = 0; $i < $length && $i < 3; $i++) { ?>
                                            <li rel="1">
                                                <a tabindex="0" class=""><span class="text"><?php echo $pages[$i]->post_title; ?></span></a>
                                            </li>
                                        <? } ?>
    
                                        <li rel="2">
                                            <a tabindex="0" class=""><span class="text">Talleres de especialización.</span></a>
                                        </li>
                                        <li rel="3">
                                            <a tabindex="0" class=""><span class="text">¡Me interesa todo pardiez!</span></a>
                                        </li>
                                        <li rel="4">
                                            <a tabindex="0" class=""><span class="text">Nada, simplemente quería saludaros.</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <small class="error top">Campo obligatorio</small>
                            </div>    
                            <div class="field-block">
                                <label>Quién eres, a qué te dedicas... Dedícanos unas palabras</label>
                                <textarea name="MERGE4" id="about_you" aria-required="true"></textarea>
                                <small class="error">Campo obligatorio</small>
                            </div>
                            <input type="submit" name="submit" value="Toc Toc">
                        </form>
                        <iframe name="hidden_iframe" id="hidden_iframe" style="display:none"></iframe>
                    </div>
                    <!-- /contact form -->
                </div>
                
                <!-- brand bar -->
                <div class="end-bar">
                    <div class="legal">
                        &copy; Lanavenodriza.com
                    </div>
                    <div class="contact-us">
                        <a href="mailto:hola@lanavenodriza.com">hola@lanavenodriza.com</a> - 91 622 67 91                   
                    </div>                
                </div>
                <!-- /brand bar -->              
            </div> 
        </footer>
        <!-- /footer -->   
        <?php wp_footer(); ?>
    </body>
    <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

         ga('create', 'UA-45860105-1', 'lanavenodriza.com');
         ga('send', 'pageview');
    </script>
</html>