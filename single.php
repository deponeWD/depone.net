<?php get_header(); ?>

<section id="content" role="main">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>

				<div class="entry">
					<?php the_content(__('weiterlesen &rarr;', '')); ?>
				</div><!-- entry -->
				<p class="postmetadata">Ver&ouml;ffentlicht am <?php the_time(__('d.m.Y', '')) ?> von <?php the_author() ?><?php printf(__(' in %s', ''), get_the_category_list(', ')); ?>. <?php edit_post_link(__('bearbeiten', ''), '(', ') '); ?> </p>
			</article><!-- post -->

		<?php endwhile; ?>

		<nav class="pagination">
			<div class="alignleft"><?php previous_post_link('%link',__('%title', '')) ?></div><!-- alignleft -->
			<div class="alignright"><?php next_post_link('%link',__('%title', '')) ?></div><!-- alignright -->
		</nav><!-- pagination -->

		<?php comments_template( '', true ); ?>

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