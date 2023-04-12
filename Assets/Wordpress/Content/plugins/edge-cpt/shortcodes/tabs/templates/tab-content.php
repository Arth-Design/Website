<?php 
$tab_data_str = '';
$icon_html = '';
$tab_data_str .= 'data-icon-pack="'.$icon_pack.'" ';
$icon_html .=  ratio_edge_icon_collections()->renderIcon($icon, $icon_pack,array());
$tab_data_str .= 'data-icon-html="'. esc_attr($icon_html) .'"';
?>
<div class="edgtf-tab-container" id="tab-<?php echo sanitize_title($tab_title); ?>" <?php echo ratio_edge_get_module_part( $tab_data_str ); ?>><?php echo do_shortcode($content); ?></div>