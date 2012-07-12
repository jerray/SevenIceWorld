<article class="post">
    <header class="entry-header">
        <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
        <span class="entry-header-extra">
            <span class="entry-header-date"><a href="#"><?php the_time('Y年 n月 j日'); ?></a></span>
            <span class="entry-header-comment"><?php comments_popup_link('&nbsp;&nbsp;没有评论 &#187;', '&nbsp;&nbsp;1 条评论 &#187;', '&nbsp;&nbsp;% 条评论 &#187;');?></span>
        </span>
    </header>
    <aside class="entry-tag">
        <span>%<?php edit_post_link('编辑'); ?></span>
        <?php echo '@' . get_the_category_list(' ') . get_the_tag_list('#');?>
    </aside>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <footer class="entry-footer">
    </footer>
</article>
