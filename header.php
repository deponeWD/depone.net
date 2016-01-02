<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo('charset'); ?>" >

<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

<title><?php wp_title(' &middot;', true, 'right'); ?> <?php bloginfo('name'); ?> &middot; <?php bloginfo('description'); ?></title>

<meta name="author" content="Daniel Ehniss" />
<meta name="keywords" content="Blog, Daniel Ehniss, Ehniss, Karlsruhe, Web2.0, Web, html, html5, responsive webdesign, responsive, css3, Mail, XHTML, CSS, Webstandards, Wordpress, Netzgestaltung, Webdesign, Web Design, Depone" />
<?php if (is_single()) { ?>
    <meta name="description" content="<?php echo get_the_excerpt(); ?>" />
<?php } else { ?>
    <meta name="description" content="Hallo, ich bin Daniel Ehniss, ein Web Designer in Karlsruhe. DEPONE Netzgestaltung ist der Rahmen in dem ich Webseiten entwickle. Webseiten mit Leidenschaft, klar und kommunikativ." >
<?php } ?>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" >
<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" >

<script type="text/javascript" src="//use.typekit.net/jpz3mgl.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <!--[if IE]>
        <script src="<?php bloginfo(template_url); ?>/js/html5.js" ></script>
    <![endif]-->

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<section id="page">

<header role="banner">
    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><?php bloginfo('name'); ?></span></a></h1>
    <h2 class="description">
        <?php bloginfo('description'); ?>
    </h2><!-- description -->

    <nav id="mainnav" >
        <ul>
            <?php wp_list_pages('title_li=&exclude=143'); ?>
        </ul>
    </nav>

</header>

<hr /><!-- Trennlinie -->
