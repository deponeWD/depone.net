<footer role="contentinfo">
    <ul class="first">
        <li><strong>DEPONE Netzgestaltung</strong></li>
        <li>Daniel Ehniss</li>
        <li>daniel@depone.de</li>
        <li><a rel="me" class="url" href="https://twitter.com/depone" title="Link zu meinem Twitterprofil" target="_blank" >@depone</a></li>
    </ul>
    <ul class="second" >
        <li><strong>B&uuml;ro 5&amp;30</strong></li>
        <li>Gottesauer Straße 35</li>
        <li>76131 Karlsruhe</li>
        <li><a href="https://5und30.de" title="Link zur Webseite des Büro 5&30" >5und30.de</a></li>
    </ul>
    <ul class="third" >
        <li><a href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>" title="Link zur Kontaktseite" >Kontakt</a></li>
        <li><a href="<?php echo esc_url( home_url( '/infos/impressum/' ) ); ?>" title="Link zum Impressum" >Impressum</a></li>
        <li><a href="<?php echo esc_url( home_url( '/infos/impressum/#Datenschutz' ) ); ?>" title="Link zum Datenschutzhinweis im Impressum" >Datenschutz</a></li>
        <li><a href="<?php echo esc_url( home_url( '/feed' ) ); ?>" title="Link zum RSS-Feed des Blogs" >RSS</a></li>
    </ul>
    <div class="suchfeld"><?php get_search_form(); ?></div>
</footer><!-- footer -->
</section><!-- page -->

  <?php wp_footer(); ?>
  <script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('./serviceworker.min.js', {scope: './'});
    }
  </script>
</body>
</html>
