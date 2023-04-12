<?php

class RatioEdgeFullScreenMenuOpener extends RatioEdgeWidget {
    public function __construct() {
        parent::__construct(
            'edgtf_full_screen_menu_opener', // Base ID
	        esc_html__( 'Ratio Full Screen Menu Opener', 'ratio' ),
	        array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the full screen menu area', 'ratio' ) )
        );

		$this->setParams();
    }

	protected function setParams() {

		$this->params = array(
			array(
				'name'			=> 'fullscreen_menu_opener_icon_color',
				'type'			=> 'textfield',
				'title' => esc_html__( 'Icon Color', 'ratio' ),
				'description' => esc_html__( 'Define color for Side Area opener icon', 'ratio' )
			)
		);

	}

    public function widget($args, $instance) {
		global $ratio_edge_options;

		$fullscreen_icon_styles = array();

		if ( !empty($instance['fullscreen_menu_opener_icon_color']) ) {
			$fullscreen_icon_styles[] = 'background-color: ' . $instance['fullscreen_menu_opener_icon_color'];
		}


		$icon_size = '';
		if ( isset($ratio_edge_options['edgtf_fullscreen_menu_icon_size']) && $ratio_edge_options['edgtf_fullscreen_menu_icon_size'] !== '' ) {
			$icon_size = $ratio_edge_options['edgtf_fullscreen_menu_icon_size'];
		}
		?>
        <a href="javascript:void(0)" class="edgtf-fullscreen-menu-opener <?php echo esc_attr( $icon_size )?>">
            <span class="edgtf-fullscreen-menu-opener-inner">
                <i class="edgtf-line" <?php ratio_edge_inline_style($fullscreen_icon_styles); ?>>&nbsp;</i>
            </span>
        </a>
    <?php }

}