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
            
            <button id="cart-toggle" class="cart-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <span id="cart-count" class="cart-count">0</span>
            </button>
        </div>
    </div>
</header>

<!-- Cart Drawer -->
<div id="cart-drawer" class="cart-drawer">
    <div class="cart-drawer-overlay"></div>
    <div class="cart-drawer-content">
        <div class="cart-drawer-header">
            <h2>Shopping Cart (<span id="cart-items-count">0</span>)</h2>
            <button id="cart-close" class="cart-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="cart-drawer-body" id="cart-items-container">
            <div class="cart-empty">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <p>Your cart is empty</p>
            </div>
        </div>
        <div class="cart-drawer-footer">
            <div class="cart-total">
                <span>Total:</span>
                <span id="cart-total">$0</span>
            </div>
            <button class="cart-checkout-btn">Checkout</button>
            <button id="cart-clear" class="cart-clear-btn">Clear Cart</button>
        </div>
    </div>
</div>

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
