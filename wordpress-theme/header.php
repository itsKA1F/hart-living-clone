<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="header-content">
            <div class="site-logo">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                    <?php
                }
                ?>
            </div>
            
            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => 'hart_living_default_menu',
                ));
                ?>
            </nav>
        </div>
    </div>
</header>

<?php
// Default menu fallback
function hart_living_default_menu() {
    ?>
    <ul class="nav-menu">
        <li><a href="#category"><?php _e('Shop by Category', 'hart-living'); ?></a></li>
        <li><a href="#products"><?php _e('Products', 'hart-living'); ?></a></li>
        <li><a href="#about"><?php _e('About Us', 'hart-living'); ?></a></li>
        <li><a href="#contact"><?php _e('Contact Us', 'hart-living'); ?></a></li>
    </ul>
    <?php
}
