<?php
/**
 * The template for displaying the header
 *
 * @package whilecreative
 * @copyright Copyright (c) 2016 While Creation
 * @license   GNU General Public License v2.0
 * @since     whilecreative 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="author" content="<?php echo str_replace( 'http:', '', home_url( '', 'http' ) ); ?>">
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<meta name="format-detection" content="telephone=no,address=no,email=no">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php if ( is_search() || is_tag() || is_paged() ) : ?>
<meta name="robots" content="noindex, follow">
<?php endif; ?>

<?php get_template_part( 'header', 'ogp' ); ?>

<link rel="canonical" href="<?php echo home_url(); ?>">
<link rel="icon" href="<?php echo whilecreative_get_childparent_uri(); ?>/images/favicon.ico">
<link rel="apple-touch-icon-precomposed apple-touch-icon" href="<?php echo whilecreative_get_childparent_uri(); ?>/images/apple-touch-icon-precomposed.png">
<!--<link rel="alternate" type="application/rss+xml" href="<?php bloginfo( 'rss2_url' ); ?>">-->
<!--<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">-->
<!--<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen"> -->

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="site">

<?php get_template_part( 'header', 'area' ); ?>

	<div id="content" class="site-content">
		<div class="container">
