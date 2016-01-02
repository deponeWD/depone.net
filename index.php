<?php get_header(); ?>

<section id="content" role="main">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Link zu %s', ''), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>

				<div class="entry">
					<?php the_content(__('weiterlesen &rarr;', '')); ?>
				</div><!-- entry -->
				<p class="postmetadata">Ver&ouml;ffentlicht am <?php the_time(__('d.m.Y', '')) ?> von <?php the_author() ?> <?php edit_post_link(__('bearbeiten', ''), '(', ') '); ?> &middot; <?php comments_popup_link(__('Schreib&rsquo; einen Kommentar', ''), __('1 Kommentar', ''), __('% Kommentare', ''), '', __('Kommentare geschlossen', '') ); ?></p>
			</article><!-- post -->

		<?php endwhile; ?>
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			<nav class="pagination">
				<div class="alignleft"><?php next_posts_link(__('&Auml;ltere Eintr&auml;ge', '')) ?></div><!-- alignleft -->
				<div class="alignright"><?php previous_posts_link(__('Neuere Eintr&auml;ge', '')) ?></div><!-- alignright -->
			</nav><!-- pagination -->
		<?php endif; ?>

	<?php else : ?>

	<article class="post" >
		<h2>Nichts gefunden</h2>
		<div class="entry" >
		<p>Wir haben leider an dieser Stelle nichts f&uuml;r dich gefunden, bitte nutze die Navigation oder das Suchfeld um zu den von dir gew&uuml;nschten Inhalten zu gelangen.</p>
		</div><!-- entry -->
    </article>

	<?php endif; ?>

	</section><!-- content -->

<?php get_footer(); ?>