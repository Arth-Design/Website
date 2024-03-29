<li class="edgtf-blog-list-item clearfix">
	<div class="edgtf-blog-list-item-inner">
		<div class="edgtf-item-image clearfix">
			<a href="<?php echo esc_url(get_permalink()) ?>">
				<?php
					echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
				?>				
			</a>
		</div>
		<div class="edgtf-item-text-holder">
			<<?php echo esc_html( $title_tag)?> class="edgtf-item-title ">
				<a href="<?php echo esc_url(get_permalink()) ?>" >
					<?php echo esc_attr(get_the_title()) ?>
				</a>
			</<?php echo esc_html($title_tag) ?>>
			<div class="edgtf-item-info-section">
				<?php ratio_edge_post_info(array(
					'date' => 'yes'
				)) ?>
			</div>
		</div>
	</div>	
</li>
