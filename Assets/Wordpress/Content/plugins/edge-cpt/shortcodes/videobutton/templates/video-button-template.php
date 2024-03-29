<?php
/**
 * Video Button shortcode template
 */
?>

<div class="edgtf-video-button">
	<a class="edgtf-video-button-play" href="<?php echo esc_url($video_link); ?>" data-rel="prettyPhoto">
		<?php if($preview_image != '') { ?>
			<span class="edgtf-video-button-image">
				<img src="<?php echo wp_get_attachment_url( $preview_image ); ?>" alt="<?php esc_attr_e( 'Video Button Image', 'edge-cpt' ); ?>" />
			</span>
		<?php } ?>
		<span class="edgtf-video-button-wrapper">
			<span class="edgtf-video-button-wrapper-inner">
				<span class="edgtf-video-button-icon" <?php echo ratio_edge_inline_style($button_style);?>></span>
			</span>
		</span>
	</a>
	<?php if ($title !== ''){?>
	<<?php echo esc_attr($title_tag);?> class="edgtf-video-button-title">
	<?php echo esc_html($title); ?>
</<?php echo esc_attr($title_tag);?>>
<?php } ?>
</div>