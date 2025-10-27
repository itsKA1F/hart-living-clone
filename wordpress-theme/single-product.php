<?php
/**
 * Single Product Template
 */

get_header();
?>

<main id="main" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        
        $price = get_post_meta(get_the_ID(), '_product_price', true);
        $dimensions = get_post_meta(get_the_ID(), '_product_dimensions', true);
        $material = get_post_meta(get_the_ID(), '_product_material', true);
        $weight = get_post_meta(get_the_ID(), '_product_weight', true);
        ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('product-single'); ?>>
            <div class="container" style="padding: 4rem 1rem;">
                <div style="max-width: 1200px; margin: 0 auto;">
                    
                    <!-- Breadcrumb -->
                    <div style="margin-bottom: 2rem; font-size: 0.875rem;">
                        <a href="<?php echo esc_url(home_url('/')); ?>" style="color: var(--primary);">
                            <?php _e('Home', 'hart-living'); ?>
                        </a>
                        <span style="margin: 0 0.5rem; color: var(--foreground); opacity: 0.5;">/</span>
                        <a href="<?php echo esc_url(home_url('/#products')); ?>" style="color: var(--primary);">
                            <?php _e('Products', 'hart-living'); ?>
                        </a>
                        <span style="margin: 0 0.5rem; color: var(--foreground); opacity: 0.5;">/</span>
                        <span style="color: var(--foreground); opacity: 0.7;"><?php the_title(); ?></span>
                    </div>
                    
                    <!-- Product Content -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: start;">
                        
                        <!-- Product Image -->
                        <div>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', array(
                                    'style' => 'width: 100%; border-radius: 0.5rem; aspect-ratio: 1; object-fit: cover;'
                                )); ?>
                            <?php else : ?>
                                <div style="width: 100%; aspect-ratio: 1; background: var(--muted); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center;">
                                    <span style="font-size: 5rem;">📦</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Product Details -->
                        <div>
                            <h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem;">
                                <?php the_title(); ?>
                            </h1>
                            
                            <?php if ($price) : ?>
                                <p style="font-size: 2rem; font-weight: 700; color: var(--primary); margin-bottom: 1.5rem;">
                                    $<?php echo esc_html($price); ?>
                                </p>
                            <?php endif; ?>
                            
                            <div style="margin-bottom: 2rem; line-height: 1.8;">
                                <?php the_content(); ?>
                            </div>
                            
                            <!-- Product Specifications -->
                            <?php if ($dimensions || $material || $weight) : ?>
                                <div style="background: var(--muted); padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                                    <h3 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem;">
                                        <?php _e('Specifications', 'hart-living'); ?>
                                    </h3>
                                    
                                    <?php if ($dimensions) : ?>
                                        <p style="margin-bottom: 0.5rem;">
                                            <strong><?php _e('Dimensions:', 'hart-living'); ?></strong> 
                                            <?php echo esc_html($dimensions); ?>
                                        </p>
                                    <?php endif; ?>
                                    
                                    <?php if ($material) : ?>
                                        <p style="margin-bottom: 0.5rem;">
                                            <strong><?php _e('Material:', 'hart-living'); ?></strong> 
                                            <?php echo esc_html($material); ?>
                                        </p>
                                    <?php endif; ?>
                                    
                                    <?php if ($weight) : ?>
                                        <p>
                                            <strong><?php _e('Weight:', 'hart-living'); ?></strong> 
                                            <?php echo esc_html($weight); ?>
                                        </p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Quantity Selector -->
                    <div class="product-quantity">
                        <label for="quantity"><?php _e('Quantity:', 'hart-living'); ?></label>
                        <div class="quantity-controls">
                            <button type="button" class="quantity-btn" id="decrease-qty">-</button>
                            <input type="number" id="quantity" value="1" min="1" max="99">
                            <button type="button" class="quantity-btn" id="increase-qty">+</button>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                        <button class="add-to-cart-btn"
                                style="flex: 1;"
                                data-id="<?php echo get_the_ID(); ?>"
                                data-name="<?php echo esc_attr(get_the_title()); ?>"
                                data-price="<?php echo esc_attr($price); ?>"
                                data-image="<?php echo esc_url(has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : ''); ?>">
                            <?php _e('Add to Cart', 'hart-living'); ?>
                        </button>
                    </div>
                    <div style="display: flex; gap: 1rem;">
                        <a href="<?php echo esc_url(home_url('/#products')); ?>" 
                           style="flex: 1; padding: 1rem 2rem; border: 2px solid var(--primary); color: var(--primary); border-radius: 0.375rem; text-align: center; text-decoration: none; font-weight: 600; transition: all 0.3s;">
                            <?php _e('Back to Products', 'hart-living'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/#contact')); ?>" 
                           style="flex: 1; padding: 1rem 2rem; border: 2px solid var(--primary); color: var(--primary); border-radius: 0.375rem; text-align: center; text-decoration: none; font-weight: 600; transition: all 0.3s;">
                            <?php _e('Inquire', 'hart-living'); ?>
                        </a>
                    </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </article>
        
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
