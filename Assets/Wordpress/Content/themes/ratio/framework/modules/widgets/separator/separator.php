<?php

/**
 * Widget that adds separator boxes type
 *
 * Class Separator_Widget
 */
class RatioEdgeSeparatorWidget extends RatioEdgeWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'edgt_separator_widget', // Base ID
	        esc_html__( 'Ratio Separator Widget', 'ratio' ),
	        array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'ratio' ) )
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Type', 'ratio' ),
                'name' => 'type',
                'options' => array(
                    'normal' => esc_html__( 'Normal', 'ratio' ),
                    'full-width' => esc_html__( 'Full Width', 'ratio' )
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Position', 'ratio' ),
                'name' => 'position',
                'options' => array(
                    'center' => esc_html__( 'Center', 'ratio' ),
                    'left' => esc_html__( 'Left', 'ratio' ),
                    'right' => esc_html__( 'Right', 'ratio' )
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__( 'Style', 'ratio' ),
                'name' => 'border_style',
                'options' => array(
                    'solid' => esc_html__( 'Solid', 'ratio' ),
                    'dashed' => esc_html__( 'Dashed', 'ratio' ),
                    'dotted' => esc_html__( 'Dotted', 'ratio' )
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__( 'Color', 'ratio' ),
                'name' => 'color'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__( 'Width', 'ratio' ),
                'name' => 'width',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__( 'Thickness (px)', 'ratio' ),
                'name' => 'thickness',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__( 'Top Margin', 'ratio' ),
                'name' => 'top_margin',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__( 'Bottom Margin', 'ratio' ),
                'name' => 'bottom_margin',
                'description' => ''
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget edgtf-separator-widget">';

        //finally call the shortcode
        echo do_shortcode("[edgtf_separator $params]"); // XSS OK

        echo '</div>'; //close div.edgtf-separator-widget
    }
}