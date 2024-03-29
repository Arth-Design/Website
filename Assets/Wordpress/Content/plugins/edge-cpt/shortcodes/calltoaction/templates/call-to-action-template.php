<?php
/**
 * Call to action shortcode template
 */
?>
<?php if ($full_width == "no") { ?>
	<div class="edgtf-container-inner">
<?php } ?>
	<div class="edgtf-call-to-action <?php echo esc_attr($type) ?>" <?php ratio_edge_inline_style($wrapper_styles);?>>
		<?php echo wp_kses_post($inset);?>

		<?php if ($content_in_grid == 'yes' && $full_width == 'yes') { ?>
		<div class="edgtf-container-inner">
		<?php } ?>

			<div <?php ratio_edge_class_attribute($row_classes);?> <?php ratio_edge_inline_style($call_to_action_styles) ?>>
				<div class="edgtf-text-wrapper <?php echo esc_attr($text_wrapper_classes) ?>">
				<?php if ($type == "with-icon") { ?>
					<div class="edgtf-call-to-action-icon-holder">
						<div class="edgtf-call-to-action-icon">
							<div class="edgtf-call-to-action-icon-inner"><?php echo ratio_edge_get_module_part( $icon ); ?></div>
						</div>
					</div>
				<?php } ?>
					<div class="edgtf-call-to-action-text" <?php echo ratio_edge_get_inline_style($content_styles) ?>><?php echo do_shortcode($content); ?></div>
				</div>

				<?php if ($show_button == 'yes') { ?>
					<div class="edgtf-button-wrapper edgtf-call-to-action-column2 edgtf-call-to-action-cell" style ="text-align: <?php echo esc_attr($button_position) ?> ;">
						<?php echo ratio_edge_get_button_html($button_parameters); ?>
					</div>
				<?php } ?>
			</div>
		<?php if ($content_in_grid == 'yes' && $full_width == 'yes') { ?>
		</div>
		<?php } ?>
	</div>
<?php if ($full_width == 'no') { ?>
	</div>
<?php } ?>