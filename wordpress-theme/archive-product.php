<?php
/**
 * Template for displaying product archives (all products)
 */

get_header();
?>

<main id="main" class="site-main">
    
    <!-- Page Header -->
    <section class="category-header">
        <div class="container">
            <h1 class="page-title"><?php _e('All Products', 'hart-living'); ?></h1>
            <p class="category-description"><?php _e('Browse our complete collection of furniture', 'hart-living'); ?></p>
        </div>
    </section>

    <!-- Shop Controls -->
    <section class="shop-controls">
        <div class="container">
            <div class="shop-controls-bar">
                <div class="shop-search">
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="hidden" name="post_type" value="product" />
                        <input type="search" name="s" placeholder="<?php _e('Search products...', 'hart-living'); ?>" value="<?php echo get_search_query(); ?>" />
                    </form>
                </div>
                <div class="shop-sorting">
                    <label for="orderby"><?php _e('Sort by:', 'hart-living'); ?></label>
                    <select name="orderby" id="orderby" onchange="location = this.value;">
                        <option value="<?php echo add_query_arg('orderby', 'date'); ?>"><?php _e('Latest', 'hart-living'); ?></option>
                        <option value="<?php echo add_query_arg('orderby', 'price'); ?>"><?php _e('Price: Low to High', 'hart-living'); ?></option>
                        <option value="<?php echo add_query_arg('orderby', 'price-desc'); ?>"><?php _e('Price: High to Low', 'hart-living'); ?></option>
                        <option value="<?php echo add_query_arg('orderby', 'title'); ?>"><?php _e('Name: A-Z', 'hart-living'); ?></option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- All Products -->
    <section class="products-section">
        <div class="container">
            <div class="shop-layout">
                <!-- Sidebar Filters -->
                <aside class="shop-sidebar">
                    <div class="filter-group">
                        <h3><?php _e('Categories', 'hart-living'); ?></h3>
                        <ul class="filter-list">
                            <?php
                            $categories = get_terms(array(
                                'taxonomy' => 'product_category',
                                'hide_empty' => true,
                            ));
                            foreach ($categories as $cat) :
                                ?>
                                <li>
                                    <a href="<?php echo esc_url(get_term_link($cat)); ?>">
                                        <?php echo esc_html($cat->name); ?> (<?php echo $cat->count; ?>)
                                    </a>
                                </li>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                </aside>

                <!-- Products Grid -->
                <div class="shop-main">
                    <div class="products-grid">
                        <?php
                        if (have_posts()) :
                            while (have_posts()) :
                                the_post();
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
                        else :
                            ?>
                            <p><?php _e('No products found.', 'hart-living'); ?></p>
                            <?php
                        endif;
                        ?>
                    </div>
                    
                    <!-- Pagination -->
                    <?php if (function_exists('the_posts_pagination')) {
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => '&laquo; Previous',
                            'next_text' => 'Next &raquo;',
                        ));
                    } ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
