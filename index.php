<?php get_header(); ?>

	<div id="content">
<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">

				<h1><a href="/"><?php bloginfo('name'); ?></a> : <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><strong><?php the_title(); ?></strong></a></h1>
				<div class="entry">
					<?php the_content('Read more &raquo;'); ?>
				</div>
			</div>
		<?php endwhile; ?>

	<?php else : ?>
			<h1<a href="/"><?php bloginfo('name'); ?></a> : <strong>>No matching results</strong></h1>
			<p>You're on the wrong side of town.</p> 
			<p><a href="<?php echo get_settings('home'); ?>">Return to homepage.</a></p>
	<?php endif; ?>
	<p><?php previous_post_link(); ?></p>
</div>
<?php get_footer(); ?>