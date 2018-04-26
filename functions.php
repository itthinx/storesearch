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

function storefront_credit() {

	$output = '';

	$output .= '<div class="site-info">';
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
