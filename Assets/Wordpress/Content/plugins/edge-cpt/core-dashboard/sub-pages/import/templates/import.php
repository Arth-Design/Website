<div class="wrap about-wrap edgtf-core-dashboard">
	<h1 class="edgtf-cd-title"><?php esc_html_e('Import', 'ratio-core'); ?></h1>
	<h4 class="edgtf-cd-subtitle"><?php esc_html_e('You can import the theme demo content here.', 'ratio-core'); ?></h4>
	<div class="edgtf-core-dashboard-inner">
		<div class="edgtf-core-dashboard-column">
			<div class="edgtf-core-dashboard-box edgtf-cd-import-box">
				<?php
				if(!empty(RatioCoreDashboard::get_instance()->get_purchased_code())) {?>
					<div class="edgtf-cd-box-title-holder">
						<h3><?php esc_html_e('Import demo content', 'ratio-core'); ?></h3>
						<p><?php esc_html_e('Start the demo import process by choosing which content you wish to import. ', 'ratio-core'); ?></p>
					</div>
					<div class="edgtf-cd-box-inner">
						<form method="post" class="edgtf-cd-import-form" data-confirm-message="<?php esc_attr_e('Are you sure, you want to import Demo Data now?', 'ratio-core'); ?>">
							<div class="edgtf-cd-box-form-section">
								<?php echo ratio_core_get_module_template_part('core-dashboard/sub-pages/import', 'notice', ''); ?>
								<label class="edgtf-cd-label"><?php esc_html_e('Select Demo to import', 'ratio-core'); ?></label>
								<select name="demo" class="edgtf-import-demo">
									<option value="ratio-v2" data-thumb="<?php echo EDGE_CORE_URL_PATH . '/core-dashboard/assets/img/demo.png'; ?>"><?php esc_html_e('Ratio', 'ratio-core'); ?></option>
								</select>
							</div>
							<div class="edgtf-cd-box-form-section edgtf-cd-box-form-section-columns">
								<div class="edgtf-cd-box-form-section-column">
									<label class="edgtf-cd-label"><?php esc_html_e('Select Import Option', 'ratio-core'); ?></label>
									<select name="import_option" class="edgtf-cd-import-option" data-option-name="import_option" data-option-type="selectbox">
										<option value="none"><?php esc_html_e('Please Select', 'ratio-core'); ?></option>
										<option value="complete"><?php esc_html_e('All', 'ratio-core'); ?></option>
										<option value="content"><?php esc_html_e('Content', 'ratio-core'); ?></option>
										<option value="widgets"><?php esc_html_e('Widgets', 'ratio-core'); ?></option>
										<option value="options"><?php esc_html_e('Options', 'ratio-core'); ?></option>
<!--										<option value="single-page">--><?php //esc_html_e('Single Page', 'ratio-core'); ?><!--</option>-->
									</select>
								</div>
								<div class="edgtf-cd-box-form-section-column">
									<label class="edgtf-cd-label"><?php esc_html_e('Import Attachments', 'ratio-core'); ?></label>
									<div class="edgtf-cd-switch">
										<label class="edgtf-cd-cb-enable selected"><span><?php esc_html_e('Yes', 'ratio-core'); ?></span></label>
										<label class="edgtf-cd-cb-disable"><span><?php esc_html_e('No', 'ratio-core'); ?></span></label>
										<input type="checkbox" class="edgtf-cd-import-attachments checkbox" name="import_attachments" value="1" checked="checked">
									</div>
								</div>
							</div>
							<div class="edgtf-cd-box-form-section edgtf-cd-box-form-section-dependency"></div>
							<div class="edgtf-cd-box-form-section edgtf-cd-box-form-section-progress">
								<span><?php esc_html_e('The import process may take some time. Please be patient.', 'ratio-core') ?></span>
								<progress id="edgtf-progress-bar" value="0" max="100"></progress>
								<span class="edgtf-cd-progress-percent"><?php esc_attr_e('0%', 'ratio-core'); ?></span>
							</div>
							<div class="edgtf-cd-box-form-section edgtf-cd-box-form-last-section">
								<span class="edgtf-cd-import-is-completed"><?php esc_html_e('Import is completed', 'ratio-core') ?></span>
								<input type="submit" class="edgtf-cd-button" value="<?php esc_attr_e('Import', 'ratio-core'); ?>" name="import" id="edgtf-<?php echo esc_attr($submit); ?>" />
							</div>
							<?php wp_nonce_field("edgtf_cd_import_nonce","edgtf_cd_import_nonce") ?>
						</form>
					</div>
				<?php } else { ?>
					<div class="edgtf-cd-box-title-holder">
						<h3><?php esc_html_e('Import demo content', 'ratio-core'); ?></h3>
						<p><?php esc_html_e('Please activate your copy of the theme by registering the theme so you could proceed with the demo import process. ', 'ratio-core'); ?></p>
					</div>
					<div class="edgtf-cd-box-inner">
						<div class="edgtf-cd-box-section">
							<div class="edgtf-cd-field-holder">
								<a href="<?php echo admin_url('admin.php?page=ratio_core_dashboard'); ?>" class="edgtf-cd-button"><?php esc_attr_e('Activate your theme copy', 'ratio-core'); ?></a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>