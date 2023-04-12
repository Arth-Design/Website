<?php
/**
 * Function Custom meta box for Premium
 * 
 * @package Portfolio and Projects
 * @since 1.2.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="pro-notice"><strong><?php echo sprintf( __( 'Utilize these <a href="%s" target="_blank">Premium Features</a> to get best of this plugin.', 'portfolio-and-projects'), WP_PAP_PLUGIN_LINK_UNLOCK); ?></strong></div>
<table class="form-table wp-pap-metabox-table">
	<tbody>

		<tr class="wp-pap-feature">
			<th>
				<?php _e('Layouts ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
			</th>
			<td>
				<span class="description"><strong><?php _e('2 (Grid, Filter). In lite version only 1 layout.', 'portfolio-and-projects'); ?></strong></span>
			</td>
		</tr>
		<tr class="wp-pap-feature">
			<th>
				<?php _e('Designs ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
			</th>
			<td>
				<span class="description"><strong>15+</strong><?php _e(' In lite version only one design.', 'portfolio-and-projects'); ?></span>
			</td>
		</tr>
		<tr class="wp-pap-feature">
			<th>
				<?php _e('Portfolio Detail View Styles ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
			</th>
			<td>
				<span class="description"><strong><?php _e('Display inline and popup style in lite version only inline style', 'portfolio-and-projects'); ?></strong></span>
			</td>
		</tr>
		<tr class="wp-pap-feature">
			<th>
				<?php _e('Pagination ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
			</th>
			<td>
				<span class="description"><?php _e('Display pagination.', 'portfolio-and-projects'); ?></span>
			</td>
		</tr>
		<tr class="wp-pap-feature">
			<th>
				<?php _e('Query Offset ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
			</th>
			<td>
				<span class="description"><?php _e('You can set query offset.', 'portfolio-and-projects'); ?></span>
			</td>
		</tr>
		<tr class="wp-pap-feature">
			<th>
				<?php _e('Link and Link Target ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
			</th>
			<td>
				<span class="description"><?php _e('Option to enable/disable portfolio item link and Open link in same window OR in new tab.', 'portfolio-and-projects'); ?></span>
			</td>
		</tr>
		<tr class="wp-pap-feature">
			<th>
				<?php _e('WP Templating Features ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
			</th>
			<td>
				<span class="description"><?php _e('You can modify plugin html/designs in your current theme.', 'portfolio-and-projects'); ?></span>
			</td>
		</tr>
		<tr class="wp-pap-feature">
			<th>
				<?php _e('Shortcode Generator ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
			</th>
			<td>
				<span class="description"><?php _e('Play with all shortcode parameters with preview panel. No documentation required.' , 'portfolio-and-projects'); ?></span>
			</td>
		</tr>
		<tr class="wp-pap-feature">
			<th>
				<?php _e('Drag & Drop Slide Order Change ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
			</th>
			<td>
				<span class="description"><?php _e('Arrange your desired slides with your desired order and display.' , 'portfolio-and-projects'); ?></span>
			</td>
		</tr>
		<tr class="wp-pap-feature">
			<th>
				<?php _e('Page Builder Support ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
			</th>
			<td>
				<span class="description"><strong><?php _e('Gutenberg Block, Elementor, Bevear Builder, SiteOrigin, Divi, Visual Composer and Fusion Page Builder Support', 'portfolio-and-projects'); ?></strong></span>
			</td>
		</tr>
		<tr class="wp-pap-feature">
			<th>
				<?php _e('Exclude Protfolio Slider Post and Exclude Some Categories ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
			</th>
			<td>
				<span class="description"><strong><?php _e('Do not display the protfolio & Do not display the protfolio for particular categories.' , 'portfolio-and-projects'); ?></strong></span>
			</td>
		</tr>
	</tbody>
</table><!-- end .wp-pap-metabox-table -->

