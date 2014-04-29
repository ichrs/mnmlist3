<div id="footer"> 
<p><?php 
// footer nav menu
$cleanermenu = wp_nav_menu( array( 
	'theme_location' => 'footer-menu',
 	'container' => false, // this is usually a div outside the menu ul, we don't need it
 	'before'			=>'',
	'after'           => ' : ',
	'items_wrap' => '<span id="%1$s" class="%2$s">%3$s</span>',
	'echo' => false,
));
$find = array('><a','li');
$replace = array('','a');
echo str_replace( $find, $replace, $cleanermenu );
?>

Copyright &copy; <?php echo date("Y"); ?> <?php echo get_the_author_meta('nickname', 1); ?> <?php echo get_the_author_meta('last_name', 1); ?>
</p></div>

<?php wp_footer(); ?>

</body>
</html>
