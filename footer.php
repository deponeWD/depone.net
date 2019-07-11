<footer role="contentinfo">
    <ul class="first first--centered">
        <li><strong>DEPONE Netzgestaltung</strong></li>
        <li>Daniel Ehniss</li>
        <li>daniel@depone.de</li>
        <li><a rel="me" class="url" href="https://twitter.com/depone" title="Link zu meinem Twitterprofil" target="_blank" >@depone</a></li>
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
    <!--
    // Register our service-worker
    if (navigator.serviceWorker) {
        navigator.serviceWorker.register('/serviceworker.min.js', {
            scope: './'
        });
        window.addEventListener('load', function() {
            if (navigator.serviceWorker.controller) {
                navigator.serviceWorker.controller.postMessage({'command': 'trimCaches'});
            }
        });
    }
    //-->
  </script>
</body>
</html>
