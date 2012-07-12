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
        <div class="navigation">
            <div class="previous-post-link"><?php previous_post_link(' &laquo; %link') ?></div>
            <div class="next-post-link"><?php next_post_link(' %link &raquo;') ?></div>
        </div>
    </nav>

    <section id="comments">
    <?php comments_template(); ?>
    </section>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
