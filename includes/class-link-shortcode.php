<?php

/*
	Copyright (C) 2022 by Clearcode <https://clearcode.cc>
	and associates (see AUTHORS.txt file).

	This file is part of CC-Link-Shortcode plugin.

	CC-Link-Shortcode plugin is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	CC-Link-Shortcode plugin is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with CC-Link-Shortcode plugin; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

namespace Clearcode;

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( __NAMESPACE__ . '\Link_Shortcode' ) ) {
	class Link_Shortcode extends Link_Shortcode\Plugin {
		protected $shortcode = 'a';

		public function action_init() {
			$this->shortcode = self::apply_filters( 'shortcode', $this->shortcode );
			add_shortcode( $this->shortcode, [ $this, 'shortcode' ] );
		}

		public function shortcode( $atts, $content = null ) {
            if ( isset( $atts[0] ) ) {
                if ( ! empty( $atts[0] ) ) $atts['href'] = $atts[0];
                unset( $atts[0] );
            }

            $atts = array_map( 'trim', $atts );
            $atts = array_map( 'esc_attr', $atts );

			if ( $post = self::get_post( $atts['href'] ) ) {
				$atts['href'] = get_permalink( $post );
				$content = $content ?: get_the_title( $post );
			} else {
				$atts['href'] = esc_url( $atts['href'] );
			}

			return self::get_template( self::get( 'path' ) . '/templates/link.php', [
				'content' => $content,
				'atts'    => $atts
			] );
		}

        static public function is_rel( $href ) {
            return 0 === strpos( $href, '/' );
        }

        static public function get_abs( $href ) {
            if ( ! self::is_rel( $href ) ) return $href;
            return home_url( $href );
        }

        static public function get_post( $href ) {
            if ( is_numeric( $href ) ) return get_post( (int)$href ) ?: null;

            if ( self::is_rel( $href ) ) $href = self::get_abs( $href );
            return self::get_post( url_to_postid( $href ) );
        }
	}
}
