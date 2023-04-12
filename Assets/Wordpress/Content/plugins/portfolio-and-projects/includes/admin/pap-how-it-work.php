<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package Portfolio and Projects
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="wrap pap-wrap">
<h2><?php _e( 'How It Works', 'portfolio-and-projects' ); ?></h2>
	<style type="text/css">
		.wpos-box{box-shadow: 0 5px 30px 0 rgba(214,215,216,.57);background: #fff; padding-bottom:10px; position:relative;}
		.wpos-box ul{padding: 15px;}
		.wpos-box h5{background:#555; color:#fff; padding:15px; text-align:center;}
		.wpos-box h4{ padding:0 15px; margin:5px 0; font-size:18px;}
		.wpos-box .button{margin:0px 15px 15px 15px; text-align:center; padding:7px 15px; font-size:15px;display:inline-block;}
		.wpos-box .wpos-list{list-style:square; margin:10px 0 0 20px;}
		.wpos-clearfix:before, .wpos-clearfix:after{content: "";display: table;}
		.wpos-clearfix::after{clear: both;}
		.wpos-clearfix{clear: both;}
		.wpos-col{width: 47%; float: left; margin-right:10px; margin-bottom:10px;}
		.wpos-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpos-pro-box.postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.postbox-container .wpos-list li:before{font-family: dashicons; content: "\f139"; font-size:20px; color: #0073aa; vertical-align: middle;}
		.pap-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.pap-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
		.upgrade-to-pro{font-size:18px; text-align:center; margin-bottom:15px;}
		.wpos-copy-clipboard{-webkit-touch-callout: all; -webkit-user-select: all; -khtml-user-select: all; -moz-user-select: all; -ms-user-select: all; user-select: all;}
		.button-orange{background: #ff5d52 !important;border-color: #ff5d52 !important; font-weight: 600;}
		.button-blue{background: #0055fb !important;border-color: #0055fb !important; font-weight: 600;}
	</style>

	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">

			<!--How it workd HTML -->
			<div id="post-body-content">
				<div class="meta-box-sortables">

					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Need Support & Solutions?', 'portfolio-and-projects' ); ?></span>
							</h2>
						</div>
						<div class="inside wpos-clearfix">
							<div class="wpos-col">
								<div class="wpos-box">
									<h5 style="font-size: 18px;line-height: 30px;margin: 10px 0px; background:#0055fb;">Portfolio and Projects Premium Features</h5>
									<h4>Single Plugin</h4>
									<ul class="wpos-list">
										<li><b>15+ Pre define</b> designs for portfolio.</li>
										<li><b>Portfolio Filtration.</b> </li>
										<li>Easy Drag-n-Drop Feature to Display Portfolio in desire order.</li>
										<li>Gutenberg Block, Elementor, Bevear, SiteOrigin, Divi and Fusion Page Builder Supports.</li>
										<li>2 types of pagination (Numeric and Previous-Next).</li>
										<li><a href="<?php echo WP_PAP_PLUGIN_LINK_UPGRADE; ?>" target="_blank">View More All Features</a></li>
									</ul>
									<div style="text-align:center;">
										<a class="button button-primary button-blue" href="<?php echo WP_PAP_PLUGIN_LINK_UPGRADE; ?>" target="_blank"><?php _e('Grab Now', 'portfolio-and-projects'); ?></a>
									</div>
								</div>
							</div>
							<div class="wpos-col">
								<div class="wpos-box">
									<h5 style="font-size: 18px;line-height: 30px;margin: 10px 0px; background:#ff5d52;">Essential Bundle With Portfolio and Projects</h5>
									<h4>Bundle Deal</h4>
									<ul style="margin: 0;list-style: none;font-size: 16px;">
										<li style="margin-bottom:8px;">
											<span style="display:inline-block;vertical-align: middle;"><img src="<?php echo WP_PAP_URL; ?>/assets/images/utility-50.png" width="24"></span> <span style="display:inline-block;vertical-align: middle;">39 Utility Plugins</span>
										</li>
										<li style="margin-bottom:8px;">
											<span style="display:inline-block;vertical-align: middle;"><img src="<?php echo WP_PAP_URL; ?>/assets/images/SlidersPack-50.png" width="24"></span> <span style="display:inline-block;vertical-align: middle;"> 10 SlidersPack</span>
										</li>
										<li style="margin-bottom:8px;">
											<span style="display:inline-block;vertical-align: middle;"><img src="<?php echo WP_PAP_URL; ?>/assets/images/popup-anything-icon.png" width="24"></span> <span style="display:inline-block;vertical-align: middle;"> Popup Anything A Marketing Popup</span>
										</li>
										<li>
											<span style="display:inline-block;vertical-align: middle;"><img src="<?php echo WP_PAP_URL; ?>/assets/images/security-icon.png" width="24"></span> <span style="display:inline-block;vertical-align: middle;"> Essential Security</span>
										</li>
									</ul>
									<div style="text-align:center;">
										<a class="button button-primary button-orange" href="<?php echo WP_PAP_PLUGIN_BUNDLE_LINK; ?>" target="_blank"><?php _e('Grab Now', 'portfolio-and-projects'); ?></a>
									</div>
								</div>
							</div>
							<div class="wpos-clearfix">
								<img src="<?php echo WP_PAP_URL; ?>/assets/images/page-builder-support.jpg" style="max-width:100% " />
							</div>
						</div><!-- .inside -->
					</div><!-- #general -->

					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'How It Works - Display and shortcode', 'portfolio-and-projects' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label><?php _e('Getting Started with Portfolio/Projects', 'portfolio-and-projects'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1: This plugin create a Gallery mata box under your Portfolio/Projects tab in WordPress menu section', 'portfolio-and-projects'); ?></li>
												<li><?php _e('Step-2: Go to Profolio/Projects add new portfoilo add gallery images, project link and choose your slider setting', 'portfolio-and-projects'); ?></li>
												<li><?php _e('Step-3: Now, paste below shortcode in any post or page and your profolio listing is ready !!!', 'portfolio-and-projects'); ?></li>
											</ul>
										</td>
									</tr>

									<tr>
										<th>
											<label><?php _e('All Shortcodes', 'portfolio-and-projects'); ?>:</label>
										</th>
										<td>
											<span class="wpos-copy-clipboard pap-shortcode-preview">[pap_portfolio]</span> – <?php _e('Gallery Slider', 'portfolio-and-projects'); ?> <br />
										</td>
									</tr>
									<tr>
										<th>
											<label><?php _e('Documentation', 'portfolio-and-projects'); ?>:</label>
										</th>
										<td>
											<a class="button button-primary" href="https://docs.essentialplugin.com/portfolio-and-projects/" target="_blank"><?php _e('Check Documentation', 'portfolio-and-projects'); ?></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- .postbox -->

					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Help to improve this plugin!', 'portfolio-and-projects' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<p>Enjoyed this plugin? You can help by rate this plugin <a href="https://wordpress.org/support/plugin/portfolio-and-projects/reviews/" target="_blank">5 stars!</a></p>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->
			</div><!-- #post-body-content -->
			
			<!--Upgrad to Pro HTML -->
			<div id="postbox-container-1" class="postbox-container">
				<div class="meta-box-sortables">
					<div class="postbox wpos-pro-box">

						<h3 class="hndle">
							<span><?php _e( 'Upgrate to Pro', 'portfolio-and-projects' ); ?></span>
						</h3>
						<div class="inside">
							<ul class="wpos-list">
								<li>15+ Pre define Designs</li>
								<li>Display Portfolio with Title, Description and Image Gallery</li>
								<li>Portfolio Grid View</li>
								<li>Portfolio Category-wise</li>
								<li>Strong short-code parameters</li>
								<li>Easy Drag-n-Drop Feature to Display Portfolio in desire order</li>
								<li>2 types of pagination (Numeric and Previous-Next)</li>
								<li>Portfolio Filtration</li>
								<li>Limit to display number of posts</li>
								<li>Template overriding feature support</li>
								<li>WPBakery page builder Support</li>
								<li>Gutenberg, Elementor, Beaver and SiteOrigin Page Builder Support. <span class="wpos-new-feature">New</span></li>
								<li>Divi Page Builder Native Support. <span class="wpos-new-feature">New</span></li>
								<li>Fully Responsive and Touch Based Slider</li>
								<li>2 Portfolio Pop-up styles (Inline and Popup)</li>
								<li>Skills can be added</li>
								<li>Custom CSS editor</li>
								<li>Fully Responsive</li>
								<li>100% Multi language</li>
							</ul>
							<div class="upgrade-to-pro">Gain access to <strong>Portfolio and Projects</strong> included in <br /><strong>Essential Plugin Bundle</div>
							<a class="button button-primary wpos-button-full button-orange" href="<?php echo WP_PAP_PLUGIN_LINK_UPGRADE; ?>" target="_blank"><?php _e('Grab Portfolio and Projects Now', 'portfolio-and-projects'); ?></a>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->
			</div><!-- #post-container-1 -->
		</div><!-- #post-body -->
	</div><!-- #poststuff -->
</div><!-- .pap-wrap -->