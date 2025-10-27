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
}
add_action('after_setup_theme', 'hart_living_setup');

// Enqueue Styles and Scripts
function hart_living_scripts() {
    // Main stylesheet
    wp_enqueue_style('hart-living-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Custom JavaScript (optional)
    wp_enqueue_script('hart-living-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
    
    // Smooth scroll
    wp_enqueue_script('hart-living-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array(), '1.0.0', true);
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
