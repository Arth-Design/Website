<<?php echo esc_attr($title_tag)?> class="clearfix edgtf-title-holder">
	<span class="edgtf-acc-gradient"></span>
	<span class="edgtf-tab-title">
		<span class="edgtf-tab-title-inner">
			<?php echo esc_attr($title)?>
		</span>
	</span>
	<span class="edgtf-accordion-mark">
		<span class="edgtf-accordion-mark-icon">
			<span class="icon_plus"></span>
			<span class="icon_minus-06"></span>
		</span>
	</span>
</<?php echo esc_attr($title_tag)?>>
<div class="edgtf-accordion-content">
	<div class="edgtf-accordion-content-inner">
		<?php echo do_shortcode($content); ?>
	</div>
</div>