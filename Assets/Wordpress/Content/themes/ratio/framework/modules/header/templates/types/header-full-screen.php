<?php do_action('ratio_edge_before_page_header'); ?>

<header class="edgtf-page-header">
	<?php if($show_fixed_wrapper) : ?>
	<div class="edgtf-fixed-wrapper">
		<?php endif; ?>
	<div class="edgtf-menu-area" <?php ratio_edge_inline_style(array($menu_area_background_color,$menu_area_border_bottom_color)); ?>>
        <?php if($menu_area_in_grid) : ?>
            <div class="edgtf-grid">
        <?php endif; ?>
			<?php do_action( 'edgtf_themename_after_header_menu_area_html_open' )?>
            <div class="edgtf-vertical-align-containers">
                <div class="edgtf-position-left">
                    <div class="edgtf-position-left-inner">
                        <?php if(!$hide_logo) {
							ratio_edge_get_logo();
                        } ?>
                    </div>
                </div>
                <div class="edgtf-position-right">
                    <div class="edgtf-position-right-inner">
                        <?php ratio_edge_get_full_screen_opener(); ?>
                    </div>
                </div>
            </div>
        <?php if($menu_area_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
	<?php if($show_fixed_wrapper) : ?>
		</div>
	<?php endif; ?>
	<?php if($show_sticky) {
		ratio_edge_get_sticky_header();
	} ?>
</header>

<?php do_action('ratio_edge_after_page_header'); ?>

