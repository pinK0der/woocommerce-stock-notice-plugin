
jQuery(document).ready(function ($) {
    const form = $('form.variations_form');
    
    if (form.length) {
        let variations = form.data('product_variations');

        if (variations && typeof productStockData !== 'undefined') {
            variations.forEach(function (variation) {
                const variationId = variation.variation_id;

                if (productStockData.stock.hasOwnProperty(variationId)) {
                    const stockQty = productStockData.stock[variationId];

                    let customMessage = '';

                    if (stockQty > 3) {
                        customMessage = `<p class="stock in-stock">${stockQty} in stock</p>\n`;
                    } else if (stockQty > 0) {
                        customMessage = `<p class="stock low-stock">Hurry! Only ${stockQty} left in stock</p>\n`;
                    } else {
                        customMessage = `<p class="stock out-of-stock">Out of stock</p>\n`
                    }

                    variation.availability_html = customMessage;
                }
            });

            form.data('product_variations', variations);
        }
    }
});
