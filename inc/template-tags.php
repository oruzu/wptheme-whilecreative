<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package whilecreative
 */

if ( ! function_exists( 'whilecreative_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function whilecreative_posted_on() {
	
	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'esc_html_x' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	
	if ( get_the_time( 'U' ) === get_the_modified_time( 'U' ) ) {
		
		$time_string_published = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string_published,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);
	
		$published = sprintf(
			esc_html_x( '%s', 'post date', 'whilecreative' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
	
		echo '<span class="posted-on"><span class="entry-meta-label published">投稿日</span>' . $published . '</span><span class="byline"><span class="entry-meta-label byline">作成者</span>' . $byline . '</span>'; // WPCS: XSS OK.


	} else {
		
		$time_string_published = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string_published,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);
		
		$time_string_updated = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string_updated,
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
	
		$published = sprintf(
			esc_html_x( '%s', 'post date', 'whilecreative' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>',
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
		$updated = sprintf(
			esc_html_x( '%s', 'post date', 'whilecreative' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>',
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);		
	
		echo '<span class="posted-on"><span class="entry-meta-label published">投稿日</span>' . $published . '<span class="entry-meta-label updated">更新日</span>' . $updated . '</span><span class="byline"><span class="entry-meta-label byline">作成者</span>' . $byline . '</span>'; // WPCS: XSS OK.
	}
	
}
endif;


if ( ! function_exists( 'whilecreative_entry_categories' ) ) :
/**
 * 
 */
function whilecreative_entry_categories() {
	$post_cats = get_the_category();
	$post_cat = $post_cats[0];
?>
	<a class="cat" href="<?php echo get_category_link( $post_cat->cat_ID ); ?>"><?php echo esc_html( $post_cat->name ); ?></a>
<?php	
}
endif;
