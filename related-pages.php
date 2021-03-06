<?php 
    $pages = get_active_list();
    $length = count($pages);
    $pages_links = get_pages_links_with_titles($pages);
    $current_id = (int)$post->ID;
?>
<section class="more">
    <div class="content" role="complementary">            
        <h2>Otras formaciones</h2>
        <h3>Narrativa, UX, Talleres express…</h3>

        <div class="three-col">
            <?php $printed = 0 ?>
            <?php for($i = 0; $i < $length; $i++){ ?>
                <?php if ($printed == 3) { break; } ?>
                <?php if ((int)$pages[$i]->ID != $current_id) { ?>
                    <div class="col">
                        <div class="image">
                                <?php 
                                    $printed++;
                                    $metadata = get_page_metadata($pages[$i]->ID);
                                    $thumbnail = get_thumbnail($pages[$i]->ID)
                                ?>
                                <?php if($thumbnail != false) { ?>
                                    <a href="<?php echo get_permalink($pages[$i]->ID) ?>">
                                        <img src="<?php echo $thumbnail[0] ?>" >
                                    </a>
                                <? } ?>
                            </a>
                        </div>
                        <h3><? echo $pages_links[$i] ?></h3>
                        <p><? echo $pages[$i]->post_excerpt; ?></p>                    
                    </div>
                <? } ?>
            <? } ?>
        </div>
    </div>
</section>