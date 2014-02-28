        <section id="contact">
            <div class="section-content">
                <h1>— Contacta con nosotros —</h1>
                <div class="success">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/done.png" alt="done">
                    <h2>¡MUCHAS GRACIAS!</h2>
                    <h4>Hemos recibido el formulario correctamente.<br>Pronto nos pondremos en contacto contigo ;-) </h4>
                </div>
                <div class="double-column">
                    <div class="column">
                        <p>Y ahora sí, esto es el final. Si tenías simplemente curiosidad por saber de qué va todo esto enhorabuena por llegar hasta aquí (nos alegraremos si nos mandas unas líneas dándonos tu opinión). Si crees que puede interesarte algún taller o curso, no le des más vueltas: contáctanos y luego decide si al final te quedas o no. Aquí no se cobra nada por escribir, verdad verdadera.</p>
                        <p>Además, en Lanavenodriza.com nos encanta tener visitas.<br>Estamos aquí:</p>
                        <div class="direction">
                            <a href="https://maps.google.es/maps?q=Calle+del+Doctor+Fourquet,+27,+Madrid&amp;hl=es&amp;sll=40.477795,-3.703508&amp;sspn=0.621529,1.399384&amp;oq=doctor&amp;hnear=Calle+del+Doctor+Fourquet,+27,+28012+Madrid,+Community+of+Madrid,+Comunidad+de+Madrid&amp;t=m&amp;z=16">Doctor Fourquet, 27<br>
                            28012 Madrid</a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="form">
                            <form id="contact_form" action="https://docs.google.com/a/topxel.com/forms/d/1h4_m-fk4RVWfhaP901KdKAdpTjdh9Gjbl6lKrY3I6cY/formResponse" target="hidden_iframe" method="POST">
                                <div class="input">
                                    <label>¿Cómo te llamas?</label>
                                    <input type="text" name="entry.601117224" id="entry_601117224" aria-required="true">
                                    <small class="error">Campo necesario</small>
                                </div>
                                <div class="input">
                                    <label>Déjanos al menos tu email para que podamos contactar contigo</label>
                                    <div class="double-input">
                                        <input type="text" value="Un email" name="entry.1170097165" id="entry_1170097165" aria-required="true">
                                        <input type="text" value="Un teléfono" name="entry.1118247367" id="entry_1118247367" aria-required="true">
                                        <small class="error">Campo obligatorio</small>
                                    </div>
                                </div>
                                <div class="input">
                                    <label>Estás interesado en...</label>
                                    <input type="text" name="entry.394094967" id="entry_394094967" aria-required="true" style="display:none">

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
                                <div class="input about">
                                    <label>Quién eres, a qué te dedicas... Dedícanos unas palabras</label>
                                    <textarea name="entry.316693739" id="entry_316693739" aria-required="true"></textarea>
                                    <small class="error">Campo obligatorio</small>
                                </div>
                                <input type="submit" name="submit" value="Toc Toc">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
