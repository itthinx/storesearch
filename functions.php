<?php
/**
 * functions.php
 *
 * Copyright (c) "kento" Karim Rahimpur www.itthinx.com
 *
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This header and all notices must be kept intact.
 *
 * @author itthinx
 * @package storesearch
 * @since 1.0.0
 */

/**
 * Overrides the default credit.
 */
function storefront_credit() {
	$output = '<div class="site-info">';
	$output .= esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) );
	if ( apply_filters( 'storefront_credit_link', true ) ) {
		$output .= '<br/>';
		$output .= sprintf(
			'<a href="%s" title="%s" rel="author">%s</a>',
			esc_url( 'https://www.itthinx.com/themes/storesearch' ),
			esc_attr__( 'Built with care by itthinx with the best WooCommerce Search Engine in mind: WooCommerce Product Search', 'storesearch' ),
			esc_html__( 'Built with StoreSearch', 'storesearch' )
		);
	}
	$output .= '</div><!-- .site-info -->';
	echo $output;
}

if ( !function_exists( 'storesearch_wp_footer' ) ) {
	/**
	 * Makes the body non-scrollable while the search overlay is active.
	 * Disables the dynamicFocus especially for touch-enabled devices this will hide the results when the virtual keyboard is hidden.
	 */
	function storesearch_wp_footer() { ?>
		<script type="text/javascript">
		if ( typeof jQuery !== "undefined" ) {
			jQuery( document ).ready( function() {
				jQuery( '.storefront-handheld-footer-bar .product-search' ).off( 'focusout' );
				jQuery( document ).on( "click touchStart", function( event ) {
					if ( jQuery( '.storefront-handheld-footer-bar .search' ).hasClass( 'active' ) ) {
						jQuery( 'body' ).addClass( 'storesearch-noscroll' );
					} else {
						jQuery( 'body' ).removeClass( 'storesearch-noscroll' );
					}
				} );
				jQuery( window ).on( "orientationchange resize", function( event ) {
					if ( !jQuery( '.storefront-handheld-footer-bar' ).is( ':visible' ) ) {
						jQuery( 'body' ).removeClass( 'storesearch-noscroll' );
					}
				} );
			} );
		}
		</script><?php
	}
}
add_action( 'wp_footer', 'storesearch_wp_footer' );
