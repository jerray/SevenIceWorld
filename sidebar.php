<div id="sidebar">
    <div id="widgets">
        <aside id="search" class="widget widget-search">
            <?php get_search_form(); ?>
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
