<?php $metadata = get_page_metadata((int)$post->ID); ?>
<div class="col sticky-parent">
    <div class="sticky-box">
        <div class="course-price">            
            <h2>Precio</h2>
            <ul class="price">
                <li><strong><?php echo $metadata['price']; ?></strong>€</li>
                <?php echo $metadata['discounts']; ?>
            </ul>
        </div>

        <div class="course-date">                      
            <h2>Fechas</h2>
            <ul class="date">
                <?php echo $metadata['dates']; ?>                                               
            </ul>
        </div>

        <div class="call-to-action">
            <a href="#" class="button">Reservar plaza <span class="availability">- <?php echo $metadata['remaining']; ?> -</span></a>
        </div>

        <div class="notes">
            <p>Descuentos si te apuntas a más de un taller. Si tu empresa tiene necesidades formativas también podemos hablar para ofreceros un paquete de formación adaptado a lo que necesitáis. Contáctanos y te damos más detalles.</p>
        </div>

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
    </div>                     
</div>