<?php get_header(); ?>

<section id="content" role="main">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>

				<div class="entry">
					<?php the_content(__('weiterlesen &rarr;', '')); ?>
				</div><!-- entry -->
			</article><!-- post -->

		<?php endwhile; ?>

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