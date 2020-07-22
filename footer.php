<footer role="contentinfo">
    <ul class="first first--centered h-card">
        <li><a class="u-url url fn u-uid" href="<?php echo esc_url( home_url('/') ); ?>"><img class="u-photo h-card-avatar" src="<?php echo get_template_directory_uri(); ?>/assets/img/depone.jpg" alt="Portrait von Daniel Ehniss"></a></li>
        <li class="p-name"><strong>DEPONE Netzgestaltung</strong></li>
        <li class="p-name">Daniel Ehniss</li>
        <li class="u-email">daniel@depone.de</li>
        <li><a rel="me" class="url u-url" href="https://twitter.com/depone" title="Link zu meinem Twitterprofil" target="_blank" rel="noopener noreferrer">@depone</a></li>
    </ul>
    <ul class="third" >
        <li><a href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>" title="Link zur Kontaktseite" >Kontakt</a></li>
        <li><a href="<?php echo esc_url( home_url( '/infos/impressum/' ) ); ?>" title="Link zum Impressum" >Impressum</a></li>
        <li><a href="<?php echo esc_url( home_url( '/infos/datenschutzerklaerung' ) ); ?>" title="Link zu meiner Datenschutzerklärung" >Datenschutz</a></li>
        <li><a href="<?php echo esc_url( home_url( '/feed' ) ); ?>" title="Link zum RSS-Feed des Blogs" >RSS</a></li>
    </ul>
    <div class="suchfeld"><?php get_search_form(); ?></div>
</footer><!-- footer -->
</section><!-- page -->

  <?php wp_footer(); ?>
  <script>
    const homeURL = "<?php echo get_option('home'); ?>";
    const swPath = homeURL + '/serviceworker.min.js';
    // Register our service-worker
    if (navigator.serviceWorker) {
        navigator.serviceWorker.register(swPath);
        window.addEventListener('load', function() {
            if (navigator.serviceWorker.controller) {
                navigator.serviceWorker.controller.postMessage({'command': 'trimCaches'});
            }
        });
    }
  </script>
</body>
</html>
