<?php do_action('ratio_edge_before_top_navigation'); ?>

    <nav data-navigation-type='float' class="edgtf-vertical-menu edgtf-vertical-dropdown-float">
        <?php
        wp_nav_menu(array(
            'theme_location'  => 'side-navigation',
            'container'       => '',
            'container_class' => '',
            'menu_class'      => '',
            'menu_id'         => '',
            'fallback_cb'     => 'top_navigation_fallback',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'walker'          => new RatioEdgeTopNavigationWalker()
        ));
        ?>
    </nav>

<?php do_action('ratio_edge_after_top_navigation'); ?>