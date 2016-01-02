<?php if ( comments_open() ) : ?>

<div id="comments">

    <?php if ( have_comments() ) : ?>
        <h2 class="kommentaranzahl" ><?php printf( _n( '<span class="komplett" ><span class="zahl" >1</span> Kommentar</span>', '<span class="komplett"><span class="zahl" >%1$s</span> Kommentare</span>', get_comments_number(), '' ), number_format_i18n( get_comments_number() )); ?></h2>
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

    <?php // You can start editing here -- including this comment! ?>

    <?php if ( have_comments() ) : ?>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-above">
            <h1 class="assistive-text"><?php _e( 'Navigation der Kommentarseiten', '' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; &Auml;ltere Kommentare', '' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Neuere Kommentare &rarr;', '' ) ); ?></div>
        </nav>
        <?php endif; // check for comment navigation ?>

        <ol class="commentlist">
            <?php wp_list_comments( array( 'callback' => 'ng13_comment' ) ); ?>
        </ol>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-below">
            <h1 class="assistive-text"><?php _e( 'Navigation der Kommentarseiten', '' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; &Auml;ltere Kommentare', '' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Neuere Kommentare &rarr;', '' ) ); ?></div>
        </nav>
        <?php endif; // check for comment navigation ?>

    <?php endif; // check if there are comments ?>

<?php comment_form(array('title_reply'=>'Schreib&rsquo; einen Kommentar', 'comment_notes_before' => '', 'cancel_reply_link' => '&ndash; abbrechen &ndash;', 'label_submit' => 'kommentieren', 'comment_notes_after' => '')); ?>

</div><!-- #comments -->
<?php endif; // check if comments are open ?>
