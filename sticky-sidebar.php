<?php $metadata = get_page_metadata((int)$post->ID); ?>
<div class="col" id="sidebar">
    <div class="course-price">            
        <h2>Precio</h2>
        <h3><strong><?php echo (isset($metadata['price']) ? $metadata['price'] : '' ); ?></strong>€</h3>
        <ul class="price">
            <?php echo (isset($metadata['discounts']) ? $metadata['discounts'] : '' ); ?>
        </ul>
    </div>

    <div class="course-date">                      
        <h2>Fechas</h2>
        <ul class="date">
            <?php echo (isset($metadata['dates']) ? $metadata['dates'] : '' ); ?>
        </ul>
    </div>

    <div class="call-to-action">
        <?php $call_to_action = isset($metadata['call_to_action']) ? $metadata['call_to_action'] : '#' ?>
        <?php if (isset($metadata['remaining'])) { ?>
            <a href="<?php echo $call_to_action ?>" class="button">Reservar plaza <span class="availability">- <?php echo $metadata['remaining']; ?> -</span></a>
        <?php } else { ?> 
            <a href="<?php echo $call_to_action ?>" class="button">Reservar plaza</a> 
        <?php } ?>
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
