<?php
/*
Template Name: Landing Page
*/
$sidebar = ratio_edge_sidebar_layout();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php
        /**
         * ratio_edge_header_meta hook
         *
         * @see ratio_edge_header_meta() - hooked with 10
         * @see edgt_user_scalable_meta() - hooked with 10
         */
        do_action('ratio_edge_header_meta');
        
        wp_head(); ?>
    </head>

<body <?php body_class(); ?>>

<?php 
if (ratio_edge_options()->getOptionValue('smooth_page_transitions') == "yes") {
	$ajax_class = 'edgtf-mimic-ajax';
?>
<div class="edgtf-smooth-transition-loader <?php echo esc_attr($ajax_class); ?>">
    <div class="edgtf-st-loader">
        <div class="edgtf-st-loader1">
            <?php ratio_edge_loading_spinners(); ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="edgtf-wrapper">
	<div class="edgtf-wrapper-inner">
		<div class="edgtf-content">
			<div class="edgtf-content-inner">
				<?php get_template_part( 'title' ); ?>
				<?php get_template_part('slider');?>
				<div class="edgtf-full-width">
					<div class="edgtf-full-width-inner">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php if(($sidebar == 'default')||($sidebar == '')) : ?>
								<?php the_content(); ?>
								<?php do_action('ratio_edge_page_after_content'); ?>
							<?php elseif($sidebar == 'sidebar-33-right' || $sidebar == 'sidebar-25-right'): ?>
								<div <?php echo ratio_edge_sidebar_columns_class(); ?>>
									<div class="edgtf-column1 edgtf-content-left-from-sidebar">
										<div class="edgtf-column-inner">
											<?php the_content(); ?>
											<?php do_action('ratio_edge_page_after_content'); ?>
										</div>
									</div>
									<div class="edgtf-column2">
										<?php get_sidebar(); ?>
									</div>
								</div>
							<?php elseif($sidebar == 'sidebar-33-left' || $sidebar == 'sidebar-25-left'): ?>
								<div <?php echo ratio_edge_sidebar_columns_class(); ?>>
									<div class="edgtf-column1">
										<?php get_sidebar(); ?>
									</div>
									<div class="edgtf-column2 edgtf-content-right-from-sidebar">
										<div class="edgtf-column-inner">
											<?php the_content(); ?>
											<?php do_action('ratio_edge_page_after_content'); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>