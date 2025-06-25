# woocommerce-stock-notice-plugin

**Version:** 1.0\
**Requires:** WordPress 5.0+, WooCommerce 5.0+\
**Tested up to:** WordPress 6.x

---

## Description

This plugin adds a custom stock availability message for WooCommerce variable products. When a user selects a product variation, a dynamic message displays the available stock:

- **More than 3 items:** "X in stock"
- **1 to 3 items:** "Hurry! Only X left in stock"
- **0 items:** "Out of stock"

The message updates automatically based on the selected variation.

---

## Features

- Supports WooCommerce variable products only
- Displays real-time stock quantity per variation
- Custom messages for high, low, or zero stock levels
- Easy integration without modifying WooCommerce templates
- Uses `jQuery` for frontend interaction

---

## Installation

1. Upload the plugin folder to `/wp-content/plugins/`
2. Activate the plugin via the **Plugins** menu in WordPress
3. The functionality works automatically on product pages with variations

---

## Requirements

- WordPress 5.0 or higher
- WooCommerce 5.0 or higher
- Active product of type **Variable Product**

---

## How It Works

- The plugin enqueues a custom script only on single product pages
- For variable products, available stock for each variation is fetched
- Stock data is passed to the frontend via `wp_localize_script`
- The frontend script modifies the stock message dynamically

---

## Example Messages

```html
<p class="stock in-stock">12 in stock</p>
<p class="stock low-stock">Hurry! Only 2 left in stock</p>
<p class="stock out-of-stock">Out of stock</p>
```

---

## Known Limitations

- Only works with WooCommerce variable products
- Relies on `_stock` meta field for quantity data
- Does not integrate with advanced stock management plugins

---

**Note:** This is a lightweight, developer-friendly plugin intended for small customizations. For complex stock management, consider using official WooCommerce extensions.
