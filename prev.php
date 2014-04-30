<?php
/**
 * @package WordPress
 * @subpackage mnmlist
 */
/*
Template Name: Prevposts
*/
?>

<?php get_header(); ?>
	<div id="content">
		<div class="post">
				<h1><a href="/"><?php bloginfo('name'); ?></a> : <strong><?php the_title(); ?></strong></h1>
<p>
<?php

$args = array( 'posts_per_page' => 20, 'offset'=> 1 );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php the_time('F j,Y'); ?>
	<br />
<?php endforeach; 
wp_reset_postdata();?>
</p>

	
	</div>
	</div>
	<?php get_footer(); ?>