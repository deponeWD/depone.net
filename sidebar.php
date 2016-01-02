<aside role="complementary">
        <ul>
            <?php   /* Widgetized sidebar, if you have the plugin installed. */
                    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
            <li>
                <?php get_search_form(); ?><!-- Suchfeld -->
            </li>

            <?php endif; ?>
        </ul><!-- aside ul -->
</aside>