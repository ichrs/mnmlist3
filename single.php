<?php get_header(); ?>

	<div id="content">
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="/"><?php bloginfo('name'); ?></a> : <strong><?php the_title(); ?></strong></h2>
			<small><time datetime="<?php the_time('c'); ?>"><a href="http://ichrs.com/<?php the_time('Y/m/d') ?>"><?php the_time('F jS, Y') ?></a> &mdash;  <?php the_category(', '); ?> <?php edit_post_link(' Edit', '&nbsp;-&nbsp;'); ?></time></small>
			<div class="entry">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		</div>
	<?php endwhile; else: ?>
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
	<p><?php previous_post_link(); ?></p>
</div>
<?php get_footer(); ?>