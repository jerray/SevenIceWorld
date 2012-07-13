    </div>

    <footer id="footer">
        <span class="footer-border-right">&copy;<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name');?></a></span>
        <span class="footer-border-right">Theme designed by <a href="http://www.7lemon.net/">7lemon</a></span>
        <span>Powered by <a href="http://wordpress.org/">WordPress</a></span>
    </footer>

    </div>
<?php wp_footer(); ?>
<script type="text/javascript">
jQuery(function(){
    var body = jQuery(window),
        nav = jQuery('#access'),
        nav_b = jQuery('#access_blank'),
        lock = 'toplock';
    body.scroll(function(){
        if (body.scrollTop() >= 128) {
            nav.addClass(lock);
            nav_b.show();
        } else if (nav.hasClass(lock)) {
            nav.removeClass(lock);
            nav_b.hide();
        }
    });
});
</script>
</body>
</html>
