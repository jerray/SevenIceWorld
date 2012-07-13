<!DOCTYPE html>
<html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	global $page, $paged;

	wp_title( '|', true, 'right' );
	bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'SevenIceWorld' ), max( $paged, $page ) );

	?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
<?php wp_enqueue_script( 'jquery' ); ?>
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
?>
</head>
<!--if IE in [6, 7, 8]: Oops() -->
<body <?php body_class(); ?>>
    <div id="page">
    <header id="banner">
        <hgroup>
            <h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name');?></a></h1>
            <h2 id="site-description"><?php bloginfo( 'description' );?></h2>
        </hgroup>
        <div id="social-list">
        <?php $options = seveniceworld_get_options();?>
            <ul>
                <li><a id="social-rss-icon" class="social-list-icon" href="<?php if ($options['rss']){echo $options['rss'];}else{bloginfo( 'rss2_url' );}?>" target="_blank"> </a></li>
                <?php foreach(array_keys($GLOBALS['sevenIceWorldSocialList']) as $k):?>
                    <?php if ($options[$k]): ?>
                <li><a id="social-<?php echo $k;?>-icon" class="social-list-icon" href="<?php echo $options[$k];?>" target="_blank"> </a></li>
                    <?php endif;?>
                <?php endforeach;?>
            </ul>
        </div>
    </header>

    <nav id="access">
        <?php if ($options['avatar']): ?>
        <img id="admin-avatar" src="<?php echo $options['avatar']; ?>" width="64px" height="64px" />
        <?php endif; ?>
        <div id="head-menu">
            <?php wp_nav_menu(); ?>
        </div>
    </nav>
    <div id="access_blank"></div>

    <div id="main">
