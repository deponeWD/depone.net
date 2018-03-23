<?php /* Template Name: Startseite */ ?>
<?php get_header(); ?>

<section id="content" role="main">

	<?php $temp_query = $wp_query; ?>
	<?php query_posts('page_id=4'); /* Abschnitt: Infos */ ?>

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<!-- <h2 class="section" ><a href="<?php echo esc_url( home_url( '/infos/' ) ); ?>" title="Link zur Infoseite" >Hallo!</a></h2> -->
				<?php the_post_thumbnail('medium', array('class' => 'start')); ?>
				<div class="entry">
					<?php the_excerpt(); ?>
				</div><!-- entry -->
			</article><!-- post -->

		<?php endwhile; ?>

		<?php $wp_query = $temp_query; ?>
    	<?php if (have_posts()) : /* Abschnitt: Blog */ ?>

        <h2 class="section" ><a class="weiterlesen" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" title="Link ins Blog" >Blog</a></h2>
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("showposts=4&paged=$paged"); ?>

		<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Link zum Blogeintrag &rsaquo;%s&lsaquo;', ''), the_title_attribute('echo=0')); ?>">
						<?php the_post_thumbnail('medium', array('class' => 'start')); ?>
					</a>
				<?php } ?>
				<h3 class="start"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Link zum Blogeintrag &rsaquo;%s&lsaquo;', ''), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>

				<div class="entry">
					<p><?php echo get_the_excerpt(); ?></p>
				</div><!-- entry -->
			</article><!-- post -->

		<?php endwhile; ?>
	<?php else : ?>

	<article class="post" >
		<h2>Nichts gefunden</h2>
		<div class="entry" >
		<p>Wir haben leider an dieser Stelle nichts f&uuml;r dich gefunden, bitte nutze die Navigation oder das Suchfeld um zu den von dir gew&uuml;nschten Inhalten zu gelangen.</p>
    	<?php get_search_form(); ?>
		</div><!-- entry -->
    </article>

	<?php endif; ?>

	</section><!-- content -->

<?php get_footer(); ?>
