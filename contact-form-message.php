<!-- contact address --> 
<div class="col">
    <?php if (is_front_page()) { ?>
        <p>Y ahora sí, esto es el final. Si tenías simplemente curiosidad por saber de qué va todo esto enhorabuena por llegar hasta aquí (nos alegraremos si nos mandas unas líneas dándonos tu opinión). Si crees que puede interesarte algún taller o curso, no le des más vueltas: contáctanos y luego decide si al final te quedas o no. Aquí no se cobra nada por escribir, verdad verdadera.</p>
        <p>Además, en Lanavenodriza.com nos encanta tener visitas. <span class="br">Estamos aquí:</span></p>
    <?php } else { 
        echo get_contact_form_message($post->ID);
    }?>
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