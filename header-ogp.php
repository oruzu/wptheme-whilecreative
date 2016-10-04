<?php
if ( is_home() || is_front_page() ) { // HOMEページ or フロントページ
	$url = home_url();
} elseif ( is_single() || is_page() ) { // 投稿 or 固定ページ
	$url = get_permalink();
} elseif ( is_category() ) { // カテゴリページ
	$url = whilecreative_get_the_category_link();
} elseif ( is_tag() ) { // タグページ
	$url = whilecreative_get_the_tag_link();
/*
} elseif ( is_post_type_archive() ) { // カスタム投稿一覧ページ

} elseif ( is_tax() ) { // カスタム分類ページ
} elseif ( is_archive() ) {
*/
	
}
?>
<!-- OGP by WhileCreative -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="<?php bloginfo( 'name' ); ?>">
<meta name="twitter:creator" content="@●●--creator_name--●●">
<meta property="twitter:account_id" content="●●--twitter_name--●●"><!-- Twitter Analytics用 -->

<meta property="fb:admins" content="●●--fb_admins--●●"><!-- 自分の個人FBと紐づけるならこっち -->
<meta property="fb:app_id" content="●●--fb_app_id--●●"><!-- それ以外ならこっち（App ID作る） -->
<meta property="article:publisher" content="http://www.facebook.com/●●--publisher--●●"><!-- 記事に紐づくFBページへのフォローを促す場合はこちら -->
<meta property="article:author" content="http://www.facebook.com/●●--author--●●"><!-- 記事に紐づく個人FBへのフォローを促す場合はこちら -->

<?php if ( is_home() ) : ?>
<meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
<meta property="og:title" content="<?php bloginfo( 'name' ); ?>">
<meta property="og:url" content="<?php echo $url; ?>">
<meta property="og:image" content="<?php echo whilecreative_get_childparent_uri() . '/images/default_thumbnail.png'; ?>">
<?php else : ?>
<meta property="og:description" content="<?php the_excerpt(); ?>">
<meta property="og:title" content="<?php the_title(); ?>">
<meta property="og:url" content="<?php echo $url; ?>">
<?php if ( has_post_thumbnail() ) : ?>
<meta property="og:image" content="<?php echo whilecreative_get_the_post_thumbnail_url(); ?>">
<?php else : ?>
<meta property="og:image" content="<?php echo whilecreative_get_childparent_uri() . '/images/default_thumbnail.png'; ?>">
<?php endif; ?>
<?php endif; ?>

<meta property="og:type" content="article">
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
<!-- // OGP by WhileCreative -->
