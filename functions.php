<?php

// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

//Disable all site feeds
function fb_disable_feed() {
wp_die( __('No feed available,please visit <a href="'. get_bloginfo('url') .'">iChrs.com</a>!') );
}

add_action('do_feed', 'fb_disable_feed', 1);
add_action('do_feed_rdf', 'fb_disable_feed', 1);
add_action('do_feed_rss', 'fb_disable_feed', 1);
add_action('do_feed_rss2', 'fb_disable_feed', 1);
add_action('do_feed_atom', 'fb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'fb_disable_feed', 1);
add_action('do_feed_atom_comments', 'fb_disable_feed', 1);

// Add lightbox to all
add_filter('the_content', 'my_addlightboxrel');
function my_addlightboxrel($content) {
       global $post;
       $pattern ="/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
       $replacement = '<a$1href=$2$3.$4$5 rel="lightbox" title="'.$post->post_title.'"$6>';
       $content = preg_replace($pattern, $replacement, $content);
       return $content;
}

// Password posts custom form
function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<p><form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "To view this post, enter the password below:" ) . '
    <label for="' . $label . '">' . __( "" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
    </form></p>
    ';
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );

// Archive columns
function archivecolumns() {
	// Grab the archives. Return the output
	$get_archives = wp_get_archives( 'echo=0' );
	// Split into array items
	$archives_array = explode('</li>',$get_archives);
	// Amount of archives (count of items in array)
	$results_total = count($archives_array);
	// How many columns to display
	$archives_per_list = ceil($results_total / 3);
	// Counter number for tagging onto each list
	$list_number = 1;
	// Set the archive result counter to zero
	$result_number = 0;
	?>
	<div id="archives-wrap">
	<ul class="archive_col" id="archive-col-<?php echo $list_number; ?>">
	<?php
	foreach($archives_array as $archive) {
		$result_number++;

		if($result_number % $archives_per_list == 0) {
			$list_number++;
			echo $archive.'</li>
			</ul>
			<ul class="archive_col" id="archive-col-'.$list_number.'">';
		}
		else {
			echo $archive.'</li>';
		}
	} echo '</ul></div>';
}
add_shortcode('archivecolumns', 'archivecolumns' );

// Add Menu Locations
add_action( 'init', 'register_my_menus' );

function register_my_menus() {
    register_nav_menus(
        array(
            'footer-menu' => __( 'Footer Menu' )
        )
    );
}
function custom_submit_text($content) {
	$before = 'Submit';
	$after = 'Continue';
	$content = str_replace($before, $after, $content);
	return $content;
}
?>