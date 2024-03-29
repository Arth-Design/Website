<div class = "edgtf-shop-filter-holder edgtf-masonry-filter">
    <div class = "edgtf-shop-filter-holder-inner">
        <?php
        if(is_array($filter_categories) && count($filter_categories)){ ?>
            <ul>
                <li class="filter" data-filter="*"><span><?php esc_html_e('All', 'edge-cpt') ?></span></li>
                <?php foreach($filter_categories as $cat){
                    $rand_number = rand();
                    ?>
                    <li data-class="filter filter_<?php echo esc_attr( $rand_number ); ?>" class="filter_<?php echo esc_attr( $rand_number ); ?>" data-filter = ".product_cat-<?php echo esc_attr( $cat->term_id ); ?>">
                    <span>
                        <?php echo wp_kses_post( $cat->name ); ?>
                    </span>
                    </li>
                <?php } ?>
            </ul>
        <?php }?>
    </div>
</div>