<?php get_header(); ?>
​
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<h2><?php the_title(); ?></h2>
​
	<div class="single-img-box">
		<?php echo get_the_post_thumbnail(); ?>
	</div>
	
	
	<?php the_content(); ?>
					
<?php endwhile; // end of the loop. ?>
<?php include('footer.php'); ?>