<div class="edgtf-image-gallery">
	<div class="edgtf-image-gallery-slider" <?php echo ratio_edge_get_inline_attrs($slider_data); ?>>
		<?php foreach ($images as $image) {
			if ($pretty_photo) { ?>
				<a href="<?php echo esc_url($image['url'])?>" data-rel="prettyPhoto[single_pretty_photo]" title="<?php echo esc_attr($image['title']); ?>">
			<?php } ?>
			<?php if(is_array($image_size) && count($image_size)) : ?>
				<?php echo ratio_edge_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
			<?php else: ?>
				<?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
			<?php endif; ?>
			<?php if ($pretty_photo) { ?>
				</a>
			<?php }
		} ?>
	</div>
</div>