<div id="sidebar">
    <div id="widgets">
        <aside id="search" class="widget widget-search">
            <form method="get" action="http://localhost/theme/">
                <!--label for="s" class="assistive-text">搜索</label>
                <input type="text" class="field" name="s" id="s" placeholder="搜索" />
                <input type="submit" id="search-submit-button" value="提交" /-->
                <?php get_search_form(); ?>
            </form>
        </aside>

        <?php if (!dynamic_sidebar('sidebar-1')): ?>
        <aside id="archives" class="widget">
            <h3 class="widget-title"><?php _e('Archives'); ?></h3>
            <div class="widget-content">
                <ul>
                    <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                </ul>
            </div>
        </aside>

        <aside id="meta" class="widget">
            <h3 class="widget-title"><?php _e('Meta'); ?></h3>
            <div class="widget-content">
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
            </div>
        </aside>
        <?php else:?>
        <?php dynamic_sidebar('sidebar-2'); ?>
        <?php endif;?>

    </div>
</div>
