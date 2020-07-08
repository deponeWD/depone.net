<?php
/**
 * Set Version Number
*/
  define( 'CURRENT_THEME_VERSION', '2.0.1');
/**
    * 2 Seitenleisten wird eingerichtet
*/
  if ( function_exists('register_sidebar') ) {
	register_sidebars(2, array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));
	}
/**
    * Artikelbilder werden eingerichtet
*/
    if ( function_exists('add_theme_support') )
    add_theme_support('post-thumbnails');

/**
    * Exzerpt fuer Seiten einrichten
*/

    add_post_type_support( 'page', 'excerpt' );

/**
    * Exzerpt der Blogartikel einstellen
*/

    function blog_excerpt($more) {
        return ' ...';
    }
    add_filter('excerpt_more', 'blog_excerpt');

/**
 * Register Stylesheet
**/
  function dpng_register_styles(){
    wp_register_style(
      'main-stylesheet', //handle
      get_template_directory_uri() . '/style.css', //source
      null, //no dependencies
      // null // remove Version for serviceWorker
      CURRENT_THEME_VERSION
    );
  }
  add_action('init', 'dpng_register_styles');

  function dpng_enqueue_styles(){
    if (!is_admin()):
      wp_enqueue_style('main-stylesheet'); //style.css
    endif; //!is_admin
  }
  add_action('wp_print_styles', 'dpng_enqueue_styles');

/**
 * Register Scripts
**/
  function dpng_register_scripts() {
    wp_register_script(
      'app', //handle
      get_template_directory_uri() . '/assets/js/app.min.js', //source
      null, // dependencies
      // null, // remove Version for serviceWorker
      CURRENT_THEME_VERSION,
      // filemtime( get_template_directory() . '/assets/js/app.min.js' ), // version
      true //run in footer
    );
  }
  add_action('init', 'dpng_register_scripts');

  function dpng_enqueue_scripts(){
    if (!is_admin()):
      // Create variable with url of template directory to be used in javascript
      $themeParams = array(
        'templateURL' => get_bloginfo('template_url'),
        'currentThemeVersion' => CURRENT_THEME_VERSION,
      );
      wp_localize_script( 'app', 'themeParams', $themeParams );
      // Enqueue Script
      wp_enqueue_script('app'); //app.min.js
    endif; //!is_admin
  }
  add_action('wp_print_scripts', 'dpng_enqueue_scripts');

/**
    * Die Kommentarausgabe einstellen
*/

function ng13_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
        case 'webmention' :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
      <article id="comment-<?php comment_ID(); ?>" class="comment <?php $comment->comment_type; ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
        <div class="comment-content p-summary p-name" itemprop="text name description"><?php comment_text(); ?></div>
      </article>
    </li>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment <?php $comment->comment_type; ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <?php
                        $avatar_size = 100;
                        if ( '0' != $comment->comment_parent )
                            $avatar_size = 100;

                        echo get_avatar( $comment, $avatar_size );

                        /* translators: 1: comment author, 2: date and time */
                        printf( __( '<p class="absenderIn" >%1$s <span class="schreibt" >schreibt:</span></p> %2$s', '' ),
                            sprintf( '<span class="autorIn" >%1$s</span>', get_comment_author_link() ),
                            sprintf( '<a class="kommentarzeit" href="%1$s"><time pubdate datetime="%2$s">%3$s Uhr</time></a>',
                                esc_url( get_comment_link( $comment->comment_ID ) ),
                                get_comment_time( 'c' ),
                                /* translators: 1: date, 2: time */
                                sprintf( __( '%1$s um %2$s', '' ), get_comment_date(), get_comment_time() )
                            )
                        );
                    ?>

                    <?php edit_comment_link( __( 'bearbeiten', '' ), '<span class="bearbeiten">', '</span>' ); ?>
                </div><!-- .comment-author .vcard -->

                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Danke f&uuml;r Deinen Kommentar. Sobald ich ihn moderiert habe erscheint er genau hier.', '' ); ?></em>
                <?php endif; ?>

            </footer>

            <div class="comment-content"><?php comment_text(); ?></div>

            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'antworten', '' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!-- .reply -->
        </article><!-- #comment-## -->
      </li>

    <?php
    break;
    endswitch;
}
/**
  * Das Kommentarformular wird angepasst
*/
function my_fields($fields) {
  $commenter = wp_get_current_commenter();
  $req = get_option( 'require_name_email' );
  $aria_req = ( $req ? " aria-required='true'" : '' );

  $fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
  '<br/><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
  $fields['email'] = '<p class="comment-form-email"><label for="email">' . __( 'E-Mail' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
  '<br/><input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
  $fields['url'] = '<p class="comment-form-url"><label for="url">' . __( 'Webseite' ) . '</label>' .
  '<br/><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';
  return $fields;
}
add_filter('comment_form_default_fields','my_fields');

/**
* Provide Meta-Tags for shareable content
*/
  // Add Open Graph to the language attributes
  function add_opengraph_doctype( $output ) {
    return $output . ' prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"';
  }
  add_filter('language_attributes', 'add_opengraph_doctype');

  // Add Open Graph Meta Info
  function insert_fb_in_head() {
    global $post;
    if ( !is_singular()) //if it is not a post or a page
      return;
      echo '<meta property="fb:admins" content="100010520380885"/>';
      echo '<meta property="og:title" content="DEPONE Netzgestaltung &ndash; ' . get_the_title() . '"/>';
      echo '<meta property="og:type" content="article"/>';
      echo '<meta property="og:url" content="' . get_permalink() . '"/>';
      echo '<meta property="og:site_name" content="DEPONE Netzgestaltung"/>';
      echo '<meta property="og:description" content="' . get_the_excerpt() . '"/>';
    if(!has_post_thumbnail( $post->ID )) { // if the post does not have a featured image, use a default image instead
      $default_image="https://depone.net/apple-touch-icon-precomposed.png";
      echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
      $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
      echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }
    echo "";
  }
  add_action( 'wp_head', 'insert_fb_in_head', 5 );

  // Twitter-Cards
  function insert_twitter_cards() {
    global $post;
    if ( !is_singular()) //if it is not a post or a page
      return;
      if(has_post_thumbnail( $post->ID )) {
        echo '<meta name="twitter:card" content="summary_large_image">';
      } else {
        echo '<meta name="twitter:card" content="summary">';
      }
      echo '<meta name="twitter:creator" content="@depone">';
      echo '<meta name="twitter:site" content="@depone">';
    echo "";
  }
  add_action( 'wp_head', 'insert_twitter_cards', 5 );

  // Add automatic-feed-links to the head
  global $wp_version;
  if ( version_compare( $wp_version, '3.0', '>=' ) ) :
    add_theme_support( 'automatic-feed-links' );
  else :
    automatic_feed_links();
  endif;
?>
