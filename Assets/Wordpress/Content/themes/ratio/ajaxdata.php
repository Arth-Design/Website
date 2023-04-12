<?php /* Template Name: Ajaxdata */?>
<?php
$countryalue=$_POST["countryalue"];
$categoryvalue=$_POST["categoryvalue"];
 if($countryalue=="volvo" && $categoryvalue=="all"){
   //  echo"hii";die();
    $query = new WP_Query(array(
    'post_type' => 'wpos_portfolio',
    'post_status' => 'publish',
    'posts_per_page' => -1
    ));
}else{
    if($countryalue!="volvo" && !empty($countryalue) && !empty($categoryvalue)){
        //echo $categoryvalue;$countryalue;die();
      $query = new WP_Query(array(
    'post_type' => 'wpos_portfolio',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => array(
     'relation' => 'AND',
    array(
    'taxonomy' => 'country',
    'field' => 'slug',
    'terms' => $countryalue,
    ),
    array(
    'taxonomy' => 'wppap_portfolio_cat',
    'field' => 'slug',
    'terms' => $categoryvalue,
    ),
    )));     
    }elseif(!empty($countryalue) && !empty($categoryvalue) && $categoryvalue=="all"){
    //echo $categoryvalue;die();
     $query = new WP_Query(array(
    'post_type' => 'wpos_portfolio',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => array(
    array(
    'taxonomy' => 'country',
    'field' => 'slug',
    'terms' => $countryalue,
    ),
    )));     
    }elseif(!empty($countryalue) && !empty($categoryvalue) && $countryalue=="volvo"){
        //echo $categoryvalue;die();
     $query = new WP_Query(array(
    'post_type' => 'wpos_portfolio',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => array(
    array(
    'taxonomy' => 'wppap_portfolio_cat',
    'field' => 'slug',
    'terms' => $categoryvalue,
    ),
    )));    
    }
 
}

while ($query->have_posts()) {
    $query->the_post();
    $post_id = get_the_ID();
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
?>
            <div class="col-lg-4 col-sm-4 col-xs-12 image-holder">
			<h3 class="sd"><?php the_title();?></h3>
                <div class="panel panel-default">
				
                    <div class="panel-body">
                        <a href="#" class="zoom" data-toggle="modal" data-target="#myModal<?php echo $post_id;?>">
                            <img src="<?php echo $image[0]; ?>" alt="...">
                            <span class="overlay"><i class="glyphicon glyphicon-fullscreen"></i></span>
                        </a>
                    </div>
                </div>
            </div>
             <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $post_id;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <img src="<?php echo $image[0]; ?>" alt="...">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<?php } ?>