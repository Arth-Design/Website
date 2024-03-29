<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner">
				<div class="edgtf-post-mark edgtf-link-mark">
					<span class="icon_link"></span>
				</div>
				<?php if($type == 'standard'): ?>
					<div class="edgtf-post-info">
						<?php ratio_edge_post_info(array('author' => 'yes', 'category' => 'yes', 'date' => 'yes')) ?>
					</div>
				<?php endif; ?>
				<?php ratio_edge_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
				<?php if((has_tag() || ratio_edge_get_social_share_html() != '') && $type == 'standard') : ?>
					<div class="edgtf-post-info-bottom">
						<div class="edgtf-post-info-bottom-left">
							<?php has_tag() ? the_tags('', ', ', '') : ''; ?>
						</div>
						<div class="edgtf-post-info-bottom-right">
							<?php ratio_edge_post_info(array('share' => 'yes')) ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</article>