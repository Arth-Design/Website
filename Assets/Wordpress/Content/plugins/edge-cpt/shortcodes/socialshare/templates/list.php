<div class="edgtf-social-share-holder edgtf-list">
	<span class="edgtf-social-share-title"><?php esc_html_e('Share:', 'edge-cpt'); ?></span>
	<ul>
		<?php foreach ($networks as $net) {
			echo ratio_edge_get_module_part( $net );
		} ?>
	</ul>
</div>