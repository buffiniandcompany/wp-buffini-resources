<?php get_header(); ?> 

<?php
//$post_type = "resources";
//$tax = get_queried_object();
//$taxonomy = $tax->taxonomy;
//$pageid = get_queried_object_id();
//$pageid = "6";

$taxonomy = "category";
$termlist = get_term_by( 'id', $pageid, $taxonomy );

?>
<!-- Header -->
<header class="header-small bg-header-001 text-center text-light">
	<h2>Welcome to Buffini & Company Resource Hub</h2>
</header>

<!-- Nav -->
<nav class="sub-nav-container">
	<div id="subNav" class="sub-nav">
		<!-- Sub-Nav -->
		<?php $term_name = apply_filters( 'single_term_title', $tax->name ); ?>
		<?php 
		$terms = get_terms( $taxonomy, array(
			'exclude' => array( 23, 27, 28, 29, 30, 31, 33 ), /// hide menu item
		));
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			echo '<ul class="vertical large-horizontal menu align-center">';
			foreach ( $terms as $term ) {	
				echo '<li><a href="'. esc_url( get_term_link($term)) . '">' . $term->name . '</a></li>';
			}
			echo '</ul>';
		}
		?>
	</div>
</nav>
<!-- Main -->
<main class="grid-container pt80 pb80">

	<section>
		<?php
		postFeatured('buffini-featured', '');
		postCategory( 'build-and-lead', 'Build and Lead' );
		postCategory( 'generate-more-leads', 'Generate More Leads' );
		postCategory( 'get-motivated', 'Get Motivated' );
		?>
	</section>
</main>

<?php get_footer();?>
