<?php

require_once 'const.php';
require_once 'helpers.php';

//load widgets
require_once 'widgets/load.php';

//load lib
require_once 'lib/post-type-interface.php';
require_once 'lib/shortcode-interface.php';

//load post-post-types
require_once 'post-types/portfolio/portfolio-register.php';
require_once 'post-types/portfolio/shortcodes/portfolio-list.php';
require_once 'post-types/portfolio/shortcodes/portfolio-slider.php';
require_once 'post-types/testimonials/testimonials-register.php';
require_once 'post-types/testimonials/shortcodes/testimonials.php';
require_once 'post-types/carousels/carousel-register.php';
require_once 'post-types/carousels/shortcodes/carousel.php';
require_once 'post-types/slider/slider-register.php';
require_once 'post-types/slider/tax-custom-fields.php';
require_once 'post-types/slider/shortcodes/slider.php';
require_once 'post-types/post-types-register.php'; //this has to be loaded last

//load shortcodes inteface
require_once 'lib/shortcode-loader.php';

//load shortcodes
require_once 'shortcodes/load.php';

//load dashboard
if ( file_exists( EDGE_CORE_ABS_PATH . '/core-dashboard' ) ) {
    require_once 'core-dashboard/load.php';
}