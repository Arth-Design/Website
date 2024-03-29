<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<?php ratio_edge_get_module_template_part('templates/single/parts/image', 'blog'); ?>
		<?php ratio_edge_get_module_template_part('templates/parts/audio', 'blog'); ?>
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner clearfix">
				<?php ratio_edge_get_module_template_part('templates/single/parts/title', 'blog'); ?>
				<div class="edgtf-post-info">
					<?php ratio_edge_post_info(array('author' => 'yes', 'category' => 'yes', 'date' => 'yes')) ?>
				</div>
				<?php the_content(); ?>
				<?php ratio_edge_get_module_template_part('templates/lists/parts/pages-navigation', 'blog');  ?>
				<?php if(has_tag() || ratio_edge_get_social_share_html() != '') : ?>
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
	<?php do_action('ratio_edge_before_blog_article_closed_tag'); ?>
</article>