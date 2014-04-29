<?php get_header(); ?>

	<div id="content">
	<?php query_posts('showposts=1'); ?>
<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">

				<h2><a href="/"><?php bloginfo('name'); ?></a> : <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><strong><?php the_title(); ?></strong></a></h2>
				<div class="entry">
					<?php the_content('Read more &raquo;'); ?>
				</div>
			</div>
		<?php endwhile; ?>

	<?php else : ?>
			<h2>No matching results.</h2>
			<p>You're on the wrong side of town.</p> 
			<p><a href="<?php echo get_settings('home'); ?>">Return to homepage.</a></p>
	<?php endif; ?>
	<p><?php previous_post_link(); ?></p>
</div>
<?php get_footer(); ?>