<?php
/**
 * Template for displaying product category archives
 */

get_header();
$term = get_queried_object();
?>

<main id="main" class="site-main">
    
    <!-- Category Header -->
    <section class="category-header">
        <div class="container">
            <h1 class="page-title"><?php echo esc_html($term->name); ?></h1>
            <?php if ($term->description) : ?>
                <p class="category-description"><?php echo esc_html($term->description); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Category Products -->
    <section class="products-section">
        <div class="container">
            <div class="products-grid">
                <?php
                $products = new WP_Query(array(
                    'post_type'      => 'product',
                    'posts_per_page' => -1,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'product_category',
                            'field'    => 'term_id',
                            'terms'    => $term->term_id,
                        ),
                    ),
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
                    <p><?php _e('No products found in this category.', 'hart-living'); ?></p>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
