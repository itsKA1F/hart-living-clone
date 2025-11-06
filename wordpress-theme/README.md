# Hart Living Multi-Page WordPress Theme

A modern, elegant multi-page WordPress furniture store theme with full product catalog, shopping cart, and WooCommerce support.

## Features

### Design
- **Elegant maroon & beige color scheme** (#8B0000 maroon, #F5F5F0 beige)
- **Responsive 3-column grid** (desktop) / 1-2 columns (mobile)
- **Clean sans-serif typography** for modern aesthetics
- **Smooth animations** and hover effects
- **SEO-optimized** with semantic HTML

### Pages & Templates
1. **Homepage (front-page.php)**
   - Hero banner with "HART" title
   - 5 category cards linking to category archives
   - 12 featured products from all categories
   - About section
   - Contact form

2. **Shop Page (archive-product.php)**
   - Complete product catalog with 25+ products
   - Sidebar with category filters
   - Search bar for products
   - Sorting dropdown (Latest, Price, Name)
   - Pagination (12 products per page)
   - 3-column responsive grid

3. **Category Pages (taxonomy-product_category.php)**
   - Dedicated page for each product category
   - Shows ALL products in category with pagination
   - Category title and description
   - Breadcrumb navigation
   - 12 products per page with pagination

4. **Single Product (single-product.php)**
   - Large product image
   - Full product details and specifications
   - Quantity selector with +/- buttons
   - Add to Cart functionality
   - Related products section (4 products from same category)
   - Breadcrumb navigation

5. **Cart Page (cart.php)**
   - Full cart view with item list
   - Image, name, quantity, and price for each item
   - Update quantity controls
   - Remove item button
   - Cart total display
   - Proceed to checkout link
   - Clear cart option

6. **Static Pages (page.php)**
   - Template for About, Contact, and other content pages
   - Full-width layout
   - Breadcrumb navigation

### Product Categories (5 total)
- **Sofas** (5 products)
- **Bed Frames** (5 products)
- **Office Furniture** (5 products)
- **Arm Chairs** (5 products)
- **Dining Tables** (5 products)

### Shopping Cart Features
- **Cart Drawer** - Slide-out cart accessible from header
- **localStorage persistence** - Cart survives page refreshes
- **Add to Cart** buttons on all product listings
- **Quantity controls** - Increase/decrease item quantities
- **Live cart count** badge in header
- **Toast notifications** when items added
- **Full cart page** for checkout

### Navigation
- **Multi-page header** with dropdown menu
  - Home
  - Shop (all products)
  - Categories (dropdown with 5 categories)
  - About
  - Contact
  - Cart icon with item count
- **Breadcrumb navigation** on all pages
- **Footer** with site info and copyright

### Sample Products (25 total)
All products include:
- SKU
- Name
- Description
- Short description
- Price
- Category assignment
- Meta fields for dimensions, material, weight

**Sofas (5):**
1. Toulon Brown Sectional Sofa - $1,400
2. Pavia White Sectional Sofa - $1,200
3. Pavia Cream Sectional Sofa - $1,200
4. Zadar Cloudy Beige Sectional Sofa - $1,300
5. Peniche Light Taupe Cozy L Sofa - $1,100

**Bed Frames (5):**
1. Perugia Cozy Grey Queen Bed Frame - $950
2. Amiens Cozy Beige Queen Bed Frame - $1,000
3. Lugano Stormy Grey Queen Bed Frame - $1,100
4. Novi Cozy Beige Queen Bed Frame - $900
5. Nis Cozy Grey Queen Bed Frame - $850

**Office Furniture (5):**
1. TwistLock Cord Cover - $50
2. FlexCharge Desk Clamp Socket - $80
3. Arbor Light Oak Desk Office - $600
4. Sequoia Slim Leather Armchair - $400
5. Opal Flow Lounge Seat - $350

**Arm Chairs (5):**
1. Anya Light Brown Armchair - $300
2. Avila Grey Armchair - $320
3. Eira Black Armchair - $280
4. Nara Black Armchair - $310
5. Reggio Smokey Grey Armchair - $340

**Dining Tables (5):**
1. Goslić Ganache Large Board Dining Table - $1,800
2. Duba Ceramic Grey Rectangular Dining Table (Small) - $1,100
3. Duba Ceramic Grey Rectangular Dining Table (Big) - $1,600
4. Rectangular Oak Dining Table - $700
5. Extendable Glass Dining Table - $1,050

## Installation

1. Upload the theme folder to `/wp-content/themes/`
2. Activate the theme in WordPress Admin → Appearance → Themes
3. Sample products will be automatically installed on first activation
4. Configure theme settings in Appearance → Customize
5. Set up menus in Appearance → Menus (assign to "Primary Menu" location)
6. Create a page with "Cart Page" template for shopping cart

## Theme Files

### Core Templates
- `index.php` - Default template
- `front-page.php` - Homepage template
- `page.php` - Static pages template
- `archive-product.php` - Shop/all products page
- `taxonomy-product_category.php` - Category archive pages
- `single-product.php` - Single product page
- `cart.php` - Shopping cart page template
- `header.php` - Header with navigation
- `footer.php` - Footer

### Stylesheets
- `style.css` - Main theme styles
- `style-additions.css` - Multi-page specific styles

### JavaScript
- `js/main.js` - Cart functionality and UI interactions
- `js/smooth-scroll.js` - Smooth scrolling for anchor links

### Functions
- `functions.php` - Theme setup, custom post types, WooCommerce support

## Customization

### Theme Customizer Options
Access via Appearance → Customize:

- **Hero Section** - Title and subtitle
- **About Section** - Title and content
- **Contact Section** - Email address
- **Footer** - Copyright text

### Custom Post Type: Products
- Post type slug: `product`
- Archive slug: `/products/`
- Taxonomy: `product_category`
- Meta fields: Price, Dimensions, Material, Weight

### Color Variables (style.css)
```css
--primary: hsl(0, 50%, 30%);        /* Maroon #8B0000 */
--primary-foreground: hsl(0, 0%, 98%);
--secondary: hsl(43, 96%, 89%);     /* Beige #F5F5F0 */
--background: hsl(0, 0%, 100%);
--foreground: hsl(0, 0%, 10%);
--muted: hsl(0, 0%, 96%);
```

## Browser Support
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## WooCommerce Support
While this theme uses a custom product post type, it includes WooCommerce support declarations for future compatibility:
- Product gallery zoom
- Product gallery lightbox
- Product gallery slider

## Credits
- Theme: Hart Living Multi-Page v2.0
- Author: Hart Living
- License: GPL v2 or later

## Changelog

### Version 2.0.0
- Transformed from one-page to multi-page architecture
- Added full shop page with filters and sorting
- Category pages now show ALL products with pagination
- Added cart page template
- Added related products to single product pages
- Implemented dropdown navigation menu
- Added breadcrumb navigation
- Enhanced responsive design
- 25 sample products across 5 categories

### Version 1.0.0
- Initial one-page design release

## Package Contents

To use this theme, all these files should be in your theme folder:

```
hart-living-multi-page/
├── functions.php
├── style.css
├── style-additions.css
├── index.php
├── front-page.php
├── page.php
├── archive-product.php
├── taxonomy-product_category.php
├── single-product.php
├── cart.php
├── header.php
├── footer.php
├── README.md
└── js/
    ├── main.js
    └── smooth-scroll.js
```
