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
                    <img src="img/done.png" alt="done">
                    <h2>¡Muchas gracias!</h2>
                    <h3>Hemos recibido el formulario correctamente. <span class="br">Pronto nos pondremos en contacto contigo ;-)</span></h3>
                </div>
                <!-- /form sent successfully  -->             
    
                <div class="two-col">
                    <!-- contact address --> 
                    <div class="col">
                        <p>Y ahora sí, esto es el final. Si tenías simplemente curiosidad por saber de qué va todo esto enhorabuena por llegar hasta aquí (nos alegraremos si nos mandas unas líneas dándonos tu opinión). Si crees que puede interesarte algún taller o curso, no le des más vueltas: contáctanos y luego decide si al final te quedas o no. Aquí no se cobra nada por escribir, verdad verdadera.</p>
                        <p>Además, en Lanavenodriza.com nos encanta tener visitas. <span class="br">Estamos aquí:</span></p>
                        <div class="vcard">
                            <p class="fn hidden">
                                <a class="url" href="http://www.lanavenodriza.com/">La Nave Nodriza</a>
                            </p>
                            <p class="adr">
                                <a href="https://www.google.es/maps/place/Calle+Doctor+Fourquet,+27/@40.4072034,-3.6983727,17z/data=!4m2!3m1!1s0xd42262c1aec8ed1:0xb79e6a1a031bad36" rel="external">
                                    <span class="street-address">Doctor Fourquet, 27</span><br>
                                    <span class="postal-code">28012</span>                                
                                    <span class="region">Madrid</span><br>
                                    <span class="country-name hidden">España</span>
                                </a>
                            </p>
                            <p class="tel hidden">+34 91 622 67 91</p>
                        </div>
                    </div>
                    <!-- /contact address -->
                    
                    <!-- contact form --> 
                    <div class="col">
                        <form id="contact_form" action="https://docs.google.com/forms/d/1sVhgYPmx-bprmQJGp9x8Me4VDer-L5l1tt1tqopEASg/formResponse" target="hidden_iframe" method="POST">
                            <legend class="hidden">Envíanos un mensaje</legend>
                            <div class="field-block">
                                <label>¿Cómo te llamas?</label>
                                <input type="text" name="entry.1889934454" id="entry_1889934454" aria-required="true">
                                <small class="error">Campo necesario</small>
                            </div>
                            <div class="field-block inline-fields">
                                <label>Déjanos al menos tu email para que podamos contactar contigo</label>
                                <div class="double-input">
                                    <input type="text" value="Un email" name="entry.897595538" id="entry_897595538" aria-required="true">
                                    <input type="text" value="Un teléfono" name="entry.1188903209" id="entry_1188903209" aria-required="true">
                                    <small class="error">Campo obligatorio</small>
                                </div>
                            </div>
                            <div class="field-block">
                                <label for="interested">Estás interesado en…</label>
                                <input type="text" name="entry.2018499662" id="entry_2018499662" aria-required="true" style="display:none">

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
                                <small class="error top">Campo necesario</small>
                            </div>    
                            <div class="field-block">
                                <label>Quién eres, a qué te dedicas... Dedícanos unas palabras</label>
                                <textarea name="entry.1111417980" id="entry_1111417980" aria-required="true"></textarea>
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