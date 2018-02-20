<?php get_header(); ?>


<!-- Header -->
<header class="header-small bg-header-001 text-center text-light">
  <h2>Buffini &amp; Company Resource Hub</h2>
</header>


<!-- Main -->
<main class="pt80 pb80">
  <div class="grid-x grid-padding-x align-center">
    <div class="cell small-11 medium-9 large-7">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="post">                
          <h1><?php the_title(); ?> <?php echo single_term_title(); ?></h1>
          <ul class="post-meta no-bullet mb40">
            <li class="cat">
              <hr>
              Posted on <?php the_time('F j, Y'); ?> in 
              <?php the_category( ', ' ); ?>
              <hr>
            </li>
          </ul>
          <?php if( get_the_post_thumbnail() ) : ?>
            <div class="mb40">
              <?php the_post_thumbnail('large'); ?>
            </div>
            
            
            
            					<!-- Resource -->


    <div class="resource-meta">
        <span class=""><?php the_field('file_size'); ?></span>
        
 <!-- Left Custom -->        
        <?php

if(get_field('left_custom'))
{
	echo '<span class="left-custom">' . get_field('left_custom') . '</span>';
} else {

    echo '';
    
}

?>

        
         <!-- File Type -->        
        <?php

if(get_field('file_type'))
{
	echo '<span class="res-file-type-post">' . get_field('file_type') . '</span>';
} else {

    echo '';
    
}

?>
 
                <!-- Lock Symbol + Download Button -->        
        <?php

if(get_field('marketo_form_#'))
{
	echo '<span class="res-lock"><span class="icon-resource-lock"></span></span><a class="hide-form">X</a><a class="btn btn-primary show-form button">Download</a>';
} else {

    echo '';
    
}

?>
        
           <!-- Lock Symbol + Download Button VIDEO-->        
        <?php

if(get_field('marketo_form_#2'))
{
	echo '<span class="res-lock"><span class="icon-resource-lock"></span></span><a class="hide-form">X</a><a class="btn btn-primary show-form">' . get_field('marketo_button_name') . '</a>';
} else {

    echo '';
    
}

?>
          <!-- Right Custom -->        
        <?php

if(get_field('right_custom'))
{
	echo '<span class="right-custom">' . get_field('right_custom') . '</span>';
} else {

    echo '';
    
}

?>       
        
  <!-- Hide Buttons - start -->        
        <?php

if(get_field('marketo_form_#'))
{
	echo '<div style="display:none;">';
} else {

    echo '';
    
}

?>       
 <!-- Download Button -->        
        <?php

if(get_field('download_link'))
{
	echo '<a class="btn btn-primary bufftrack button" href="' . get_field('download_link') . '">Download</a>';
} else {

    echo '';
    
}

?>
        
<!-- View Button -->        
        <?php

if(get_field('view_link'))
{
	echo '<a class="btn" href="' . get_field('view_link') . '" target="_blank">View</a>';
} else {

    echo '';
    
}

?>
        <!-- Hide Buttons - end -->        
        <?php

if(get_field('marketo_form_#'))
{
	echo '</div>';
} else {

    echo '';
    
}

?>       
        
       <div class="fix"></div> 
    </div>
    
    
<!-- Resource Form -->        
        <?php

if(get_field('marketo_form_#'))
{
	echo ' <div class="resources-form-container">
		<div class="resources-form cf pb50 mb50">
			<h3 class="fill-form text-center">Fill out form to download</h3>
			<script src="//app-ab26.marketo.com/js/forms2/js/forms2.min.js"></script>
      <div id="resources-form"></div>
      
            <script>MktoForms2.loadForm("//app-ab26.marketo.com", "375-EKE-881", ' . get_field('marketo_form_#') . ', function(form) {
        MktoForms2.$("#resources-form").append(form.getFormElem());
        //add an onSubmit handler
        form.onSuccess(function(values, followUpUrl) {
          
          //Show Thank you message
          $("#resources-form-tu").show();
            
            //Hide Title
          $("h2.fill-form").hide();
            
          //get the forms jQuery element and hide it
          form.getFormElem().hide();

	  window.location.href = "' . get_field('view_link') . '";

          /*Load iframe with zip file after 2 seconds
	  setTimeout( function(){ 
    	    $("<iframe />").attr("src", "' . get_field('download_link') . '").appendTo(".resources-form-container"); 
  	  }  , 2000 );
	  */

          //return false to prevent the submission handler from taking the lead to the follow up url.
          return false;
          
          
        });
      });
      </script>
            <div id="resources-form-tu"><img class="check-success" src="/wp-content/uploads/2015/05/check-success.png" width="63" height="63"><h2>Thank you!</h2><p>If your download doesn’t start, you can download it <a class="bufftrack" href="' . get_field('download_link') . '">here</a></p><p><img src="/wp-content/uploads/2015/05/mobile-device.png" width="25" height="25">On a mobile device? <a class="bufftrack" href="' . get_field('view_link') . '">View here</a></p></div>
            </div>
	</div>';
} else {

    echo '';
    
}

?>
    
    <!-- Resource Form VIDEO only x3x3x3 -->        
        <?php

if(get_field('marketo_form_#2'))
{
	echo ' <div class="resources-form-container">
		<div class="resources-form cf">
			<h2 class="fill-form">Fill out form to watch full episode</h2>
			<script src="//app-ab26.marketo.com/js/forms2/js/forms2.min.js"></script>
      <div id="resources-form"></div>
      
        <script>MktoForms2.loadForm("//app-ab26.marketo.com", "375-EKE-881", ' . get_field('marketo_form_#2') . ', function(form) {
        MktoForms2.$("#resources-form").append(form.getFormElem());
        //add an onSubmit handler
        form.onSuccess(function(values, followUpUrl) {
          
          //Show Thank you message
          $("#resources-form-tu").show();
          
          //Show Video
          $("#resources-form-video").show();
            
            //Hide Title
          $("h2.fill-form").hide();
            
          //get the forms jQuery element and hide it
          form.getFormElem().hide();
        
           //get the forms jQuery element and hide it
          form.getFormElem().hide();



          $("<iframe />").attr("src", "https://www.youtube.com/embed/ze3fkB0DGTM?rel=0&amp;showinfo=0").attr("width", "640").attr("height", "360").appendTo(".resources-form-container"); 
            
          //return false to prevent the submission handler from taking the lead to the follow up url.
          return false;
          
          
        });
      });
      </script>
            <div id="resources-form-tu"><img class="check-success" src="/wp-content/uploads/2015/05/check-success.png" width="63" height="63"><h2>Thank you, enjoy!</h2></div>
            </div>
            <div id="resources-form-video" class="outer-container">' . get_field('video_code') . '</div>
	</div>';
} else {

    echo '';
    
}

?>
    
<!-- Form Show & Hide --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="https://www.buffiniandcompany.com/scripts/jquery.js"></script> -->

            <script type="text/javascript">
				
$( document ).ready(function() {
	$(".resources-form").hide();
	$("#resources-form-tu").hide();
	$(".hide-form").hide();
	$("#comments").remove();
  //Show form when button is clicked
	//alert("hello!");
  $(".show-form").click(function() {
    $(".resources-form").slideDown(400);
    $(".show-form").hide();
    $(".hide-form").fadeIn(400);
  });
  //Hide form when x is clicked
  $(".hide-form").click(function() {
    $(".resources-form").slideUp();
    $(".hide-form").hide();
    $(".show-form").fadeIn(400);
  });
});
			</script>



<!-- Resource END-->
         
          <?php endif; ?>   
          <?php the_content(); ?>
          <?php comments_template(); ?>
        </article>
      <?php endwhile; else : ?>
      <p><?php _e( 'Sorry, no posts found.' ); ?></p>
			<?php endif; ?>
    </div>
  </section>
</main>  


<!-- Related -->
<section class="bg-light-gray pt80 pb80">
  <div class="grid-container">
    <!-- Section Title -->
    <div class="grid-x grid-padding-x">
      <div class="cell">
        <h3 class="mb40">Related Posts</h3>
      </div>
    </div>
    <!-- Grid -->
    <div class="grid-x grid-padding-x grid-padding-y small-up-1 medium-up-2 large-up-3" data-equalizer>
      <!-- WP Query -->
      <?php 
      $taxonomy_names = get_object_taxonomies( $post );
      $space_terms = wp_get_post_terms( $post->ID, $taxonomy_names[0] ,  array("fields" => "names"));
        $num_posts = 6;
        $args = array(
          'tax_query' => array(
          array(
              'taxonomy' => $taxonomy_names[0],
              'field' => 'slug',
              'terms' => $space_terms,
            ),
          ),
        'posts_per_page' => $num_posts,
        'post__not_in' => array($post->ID)
        );
        $query = new WP_Query( $args );
      ?>
      <!-- WP Loop -->
      <!--
      <?php// if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
        <div class="cell">
          <div class="card" data-equalizer-watch>
 
            <?php //if( get_the_post_thumbnail() ) : ?>
              <div class="img-container">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('large'); ?>
                </a> 
              </div>
            <?php// endif; ?>
 
            <a href="<?php //the_permalink(); ?>">
              <div class="card-section">
                <small><?php// the_time('F j, Y') ; ?></small>
                <h5><?php// the_title(); ?></h5>
              </div>
            </a>
          </div>
        </div>
      <?php// endwhile; endif; wp_reset_postdata(); ?>
      -->
      
      <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

			<div class="cell">
				<div class="card">
					<!-- Thumbnail -->
					<div style="height:225px; overflow: hidden;position: relative;">
						<?php if( get_the_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('large'); ?>
						</a>
						<?php endif; ?>
					</div>
					<!-- Title / Excerpt -->
					<div class="card-section">
						<h6>
							<?php if($excerpt){ echo "";} else { the_time('F j, Y') ; }?>
						</h6>
						<a href="<?php the_permalink(); ?>">
							<h4>
								<?php the_title(); ?>
							</h4>
						</a>
						<hr>
						<p>
							<?php if ($excerpt) { echo $excerpt;} else { echo strip_tags( get_the_excerpt() );} ?>
						</p>
					</div>
				</div>
			</div>

			<?php endwhile; else : ?>
			<h4 class="text-center mb40">
				<?php _e( 'Sorry, no posts found.' ); ?>
			</h4>
			<div class="text-center">
				<a href="/" class="button large">Go to Home Page</a>
			</div>
		
			<?php endif; wp_reset_query();?>
      
  </div>
</section>

<?php get_footer(); ?>