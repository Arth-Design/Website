<?php 
/* Template Name: Filterpage */

get_header();
?>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://code.jquery.com/jquery.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<link rel='stylesheet' href='<?php echo get_template_directory_uri();?>/assets/css/stylefilter.css' type='text/css' media='all' />

 <!-- Javascript for each modal containing a different pic. This code was written so that you don't have to write multiple modal divs -->
     
   </head>
         <div class="row">
            
            <div class="col-sm-12">
               <div class="row df">
			   <div class="col-sm-3 col-xs-12">
                   <div class="vlogs">
                      <h2 class="bn">FILTER BY</h2>
                   </div>
                </div>
                  <div class="col-sm-3 col-xs-12">
                  <select name="countryid" id="countryid" class="dropdown dropdowncountry">
    <option value="volvo">All</option>
    <?php
   $args = array(
               'taxonomy' => 'country',
               'orderby' => 'name',
               'order'   => 'ASC'
           );

   $cats = get_categories($args);

   foreach($cats as $cat) {?>
  <option value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>
    <?php } ?>
  </select>
  
                </div>
                 <div class="col-sm-3">
                         <select name="categoryid" id="categoryid" class="dropdown dropdowncategory">
<?php
   $args = array(
               'taxonomy' => 'wppap_portfolio_cat',
               'orderby' => 'name',
               'order'   => 'ASC'
           );

   $cats = get_categories($args);

   foreach($cats as $cat) {
       ?>
  <option value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>
<?php } ?>
</select>
  

                </div>
				<div class="col-sm-3">
                </div>
               </div
               <!--end row-->
            </div>
         </div>
      </div>
	  </div>
    <div class="container mt100">
        <section class="row">
 <?php
 
$query = new WP_Query(array(
    'post_type' => 'wpos_portfolio',
  'post_status' => 'publish',
  'posts_per_page' => 9
));


while ($query->have_posts()) {
    $query->the_post();
    $post_id = get_the_ID();
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
?>
            <div class="col-lg-4 col-sm-4 col-xs-12 image-holder newdisplaynone">
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
                   <div id="newdatas">
                       
                   </div>
   <?php echo do_shortcode('[ajax_load_more container_type="div" post_type="wpos_portfolio" posts_per_page="6" offset="9" scroll="false"]')?>
        </section> <!-- closing section -->
    </div> <!-- closing div container -->
      <!--<div id="more_posts">Load More</div>-->

     <script>
          $('.dropdowncountry').on('change', function() {
        var countryalue = $(this).val();
        var categoryvalue = $('#categoryid').val();
        //alert(categoryvalue);die();
        $.ajax({
        type:"post",
        url:"https://arth.team/ajaxdata",
        data:{countryalue:countryalue,categoryvalue:categoryvalue},
        success:function(data){
        //var myObject = JSON.parse(data);
       // alert(data);
       $(".newdisplaynone").css("display", "none");
        $('#newdatas').html(data);
        
        },
        error:function(){}
        });
});
          $('.dropdowncategory').on('change', function() {
        var categoryvalue = $(this).val();
        var countryalue = $('#countryid').val();
        //alert(countryalue);die();
        $.ajax({
        type:"post",
        url:"https://arth.team/ajaxdata",
        data:{categoryvalue:categoryvalue,countryalue:countryalue},
        success:function(data){
        //var myObject = JSON.parse(data);
       // alert(data);
       $(".newdisplaynone").css("display", "none");
        $('#newdatas').html(data);
        $('.alm-btn-wrap').css('display','none');
        },
        error:function(){}
        });
});
      </script>
<?php 
get_footer();
?>