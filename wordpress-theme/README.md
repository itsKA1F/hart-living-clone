# Hart Living WordPress Theme

A modern, elegant one-page WordPress theme for furniture stores and e-commerce websites.

## Installation

1. **Download and Prepare**
   - Place all files in a folder named `hart-living`
   - Zip the folder

2. **Upload to WordPress**
   - Go to WordPress Admin → Appearance → Themes
   - Click "Add New" → "Upload Theme"
   - Choose your zip file and click "Install Now"
   - Activate the theme

3. **Add a Screenshot (Optional)**
   - Create a 1200x900px screenshot of your theme
   - Save it as `screenshot.png` in the theme root folder
   - This will show as the theme preview in WordPress admin

## Setup Instructions

### 1. Create Products

1. Go to **Products → Add New** in WordPress admin
2. Fill in:
   - Product title
   - Product description
   - Featured image
   - Product details (price, dimensions, material, weight)
3. Assign to a product category

### 2. Create Categories

1. Go to **Products → Product Categories**
2. Add categories like: Beds, Sofas, Chairs, Tables, Consoles, Lamps

### 3. Customize Theme Settings

1. Go to **Appearance → Customize**
2. Available sections:
   - **Hero Section**: Edit hero title and subtitle
   - **About Section**: Edit about content
   - **Contact Section**: Set contact email
   - **Footer Settings**: Customize footer text

### 4. Set Up Navigation Menu

1. Go to **Appearance → Menus**
2. Create a new menu
3. Add custom links with anchor IDs:
   - Shop by Category: `#category`
   - Products: `#products`
   - About Us: `#about`
   - Contact Us: `#contact`
4. Assign to "Primary Menu" location

### 5. Set Front Page

1. Go to **Settings → Reading**
2. Select "A static page" for front page displays
3. Choose your front page or let it use the default template

## Features

- ✅ One-page scrolling layout
- ✅ Custom product post type
- ✅ Product categories
- ✅ Product detail pages with specifications (dimensions, weight, material)
- ✅ Customizer settings for easy customization
- ✅ Responsive design
- ✅ Smooth scrolling navigation
- ✅ Contact form (requires setup)
- ✅ SEO-friendly markup
- ✅ Modern, clean design

## File Structure

```
hart-living/
├── style.css              # Main stylesheet with theme header
├── functions.php          # Theme functions and customization
├── index.php             # Default template
├── front-page.php        # One-page front page template
├── header.php            # Header template
├── footer.php            # Footer template
├── single-product.php    # Single product template
├── js/
│   ├── main.js          # Main JavaScript
│   └── smooth-scroll.js # Smooth scrolling functionality
└── README.md            # This file
```

## Customization

### Colors

Edit the CSS variables in `style.css` (lines 18-28):

```css
:root {
  --primary: hsl(0, 50%, 30%);
  --secondary: hsl(43, 96%, 89%);
  /* ... more colors */
}
```

### Add Custom Logo

1. Go to **Appearance → Customize → Site Identity**
2. Upload your logo

### Contact Form

The contact form is included but needs processing. You can:
- Install a plugin like Contact Form 7 or WPForms
- Or add custom PHP processing in `functions.php`

## Support

For issues or questions:
- Check WordPress Codex: https://codex.wordpress.org/
- WordPress Support Forums: https://wordpress.org/support/

## License

This theme is licensed under the GNU General Public License v2 or later.

## Credits

- Built for Hart Living furniture store
- Based on WordPress best practices
- Uses semantic HTML5 markup
