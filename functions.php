<?php

add_action( 'after_setup_theme', 'seveniceworld_setup' );

function seveniceworld_setup() {

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', 'Home');
}

function seveniceworld_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'seveniceworld_page_menu_args' );

function seveniceworld_widgets_init() {

	//register_widget( 'Seven_Ice_World_Widget' );

	register_sidebar( array(
		'name' => 'Main Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</div></aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="widget-content">',
	) );

	register_sidebar( array(
		'name' => 'Showcase Sidebar',
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</div></aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="widget-content">',
	) );
}
add_action( 'widgets_init', 'seveniceworld_widgets_init' );

$sevenIceWorldDefaultOptions = array(
    'twitter' => '',
    'github' => '',
    'rss' => '',
    'sina' => '',
    'tencent' => '',
    'favicon_url' => '',
    'avatar' => '',
);

$sevenIceWorldSocialList = array(
    'github' => 'GitHub',
    'sina' => '新浪微博',
    //'tencent' => '腾讯微博'
    'twitter' => 'Twitter',
);

function seveniceworld_create_options() {
    $options = $GLOBALS['sevenIceWorldDefaultOptions'];
    $db_options = get_option('seveniceworld_options');
    if (!is_array($db_options)) {
        $db_options = array();
    }
    foreach(array_keys($options) as $k) {
        if (isset($db_options[$k])) {
            $options[$k] = $db_options[$k];
        }
    }
    update_option('seveniceworld_options', $options);
    return $options;
}

function seveniceworld_get_options() {
    $options = get_option('seveniceworld_options');
    if (!empty($options) && count($options) == count($GLOBALS['sevenIceWorldDefaultOptions'])) {
        return $options;
    } else {
        return $GLOBALS['sevenIceWorldDefaultOptions'];
    }
}

function seveniceworld_add_theme_options() {
    global $sevenIceWorldSocialList;
    if (isset($_POST['seveniceworld_save'])) {
        $options = seveniceworld_create_options();
        foreach(array_keys($sevenIceWorldSocialList) as $key) {
            $options[$key] = stripslashes($_POST[$key]);
        }
        $options['avatar'] = stripslashes($_POST['avatar']);
        $options['favicon_url'] = stripslashes($_POST['favicon_url']);
        update_option('seveniceworld_options', $options);
    }
    add_theme_page("主题选项", "主题选项", 'edit_themes', basename(__FILE__), 'seveniceworld_add_theme_page');
}

function seveniceworld_add_theme_page() {
    global $sevenIceWorldSocialList;
    $options = seveniceworld_get_options();
?>
<form action="#" method="POST" enctype="multipart/form-data">
    <div class="wrap">
        <div class="config_box">
            <div id="icon-options-general" class="icon32"><br></div>
            <h2>Seven Ice World 主题设置</h2>
            <table class="form-table">
                <tbody>
                    <?php foreach($sevenIceWorldSocialList as $key => $value): ?>
                    <tr>
                        <td><label for="social-<?php echo $key;?>"><?php echo $value;?></label></td>
                        <td><input type="text" name="<?php echo $key;?>" id="social-<?php echo $key;?>" value="<?php if($options[$key]){echo $options[$key];} ?>"/></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td><label for="rss-feed">RSS Feed</label></td>
                        <td><input type="text" name="rss" id="rss-feed" value="<?php if($options['rss']){echo $options['rss'];} ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="avatar">头像URL</label></td>
                        <td><input type="text" name="avatar" id="avatar" value="<?php if($options['avatar']){echo $options['avatar'];} ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="favicon">Favicon URL</label></td>
                        <td><input type="text" name="favicon_url" id="favicon" value="<?php if($options['favicon_url']){echo $options['favicon_url'];} ?>"/></td>
                    </tr>
                </tbody>
            </table>
            <p>
                <input type="submit" name="seveniceworld_save" value="<?php echo '更新 &raquo;'; ?>" class="button-primary" id="submit" />
            </p>
        </div>
    </div>
</form>
<?php
}
add_action('admin_menu', 'seveniceworld_create_options');
add_action('admin_menu', 'seveniceworld_add_theme_options');

?>
