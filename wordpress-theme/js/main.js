/**
 * Hart Living Theme Main JavaScript
 */

(function() {
    'use strict';

    // ========================================
    // CART FUNCTIONALITY
    // ========================================
    
    const Cart = {
        items: [],
        
        init() {
            this.loadCart();
            this.bindEvents();
            this.updateUI();
        },
        
        loadCart() {
            const saved = localStorage.getItem('hart_cart');
            this.items = saved ? JSON.parse(saved) : [];
        },
        
        saveCart() {
            localStorage.setItem('hart_cart', JSON.stringify(this.items));
        },
        
        addItem(product, quantity = 1) {
            const existing = this.items.find(item => item.id === product.id);
            
            if (existing) {
                existing.quantity += quantity;
            } else {
                this.items.push({
                    id: product.id,
                    name: product.name,
                    price: parseFloat(product.price),
                    image: product.image,
                    quantity: quantity
                });
            }
            
            this.saveCart();
            this.updateUI();
            this.showNotification(`${product.name} added to cart`);
        },
        
        removeItem(id) {
            this.items = this.items.filter(item => item.id !== id);
            this.saveCart();
            this.updateUI();
        },
        
        updateQuantity(id, quantity) {
            const item = this.items.find(item => item.id === id);
            if (item) {
                if (quantity <= 0) {
                    this.removeItem(id);
                } else {
                    item.quantity = quantity;
                    this.saveCart();
                    this.updateUI();
                }
            }
        },
        
        clearCart() {
            if (confirm('Are you sure you want to clear your cart?')) {
                this.items = [];
                this.saveCart();
                this.updateUI();
                this.showNotification('Cart cleared');
            }
        },
        
        getTotal() {
            return this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        },
        
        getItemCount() {
            return this.items.reduce((sum, item) => sum + item.quantity, 0);
        },
        
        updateUI() {
            // Update cart count badges
            const count = this.getItemCount();
            document.querySelectorAll('#cart-count, #cart-items-count').forEach(el => {
                el.textContent = count;
            });
            
            // Update cart total
            const total = this.getTotal();
            const totalEl = document.getElementById('cart-total');
            if (totalEl) {
                totalEl.textContent = `$${total.toLocaleString()}`;
            }
            
            // Update cart items display
            this.renderCartItems();
        },
        
        renderCartItems() {
            const container = document.getElementById('cart-items-container');
            if (!container) return;
            
            if (this.items.length === 0) {
                container.innerHTML = `
                    <div class="cart-empty">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <p>Your cart is empty</p>
                    </div>
                `;
                return;
            }
            
            container.innerHTML = this.items.map(item => `
                <div class="cart-item" data-id="${item.id}">
                    <img src="${item.image}" alt="${item.name}">
                    <div class="cart-item-details">
                        <h4>${item.name}</h4>
                        <p class="cart-item-price">$${item.price.toLocaleString()}</p>
                        <div class="cart-item-controls">
                            <button class="cart-qty-btn" data-action="decrease" data-id="${item.id}">-</button>
                            <span class="cart-qty">${item.quantity}</span>
                            <button class="cart-qty-btn" data-action="increase" data-id="${item.id}">+</button>
                            <button class="cart-remove-btn" data-id="${item.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        },
        
        showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'cart-notification';
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => notification.classList.add('show'), 10);
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => notification.remove(), 300);
            }, 2000);
        },
        
        bindEvents() {
            // Toggle cart drawer
            const cartToggle = document.getElementById('cart-toggle');
            const cartClose = document.getElementById('cart-close');
            const cartDrawer = document.getElementById('cart-drawer');
            const overlay = cartDrawer?.querySelector('.cart-drawer-overlay');
            
            if (cartToggle && cartDrawer) {
                cartToggle.addEventListener('click', () => {
                    cartDrawer.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            }
            
            const closeCart = () => {
                if (cartDrawer) {
                    cartDrawer.classList.remove('active');
                    document.body.style.overflow = '';
                }
            };
            
            if (cartClose) cartClose.addEventListener('click', closeCart);
            if (overlay) overlay.addEventListener('click', closeCart);
            
            // Add to cart buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.add-to-cart-btn')) {
                    e.preventDefault();
                    const btn = e.target.closest('.add-to-cart-btn');
                    const quantity = document.getElementById('quantity')?.value || 1;
                    
                    const product = {
                        id: btn.dataset.id,
                        name: btn.dataset.name,
                        price: btn.dataset.price,
                        image: btn.dataset.image
                    };
                    
                    this.addItem(product, parseInt(quantity));
                }
                
                // Cart quantity controls
                if (e.target.closest('.cart-qty-btn')) {
                    const btn = e.target.closest('.cart-qty-btn');
                    const id = btn.dataset.id;
                    const action = btn.dataset.action;
                    const item = this.items.find(item => item.id === id);
                    
                    if (item) {
                        const newQty = action === 'increase' ? item.quantity + 1 : item.quantity - 1;
                        this.updateQuantity(id, newQty);
                    }
                }
                
                // Remove item
                if (e.target.closest('.cart-remove-btn')) {
                    const btn = e.target.closest('.cart-remove-btn');
                    this.removeItem(btn.dataset.id);
                }
            });
            
            // Clear cart button
            const clearBtn = document.getElementById('cart-clear');
            if (clearBtn) {
                clearBtn.addEventListener('click', () => this.clearCart());
            }
            
            // Product quantity controls (single product page)
            const decreaseBtn = document.getElementById('decrease-qty');
            const increaseBtn = document.getElementById('increase-qty');
            const qtyInput = document.getElementById('quantity');
            
            if (decreaseBtn && qtyInput) {
                decreaseBtn.addEventListener('click', () => {
                    const val = parseInt(qtyInput.value) - 1;
                    qtyInput.value = Math.max(1, val);
                });
            }
            
            if (increaseBtn && qtyInput) {
                increaseBtn.addEventListener('click', () => {
                    const val = parseInt(qtyInput.value) + 1;
                    qtyInput.value = Math.min(99, val);
                });
            }
        }
    };
    
    // Initialize cart
    Cart.init();

    // Mobile menu toggle (if you add mobile menu functionality)
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mainNavigation = document.querySelector('.main-navigation');

    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function() {
            mainNavigation.classList.toggle('active');
            this.setAttribute('aria-expanded', 
                mainNavigation.classList.contains('active')
            );
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            
            // Skip if it's just "#"
            if (href === '#') {
                e.preventDefault();
                return;
            }
            
            const target = document.querySelector(href);
            
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add fade-in animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements for animation
    document.querySelectorAll('.product-card, .category-card').forEach(el => {
        observer.observe(el);
    });

})();
