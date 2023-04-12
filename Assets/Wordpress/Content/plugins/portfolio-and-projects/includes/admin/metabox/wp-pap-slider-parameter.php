<?php
/**
 * Handles Post Setting metabox HTML
 *
 * @package Portfolio and Projects
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $post;

$prefix = WP_PAP_META_PREFIX; // Metabox prefix

// Slider Variables
$arrow_slider 				= get_post_meta( $post->ID, $prefix.'arrow_slider', true );
$pagination_slider 			= get_post_meta( $post->ID, $prefix.'pagination_slider', true );
$animation_slider 			= get_post_meta( $post->ID, $prefix.'animation_slider', true );
?>

<div class="wp-tsasp-mb-tabs-wrp">

	<div id="wp-tsasp-mdetails" class="wp-tsasp-mdetails wpssc-slider">
		<table class="form-table wp-tsasp-team-detail-tbl">
			<tbody>
				<tr>
					<h4><?php _e('Navigation & Pagination Settings', 'portfolio-and-projects') ?></h4>
					<hr>
					<th scope="row">
						<label><?php _e('Arrow', 'portfolio-and-projects'); ?></label>
					</th>
					<td>
						<input type="radio" value="true" name="<?php echo $prefix; ?>arrow_slider" <?php checked( 'true', $arrow_slider ); ?>>True
						<input type="radio" value="false" name="<?php echo $prefix; ?>arrow_slider" <?php checked( 'false', $arrow_slider ); ?>>False<br>
						<em style="font-size:11px;"><?php _e('Enable Arrows for slider','portfolio-and-projects'); ?></em>
					</td>
				</tr>
				<tr>
					<th>
						<label><?php _e('Pagination', 'portfolio-and-projects'); ?></label>
					</th>
					<td>
						<input type="radio" name="<?php echo $prefix; ?>pagination_slider" value="true" <?php checked( 'true', $pagination_slider ); ?>>True
						<input type="radio" name="<?php echo $prefix; ?>pagination_slider" value="false" <?php checked( 'false', $pagination_slider ); ?>>False<br>
						<em style="font-size:11px;"><?php _e('String with CSS selector or HTML element of the container with pagination','portfolio-and-projects'); ?></em>
					</td>
				</tr>

				<tr class="wp-pap-feature">
					<th>
						<label><?php _e('Slider Autoplay ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
						</label>
					</th>
					<td>
						<input type="checkbox" name="<?php echo $prefix; ?>autoplay_slider" value="1" disabled="" /><br/>
						<span class="description"><?php _e('Check this box to enable slider autoplay.', 'portfolio-and-projects'); ?></span><strong><?php echo sprintf( __( ' Utilize these <a href="%s" target="_blank">Premium Features</a> to get best of this plugin..', 'portfolio-and-projects'), WP_PAP_PLUGIN_LINK_UNLOCK); ?></strong>
					</td>
				</tr>

				<tr class="wp-pap-feature">
					<th>
						<label><?php _e('Slider Loop ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
						</label>
					</th>
					<td>
						<input type="checkbox" name="<?php echo $prefix; ?>autoplay_slider" value="1" disabled="" /><br/>
						<span class="description"><?php _e('Check this box to run slider continuously.', 'portfolio-and-projects'); ?></span><strong><?php echo sprintf( __( ' Utilize these <a href="%s" target="_blank">Premium Features</a> to get best of this plugin..', 'portfolio-and-projects'), WP_PAP_PLUGIN_LINK_UNLOCK); ?></strong>
					</td>
				</tr>

				<tr class="wp-pap-feature">
					<th>
						<label><?php _e('Slide to Show ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
						</label>
					</th>
					<td>
						<input type="text" name="<?php echo $prefix; ?>slide_to_show_slider" class="medium-text" disabled="" /><br/>
						<span class="description"><?php _e('Enter number of slides to show at a time.', 'portfolio-and-projects'); ?></span><strong><?php echo sprintf( __( ' Utilize these <a href="%s" target="_blank">Premium Features</a> to get best of this plugin..', 'portfolio-and-projects'), WP_PAP_PLUGIN_LINK_UNLOCK); ?></strong>
					</td>
				</tr>

				<tr class="wp-pap-feature">
					<th>
						<label><?php _e('Autoplay Interval ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
						</label>
					</th>
					<td>
						<input type="text" name="<?php echo $prefix; ?>autoplayspeed_slider" class="medium-text" disabled="" /><br/>
						<span class="description"><?php _e('Enter number of slider autoplay interval.', 'portfolio-and-projects'); ?></span><strong><?php echo sprintf( __( ' Utilize these <a href="%s" target="_blank">Premium Features</a> to get best of this plugin..', 'portfolio-and-projects'), WP_PAP_PLUGIN_LINK_UNLOCK); ?></strong>
					</td>
				</tr>

				<tr class="wp-pap-feature">
					<th>
						<label><?php _e('Speed ', 'portfolio-and-projects'); ?><span class="wp-pap-tag"><?php _e('PRO','portfolio-and-projects');?></span>
						</label>
					</th>
					<td>
						<input type="text" name="<?php echo $prefix; ?>speed_slider" class="medium-text" disabled="" /><br/>
						<span class="description"><?php _e('Enter number of slider speed.', 'portfolio-and-projects'); ?></span><strong><?php echo sprintf( __( ' Utilize these <a href="%s" target="_blank">Premium Features</a> to get best of this plugin..', 'portfolio-and-projects'), WP_PAP_PLUGIN_LINK_UNLOCK); ?></strong>
					</td>
				</tr>

				<tr>
					<th>
						<label><?php _e('Effect', 'portfolio-and-projects'); ?></label>
					</th>
					<td>
						<select name="<?php echo $prefix; ?>animation_slider">
							<option value="slide" <?php if($animation_slider == 'slide'){echo 'selected'; } ?>>Slide</option>
							<option value="fade" <?php if($animation_slider == 'fade'){echo 'selected'; } ?>>Fade</option>
						</select><br/>
						<em style="font-size:11px;"><?php _e('Could be "slide", "fade"','portfolio-and-projects'); ?></em>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>