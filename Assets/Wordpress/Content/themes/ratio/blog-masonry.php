<?php
/*
Template Name: Blog: Masonry
*/
?>
<?php get_header(); ?>
<?php ratio_edge_get_title(); ?>
<?php get_template_part('slider'); ?>
	<div class="edgtf-container">
		<?php do_action('ratio_edge_after_container_open'); ?>
		<div class="edgtf-container-inner">
			<?php ratio_edge_get_blog('masonry'); ?>
		</div>
		<?php do_action('ratio_edge_before_container_close'); ?>
	</div>
<?php do_action('ratio_edge_after_container_close'); ?>
<?php get_footer(); ?>