<?php
/**
 * Template Name: Cart Page
 * Template for displaying shopping cart
 */

get_header();
?>

<main id="main" class="site-main">
    <section class="cart-page-section">
        <div class="container" style="padding: 4rem 1rem;">
            <div style="max-width: 1200px; margin: 0 auto;">
                
                <!-- Breadcrumb -->
                <div style="margin-bottom: 2rem; font-size: 0.875rem;">
                    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: var(--primary);">
                        <?php _e('Home', 'hart-living'); ?>
                    </a>
                    <span style="margin: 0 0.5rem; color: var(--foreground); opacity: 0.5;">/</span>
                    <span style="color: var(--foreground); opacity: 0.7;"><?php _e('Shopping Cart', 'hart-living'); ?></span>
                </div>
                
                <!-- Cart Title -->
                <h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 2rem;">
                    <?php _e('Shopping Cart', 'hart-living'); ?>
                </h1>
                
                <!-- Cart Content -->
                <div id="cart-page-content" class="cart-page-content">
                    <div class="cart-empty" style="text-align: center; padding: 4rem 2rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 auto 1rem; opacity: 0.3;">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <p style="font-size: 1.25rem; color: hsla(0, 0%, 10%, 0.5);"><?php _e('Your cart is empty', 'hart-living'); ?></p>
                        <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>" 
                           style="display: inline-block; margin-top: 1.5rem; padding: 1rem 2rem; background: var(--primary); color: var(--primary-foreground); border-radius: 0.375rem; text-decoration: none; font-weight: 600;">
                            <?php _e('Continue Shopping', 'hart-living'); ?>
                        </a>
                    </div>
                </div>
                
                <script>
                (function() {
                    const cartContent = document.getElementById('cart-page-content');
                    const cart = JSON.parse(localStorage.getItem('hart_cart') || '[]');
                    
                    if (cart.length > 0) {
                        const total = cart.reduce((sum, item) => sum + (parseFloat(item.price) * item.quantity), 0);
                        
                        cartContent.innerHTML = `
                            <div style="display: grid; gap: 2rem;">
                                <div class="cart-items-list">
                                    ${cart.map(item => `
                                        <div class="cart-page-item" data-id="${item.id}" style="display: grid; grid-template-columns: 100px 1fr auto; gap: 1.5rem; padding: 1.5rem; border: 1px solid var(--border); border-radius: 0.5rem; margin-bottom: 1rem;">
                                            <img src="${item.image}" alt="${item.name}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 0.5rem; background: var(--muted);">
                                            <div>
                                                <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">${item.name}</h3>
                                                <p style="font-size: 1.125rem; color: var(--primary); font-weight: 700;">$${parseFloat(item.price).toLocaleString()}</p>
                                                <div style="display: flex; align-items: center; gap: 0.5rem; margin-top: 1rem;">
                                                    <button class="cart-qty-btn" data-action="decrease" data-id="${item.id}" style="width: 30px; height: 30px; border: 1px solid var(--border); background: white; cursor: pointer; border-radius: 0.25rem;">-</button>
                                                    <span style="min-width: 40px; text-align: center; font-weight: 600;">${item.quantity}</span>
                                                    <button class="cart-qty-btn" data-action="increase" data-id="${item.id}" style="width: 30px; height: 30px; border: 1px solid var(--border); background: white; cursor: pointer; border-radius: 0.25rem;">+</button>
                                                </div>
                                            </div>
                                            <button class="cart-remove-btn" data-id="${item.id}" style="background: transparent; border: none; cursor: pointer; color: #dc2626; font-weight: 600; align-self: start;">Remove</button>
                                        </div>
                                    `).join('')}
                                </div>
                                
                                <div style="background: var(--muted); padding: 2rem; border-radius: 0.5rem;">
                                    <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem;"><?php _e('Cart Total', 'hart-living'); ?></h2>
                                    <div style="display: flex; justify-content: space-between; font-size: 1.5rem; font-weight: 700; color: var(--primary); margin-bottom: 1.5rem;">
                                        <span><?php _e('Total:', 'hart-living'); ?></span>
                                        <span id="cart-page-total">$${total.toLocaleString()}</span>
                                    </div>
                                    <div style="display: flex; gap: 1rem;">
                                        <a href="<?php echo esc_url(hart_living_get_checkout_url()); ?>" 
                                           style="flex: 1; padding: 1rem 2rem; background: var(--primary); color: var(--primary-foreground); border-radius: 0.375rem; text-align: center; text-decoration: none; font-weight: 600;">
                                            <?php _e('Proceed to Checkout', 'hart-living'); ?>
                                        </a>
                                        <button id="clear-cart-page" style="padding: 1rem 2rem; background: transparent; color: var(--foreground); border: 2px solid var(--border); border-radius: 0.375rem; font-weight: 600; cursor: pointer;">
                                            <?php _e('Clear Cart', 'hart-living'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                        
                        // Bind cart events
                        document.querySelectorAll('.cart-qty-btn').forEach(btn => {
                            btn.addEventListener('click', function() {
                                const id = this.dataset.id;
                                const action = this.dataset.action;
                                const cart = JSON.parse(localStorage.getItem('hart_cart') || '[]');
                                const item = cart.find(i => i.id === id);
                                
                                if (item) {
                                    if (action === 'increase') {
                                        item.quantity++;
                                    } else {
                                        item.quantity = Math.max(1, item.quantity - 1);
                                    }
                                    localStorage.setItem('hart_cart', JSON.stringify(cart));
                                    location.reload();
                                }
                            });
                        });
                        
                        document.querySelectorAll('.cart-remove-btn').forEach(btn => {
                            btn.addEventListener('click', function() {
                                const id = this.dataset.id;
                                let cart = JSON.parse(localStorage.getItem('hart_cart') || '[]');
                                cart = cart.filter(i => i.id !== id);
                                localStorage.setItem('hart_cart', JSON.stringify(cart));
                                location.reload();
                            });
                        });
                        
                        document.getElementById('clear-cart-page').addEventListener('click', function() {
                            if (confirm('<?php _e('Are you sure you want to clear your cart?', 'hart-living'); ?>')) {
                                localStorage.removeItem('hart_cart');
                                location.reload();
                            }
                        });
                    }
                })();
                </script>
                
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
