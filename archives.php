<?php
/*
Template Name: Archives Page
*/
?>
<?php get_header(); ?>
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post">
		<h1><a href="/"><?php bloginfo('name'); ?></a> : <strong><?php the_title(); ?></strong></h1>
			<h3>Recent Posts</h3>
			<?php $posts = get_posts( "days=7" ); ?>
			<?php if( $posts ) : ?>
			<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> - <?php the_time('F j, Y'); ?><br />
			<?php endforeach; ?>
			<?php endif; ?>

			<h3>Archives by Month</h3>
			<div id="archives-wrap"><?php if (function_exists(archivecolumns)) : archivecolumns(); endif; ?></div>
			<div class="clear"style="margin-bottom: 20px;"></div>
	<?php endwhile; ?>
	<?php else : ?>
			<h1<a href="/"><?php bloginfo('name'); ?></a> : <strong>>No matching results</strong></h1>
			<p>You're on the wrong side of town.</p> 
			<p><a href="<?php echo get_settings('home'); ?>">Return to homepage.</a></p>
	<?php endif; ?>
	</div>
	</div>
	<?php get_footer(); ?>