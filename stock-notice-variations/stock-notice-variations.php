<?php
/*
Plugin Name: Stock Notice for Variations
Description: Displays a message about the remaining stock for each product variation in WooCommerce
Version: 1.0
Author: pinK0der
*/

add_action('wp_enqueue_scripts', function () {
    if (is_product()) {
        global $post;
        $product = wc_get_product($post->ID);

        wp_enqueue_script(
            'stock-notice-script',
            plugin_dir_url(__FILE__) . 'assets/stock-notice.js',
            array('jquery'),
            '1.0',
            true
        );

        if ($product && $product->is_type('variable')) {
            $variations = $product->get_available_variations();
            $stock_data = [];

            foreach ($variations as $variation) {
                $variation_id = $variation['variation_id'];
                $stock_quantity = get_post_meta($variation_id, '_stock', true);
                
                $stock_data[$variation_id] = $stock_quantity;
            }

            wp_localize_script('stock-notice-script', 'productStockData', [
                'stock' => $stock_data,
            ]);
        }
    }
});