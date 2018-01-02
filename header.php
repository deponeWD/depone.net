<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?> class="no-js">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?> class="no-js">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo('charset'); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

<title><?php wp_title(' &middot;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<meta name="author" content="Daniel Ehniss" />
<meta name="keywords" content="Blog, Daniel Ehniss, Ehniss, Karlsruhe, Web2.0, Web, html, html5, responsive webdesign, responsive, css3, Mail, XHTML, CSS, Webstandards, Wordpress, Netzgestaltung, Webdesign, Web Design, Depone" />
<?php if (is_single()) { ?>
    <meta name="description" content="<?php echo get_the_excerpt(); ?>" />
<?php } else { ?>
    <meta name="description" content="<?php bloginfo('description'); ?>" >
<?php } ?>

<link href="<?php echo esc_url( home_url( '/favicon.ico' ) ); ?>" rel="shortcut icon" type="image/x-icon">
<link rel="apple-touch-icon" href="<?php echo esc_url( home_url( '/touchicon.png' ) ); ?>">
<link rel="icon" href="<?php echo esc_url( home_url( '/favicon.png' ) ); ?>">
<!--[if IE]><link rel="shortcut icon" href="<?php echo esc_url( home_url( '/favicon.ico' ) ); ?>"><![endif]-->
<!-- or, set /favicon.ico for IE10 win -->
<meta name="msapplication-TileColor" content="#D83434">
<meta name="msapplication-TileImage" content="<?php echo esc_url( home_url( '/tileicon.png' ) ); ?>">

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" >

<!--[if IE]>
    <script src="<?php bloginfo(template_url); ?>/js/html5.js" ></script>
<![endif]-->

<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<script type="text/javascript">
    window.cookieconsent_options = {"message":"Diese Webseite verwendet Cookies.","dismiss":"Ok.","learnMore":"Zum Datenschutzhinweis.","link":"https://depone.net/infos/impressum/#Datenschutz","theme":false};
</script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php if (is_front_page()) { ?>
  <noscript>
    <style>
      /* TODO: keep in sync with .no-svg .social-icon */
      .no-js header h1 svg {
        background-image: url('./wp-content/themes/netz/assets/img/depone.png');
      }
    </style>
  </noscript>
<?php } else { ?>
  <noscript>
    <style>
      /* TODO: keep in sync with .no-svg .social-icon */
      .no-js header h1 svg {
        background-image: url('../wp-content/themes/netz/assets/img/depone.png');
      }
    </style>
  </noscript>
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<section id="page">

<header role="banner">
    <h1>

      <?php
        if (!is_front_page()) {
          echo '<a href="';
            echo esc_url( home_url('/') );
          echo '">';
        }
          echo "<svg viewBox='0 0 250.11 79.32'>";
            echo "<use xlink:href='#depone-logo'></use>";
          echo "</svg>";
          echo '<span class="netzgestaltung">Netzgestaltung</span>';
        if (!is_front_page()) {
          echo '</a>';
        }
      ?>
    </h1>
    <h2 class="description">
        <?php bloginfo('description'); ?>
    </h2><!-- description -->

    <nav id="mainnav" >
        <ul>
            <?php wp_list_pages('title_li=&exclude=143'); ?>
        </ul>
    </nav>
</header>
