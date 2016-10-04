<?php
/**
 * whilecreative functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package whilecreative
 */

/**
 * 1. Set up
 */
if ( ! function_exists( 'whilecreative_setup' ) ) :
function whilecreative_setup() {
	
	// 1.1. Reading of the language file
	load_theme_textdomain( 'whilecreative', get_template_directory() . '/languages' );
	
	// 1.2. Support theme settings
	
	// 1.2.1. <head> tag
	add_theme_support( 'title-tag' );
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	
	add_theme_support( 'automatic-feed-links' );
	
	// 1.2.2. Post settings
	add_theme_support( 'post-formats', array(
		/*
		'aside',
		'image',
		'video',
		'quote',
		'link',
		*/
	) );
	
	add_theme_support( 'post-thumbnails' );
	
	add_theme_support( 'html5', array(
		'comment-list',
		'comment-form',
		'search-form',
		'gallery',
		'caption',
	) );
	
	// 1.2.3. Custom header and background
	$defaults = array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 980,
		'height'                 => 240,
		'flex-height'            => true,
		'flex-width'             => true,
		'default-text-color'     => '333333',
		'header-text'            => true,
		'uploads'                => true,
		/*
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
		*/
	);
	add_theme_support( 'custom-header', apply_filters( 'whilecreative-custom-header-args', $defaults ) );
	
	$defaults = array(
		'default-color'          => 'ffffff',
		'default-image'          => '',
		/*
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
		*/
	);
	add_theme_support( 'custom-background', apply_filters( 'whilecreative-custom-background-args', $defaults ) );
	
	// 1.2.4. Register navigation
	register_nav_menus( array(
		'global' => esc_html__( 'Global menu', 'whilecreative' ),
		'header' => esc_html__( 'Header menu', 'whilecreative' ),
		'footer' => esc_html__( 'Footer menu', 'whilecreative' ),
	) );
}
endif;
add_action( 'after_setup_theme', 'whilecreative_setup' );

/**
 * Enqueue styles and scripts
 */
function whilecreative_enqueue_scripts() {
	
	// styles
	wp_enqueue_style( 'whilecreative-style', get_stylesheet_uri() );
	
	// scripts
	wp_enqueue_script( 'whilecreative-navigation', get_template_directory_uri() . '/js/navigation.js', array(), null, true );
	
	/*
	wp_enqueue_script( 'whilecreative-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), null, true );
	*/
	
}
add_action( 'wp_enqueue_scripts', 'whilecreative_enqueue_scripts' );

/**
 * Register widget
 */
function whilecreative_widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'whilecreative' ),
		'id'            => 'sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar (Post)', 'whilecreative' ),
		'id'            => 'sidebar-post',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar (Page)', 'whilecreative' ),
		'id'            => 'sidebar-page',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'whilecreative' ),
		'id'            => 'footer-1',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'whilecreative' ),
		'id'            => 'footer-2',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'whilecreative' ),
		'id'            => 'footer-3',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	) );
	
}
add_action( 'widgets_init', 'whilecreative_widgets_init' );



function whilecreative_get_childparent_uri( $path_relative = '' ) {
	if ( file_exists( get_stylesheet_directory() . $path_relative ) ) {
		// 子テーマにファイルがあれば、子テーマのファイルURLを返す
		return get_stylesheet_directory_uri() . $path_relative;
	} else {
		// 子テーマにファイルが無ければ、親テーマのファイルURLを返す
		return get_template_directory_uri() . $path_relative;
	}
}

function whilecreative_get_the_category_link() {
	$cat = get_the_category();
	return get_category_link( $cat[0]->cat_ID );
}

function whilecreative_get_the_tag_link() {
	$tag = get_the_tags();	
	return get_tag_link( $tag[0]->term_id );
}

function whilecreative_archive_title() {
	echo whilecreative_get_archive_title();
}
function whilecreative_get_archive_title() {
	//@開発中
	
	$archive_title = '';
	
	/*
	if ( is_category() ) :
		single_cat_title( 'カテゴリー：' );
	
	elseif ( is_tag() ) :
		single_tag_title( 'タグ：' );
		
	endif;
	*/
	
	if ( is_archive() ) {
		if ( is_category() ) {
			$archive_title = sprintf( 'カテゴリー「%s」一覧', single_cat_title( '', false) );
		} elseif ( is_tag() ) {
			$archive_title = sprintf( 'タグ「%s」一覧', single_tag_title( '', false) );
		} elseif ( is_author() ) {
			$archive_title = sprintf( '著者「%s」一覧', get_the_author() );
		} elseif ( is_day() ) {
			$archive_title = sprintf( '「%s」一覧', get_the_time( 'Y年n月j日' ) );
		} elseif ( is_month() ) {
			$archive_title = sprintf( '「%s」一覧', get_the_time( 'Y年n月' ) );
		} elseif ( is_year() ) {
			$archive_title = sprintf( '「%s」一覧', get_the_time( 'Y年' ) );
		} else {
			$archive_title = '記事一覧';
		}
	} elseif ( is_search() ) {
		$archive_title = sprintf( '「%s」の検索結果', get_search_query() );
	}
	
	if ( ( get_query_var( 'paged' ) > 1 ) ) {
		return $archive_title . '(' . whilecreative_show_page_number() . ')';
	} else {
		return $archive_title;
	}
}

function whilecreative_show_page_number() {  
    global $wp_query;  
  
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  
    $max_page = $wp_query->max_num_pages;  
  
    echo $paged.' / '.$max_page;
}
