<?php if ( ratio_edge_core_installed() ) { ?>
	<div class="edgtf-blog-like">
		<?php if( function_exists('ratio_edge_get_like') ) ratio_edge_get_like(); ?>
	</div>
<?php } ?>