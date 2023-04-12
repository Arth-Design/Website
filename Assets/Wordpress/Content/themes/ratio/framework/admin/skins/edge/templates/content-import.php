<div class="edgtf-tabs-content">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="import">
            <div class="edgtf-tab-content">
                <h2 class="edgtf-page-title"><?php esc_html_e( 'Import', 'ratio' ); ?></h2>
                <form method="post" class="edgt_ajax_form edgtf-import-page-holder">
                    <div class="edgtf-page-form">
                        <div class="edgtf-page-form-section-holder">
                            <h3 class="edgtf-page-section-title"><?php esc_html_e( 'Import Demo Content', 'ratio' ); ?></h3>
                            <div class="edgtf-page-form-section">
                                <div class="edgtf-field-desc">
                                    <h4><?php esc_html_e( 'Import', 'ratio' ); ?></h4>

                                    <p><?php esc_html_e( 'Choose demo content you want to import', 'ratio' ); ?></p>
                                </div>
                                <!-- close div.edgtf-field-desc -->

                                <div class="edgtf-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <select name="import_example" id="import_example" class="form-control edgtf-form-element dependence">
                                                    <option value="ratio"><?php esc_html_e( 'Ratio', 'ratio' ); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- close div.edgtf-section-content -->

                            </div>

                            <div class="edgtf-page-form-section">


                                <div class="edgtf-field-desc">
                                    <h4><?php esc_html_e( 'Import Type', 'ratio' ); ?></h4>

                                    <p><?php esc_html_e( 'Enabling this option will switch to a Side Position (default is Top Position)', 'ratio' ); ?></p>
                                </div>
                                <!-- close div.edgtf-field-desc -->



                                <div class="edgtf-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <select name="import_option" id="import_option" class="form-control edgtf-form-element">
                                                    <option value=""><?php esc_html_e( 'Please Select', 'ratio' ); ?></option>
                                                    <option value="complete_content"><?php esc_html_e( 'All', 'ratio' ); ?></option>
                                                    <option value="content"><?php esc_html_e( 'Content', 'ratio' ); ?></option>
                                                    <option value="widgets"><?php esc_html_e( 'Widgets', 'ratio' ); ?></option>
                                                    <option value="options"><?php esc_html_e( 'Options', 'ratio' ); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- close div.edgtf-section-content -->

                            </div>
                            <div class="edgtf-page-form-section">


                                <div class="edgtf-field-desc">
                                    <h4><?php esc_html_e( 'Import attachments', 'ratio' ); ?></h4>

                                    <p><?php esc_html_e( 'Do you want to import media files?', 'ratio' ); ?></p>
                                </div>
                                <!-- close div.edgtf-field-desc -->
                                <div class="edgtf-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p class="field switch">
                                                    <label class="cb-enable dependence"><span><?php esc_html_e( 'Yes', 'ratio' ); ?></span></label>
                                                    <label class="cb-disable selected dependence"><span><?php esc_html_e( 'No', 'ratio' ); ?></span></label>
                                                    <input type="checkbox" id="import_attachments" class="checkbox" name="import_attachments" value="1">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- close div.edgtf-section-content -->
                            </div>
                            <div class="edgtf-page-form-section">


                                <div class="edgtf-field-desc">
                                    <input type="submit" class="btn btn-primary btn-sm " value="<?php esc_attr_e( 'Import', 'ratio' ); ?>" name="import" id="import_demo_data" />
                                </div>
                                <!-- close div.edgtf-field-desc -->
                                <div class="edgtf-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="import_load"><span><?php esc_html_e('The import process may take some time. Please be patient.', 'ratio') ?> </span><br />
                                                    <div class="edgt-progress-bar-wrapper html5-progress-bar">
                                                        <div class="progress-bar-wrapper">
                                                            <progress id="progressbar" value="0" max="100"></progress>
                                                        </div>
                                                        <div class="progress-value"><?php esc_html_e( '0%', 'ratio' ); ?></div>
                                                        <div class="progress-bar-message">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- close div.edgtf-section-content -->
                            </div>
                            <div class="edgtf-page-form-section edgtf-import-button-wrapper">

                                <div class="alert alert-warning">
                                    <strong><?php esc_html_e('Important notes:', 'ratio') ?></strong>
                                    <ul>
                                        <li><?php esc_html_e('Please note that import process will take time needed to download all attachments from demo web site.', 'ratio'); ?></li>
                                        <li> <?php esc_html_e('If you plan to use shop, please install WooCommerce before you run import.', 'ratio')?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

            </div><!-- close edgtf-tab-content -->
        </div>
    </div>
</div>