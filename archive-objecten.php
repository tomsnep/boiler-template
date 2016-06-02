<?php get_header(); ?>
<?php
​
// WP_Query arguments
$args = array (
    'post_type'              => array( 'antiek objecten' ),
    'post_status'            => array( 'publish' ),
);
​
// The Query
$query = new WP_Query( $args );
​
echo '<section id="objects">';
// The Loop
	if ( $query->have_posts() ) {
	    while ( $query->have_posts() ) {
	        $query->the_post();
	        echo '<a class="single-object" href="' . get_permalink() . '">' . get_the_post_thumbnail() .'<h1>' . get_the_title() . '</h1>'  . '<p>' . get_the_content() . '</p>'. '</ul>' . '</a>'; 
	    }
	} else {
	    // no posts found
	}
​
echo '</section>';
​
// Restore original Post Data
wp_reset_postdata();
​
  ?>
<?php get_footer(); ?>

