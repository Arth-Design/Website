<div class="edgtf-page-header page-header clearfix">

    <div class="edgtf-theme-name pull-left" >
        <img src="<?php echo esc_url(ratio_edge_get_skin_uri() . '/assets/img/logo.png'); ?>" alt="<?php esc_attr_e( 'edgt_logo', 'ratio' ); ?>" class="edgtf-header-logo pull-left"/>
        <?php $current_theme = wp_get_theme(); ?>
        <h1 class="pull-left">
            <?php echo esc_html($current_theme->get('Name')); ?>
            <small><?php echo esc_html($current_theme->get('Version')); ?></small>
        </h1>
    </div>
    <div class="edgtf-top-section-holder">
        <div class="edgtf-top-section-holder-inner">
            <?php $this->getAnchors($active_page); ?>
            <div class="edgtf-top-buttons-holder">
                <?php if($show_save_btn) { ?>
                    <input type="button" id="edgt_top_save_button" class="btn btn-info btn-sm" value="<?php esc_html_e('Save Changes', 'ratio'); ?>"/>
                <?php } ?>
            </div>

            <div class="edgtf-input-change"><i class="fa fa-exclamation-circle"></i><?php esc_html_e( 'You should save your changes', 'ratio' ); ?></div>
            <div class="edgtf-changes-saved"><i class="fa fa-check-circle"></i><?php esc_html_e( 'All your changes are successfully saved', 'ratio' ); ?></div>
        </div>
    </div>

</div> <!-- close div.edgtf-page-header -->