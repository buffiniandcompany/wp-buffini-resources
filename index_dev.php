<?php get_header(); ?>

<?php
$category_name = "Build and Lead";
//$post_category = strtolower(str_replace(" ","-",$category_name));
$post_category = "build-and-lead";
$post_type = "resources";
$post_count = "6";

//$tax = get_queried_object();
//$taxonomy = $tax->taxonomy;
//$pageid = get_queried_object_id();

$taxonomy = "category";
$pageid = "31";

$termlist = get_term_by( 'id', $pageid, $taxonomy );


/*
$args = array (
  'tax_query' => array(
    array(
      'taxonomy' => $post_type,
      'field' => 'slug',
      'terms' => $post_category
    ),
  ),
  'posts_per_page' => $post_count
);
$query = new WP_Query( $args );
*/

?>
<!-- Header -->
<header class="header-xsmall bg-gradient-blue">
<h3>Welcome to Buff & Co. Resource Hub</h3>
</header>

<!-- Sub-Nav -->
<?php $term_name = apply_filters( 'single_term_title', $tax->name ); ?>
<?php 
    $terms = get_terms( $taxonomy, array(
    	'exclude' => array( 23, 27, 28, 29, 30, 31, 33 ),
    ));
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    echo '<ul>';
    foreach ( $terms as $term ) {	
        echo '<li>' . $term->name . ' ' . esc_url( get_term_link($term)) . '</li>';
    }
    echo '</ul>';
}
?>



<nav class="sub-nav-container">
  <div id="subNav" class="sub-nav">
    	  <ul class="vertical large-horizontal menu align-center">
<?php
//	if($termlist->parent > 0) { 
		// child
		$get_parents = get_ancestors( $pageid, $taxonomy );
		//var_dump ($get_parents);
		foreach ( $get_parents as $parent ) {
			$term_id = get_term_by( 'id', $parent, $taxonomy );
			$get_children = get_term_children($term_id->term_id, $taxonomy); 	
		}
	/*} else { 
		//parent
		$get_children = get_term_children(get_queried_object()->term_id, $taxonomy); 
	}
	if (!empty($get_children)) {
		// return new WP_Error( 'invalid_taxonomy', __( 'Invalid taxonomy.' ) );
		//echo '<ul class="menu align-center pt80">';
		foreach ( $get_children as $child ) {
			$term = get_term_by( 'id', $child, $taxonomy );
			if ($term->name == $term_name){ 
				echo '<li class="active"><a href="' . get_term_link( $child, $taxonomy ) . '">' . $term->name . '</a></li>';
			} else {
				echo '<li><a href="' . get_term_link( $child, $taxonomy ) . '">' . $term->name . '</a></li>';
			}
		}
	}*/
?> 
	  </ul></div></nav>
</nav>

<!-- Main -->
<main class="pt80 pb80">

<?php
	
	// WP - Query
$args = array (
  'tax_query' => array(
    array(
      'taxonomy' => $post_type,
      'field' => 'slug',
      'terms' => $post_category
    ),
  ),
  'posts_per_page' => $post_count
);
 
// Custom query.
$query1 = new WP_Query( $args );
 
// Check that we have query results.
if ( $query1->have_posts() ) {
 
    // Start looping over the query results.
    while ( $query1->have_posts() ) {
 
        $query1->the_post();
 
        // Contents of the queried post results go here.
 
    }
 
}
 
// Restore original post data.
wp_reset_postdata();
	
	
	?>
<?php
/*
	// WP - Check for posts
if( $query->have_posts() ) :

    // Section
    echo '<section>';
      echo '<div class="grid-container">';
        
        // Title / Sub-Title
        echo '<div class="grid-x grid-padding-x">';
          echo '<div class="cell">Hello!<div>';
        echo '<div>';

        // Grid
        echo '<div class="grid-x grid-padding-x grid-padding-y" data-equalizer>';
            // The WP Loop
            while( $query->have_posts() ) : $query->the_post();
              echo '<div class="cell">';
                echo '<a href="'.get_the_permalink().'">';
                  echo '<div class="card"  data-equalizer-watch>';
                    // Post Thumbnail
                    echo the_post_thumbnail('full');
                    // Post Title
                  	echo '<div class="card-section">';
                        echo get_the_title();
                    echo '</div>';
                  echo '</div>';
                echo '</a>';
               echo '</div>';
            endwhile; 
       
        echo '</div>';
        echo '</div>';
		echo '</div>';
      echo '<div>';
    echo '</section>';

endif;

//wp_reset_postdata();
	wp_reset_query();
	*/
?>
<section>
<div class="grid-x grid-padding-x align-center">
  <div class="cell small-11 medium-9 large-8">
  
  
  </div>
</div>
</section>


<section>
<div class="grid-x grid-padding-x align-center">
  <div class="cell small-11 medium-9 large-8">
    <?php if ( $query1->have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
        <?php endif; ?>   
        <?php the_content(); ?>
        <?php comments_template(); ?>
      </article>
    <?php endwhile; else : ?>
    <h4 class="text-center mb40"><?php _e( 'Sorry, no posts found.' ); ?></h4>
    <div class="text-center">
      <a href="/" class="button large">Go to Home Page</a>
    </div>
    
    <?php endif; wp_reset_query();?>
  </div>
</section>
</main>  


<?php get_footer(); ?>