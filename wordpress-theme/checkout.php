<?php
/**
 * Template Name: Checkout Page
 * Template for checkout process
 */

get_header();
?>

<main id="main" class="site-main">
    <section class="checkout-page-section">
        <div class="container" style="padding: 4rem 1rem;">
            <div style="max-width: 1200px; margin: 0 auto;">
                
                <!-- Breadcrumb -->
                <div style="margin-bottom: 2rem; font-size: 0.875rem;">
                    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: var(--primary);">
                        <?php _e('Home', 'hart-living'); ?>
                    </a>
                    <span style="margin: 0 0.5rem; color: var(--foreground); opacity: 0.5;">/</span>
                    <a href="<?php echo esc_url(home_url('/cart')); ?>" style="color: var(--primary);">
                        <?php _e('Cart', 'hart-living'); ?>
                    </a>
                    <span style="margin: 0 0.5rem; color: var(--foreground); opacity: 0.5;">/</span>
                    <span style="color: var(--foreground); opacity: 0.7;"><?php _e('Checkout', 'hart-living'); ?></span>
                </div>
                
                <!-- Checkout Title -->
                <h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 2rem;">
                    <?php _e('Checkout', 'hart-living'); ?>
                </h1>
                
                <!-- Checkout Content -->
                <div id="checkout-content" style="display: grid; grid-template-columns: 1fr; gap: 2rem;">
                    
                    <!-- Left Column: Billing & Payment -->
                    <div style="display: grid; gap: 2rem;">
                        
                        <!-- Billing Information -->
                        <div style="background: white; padding: 2rem; border: 1px solid var(--border); border-radius: 0.5rem;">
                            <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem;">
                                <?php _e('Billing Information', 'hart-living'); ?>
                            </h2>
                            <form id="checkout-form">
                                <div style="display: grid; gap: 1rem;">
                                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                        <div>
                                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">
                                                <?php _e('First Name', 'hart-living'); ?> *
                                            </label>
                                            <input type="text" name="first_name" required 
                                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.375rem;">
                                        </div>
                                        <div>
                                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">
                                                <?php _e('Last Name', 'hart-living'); ?> *
                                            </label>
                                            <input type="text" name="last_name" required 
                                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.375rem;">
                                        </div>
                                    </div>
                                    <div>
                                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">
                                            <?php _e('Email Address', 'hart-living'); ?> *
                                        </label>
                                        <input type="email" name="email" required 
                                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.375rem;">
                                    </div>
                                    <div>
                                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">
                                            <?php _e('Phone Number', 'hart-living'); ?> *
                                        </label>
                                        <input type="tel" name="phone" required 
                                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.375rem;">
                                    </div>
                                    <div>
                                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">
                                            <?php _e('Street Address', 'hart-living'); ?> *
                                        </label>
                                        <input type="text" name="address" required 
                                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.375rem;">
                                    </div>
                                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem;">
                                        <div>
                                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">
                                                <?php _e('City', 'hart-living'); ?> *
                                            </label>
                                            <input type="text" name="city" required 
                                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.375rem;">
                                        </div>
                                        <div>
                                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">
                                                <?php _e('State', 'hart-living'); ?> *
                                            </label>
                                            <input type="text" name="state" required 
                                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.375rem;">
                                        </div>
                                        <div>
                                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">
                                                <?php _e('ZIP Code', 'hart-living'); ?> *
                                            </label>
                                            <input type="text" name="zip" required 
                                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.375rem;">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Payment Method -->
                        <div style="background: white; padding: 2rem; border: 1px solid var(--border); border-radius: 0.5rem;">
                            <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem;">
                                <?php _e('Payment Method', 'hart-living'); ?>
                            </h2>
                            <div id="payment-methods" style="display: grid; gap: 1rem;">
                                
                                <!-- Cash Payment -->
                                <label style="display: flex; align-items: center; padding: 1rem; border: 2px solid var(--border); border-radius: 0.5rem; cursor: pointer; transition: all 0.3s;">
                                    <input type="radio" name="payment_method" value="cash" checked 
                                           style="margin-right: 1rem; width: 20px; height: 20px;">
                                    <div>
                                        <div style="font-weight: 600; font-size: 1.125rem;"><?php _e('Cash on Delivery', 'hart-living'); ?></div>
                                        <div style="font-size: 0.875rem; color: var(--foreground); opacity: 0.7;">
                                            <?php _e('Pay with cash upon delivery', 'hart-living'); ?>
                                        </div>
                                    </div>
                                </label>
                                
                                <!-- Credit Card Payment -->
                                <label style="display: flex; align-items: center; padding: 1rem; border: 2px solid var(--border); border-radius: 0.5rem; cursor: pointer; transition: all 0.3s;">
                                    <input type="radio" name="payment_method" value="credit_card" 
                                           style="margin-right: 1rem; width: 20px; height: 20px;">
                                    <div>
                                        <div style="font-weight: 600; font-size: 1.125rem;"><?php _e('Credit Card', 'hart-living'); ?></div>
                                        <div style="font-size: 0.875rem; color: var(--foreground); opacity: 0.7;">
                                            <?php _e('Pay with your credit card', 'hart-living'); ?>
                                        </div>
                                    </div>
                                </label>
                                
                                <!-- Credit Card Form -->
                                <div id="credit-card-form" style="display: none; padding: 1.5rem; background: var(--muted); border-radius: 0.5rem; margin-top: 1rem;">
                                    <div style="display: grid; gap: 1rem;">
                                        <div>
                                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">
                                                <?php _e('Card Number', 'hart-living'); ?>
                                            </label>
                                            <input type="text" name="card_number" placeholder="1234 5678 9012 3456" 
                                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.375rem;">
                                        </div>
                                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                            <div>
                                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">
                                                    <?php _e('Expiry Date', 'hart-living'); ?>
                                                </label>
                                                <input type="text" name="card_expiry" placeholder="MM/YY" 
                                                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.375rem;">
                                            </div>
                                            <div>
                                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">
                                                    <?php _e('CVV', 'hart-living'); ?>
                                                </label>
                                                <input type="text" name="card_cvv" placeholder="123" 
                                                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.375rem;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
                <!-- Order Summary Sidebar -->
                <div style="position: sticky; top: 2rem;">
                    <div style="background: var(--muted); padding: 2rem; border-radius: 0.5rem;">
                        <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem;">
                            <?php _e('Order Summary', 'hart-living'); ?>
                        </h2>
                        <div id="checkout-summary"></div>
                        <div style="border-top: 1px solid var(--border); margin: 1.5rem 0; padding-top: 1.5rem;">
                            <div style="display: flex; justify-content: space-between; font-size: 1.5rem; font-weight: 700; color: var(--primary); margin-bottom: 1.5rem;">
                                <span><?php _e('Total:', 'hart-living'); ?></span>
                                <span id="checkout-total">$0</span>
                            </div>
                            <button id="place-order-btn" 
                                    style="width: 100%; padding: 1rem; background: var(--primary); color: var(--primary-foreground); border: none; border-radius: 0.375rem; font-weight: 600; font-size: 1.125rem; cursor: pointer; transition: opacity 0.3s;">
                                <?php _e('Place Order', 'hart-living'); ?>
                            </button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</main>

<script>
(function() {
    const cart = JSON.parse(localStorage.getItem('hart_cart') || '[]');
    
    // Redirect to cart if empty
    if (cart.length === 0) {
        window.location.href = '<?php echo esc_url(home_url('/cart')); ?>';
        return;
    }
    
    // Display order summary
    const summary = document.getElementById('checkout-summary');
    const total = cart.reduce((sum, item) => sum + (parseFloat(item.price) * item.quantity), 0);
    
    summary.innerHTML = cart.map(item => `
        <div style="display: flex; justify-content: space-between; margin-bottom: 1rem; padding-bottom: 1rem; border-bottom: 1px solid var(--border);">
            <div style="display: flex; gap: 1rem;">
                <img src="${item.image}" alt="${item.name}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 0.375rem;">
                <div>
                    <div style="font-weight: 600;">${item.name}</div>
                    <div style="font-size: 0.875rem; color: var(--foreground); opacity: 0.7;">Qty: ${item.quantity}</div>
                </div>
            </div>
            <div style="font-weight: 600; color: var(--primary);">$${(parseFloat(item.price) * item.quantity).toLocaleString()}</div>
        </div>
    `).join('');
    
    document.getElementById('checkout-total').textContent = `$${total.toLocaleString()}`;
    
    // Payment method toggle
    const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
    const creditCardForm = document.getElementById('credit-card-form');
    const paymentLabels = document.querySelectorAll('#payment-methods label');
    
    paymentRadios.forEach((radio, index) => {
        radio.addEventListener('change', function() {
            if (this.value === 'credit_card') {
                creditCardForm.style.display = 'block';
            } else {
                creditCardForm.style.display = 'none';
            }
            
            // Update label styles
            paymentLabels.forEach(label => {
                label.style.borderColor = 'var(--border)';
                label.style.background = 'white';
            });
            paymentLabels[index].style.borderColor = 'var(--primary)';
            paymentLabels[index].style.background = 'rgba(139, 0, 0, 0.05)';
        });
    });
    
    // Place order
    document.getElementById('place-order-btn').addEventListener('click', function() {
        const form = document.getElementById('checkout-form');
        const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
        
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        
        // Validate credit card fields if selected
        if (paymentMethod === 'credit_card') {
            const cardNumber = document.querySelector('input[name="card_number"]').value;
            const cardExpiry = document.querySelector('input[name="card_expiry"]').value;
            const cardCVV = document.querySelector('input[name="card_cvv"]').value;
            
            if (!cardNumber || !cardExpiry || !cardCVV) {
                alert('<?php _e('Please fill in all credit card details', 'hart-living'); ?>');
                return;
            }
        }
        
        // Simulate order processing
        this.textContent = '<?php _e('Processing...', 'hart-living'); ?>';
        this.disabled = true;
        
        setTimeout(() => {
            // Clear cart
            localStorage.removeItem('hart_cart');
            
            // Show success message and redirect
            alert('<?php _e('Order placed successfully! Thank you for your purchase.', 'hart-living'); ?>');
            window.location.href = '<?php echo esc_url(home_url('/')); ?>';
        }, 1500);
    });
})();
</script>

<style>
@media (min-width: 768px) {
    #checkout-content {
        grid-template-columns: 1fr 400px;
    }
}
</style>

<?php
get_footer();
