# Hart Living WordPress Theme

A modern, elegant one-page WordPress theme designed for Hart Living furniture store. Features smooth scrolling, product showcase, shopping cart functionality, category browsing, and **25 pre-loaded sample products**.

## Theme Features

- **One-Page Layout**: Clean, modern design with smooth scrolling sections
- **Responsive Design**: Works perfectly on all devices
- **Product Management**: Custom post type for products with detailed fields
- **Category System**: Browse products by furniture categories
- **Shopping Cart**: Full-featured cart with add/remove items, quantity controls
- **25 Sample Products**: Pre-loaded furniture products across multiple categories
- **Category Archive Pages**: Dedicated pages for each product category
- **Customizable**: Easy customization through WordPress Customizer
- **SEO Friendly**: Clean, semantic HTML structure

## Installation

1. **Download and Prepare**
   - Place all theme files in a folder named `hart-living`
   - Zip the `hart-living` folder

2. **Upload to WordPress**
   - Go to WordPress Admin → Appearance → Themes
   - Click "Add New" → "Upload Theme"
   - Choose your zip file and click "Install Now"
   - Activate the theme

3. **Automatic Setup**
   - 25 sample products are automatically created when you activate the theme
   - Product categories are created automatically
   - You're ready to go!

## Sample Products Included

The theme comes with **25 pre-loaded products** across these categories:

### Sofas (5 products)
- Toulon Brown Sectional Sofa - $1,400
- Pavia White Sectional Sofa - $1,200
- Pavia Cream Sectional Sofa - $1,200
- Zadar Cloudy Beige Sectional Sofa - $1,300
- Peniche Light Taupe Cozy L Sofa - $1,100

### Bed Frames (5 products)
- Perugia Cozy Grey Queen Bed Frame - $950
- Amiens Cozy Beige Queen Bed Frame - $1,000
- Lugano Stormy Grey Queen Bed Frame - $1,100
- Novi Cozy Beige Queen Bed Frame - $900
- Nis Cozy Grey Queen Bed Frame - $850

### Office Furniture (5 products)
- TwistLock Cord Cover - $50
- FlexCharge Desk Clamp Socket - $80
- Arbor Light Oak Desk Office - $600
- Sequoia Slim Leather Armchair - $400
- Opal Flow Lounge Seat - $350

### Arm Chairs (5 products)
- Anya Light Brown Armchair - $300
- Avila Grey Armchair - $320
- Eira Black Armchair - $280
- Nara Black Armchair - $310
- Reggio Smokey Grey Armchair - $340

### Dining Tables (5 products)
- Goslić Ganache Large Board Dining Table - $1,800
- Duba Ceramic Grey Rectangular Dining Table (Small) - $1,100
- Duba Ceramic Grey Rectangular Dining Table (Big) - $1,600
- Rectangular Oak Dining Table - $700
- Extendable Glass Dining Table - $1,050

## Category Browsing

- **Shop by Category**: Homepage displays all product categories
- **Category Pages**: Click any category to view all products in that category
- **All Products Page**: View all products in one place
- **Product Details**: Click individual products for full specifications

## Setup Instructions

### 1. Customize Theme Settings (Optional)

1. Go to **Appearance → Customize**
2. Available sections:
   - **Hero Section**: Edit hero title and subtitle
   - **About Section**: Edit about content
   - **Contact Section**: Set contact email
   - **Footer Settings**: Customize footer text
   - **Site Identity**: Upload custom logo

### 2. Set Up Navigation Menu (Optional)

1. Go to **Appearance → Menus**
2. Create a new menu
3. Add custom links with anchor IDs:
   - Shop by Category: `#category`
   - Products: `#products`
   - About Us: `#about`
   - Contact Us: `#contact`
4. Assign to "Primary Menu" location
5. Save menu

### 3. Add More Products (Optional)

1. Go to **Products → Add New**
2. Fill in:
   - Product title
   - Product description (full)
   - Product excerpt (short description)
   - Featured image
3. Fill in Product Details meta box:
   - **Price**: e.g., 1299.00
   - **Dimensions**: e.g., "72" W x 36" D x 30" H"
   - **Material**: e.g., "Solid Oak with Upholstery"
   - **Weight**: e.g., "85 lbs"
4. Select Product Category
5. Click "Publish"

### 4. Create New Categories (Optional)

1. Go to **Products → Product Categories**
2. Add category name
3. Optionally add description
4. Click "Add New Product Category"

## Shopping Cart Features

- **Add to Cart**: Click "Add to Cart" on any product card or detail page
- **Quantity Controls**: Increase/decrease quantities before or after adding to cart
- **Cart Drawer**: View cart by clicking cart icon in header (shows item count)
- **Notifications**: Toast notifications when items are added to cart
- **Persistent Cart**: Cart data saved in browser localStorage
- **Cart Management**:
  - Adjust quantities directly in cart
  - Remove individual items
  - Clear entire cart with one click
  - View total price

## Features

- ✅ One-page scrolling layout with smooth navigation
- ✅ 25 pre-loaded sample products with images and details
- ✅ Custom product post type with rich metadata
- ✅ Product categories with dedicated archive pages
- ✅ Full shopping cart functionality (add, remove, update quantities)
- ✅ Cart persistence using localStorage
- ✅ Product detail pages with specifications
- ✅ Customizer settings for easy customization
- ✅ Fully responsive design (mobile, tablet, desktop)
- ✅ SEO-friendly semantic markup
- ✅ Modern, clean design aesthetic
- ✅ Contact form included

## File Structure

```
hart-living/
├── style.css                      # Main stylesheet with theme header
├── functions.php                  # Theme functions, custom post types, sample data
├── index.php                      # Default template
├── front-page.php                 # One-page homepage template
├── archive-product.php            # All products archive page
├── taxonomy-product_category.php  # Category archive page template
├── single-product.php             # Single product detail page
├── header.php                     # Header template with cart
├── footer.php                     # Footer template
├── js/
│   ├── main.js                   # Cart functionality & animations
│   └── smooth-scroll.js          # Smooth scrolling functionality
└── README.md                     # This file
```

## Customization

### Colors

Edit the CSS variables in `style.css` to customize colors:

```css
:root {
  --primary: hsl(0, 50%, 30%);           /* Main brand color (dark red) */
  --primary-foreground: hsl(0, 0%, 98%); /* Text on primary (white) */
  --secondary: hsl(43, 96%, 89%);        /* Accent color (cream) */
  --background: hsl(0, 0%, 100%);        /* Page background (white) */
  --foreground: hsl(0, 0%, 10%);         /* Main text (dark) */
  --muted: hsl(0, 0%, 96%);              /* Subtle backgrounds (light gray) */
  --card: hsl(0, 0%, 100%);              /* Card backgrounds (white) */
  --border: hsl(0, 0%, 90%);             /* Border color (gray) */
}
```

### Add Custom Logo

1. Go to **Appearance → Customize → Site Identity**
2. Upload your logo (recommended size: 400x100px)
3. Logo appears in the header navigation

### Typography

The theme uses system fonts for optimal performance:
- macOS/iOS: San Francisco
- Windows: Segoe UI
- Android: Roboto
- Fallback: Arial, sans-serif

### Cart Behavior

Cart data is stored in browser localStorage, meaning:
- Cart persists across page refreshes
- Cart is unique per browser/device
- Clearing browser data will clear the cart
- Consider adding server-side cart for production

## Browser Support

- ✅ Chrome (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Edge (latest)
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

## Notes

- **Sample Products**: The 25 products are created automatically on theme activation
- **Re-activation**: Products won't be duplicated if you deactivate and reactivate
- **Images**: Sample products use placeholder emoji icons (replace with real images)
- **Contact Form**: Included but requires processing setup (use plugin or custom code)

## Support & Resources

- WordPress Codex: https://codex.wordpress.org/
- WordPress Support: https://wordpress.org/support/
- Theme Documentation: This README file

## Version History

### Version 1.0.0
- Initial release
- One-page layout
- 25 sample products
- Category archive pages
- Shopping cart functionality
- Mobile responsive

## License

This theme is licensed under the GNU General Public License v2 or later.
http://www.gnu.org/licenses/gpl-2.0.html

## Credits

- Developed for Hart Living furniture store
- Built with WordPress best practices
- Semantic HTML5 markup
- Modern CSS with CSS variables
