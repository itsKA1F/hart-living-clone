<?php
/**
 * Hart Living Theme Functions
 */

// Theme Support
function hart_living_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Set default thumbnail size
    set_post_thumbnail_size(800, 600, true);
    
    // Add custom image sizes
    add_image_size('hart-product', 600, 600, true);
    add_image_size('hart-hero', 1920, 1080, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'hart-living'),
    ));
    
    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Add HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // WooCommerce support (optional - if you want WooCommerce integration)
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'hart_living_setup');

// Enqueue Styles and Scripts
function hart_living_scripts() {
    // Main stylesheet
    wp_enqueue_style('hart-living-style', get_stylesheet_uri(), array(), '2.0.0');
    
    // Additional styles for multi-page
    wp_enqueue_style('hart-living-additions', get_template_directory_uri() . '/style-additions.css', array('hart-living-style'), '2.0.0');
    
    // Custom JavaScript
    wp_enqueue_script('hart-living-script', get_template_directory_uri() . '/js/main.js', array(), '2.0.0', true);
    
    // Smooth scroll
    wp_enqueue_script('hart-living-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array(), '2.0.0', true);
}
add_action('wp_enqueue_scripts', 'hart_living_scripts');

// Register Widget Areas
function hart_living_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'hart-living'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'hart-living'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'hart_living_widgets_init');

// Customizer Settings
function hart_living_customize_register($wp_customize) {
    
    // Hero Section
    $wp_customize->add_section('hart_hero_section', array(
        'title'    => __('Hero Section', 'hart-living'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'HART',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label'    => __('Hero Title', 'hart-living'),
        'section'  => 'hart_hero_section',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'Home is where Hart is',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label'    => __('Hero Subtitle', 'hart-living'),
        'section'  => 'hart_hero_section',
        'type'     => 'text',
    ));
    
    // About Section
    $wp_customize->add_section('hart_about_section', array(
        'title'    => __('About Section', 'hart-living'),
        'priority' => 40,
    ));
    
    $wp_customize->add_setting('about_title', array(
        'default'           => 'About Hart Living',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_title', array(
        'label'    => __('About Title', 'hart-living'),
        'section'  => 'hart_about_section',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('about_content', array(
        'default'           => 'At Hart Living, we believe that home is where the heart is. We curate beautiful, high-quality furniture pieces that transform your house into a warm and inviting home.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    
    $wp_customize->add_control('about_content', array(
        'label'    => __('About Content', 'hart-living'),
        'section'  => 'hart_about_section',
        'type'     => 'textarea',
    ));
    
    // Contact Section
    $wp_customize->add_section('hart_contact_section', array(
        'title'    => __('Contact Section', 'hart-living'),
        'priority' => 50,
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'info@hartliving.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label'    => __('Contact Email', 'hart-living'),
        'section'  => 'hart_contact_section',
        'type'     => 'email',
    ));
    
    // Footer
    $wp_customize->add_section('hart_footer_section', array(
        'title'    => __('Footer Settings', 'hart-living'),
        'priority' => 60,
    ));
    
    $wp_customize->add_setting('footer_text', array(
        'default'           => '© 2025 Hart Living. All rights reserved',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_text', array(
        'label'    => __('Footer Copyright Text', 'hart-living'),
        'section'  => 'hart_footer_section',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'hart_living_customize_register');

// Custom Post Type: Products
function hart_living_custom_post_types() {
    register_post_type('product', array(
        'labels' => array(
            'name'          => __('Products', 'hart-living'),
            'singular_name' => __('Product', 'hart-living'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'products'),
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'    => 'dashicons-cart',
    ));
    
    // Product Categories
    register_taxonomy('product_category', 'product', array(
        'labels' => array(
            'name'          => __('Product Categories', 'hart-living'),
            'singular_name' => __('Product Category', 'hart-living'),
        ),
        'hierarchical' => true,
        'rewrite'      => array('slug' => 'product-category'),
    ));
}
add_action('init', 'hart_living_custom_post_types');

// Add custom fields for products
function hart_living_product_meta_boxes() {
    add_meta_box(
        'product_details',
        __('Product Details', 'hart-living'),
        'hart_living_product_details_callback',
        'product',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'hart_living_product_meta_boxes');

function hart_living_product_details_callback($post) {
    wp_nonce_field('hart_living_save_product_details', 'hart_living_product_details_nonce');
    
    $price = get_post_meta($post->ID, '_product_price', true);
    $dimensions = get_post_meta($post->ID, '_product_dimensions', true);
    $material = get_post_meta($post->ID, '_product_material', true);
    $weight = get_post_meta($post->ID, '_product_weight', true);
    ?>
    <p>
        <label for="product_price"><?php _e('Price:', 'hart-living'); ?></label>
        <input type="text" id="product_price" name="product_price" value="<?php echo esc_attr($price); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="product_dimensions"><?php _e('Dimensions (W x H x D):', 'hart-living'); ?></label>
        <input type="text" id="product_dimensions" name="product_dimensions" value="<?php echo esc_attr($dimensions); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="product_material"><?php _e('Material:', 'hart-living'); ?></label>
        <input type="text" id="product_material" name="product_material" value="<?php echo esc_attr($material); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="product_weight"><?php _e('Weight:', 'hart-living'); ?></label>
        <input type="text" id="product_weight" name="product_weight" value="<?php echo esc_attr($weight); ?>" style="width: 100%;">
    </p>
    <?php
}

function hart_living_save_product_details($post_id) {
    if (!isset($_POST['hart_living_product_details_nonce']) || 
        !wp_verify_nonce($_POST['hart_living_product_details_nonce'], 'hart_living_save_product_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['product_price'])) {
        update_post_meta($post_id, '_product_price', sanitize_text_field($_POST['product_price']));
    }
    
    if (isset($_POST['product_dimensions'])) {
        update_post_meta($post_id, '_product_dimensions', sanitize_text_field($_POST['product_dimensions']));
    }
    
    if (isset($_POST['product_material'])) {
        update_post_meta($post_id, '_product_material', sanitize_text_field($_POST['product_material']));
    }
    
    if (isset($_POST['product_weight'])) {
        update_post_meta($post_id, '_product_weight', sanitize_text_field($_POST['product_weight']));
    }
}
add_action('save_post', 'hart_living_save_product_details');

// Install Sample Products
/**
 * Create Cart and Checkout pages on theme activation
 */
function hart_living_create_shop_pages() {
    // Create Cart Page
    $cart_page = get_page_by_path('cart');
    if (!$cart_page) {
        $cart_page_id = wp_insert_post(array(
            'post_title' => 'Cart',
            'post_name' => 'cart',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => ''
        ));
        update_post_meta($cart_page_id, '_wp_page_template', 'cart.php');
    }
    
    // Create Checkout Page
    $checkout_page = get_page_by_path('checkout');
    if (!$checkout_page) {
        $checkout_page_id = wp_insert_post(array(
            'post_title' => 'Checkout',
            'post_name' => 'checkout',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => ''
        ));
        update_post_meta($checkout_page_id, '_wp_page_template', 'checkout.php');
    }
}
add_action('after_switch_theme', 'hart_living_create_shop_pages');

/**
 * Helper functions to get cart and checkout page URLs
 */
function hart_living_get_cart_url() {
    $cart_page = get_page_by_path('cart');
    if ($cart_page) {
        return get_permalink($cart_page->ID);
    }
    return home_url('/cart');
}

function hart_living_get_checkout_url() {
    $checkout_page = get_page_by_path('checkout');
    if ($checkout_page) {
        return get_permalink($checkout_page->ID);
    }
    return home_url('/checkout');
}

function hart_living_install_sample_products() {
    // Check if products already exist
    $existing_products = get_posts(array('post_type' => 'product', 'posts_per_page' => 1));
    if (!empty($existing_products)) {
        return; // Products already exist
    }
    
    $sample_products = array(
        array('sku' => 'SOFA-001', 'name' => 'Toulon Brown Sectional Sofa', 'description' => 'Elevate your living space with the Toulon Brown Sectional Sofa, featuring plush upholstery and modular design for ultimate comfort in modern homes.', 'short_description' => 'Stylish brown sectional sofa for family lounging.', 'price' => '1400.00', 'category' => 'Sofas'),
        array('sku' => 'SOFA-002', 'name' => 'Pavia White Sectional Sofa', 'description' => 'The Pavia White Sectional Sofa offers clean lines and soft fabric, ideal for contemporary living rooms seeking elegance and versatility.', 'short_description' => 'Elegant white sectional with modular seating.', 'price' => '1200.00', 'category' => 'Sofas'),
        array('sku' => 'SOFA-003', 'name' => 'Pavia Cream Sectional Sofa', 'description' => 'Discover timeless style with the Pavia Cream Sectional Sofa, combining neutral tones and ergonomic support for relaxed gatherings.', 'short_description' => 'Cream-toned sectional for cozy modern spaces.', 'price' => '1200.00', 'category' => 'Sofas'),
        array('sku' => 'SOFA-004', 'name' => 'Zadar Cloudy Beige Sectional Sofa', 'description' => 'The Zadar Cloudy Beige Sectional Sofa blends subtle textures and spacious seating, perfect for effortless sophistication in any home.', 'short_description' => 'Beige sectional with cloud-like comfort.', 'price' => '1300.00', 'category' => 'Sofas'),
        array('sku' => 'SOFA-005', 'name' => 'Peniche Light Taupe Cozy L Sofa', 'description' => 'Embrace warmth with the Peniche Light Taupe Cozy L Sofa, designed for intimate corners with its gentle curves and inviting cushions.', 'short_description' => 'Cozy L-shaped taupe sofa for small spaces.', 'price' => '1100.00', 'category' => 'Sofas'),
        array('sku' => 'BED-001', 'name' => 'Perugia Cozy Grey Queen Bed Frame', 'description' => 'The Perugia Cozy Grey Queen Bed Frame features a sleek upholstered headboard and sturdy construction for a serene bedroom retreat.', 'short_description' => 'Cozy grey queen bed with upholstered design.', 'price' => '950.00', 'category' => 'Bed Frames'),
        array('sku' => 'BED-002', 'name' => 'Amiens Cozy Beige Queen Bed Frame', 'description' => 'Transform your sleep sanctuary with the Amiens Cozy Beige Queen Bed Frame, offering neutral elegance and ample storage options.', 'short_description' => 'Beige queen bed frame for minimalist bedrooms.', 'price' => '1000.00', 'category' => 'Bed Frames'),
        array('sku' => 'BED-003', 'name' => 'Lugano Stormy Grey Queen Bed Frame', 'description' => 'The Lugano Stormy Grey Queen Bed Frame delivers bold contrast and robust support, ideal for contemporary sleeping arrangements.', 'short_description' => 'Stormy grey queen frame with modern edges.', 'price' => '1100.00', 'category' => 'Bed Frames'),
        array('sku' => 'BED-004', 'name' => 'Novi Cozy Beige Queen Bed Frame', 'description' => 'Enjoy subtle luxury in the Novi Cozy Beige Queen Bed Frame, with soft lines and high-quality materials for everyday comfort.', 'short_description' => 'Beige cozy queen bed for relaxed vibes.', 'price' => '900.00', 'category' => 'Bed Frames'),
        array('sku' => 'BED-005', 'name' => 'Nis Cozy Grey Queen Bed Frame', 'description' => 'The Nis Cozy Grey Queen Bed Frame combines functionality and style, perfect for urban bedrooms with its compact yet spacious design.', 'short_description' => 'Compact grey queen bed frame.', 'price' => '850.00', 'category' => 'Bed Frames'),
        array('sku' => 'OFFICE-001', 'name' => 'TwistLock Cord Cover', 'description' => 'Keep your office tidy with the TwistLock Cord Cover, a practical accessory for managing cables behind desks and workstations.', 'short_description' => 'Cable management cover for desks.', 'price' => '50.00', 'category' => 'Office Furniture'),
        array('sku' => 'OFFICE-002', 'name' => 'FlexCharge Desk Clamp Socket', 'description' => 'Power up efficiently using the FlexCharge Desk Clamp Socket, easily attaching to any desk edge for convenient charging.', 'short_description' => 'Adjustable desk socket clamp.', 'price' => '80.00', 'category' => 'Office Furniture'),
        array('sku' => 'OFFICE-003', 'name' => 'Arbor Light Oak Desk Office', 'description' => 'The Arbor Light Oak Desk Office provides a natural wood finish and ample workspace for productive home offices.', 'short_description' => 'Light oak desk for professional setups.', 'price' => '600.00', 'category' => 'Office Furniture'),
        array('sku' => 'OFFICE-004', 'name' => 'Sequoia Slim Leather Armchair', 'description' => 'Add sophistication to your workspace with the Sequoia Slim Leather Armchair, featuring ergonomic support and premium leather.', 'short_description' => 'Slim leather armchair for offices.', 'price' => '400.00', 'category' => 'Office Furniture'),
        array('sku' => 'OFFICE-005', 'name' => 'Opal Flow Lounge Seat', 'description' => 'Relax between tasks in the Opal Flow Lounge Seat, designed with fluid curves for comfort in modern office lounges.', 'short_description' => 'Contemporary lounge seat for breaks.', 'price' => '350.00', 'category' => 'Office Furniture'),
        array('sku' => 'ARMCHAIR-001', 'name' => 'Anya Light Brown Armchair', 'description' => 'The Anya Light Brown Armchair brings warmth and comfort to reading nooks with its soft fabric and classic silhouette.', 'short_description' => 'Light brown armchair for cozy corners.', 'price' => '300.00', 'category' => 'Arm Chairs'),
        array('sku' => 'ARMCHAIR-002', 'name' => 'Avila Grey Armchair', 'description' => 'Elevate your decor with the Avila Grey Armchair, offering neutral tones and plush cushioning for versatile placement.', 'short_description' => 'Grey armchair with plush comfort.', 'price' => '320.00', 'category' => 'Arm Chairs'),
        array('sku' => 'ARMCHAIR-003', 'name' => 'Eira Black Armchair', 'description' => 'Make a statement with the Eira Black Armchair, featuring bold upholstery and sturdy legs for dramatic living spaces.', 'short_description' => 'Bold black armchair for modern rooms.', 'price' => '280.00', 'category' => 'Arm Chairs'),
        array('sku' => 'ARMCHAIR-004', 'name' => 'Nara Black Armchair', 'description' => 'The Nara Black Armchair combines sleek design and deep seating, ideal for contemporary lounging areas.', 'short_description' => 'Sleek black armchair with deep seat.', 'price' => '310.00', 'category' => 'Arm Chairs'),
        array('sku' => 'ARMCHAIR-005', 'name' => 'Reggio Smokey Grey Armchair', 'description' => 'Unwind in style with the Reggio Smokey Grey Armchair, blending subtle smoke hues and ergonomic support.', 'short_description' => 'Smokey grey armchair for relaxation.', 'price' => '340.00', 'category' => 'Arm Chairs'),
        array('sku' => 'DINING-001', 'name' => 'Goslić Ganache Large Board Dining Table', 'description' => 'Host gatherings with the Goslić Ganache Large Board Dining Table, crafted from rich wood for enduring elegance.', 'short_description' => 'Large board dining table in ganache finish.', 'price' => '1800.00', 'category' => 'Dining Tables'),
        array('sku' => 'DINING-002', 'name' => 'Duba Ceramic Grey Rectangular Dining Table (Small)', 'description' => 'The Duba Ceramic Grey Rectangular Dining Table (Small) offers a compact, modern surface for intimate meals.', 'short_description' => 'Small grey ceramic rectangular dining table.', 'price' => '1100.00', 'category' => 'Dining Tables'),
        array('sku' => 'DINING-003', 'name' => 'Duba Ceramic Grey Rectangular Dining Table (Big)', 'description' => 'Expand your dining options with the Duba Ceramic Grey Rectangular Dining Table (Big), featuring durable ceramic top.', 'short_description' => 'Big grey ceramic rectangular dining table.', 'price' => '1600.00', 'category' => 'Dining Tables'),
        array('sku' => 'DINING-004', 'name' => 'Rectangular Oak Dining Table', 'description' => 'A classic choice, the Rectangular Oak Dining Table provides natural grain and seating for 6-8 guests.', 'short_description' => 'Oak rectangular dining table for families.', 'price' => '700.00', 'category' => 'Dining Tables'),
        array('sku' => 'DINING-005', 'name' => 'Extendable Glass Dining Table', 'description' => 'Adapt to any occasion with the Extendable Glass Dining Table, combining sleek glass and hidden extension mechanism.', 'short_description' => 'Modern extendable glass dining table.', 'price' => '1050.00', 'category' => 'Dining Tables'),
    );
    
    foreach ($sample_products as $product_data) {
        // Create product post
        $post_id = wp_insert_post(array(
            'post_title'   => $product_data['name'],
            'post_content' => $product_data['description'],
            'post_excerpt' => $product_data['short_description'],
            'post_status'  => 'publish',
            'post_type'    => 'product',
        ));
        
        if ($post_id) {
            // Add price
            update_post_meta($post_id, '_product_price', $product_data['price']);
            update_post_meta($post_id, '_product_sku', $product_data['sku']);
            
            // Add category
            $term = term_exists($product_data['category'], 'product_category');
            if (!$term) {
                $term = wp_insert_term($product_data['category'], 'product_category');
            }
            if (!is_wp_error($term)) {
                wp_set_object_terms($post_id, $term['term_id'], 'product_category');
            }
        }
    }
}
add_action('after_switch_theme', 'hart_living_install_sample_products');
