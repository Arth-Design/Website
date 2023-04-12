<?php $post_id=get_the_ID();$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );?>
<div class="col-lg-4 col-sm-4 col-xs-6 image-holder newdisplaynone">
			<h3 class="sd"><?php the_title();?></h3>
                <div class="panel panel-default">
				
                    <div class="panel-body">
                        <a href="#" class="zoom" data-toggle="modal" data-target="#myModal<?php echo get_the_ID();?>">
                             <img src="<?php echo $image[0]; ?>" alt="...">
                            <span class="overlay"><i class="glyphicon glyphicon-fullscreen"></i></span>
                        </a>
                    </div>
                </div>
            </div>
 <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo get_the_ID();?>" role="dialog">
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