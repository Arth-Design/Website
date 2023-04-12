<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see ratio_edge_header_meta() - hooked with 10
     * @see edgt_user_scalable - hooked with 10
     */
    
    do_action('ratio_edge_header_meta');
    
    wp_head(); ?>
	
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-V9GCDJVLRQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-V9GCDJVLRQ');
</script>

	
</head>

<body <?php body_class();?>>
<?php ratio_edge_get_side_area(); ?>
<?php 
if(ratio_edge_options()->getOptionValue('smooth_page_transitions') == "yes") {
	$ajax_class = 'edgtf-mimic-ajax';
?>
<div class="edgtf-smooth-transition-loader <?php echo esc_attr($ajax_class); ?>">
    <div class="edgtf-st-loader">
        <div class="edgtf-st-loader1">
            <?php ratio_edge_loading_spinners(); ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="edgtf-wrapper">
    <div class="edgtf-wrapper-inner">
        <?php ratio_edge_get_header(); ?>

        <?php if (ratio_edge_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='edgtf-back-to-top'  href='#'>
                <div class="edgtf-outline">
                    <div class="edgtf-line-1"></div>
                    <div class="edgtf-line-2"></div>
                    <div class="edgtf-line-3"></div>
                    <div class="edgtf-line-4"></div>
                </div>
                <span class="edgtf-icon-stack">
                     <?php
                        ratio_edge_icon_collections()->getBackToTopIcon('font_elegant');
                    ?>
                </span>
            </a>
        <?php } ?>
        <?php ratio_edge_get_full_screen_menu(); ?>

        <div class="edgtf-content" <?php ratio_edge_content_elem_style_attr(); ?>>
            <div class="edgtf-content-inner">