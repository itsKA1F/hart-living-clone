    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div>
                    <h2 class="footer-title"><?php bloginfo('name'); ?></h2>
                    <p class="footer-tagline"><?php bloginfo('description'); ?></p>
                    <p class="footer-tagline"><?php _e('Home is where Hart is', 'hart-living'); ?></p>
                </div>
                
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="footer-widgets">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="footer-copyright">
                    <p><?php echo esc_html(get_theme_mod('footer_text', '© 2025 Hart Living. All rights reserved')); ?></p>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
