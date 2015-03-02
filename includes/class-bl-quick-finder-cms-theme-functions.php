<?php

class Bl_Quick_Finder_Cms_Theme_Functions {

    function __construct() { }

    public static function  define_theme_functions() {

	   if( ! function_exists( 'bl_quick_finder_content' ) ) {
            function bl_quick_finder_content( $content ) {

                $content = apply_filters( 'bl-quick-finder-content', $content );

                return $content;

            }
        }


    }
} 