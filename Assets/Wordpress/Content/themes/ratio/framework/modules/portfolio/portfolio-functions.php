<?php

if(!function_exists('ratio_edge_single_portfolio')) {
    function ratio_edge_single_portfolio() {
        $portfolio_template = ratio_edge_get_portfolio_single_type();

        $params = array(
            'portfolio_template' => $portfolio_template,
            'fullwidth'          => $portfolio_template == 'full-width-custom',
            'holder_class'       => array(
                $portfolio_template,
                'edgtf-portfolio-single-holder'
            )
        );

        if ($portfolio_template == 'gallery') {
            $params['holder_class'][] = 'edgtf-portfolio-gallery-' . ratio_edge_options()->getOptionValue('portfolio_single_numb_columns');
        }

        ratio_edge_get_module_template_part('templates/single/holder', 'portfolio', '', $params);
    }
}

if(!function_exists('ratio_edge_get_portfolio_single_type')) {
    function ratio_edge_get_portfolio_single_type() {
        return ratio_edge_get_meta_field_intersect('portfolio_single_template');
    }
}

if(!function_exists('ratio_edge_get_portfolio_single_media')) {
    function ratio_edge_get_portfolio_single_media() {
        $image_ids       = get_post_meta(get_the_ID(), 'edgt_portfolio-image-gallery', true);
        $videos          = get_post_meta(get_the_ID(), 'edgt_portfolio_images', true);
        $portfolio_media = array();
	    $single_type = ratio_edge_get_portfolio_single_type();
        if($image_ids !== '') {
            $image_ids = explode(',', $image_ids);

	        if( $single_type === 'small-masonry' || $single_type === 'big-masonry'){
		        foreach($image_ids as $image_id) {
			        $media                = array();
			        $media['title']       = get_the_title($image_id);
			        $media['type']        = 'image';
			        $size = get_post_meta($image_id,'_ptf_single_masonry_image_size', true);
			        $size = ($size)?$size:'edgtf-default-masonry-item';
			        switch($size){
				        case 'edgtf-large-height-masonry-item' :
					        $img_size = 'ratio_edge_large_height';
					        break;
				        case 'edgtf-large-width-masonry-item' :
					        $img_size = 'ratio_edge_large_width';
					        break;
				        case 'edgtf-large-width-height-masonry-item' :
					        $img_size = 'ratio_edge_large_width_height';
					        break;
				        default:
					        $img_size = 'ratio_edge_square';
					        break;
			        }
			        $media['description'] = get_post_meta($image_id, '_wp_attachment_image_alt', true);
			        $media['image_src']   = wp_get_attachment_image_src($image_id, $img_size);
			        $media['class_size'] = $size;
			        $portfolio_media[] = $media;
		        }
	        }elseif($single_type === 'full-screen-slider'){
                foreach($image_ids as $image_id) {
                    $media                = array();
                    $media['title']       = get_the_title($image_id);
                    $media['type']        = 'image';
                    $skin = get_post_meta($image_id,'_ptf_single_slider_skin', true);
                    $skin = ($skin)?$skin:'edgtf-slide-light-skin';
                    $media['description'] = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    $media['image_src']   = wp_get_attachment_image_src($image_id, 'full');
                    $media['class_size'] = $skin;
                    $portfolio_media[] = $media;
                }
            }else{
	            foreach($image_ids as $image_id) {
	                $media                = array();
	                $media['title']       = get_the_title($image_id);
	                $media['type']        = 'image';
	                $media['description'] = get_post_meta($image_id, '_wp_attachment_image_alt', true);
	                $media['image_src']   = wp_get_attachment_image_src($image_id, 'full');

	                $portfolio_media[] = $media;
	            }
	        }
        }

        if(is_array($videos) && count($videos)) {
            usort($videos, 'ratio_edge_compare_portfolio_videos');
            foreach($videos as $video) {
                $media = array();

                if(!empty($video['portfoliovideotype'])) {
                    $media['title']       = $video['portfoliotitle'];
                    $media['type']        = $video['portfoliovideotype'];
                    $media['description'] = 'video';
                    $media['video_url']   = ratio_edge_portfolio_get_video_url($video);

                    if($video['portfoliovideotype'] == 'self') {
                        $media['video_cover'] = !empty($video['portfoliovideoimage']) ? $video['portfoliovideoimage'] : '';
                    }

                    if($video['portfoliovideotype'] !== 'self') {
                        $media['video_id'] = $video['portfoliovideoid'];
                    }
                } elseif(!empty($video['portfolioimgtype'])) {
                    $media['title']     = $video['portfoliotitle'];
                    $media['type']      = $video['portfolioimgtype'];
                    $media['image_src'] = $video['portfolioimg'];
                }

                $portfolio_media[] = $media;
            }
        }

        return $portfolio_media;
    }
}

if(!function_exists('ratio_edge_portfolio_get_video_url')) {
    function ratio_edge_portfolio_get_video_url($video) {
        switch($video['portfoliovideotype']) {
            case 'youtube':
                return 'https://www.youtube.com/embed/'.$video['portfoliovideoid'].'?wmode=transparent';
                break;
            case 'vimeo';
                return 'https://player.vimeo.com/video/'.$video['portfoliovideoid'].'?title=0&amp;byline=0&amp;portrait=0';
                break;
            case 'self':
                $return_array = array();
                if(!empty($video['portfoliovideowebm'])) {
                    $return_array['webm'] = $video['portfoliovideowebm'];
                }

                if(!empty($video['portfoliovideomp4'])) {
                    $return_array['mp4'] = $video['portfoliovideomp4'];
                }

                if(!empty($video['portfoliovideoogv'])) {
                    $return_array['ogv'] = $video['portfoliovideoogv'];
                }

                return $return_array;

                break;
        }
    }
}

if(!function_exists('ratio_edge_portfolio_get_media_html')) {
    function ratio_edge_portfolio_get_media_html($media) {
        global $wp_filesystem;
        $params = array();

        //For adding image overlay in gallery template type
        $params['gallery'] = (ratio_edge_get_portfolio_single_type() == 'gallery') ? true : false;
        $params['full-screen-slider'] = (ratio_edge_get_portfolio_single_type() == 'full-screen-slider') ? true : false;

        if($media['type'] == 'image') {
            if(!$params['full-screen-slider']) {
                $params['lightbox'] = ratio_edge_options()->getOptionValue('portfolio_single_lightbox_images') == 'yes';
            }

            $media['image_url'] = is_array($media['image_src']) ? $media['image_src'][0] : $media['image_src'];
            if(empty($media['description'])) {
                $media['description'] = $media['title'];
            }
        }

        if(in_array($media['type'], array('youtube', 'vimeo'))) {
            if(!$params['full-screen-slider']) {
                $params['lightbox'] = ratio_edge_options()->getOptionValue('portfolio_single_lightbox_videos') == 'yes';
            }

            if($params['lightbox']) {
                switch($media['type']) {
                    case 'vimeo':
						WP_Filesystem();
                        $url      = 'https://vimeo.com/api/v2/video/'.$media['video_id'].'.php';
                        $response = unserialize($wp_filesystem->get_contents($url));

                        $params['video_title']    = $response[0]['title'];
                        $params['lightbox_thumb'] = $response[0]['thumbnail_large'];
                        break;
                    case 'youtube':
                        $url      = 'https://gdata.youtube.com/feeds/api/videos/'.trim($media['video_id']).'?alt=json';

                        $params['video_title'] = $media['title'];

                        $params['lightbox_thumb'] = 'https://img.youtube.com/vi/'.trim($media['video_id']).'/maxresdefault.jpg';
                        break;
                }
            }
        }

        $params['media'] = $media;

        ratio_edge_get_module_template_part('templates/single/media/'.$media['type'], 'portfolio', '', $params);
    }
}

if(!function_exists('ratio_edge_compare_portfolio_videos')) {
    /**
     * Function that compares two portfolio image for sorting
     *
     * @param $a int first image
     * @param $b int second image
     *
     * @return int result of comparison
     */
    function ratio_edge_compare_portfolio_videos($a, $b) {
        if(isset($a['portfolioimgordernumber']) && isset($b['portfolioimgordernumber'])) {
            if($a['portfolioimgordernumber'] == $b['portfolioimgordernumber']) {
                return 0;
            }

            return ($a['portfolioimgordernumber'] < $b['portfolioimgordernumber']) ? -1 : 1;
        }

        return 0;
    }
}

if(!function_exists('ratio_edge_compare_portfolio_options')) {
    /**
     * Function that compares two portfolio options for sorting
     *
     * @param $a int first option
     * @param $b int second option
     *
     * @return int result of comparison
     */
    function ratio_edge_compare_portfolio_options($a, $b) {
        if(isset($a['optionlabelordernumber']) && isset($b['optionlabelordernumber'])) {
            if($a['optionlabelordernumber'] == $b['optionlabelordernumber']) {
                return 0;
            }

            return ($a['optionlabelordernumber'] < $b['optionlabelordernumber']) ? -1 : 1;
        }

        return 0;
    }
}

if(!function_exists('ratio_edge_portfolio_get_info_part')) {
    function ratio_edge_portfolio_get_info_part($part) {
        $portfolio_template = ratio_edge_get_portfolio_single_type();

        ratio_edge_get_module_template_part('templates/single/parts/'.$part, 'portfolio', $portfolio_template, array('type'=>$portfolio_template));
    }
}