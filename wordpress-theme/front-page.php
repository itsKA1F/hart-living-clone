<?php
/**
 * The front page template file - One Page Layout
 */

get_header();
?>

<main id="main" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">
                <?php echo esc_html(get_theme_mod('hero_title', 'HART')); ?>
            </h1>
            <p class="hero-subtitle">
                <?php echo esc_html(get_theme_mod('hero_subtitle', 'Home is where Hart is')); ?>
            </p>
        </div>
    </section>

    <!-- Category Section -->
    <section id="category" class="category-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('Shop by Category', 'hart-living'); ?></h2>
                <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>" class="view-all">
                    <?php _e('See All', 'hart-living'); ?>
                </a>
            </div>
            
            <div class="category-grid">
                <?php
                $categories = get_terms(array(
                    'taxonomy'   => 'product_category',
                    'hide_empty' => false,
                    'number'     => 6,
                ));
                
                if (!empty($categories) && !is_wp_error($categories)) :
                    foreach ($categories as $category) :
                        ?>
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="category-card">
                            <div class="category-icon">
                                <span>📦</span>
                            </div>
                            <h3><?php echo esc_html($category->name); ?></h3>
                        </a>
                        <?php
                    endforeach;
                else :
                    // Default categories if none exist
                    $default_categories = array('Beds', 'Sofas', 'Chairs', 'Tables', 'Consoles', 'Lamps');
                    foreach ($default_categories as $cat) :
                        ?>
                        <a href="#products" class="category-card">
                            <div class="category-icon">
                                <span>📦</span>
                            </div>
                            <h3><?php echo esc_html($cat); ?></h3>
                        </a>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Products Section - Featured Products -->
    <section id="products" class="products-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('Featured Products', 'hart-living'); ?></h2>
                <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>" class="view-all">
                    <?php _e('View All Products', 'hart-living'); ?>
                </a>
            </div>
            
            <div class="products-grid">
                <?php
                $products = new WP_Query(array(
                    'post_type'      => 'product',
                    'posts_per_page' => 12,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ));
                
                if ($products->have_posts()) :
                    while ($products->have_posts()) :
                        $products->the_post();
                        $price = get_post_meta(get_the_ID(), '_product_price', true);
                        $product_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'hart-product') : '';
                        ?>
                        <div class="product-card">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('hart-product', array('class' => 'product-image')); ?>
                                <?php else : ?>
                                    <div class="product-image" style="background: var(--muted); display: flex; align-items: center; justify-content: center;">
                                        <span style="font-size: 3rem;">📦</span>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="product-info">
                                    <h3 class="product-title"><?php the_title(); ?></h3>
                                    <?php if (has_excerpt()) : ?>
                                        <p class="product-description"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                    <?php endif; ?>
                                    <?php if ($price) : ?>
                                        <p class="product-price">$<?php echo esc_html($price); ?></p>
                                    <?php endif; ?>
                                </div>
                            </a>
                            <button class="add-to-cart-btn" 
                                    data-id="<?php echo get_the_ID(); ?>"
                                    data-name="<?php echo esc_attr(get_the_title()); ?>"
                                    data-price="<?php echo esc_attr($price); ?>"
                                    data-image="<?php echo esc_url($product_image); ?>">
                                Add to Cart
                            </button>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p><?php _e('No products found. Add some products from the WordPress admin panel.', 'hart-living'); ?></p>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="about-content">
                <h2 class="section-title">
                    <?php echo esc_html(get_theme_mod('about_title', 'About Hart Living')); ?>
                </h2>
                <div>
                    <?php 
                    $about_content = get_theme_mod('about_content', 'At Hart Living, we believe that home is where the heart is. We curate beautiful, high-quality furniture pieces that transform your house into a warm and inviting home.');
                    echo wpautop(wp_kses_post($about_content));
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="contact-content">
                <h2 class="section-title"><?php _e('Contact Us', 'hart-living'); ?></h2>
                
                <form class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="hart_contact_form">
                    <?php wp_nonce_field('hart_contact_form', 'hart_contact_nonce'); ?>
                    
                    <div class="form-group">
                        <label for="contact_name"><?php _e('Name', 'hart-living'); ?></label>
                        <input type="text" id="contact_name" name="contact_name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_email"><?php _e('Email', 'hart-living'); ?></label>
                        <input type="email" id="contact_email" name="contact_email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_message"><?php _e('Message', 'hart-living'); ?></label>
                        <textarea id="contact_message" name="contact_message" required></textarea>
                    </div>
                    
                    <button type="submit" class="submit-button">
                        <?php _e('Send Message', 'hart-living'); ?>
                    </button>
                </form>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
