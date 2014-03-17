<?php
/**
 * La Nave Nodriza functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since La Nave Nodriza 1.0
 */
/**
* Split the content at the more tag and return an array
**/
function split_content() {
  global $more;
  $more = true;
  $content = preg_split('/<span id="more-\d+"><\/span>/i', get_the_content('more'));
  for($c = 0, $csize = count($content); $c < $csize; $c++) {
    $content[$c] = apply_filters('the_content', $content[$c]);
  }
  return $content;
}

/**
* Error debugging
**/
function get_thumbnail_src($img) {
  $pattern = '/src="([^"]+)"/';
  preg_match($pattern, $img, $matches, PREG_OFFSET_CAPTURE);
  return $matches[0];
}

if (!function_exists('write_log')) {
  function write_log ( $log )  {
    if ( true === WP_DEBUG ) {
      if ( is_array( $log ) || is_object( $log ) ) {
        error_log( print_r( $log, true ) );
      } else {
        error_log( $log);
      }
    }
  }
}

/**
* Create front page if not exists
**/

function create_pages($title, $template_name, $index) {
  $new_page_title = $title;
  $new_page_content = '';
  $new_page_template = $template_name; //ex. template-custom.php. Leave blank if you don't want a custom page template.
  //don't change the code bellow, unless you know what you're doing
  $page_check = get_page_by_title($new_page_title);
  $new_page = array(
    'post_type' => 'page',
    'post_title' => $new_page_title,
    'post_content' => $new_page_content,
    'post_status' => 'publish',
    'post_author' => 1,
    );
  if(!isset($page_check->ID)){
    $new_page_id = wp_insert_post($new_page);
    if(!empty($new_page_template)){
      update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
    }
    if (!$index){ // Set front_page
      update_option( 'page_on_front', $new_page_id );
      update_option( 'show_on_front', 'page' ); 
    }
    else{ // Set index
      update_option( 'page_for_posts', $new_page_id );
    }
  }
}

if (isset($_GET['activated']) && is_admin()){
  create_pages('Front Page', 'static-front.php', false);
  create_pages('Index', '', true);
}

/**
 * Add custom init for la nave nodriza.
 **/
function la_nave_nodriza_custom_init() {
    // Add tag metabox to page
  register_taxonomy_for_object_type('post_tag', 'page'); 
    // Add support for excerpts in pages
  add_post_type_support( 'page', 'excerpt' );
    // Add category metabox to page
    //register_taxonomy_for_object_type('category', 'page'); 

}
 // Add to the admin_init hook of your theme functions.php file 
add_action('init', 'la_nave_nodriza_custom_init');


/*
 * Set up the content width value based on the theme's design.
 *
 * @see la_nave_nodriza_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
  $content_width = 604;

/**
 * Add support for a custom header image.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * La Nave Nodriza only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
  require get_template_directory() . '/inc/back-compat.php';

/**
 * La Nave Nodriza setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * La Nave Nodriza supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since La Nave Nodriza 1.0
 *
 * @return void
 */

/**
* Retrieve thumbnail by the given post id
**/
function get_thumbnail($id) {
  if (has_post_thumbnail( $id) ) {
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' );
  } else {
    $image = false;
  }
  return $image;
}

/**
* Get active pages functions (the ones that must be shown in the front page)
**/

function get_active() {
  global $wpdb;
  $query_result = $wpdb->get_results("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = 'lnn_page_active'");
  $ids =  array();

  $length = count($query_result);
  for($i = 0; $i < $length ; $i++) {
    $ids[$i] = $query_result[$i]->post_id;
  }
  return $ids;
}

function get_active_list() {
  $ids = get_active();

  if ( count($ids) > 0 ) {
    $pages = get_pages(array('echo' => false, 'title_li'=>'', 'sort_column' => 'menu_order', 'include' => $ids, "sort_column" => 'post_date', "sort_order" => 'DESC'));
  } else {
    $pages = array();
  }

  return $pages;
}

function get_pages_links_with_titles($pages) {
  $links = array();
  $length = count($pages);
  for($i = 0; $i < $length ; $i++) {
    $links[$i] = "<a href='" . $pages[$i]->guid . "'>" . $pages[$i]->post_title. '</a>'; 
  }
  return $links;
}

function get_prev_next() {
  global $wpdb;
  //$ids = get_active();
  $querystr = "SELECT $wpdb->posts. * FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'page' ORDER BY $wpdb->posts.post_date DESC";
  $pagelist = $wpdb->get_results($querystr, OBJECT);  //get_active_list();
  $pages = array();
  foreach ($pagelist as $page) {
    if ($page->ID != get_option('page_on_front') && $page->ID != get_option('page_for_posts') ){
      $pages[] += (int)$page->ID;
    }
  }
  $current = array_search(get_the_ID(), $pages);
  $prevID = null;
  if (isset($pages[$current-1])){
    $prevID = (int)$pages[$current-1];
  }
  $nextID = null;
  if (isset($pages[$current+1])) {
    $nextID = (int)$pages[$current+1];
  }
  return array('prev' =>  $prevID, 'next' => $nextID);
}

/**
* Retrieve metadata *******
*** lnn_page_type = "Curso", "Taller", ...
*** lnn_page_state = "New" ...
*** lnn_extra = "(Cerrado)", "(Abierto plazo de inscripción)" ...
**/
function get_page_metadata($page_id) {
  global $wpdb;
  $meta_list = (array)$wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta 
                                   WHERE post_id = '{$page_id}' 
                                   AND meta_key in 
                                   ('lnn_page_type','lnn_page_state','lnn_page_extra','lnn_page_price','lnn_page_remaining','lnn_page_subtitle','lnn_page_discounts','lnn_page_dates','lnn_page_call_to_action')");
  $meta_array = array();
  foreach ($meta_list as $meta) {
    $key = str_replace("lnn_page_","",$meta->meta_key);
    $meta_array[$key] = $meta->meta_value;
  }
  return $meta_array;
}

function la_nave_nodriza_setup() {
    /*
     * Makes La Nave Nodriza available for translation.
     *
     * Translations can be added to the /languages/ directory.
     * If you're building a theme based on La Nave Nodriza, use a find and
     * replace to change 'lanavenodriza' to the name of your theme in all
     * template files.
     */
    load_theme_textdomain( 'lanavenodriza', get_template_directory() . '/languages' );

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */
    add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', la_nave_nodriza_fonts_url() ) );

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Switches default core markup for search form, comment form,
     * and comments to output valid HTML5.
     */
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

    /*
     * This theme supports all available post formats by default.
     * See http://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
      'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
      ) );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menu( 'primary', __( 'Navigation Menu', 'twentythirteen' ) );

    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 604, 270, true );

    // This theme uses its own gallery styles.
    add_filter( 'use_default_gallery_style', '__return_false' );
  }
  add_action( 'after_setup_theme', 'la_nave_nodriza_setup' );

/**
 * Return the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since La Nave Nodriza 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function la_nave_nodriza_fonts_url() {
  $fonts_url = '';

    /* Translators: If there are characters in your language that are not
     * supported by Source Sans Pro, translate this to 'off'. Do not translate
     * into your own language.
     */
    $source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'twentythirteen' );

    /* Translators: If there are characters in your language that are not
     * supported by Bitter, translate this to 'off'. Do not translate into your
     * own language.
     */
    $bitter = _x( 'on', 'Bitter font: on or off', 'twentythirteen' );

    if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
      $font_families = array();

      if ( 'off' !== $source_sans_pro )
        $font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

      if ( 'off' !== $bitter )
        $font_families[] = 'Bitter:400,700';

      $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'latin,latin-ext' ),
        );
      $fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
    }

    return $fonts_url;
  }

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since La Nave Nodriza 1.0
 *
 * @return void
 */

function la_nave_nodriza_scripts_styles() {
    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
      wp_enqueue_script( 'comment-reply' );

    // Adds Masonry to handle vertical alignment of footer widgets.
    if ( is_active_sidebar( 'sidebar-1' ) )
      wp_enqueue_script( 'jquery-masonry' );

    // Loads JavaScript file with functionality specific to La Nave Nodriza.
    //wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-07-18', true );

    // Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
    wp_enqueue_style( 'twentythirteen-fonts', la_nave_nodriza_fonts_url(), array(), null );

    // Add Genericons font, used in the main stylesheet.
    wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09' );

    // Loads our main stylesheet.
    //wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18' );

    // Loads the Internet Explorer specific stylesheet.
    wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
    wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
  }
  add_action( 'wp_enqueue_scripts', 'la_nave_nodriza_scripts_styles' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since La Nave Nodriza 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function la_nave_nodriza_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() )
    return $title;

    // Add the site name.
  $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    $title = "$title $sep $site_description";

    // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 )
    $title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

  return $title;
}
add_filter( 'wp_title', 'la_nave_nodriza_wp_title', 10, 2 );

/**
 * Register two widget areas.
 *
 * @since La Nave Nodriza 1.0
 *
 * @return void
 */
function la_nave_nodriza_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Main Widget Area', 'twentythirteen' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Appears in the footer section of the site.', 'twentythirteen' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ) );

  register_sidebar( array(
    'name'          => __( 'Secondary Widget Area', 'twentythirteen' ),
    'id'            => 'sidebar-2',
    'description'   => __( 'Appears on posts and pages in the sidebar.', 'twentythirteen' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'la_nave_nodriza_widgets_init' );

if ( ! function_exists( 'la_nave_nodriza_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since La Nave Nodriza 1.0
 *
 * @return void
 */
function la_nave_nodriza_paging_nav() {
  global $wp_query;

    // Don't print empty markup if there's only one page.
  if ( $wp_query->max_num_pages < 2 )
    return;
  ?>
  <nav class="navigation paging-navigation" role="navigation">
    <h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>
    <div class="nav-links">

      <?php if ( get_next_posts_link() ) : ?>
      <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen' ) ); ?></div>
    <?php endif; ?>

    <?php if ( get_previous_posts_link() ) : ?>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>
  <?php endif; ?>

</div><!-- .nav-links -->
</nav><!-- .navigation -->
<?php
}
endif;

if ( ! function_exists( 'la_nave_nodriza_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*
* @since La Nave Nodriza 1.0
*
* @return void
*/
function la_nave_nodriza_post_nav() {
  global $post;

    // Don't print empty markup if there's nowhere to navigate.
  $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
  $next     = get_adjacent_post( false, '', false );

  if ( ! $next && ! $previous )
    return;
  ?>
  <nav class="navigation post-navigation" role="navigation">
    <h1 class="screen-reader-text"><?php _e( '', 'twentythirteen' ); ?></h1>
    <div class="nav-links">

      <?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'twentythirteen' ) ); ?>
      <?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen' ) ); ?>

    </div><!-- .nav-links -->
  </nav><!-- .navigation -->
  <?php
}
endif;

if ( ! function_exists( 'la_nave_nodriza_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own la_nave_nodriza_entry_meta() to override in a child theme.
 *
 * @since La Nave Nodriza 1.0
 *
 * @return void
 */
function la_nave_nodriza_entry_meta() {
  if ( is_sticky() && is_home() && ! is_paged() )
    echo '<span class="featured-post">' . __( 'Sticky', 'twentythirteen' ) . '</span>';

  if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
    la_nave_nodriza_entry_date();

    // Translators: used between list items, there is a space after the comma.
  $categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
  if ( $categories_list ) {
    echo '<span class="categories-links">' . $categories_list . '</span>';
  }

    // Translators: used between list items, there is a space after the comma.
  $tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
  if ( $tag_list ) {
    echo '<span class="tags-links">' . $tag_list . '</span>';
  }

    // Post author
  if ( 'post' == get_post_type() ) {
    printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
      get_the_author()
      );
  }
}
endif;

if ( ! function_exists( 'la_nave_nodriza_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own la_nave_nodriza_entry_date() to override in a child theme.
 *
 * @since La Nave Nodriza 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function la_nave_nodriza_entry_date( $echo = true ) {
  if ( has_post_format( array( 'chat', 'status' ) ) )
    $format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' );
  else
    $format_prefix = '%2$s';

  $date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
    esc_url( get_permalink() ),
    esc_attr( sprintf( __( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ),
    esc_attr( get_the_date( 'c' ) ),
    esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
    );

  if ( $echo )
    echo $date;

  return $date;
}
endif;

if ( ! function_exists( 'la_nave_nodriza_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since La Nave Nodriza 1.0
 *
 * @return void
 */
function la_nave_nodriza_the_attached_image() {
    /**
     * Filter the image attachment size to use.
     *
     * @since La Nave Nodriza 1.0
     *
     * @param array $size {
     *     @type int The attachment height in pixels.
     *     @type int The attachment width in pixels.
     * }
     */
    $attachment_size     = apply_filters( 'la_nave_nodriza_attachment_size', array( 724, 724 ) );
    $next_attachment_url = wp_get_attachment_url();
    $post                = get_post();

    /*
     * Grab the IDs of all the image attachments in a gallery so we can get the URL
     * of the next adjacent image in a gallery, or the first image (if we're
     * looking at the last image in a gallery), or, in a gallery of one, just the
     * link to that image file.
     */
    $attachment_ids = get_posts( array(
      'post_parent'    => $post->post_parent,
      'fields'         => 'ids',
      'numberposts'    => -1,
      'post_status'    => 'inherit',
      'post_type'      => 'attachment',
      'post_mime_type' => 'image',
      'order'          => 'ASC',
      'orderby'        => 'menu_order ID'
      ) );

    // If there is more than 1 attachment in a gallery...
    if ( count( $attachment_ids ) > 1 ) {
      foreach ( $attachment_ids as $attachment_id ) {
        if ( $attachment_id == $post->ID ) {
          $next_id = current( $attachment_ids );
          break;
        }
      }

        // get the URL of the next image attachment...
      if ( $next_id )
        $next_attachment_url = get_attachment_link( $next_id );

        // or get the URL of the first image attachment.
      else
        $next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
    }

    printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
      esc_url( $next_attachment_url ),
      the_title_attribute( array( 'echo' => false ) ),
      wp_get_attachment_image( $post->ID, $attachment_size )
      );
  }
  endif;

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since La Nave Nodriza 1.0
 *
 * @return string The Link format URL.
 */
function la_nave_nodriza_get_link_url() {
  $content = get_the_content();
  $has_url = get_url_in_content( $content );

  return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since La Nave Nodriza 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function la_nave_nodriza_body_class( $classes ) {
  if ( ! is_multi_author() )
    $classes[] = 'single-author';

  if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
    $classes[] = 'sidebar';

  if ( ! get_option( 'show_avatars' ) )
    $classes[] = 'no-avatars';

  return $classes;
}
add_filter( 'body_class', 'la_nave_nodriza_body_class' );

/**
 * Adjust content_width value for video post formats and attachment templates.
 *
 * @since La Nave Nodriza 1.0
 *
 * @return void
 */
function la_nave_nodriza_content_width() {
  global $content_width;

  if ( is_attachment() )
    $content_width = 724;
  elseif ( has_post_format( 'audio' ) )
    $content_width = 484;
}
add_action( 'template_redirect', 'la_nave_nodriza_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since La Nave Nodriza 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function la_nave_nodriza_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'la_nave_nodriza_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since La Nave Nodriza 1.0
 *
 * @return void
 */
function la_nave_nodriza_customize_preview_js() {
  wp_enqueue_script( 'twentythirteen-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'la_nave_nodriza_customize_preview_js' );
