<?php get_header(); ?>
<div id="content">
    <section id="article-group">
    <?php if (have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <?php get_template_part( 'content', get_post_format() ); ?>
        <?php endwhile; ?>
    <?php endif; ?>
    </section>

    <nav id="pager">
    <?php if(function_exists('wp_pagenavi')):?>
        <?php wp_pagenavi();?>
    <?php else: ?>
        <?php posts_nav_link(); ?>
    <?php endif;?>
    </nav>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
