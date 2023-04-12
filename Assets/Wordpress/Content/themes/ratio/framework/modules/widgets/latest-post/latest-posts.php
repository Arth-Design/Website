<?php

class RatioEdgeLatestPosts extends RatioEdgeWidget {
	protected $params;
	public function __construct() {
		parent::__construct(
			'edgtf_latest_posts_widget', // Base ID
			esc_html__( 'Ratio Latest Posts', 'ratio' ),
			array( 'description' => esc_html__( 'Display a list of your blog posts', 'ratio' ) )
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'name' => 'title',
				'type' => 'textfield',
				'title' => esc_html__( 'Title', 'ratio' )
			),
			array(
				'name' => 'number_of_posts',
				'type' => 'textfield',
				'title' => esc_html__( 'Number of posts', 'ratio' )
			),
			array(
				'name' => 'order_by',
				'type' => 'dropdown',
				'title' => esc_html__( 'Order By', 'ratio' ),
				'options' => array(
					'title' => esc_html__( 'Title', 'ratio' ),
					'date' => esc_html__( 'Date', 'ratio' )
				)
			),
			array(
				'name' => 'order',
				'type' => 'dropdown',
				'title' => esc_html__( 'Order', 'ratio' ),
				'options' => array(
					'ASC' => esc_html__( 'ASC', 'ratio' ),
					'DESC' => esc_html__( 'DESC', 'ratio' )
				)
			),
			array(
				'name' => 'category',
				'type' => 'textfield',
				'title' => esc_html__( 'Category Slug', 'ratio' )
			),
			array(
				'name' => 'text_length',
				'type' => 'textfield',
				'title' => esc_html__( 'Number of characters', 'ratio' )
			),
			array(
				'name' => 'title_tag',
				'type' => 'dropdown',
				'title' => esc_html__( 'Title Tag', 'ratio' ),
				'options' => array(
					""   => "",
					"h2" => esc_html__( "h2", 'ratio' ),
					"h3" => esc_html__( "h3", 'ratio' ),
					"h4" => esc_html__( "h4", 'ratio' ),
					"h5" => esc_html__( "h5", 'ratio' ),
					"h6" => esc_html__( "h6", 'ratio' )
				)
			)			
		);
	}

	public function widget($args, $instance) {
		extract($args);

		//prepare variables
		$content        = '';
		$params         = array();
		$params['type'] = 'image_in_box';
		//is instance empty?
		if(is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach($instance as $key => $value) {
				$params[$key] = $value;
			}
		}
		if(empty($params['title_tag'])){
			$params['title_tag'] = 'h5';
		}
		echo '<div class="widget edgtf-latest-posts-widget">';
		if($params['title'] != '') {
			echo wp_kses_post( $args['before_title'] . $params['title'] . $args['after_title'] );
		}
		echo ratio_edge_execute_shortcode('edgtf_blog_list', $params);

		echo '</div>'; //close edgtf-latest-posts-widget
	}
}
