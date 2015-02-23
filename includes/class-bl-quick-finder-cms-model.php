<?php
class Bl_Quick_Finder_Cms_Model {

    private static $_instance = null;

    private function __construct() { }

    private function  __clone() { }

    public static function getInstance() {
        if( !is_object(self::$_instance) )
            self::$_instance = new Bl_Quick_Finder_Cms_Model();
        return self::$_instance;
    }

    public function get_quick_finder_posts( $atts ){

        $args = array(
            'post_type' => 'bl-quick-finder',
            'limit' => $atts['limit']
        );

        if( ! empty ( $atts['categories'] ) ){
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'bl-quick-finder-category',
                    'field' => 'slug',
                    'terms' => explode( ',', $atts['categories']),
                    'operator' => 'AND'
                )
            );
        }

        return get_posts( $args );

    }

} 