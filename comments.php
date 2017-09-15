<?php if ( comments_open() ) : ?>

<div id="comments">

    <?php if ( have_comments() ) : ?>
        <h2 class="comment-count" ><?php printf( _n( '<span class="komplett" ><span class="zahl" >1</span> Reaktion</span>', '<span class="komplett"><span class="zahl" >%1$s</span> Reaktionen</span>', get_comments_number(), '' ), number_format_i18n( get_comments_number() )); ?></h2>
    <?php endif; // check if there are comments ?>


    <?php if ( post_password_required() ) : ?>
        <p class="nopassword"><?php _e( 'Dieser Artikel und die dazugeh&ouml;renden Kommentare sind durch ein Passwort gesch&uuml;tzt.', '' ); ?></p>
    </div><!-- #comments -->
    <?php
      /* Stop the rest of comments.php from being processed,
       * but don't kill the script entirely -- we still have
       * to fully load the template.
       */
            return;
          endif;
    ?>
    <?php if ( have_comments() ) : ?>
        <?php
          // Get the global `$wp_query` object.
          $id = get_the_ID();
        	// Get the semantic_linkbacks_type 'like'.
          $comments = get_linkbacks( 'like', $id );

          if ( $comments ) {
          echo '<h3>'. __('Likes', '') .'</h3>';
        ?>
          <ul class="pile webmention--likes">
            <?php
            // Comment Loop.
          	foreach ( $comments as $comment ) {
          		?>
          		<li class="webmention--like">
          			<?php $canonical_url = get_comment_meta( $comment->comment_ID, 'semantic_linkbacks_canonical', true ); ?>
                <a href="<?php echo $canonical_url; ?>" title="<?php printf(__('%s liked this', ''), $comment->comment_author); ?>" >
            			<?php $author_img = get_comment_meta( $comment->comment_ID, 'semantic_linkbacks_avatar', true ); ?>
          				<img class="avatar" src="<?php echo $author_img ?>" alt="<?php echo $comment->comment_author; ?>">
          			</a>
          		</li>
            <?php } ?>
          </ul>
        <?php } ?>
        <?php
        	// get the semantic_linkbacks_type 'repost'.
        	$comments = get_linkbacks( 'repost', $id );

          if ( $comments ) {
          echo '<h3>'. __('Reposts', '') .'</h3>';
        ?>
          <ul class="pile webmention--reposts">
          <?php
          // Comment Loop.
        	foreach ( $comments as $comment ) {
        		?>
        		<li class="webmention--repost">
        			<?php $canonical_url = get_comment_meta( $comment->comment_ID, 'semantic_linkbacks_canonical', true ); ?>
        			<a href="<?php echo $canonical_url; ?>" title="<?php printf(__('%s reposted this', ''), $comment->comment_author); ?>" >
          			<?php $author_img = get_comment_meta( $comment->comment_ID, 'semantic_linkbacks_avatar', true ); ?>
        				<img class="avatar" src="<?php echo $author_img ?>" alt="<?php echo $comment->comment_author; ?>">
              </a>
      			</li>
          <?php } ?>
          </ul>
        <?php } ?>

        <?php echo '<h3>'. __('Kommentare', '') .'</h3>'; ?>
        <ol class="commentlist">
          <?php
      			$comments = get_comments(array(
    					'post_id' => $id,
    					'status' => 'approve',
    					'type__not_in' => 'webmention',
    				) );
            wp_list_comments( array( 'callback' => 'ng13_comment', 'reverse_top_level' => true ) );
            ?>
        </ol>
        <?php
        	// get the semantic_linkbacks_type 'mention'.
        	$comments = get_linkbacks( 'mention', $id );

          if ( $comments ) {
          echo '<h3>'. __('Erwähnungen', '') .'</h3>';
        ?>
        <ul class="list webmention--mentions">
          <?php
          // Comment Loop.
          foreach ( $comments as $comment ) {
            ?>
            <li class="webmention--mention">
              <?php
                $canonical_url = get_comment_meta( $comment->comment_ID, 'semantic_linkbacks_canonical', true ); ?>
                <p class="mention"><?php printf(__('Dieser Artikel wurde von <a href="%1s">%2s</a> erwähnt.', ''), $canonical_url, $comment->comment_author); ?></p>
            </li>
          <?php } ?>
        </ul>
      <?php } ?>

    <?php endif; // check if there are comments ?>

<?php comment_form(array('title_reply'=>'Reagiere darauf', 'comment_notes_before' => '', 'cancel_reply_link' => '&ndash; abbrechen &ndash;', 'label_submit' => 'kommentieren', 'comment_notes_after' => '')); ?>

</div><!-- #comments -->
<?php endif; // check if comments are open ?>
