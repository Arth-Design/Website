<?php
$icon_html = ratio_edge_icon_collections()->renderIcon($icon, $icon_pack);
?>

<div class="edgtf-message-icon-holder">
	<div class="edgtf-message-icon" <?php ratio_edge_inline_style($icon_attributes); ?>>
		<div class="edgtf-message-icon-inner">
			<?php
				echo ratio_edge_get_module_part( $icon_html );
			?>			
		</div> 
	</div>	 
</div>

