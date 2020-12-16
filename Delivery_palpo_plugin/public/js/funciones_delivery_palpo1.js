<?php
/**
 * Common functions for same  deliver time.
 *
 * @package delivery_palpo functions
 */

/**
 * Get the current timestamp
 */
function get_higher_minimum_delivery_time() {
    $minimum_delivery_time = wp_cache_get( 'get_higher_minimum_delivery_time' );

    if ( false === $minimum_delivery_time ) {
        global $wpdb;
        $minimum_delivery_time = 0;
        $terms_id              = array();
        $shipping_class        = array();

        $shipping_based_delivery = get_option( 'enable_shipping_based_delivery' );
        if ( 'on' === $shipping_based_delivery ) {
            $results = common::get_shipping_settings();

            if ( isset( WC()->cart ) ) {
                foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
                    $product_id = $values['data']->get_id();
                    if ( 'product_variation' === $values['data']->post_type ) {
                        $product_id = $values['product_id'];
                    }

                    $terms          = get_the_terms( $product_id, 'product_cat' );
                    $shipping_class = get_the_terms( $product_id, 'product_shipping_class' );

                    if ( ! $shipping_class ) {
                        $shipping_class = array();
                    }
                    // get the category IDs.
                    if ( '' !== $terms ) {
                        foreach ( $terms as $term => $val ) {
                            $id = common::get_base_product_category( $val->term_id );

                            array_push( $terms_id, $id );
                        }
                    }
                }
            }

            if ( is_array( $results ) && count( $results ) > 0 ) {
                foreach ( $results as $key => $value ) {
                    $shipping_settings = get_option( $value->option_name );

                    if ( isset( $shipping_settings['delivery_settings_based_on'][0] ) &&
                    'product_categories' === $shipping_settings['delivery_settings_based_on'][0] ) {
                        if ( isset( $shipping_settings['product_categories'] ) && ! isset( $shipping_settings['shipping_methods_for_categories'] ) ) {
                            $product_category = $shipping_settings['product_categories'];
                            foreach ( $terms_id as $term => $val ) {
                                $cat_slug = common::ordd_get_cat_slug( $val );
                                if ( in_array( $cat_slug, $product_category, true ) && $minimum_delivery_time < $shipping_settings['minimum_delivery_time'] && '' !== $shipping_settings['minimum_delivery_time'] ) {
                                    $minimum_delivery_time = $shipping_settings['minimum_delivery_time'];
                                    break;
                                }
                            }
                        }
                    } elseif ( isset( $shipping_settings['delivery_settings_based_on'][0] ) && 'shipping_methods' === $shipping_settings['delivery_settings_based_on'][0] ) {
                        if ( isset( $shipping_settings['shipping_methods'] ) ) {
                            $shipping_methods = $shipping_settings['shipping_methods'];

                            if ( '' !== $shipping_class ) {
                                foreach ( $shipping_class as $term => $val ) {
                                    if ( in_array( $val->slug, $shipping_methods, true ) && $minimum_delivery_time < $shipping_settings['minimum_delivery_time'] && '' !== $shipping_settings['minimum_delivery_time'] ) {
                                        $minimum_delivery_time = $shipping_settings['minimum_delivery_time'];
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
            }
            wp_cache_set( 'get_higher_minimum_delivery_time', $minimum_delivery_time );
        }
    }
    return $minimum_delivery_time;
}