<?php

class Bl_Quick_Finder_Cms_Manager_Admin {

    private $version;

    private $data_model;

    private $cache_manager;

    private $options;

    function __construct( $version, $options, $data_model, $cache_manager )
    {

        $this->version = $version;

        $this->options = $options;

        $this->data_model = $data_model;

        $this->cache_manager = $cache_manager;

    }

    function register_bl_quick_finder_post_type() {

        $labels = array(
            'name'               => __( 'Quick Finders', 'bl-quick-finder-cms' ),
            'singular_name'      => __( 'Quick Finder', 'bl-quick-finder-cms' ),
            'menu_name'          => __( 'Quick FInder', 'admin menu', 'bl-quick-finder-cms' ),
            'name_admin_bar'     => __( 'Quick Finder', 'add new on admin bar', 'bl-quick-finder-cms' ),
            'add_new'            => __( 'Add New Quick Finder', 'bl-quick-finder-cms' ),
            'add_new_item'       => __( 'Add New Quick Finder', 'bl-quick-finder-cms' ),
            'new_item'           => __( 'New Quick Finder', 'bl-quick-finder-cms' ),
            'edit_item'          => __( 'Edit Quick Finder', 'bl-quick-finder-cms' ),
            'view_item'          => __( 'View Quick Finder', 'bl-quick-finder-cms' ),
            'all_items'          => __( 'All Quick Finders', 'bl-quick-finder-cms' ),
            'search_items'       => __( 'Search Quick Finders', 'bl-quick-finder-cms' ),
            'parent_item_colon'  => __( 'Parent Quick Finders:', 'bl-quick-finder-cms' ),
            'not_found'          => __( 'No Quick Finders found.', 'bl-quick-finder-cms' ),
            'not_found_in_trash' => __( 'No Quick Finders found in Trash.', 'bl-quick-finder-cms' )
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'quick-finder' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'map_meta_cap'       => true,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
        );

        register_post_type( 'bl-quick-finder', $args );

        $quick_finder_category_labels = array(
            'name' => __( 'Category', 'bl-quick-finder-cms' ),
            'singular_name' => __( 'Categoria', 'bl-quick-finder-cms' ),
            'search_items' =>  __( 'Search Category', 'bl-quick-finder-cms' ),
            'all_items' => __( 'All Categories', 'bl-quick-finder-cms' ),
            'parent_item' => __( 'Parent Category', 'bl-quick-finder-cms' ),
            'parent_item_colon' => __( 'Parent Category', 'bl-quick-finder-cms' ),
            'edit_item' => __( 'Edit Category', 'bl-quick-finder-cms' ),
            'update_item' => __( 'Update Category', 'bl-quick-finder-cms' ),
            'add_new_item' => __( 'Add New Category', 'bl-quick-finder-cms' ),
            'new_item_name' => __( 'New Category', 'bl-quick-finder-cms' ),
            'menu_name' => __( 'Category', 'bl-quick-finder-cms' ),
        );

        $quick_finder_category_args = array(
            'hierarchical' => true,
            'labels' => $quick_finder_category_labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'quick-finder' ),
            'show_in_nav_menus' => true,
        );

        register_taxonomy('bl-quick-finder-category', array('bl-quick-finder'), $quick_finder_category_args);

        if( ! get_option( 'bl-quick-finder-default-category') ){

            $default_bl_slider_category_cats = array('homepage');

            foreach($default_bl_slider_category_cats as $cat){

                if(!term_exists($cat, 'bl-quick-finder-category')) wp_insert_term($cat, 'bl-quick-finder-category');

            }

            add_option( 'bl-quick-finder-default-category', true );

        }

    }

    public function add_delete_cache_menu_link(){

        add_submenu_page( 'edit.php?post_type=bl-quick-finder', __( 'Briefinglab Quick Finder CMS Cache', 'bl-quick-finder-cms' ), __( 'Delete Cache', 'bl-quick-finder-cms' ), 'manage_options', 'delete-cache-quick-finder', array( $this, 'delete_cache' ) );

    }

    public function delete_cache() {

        $delete_status = $this->cache_manager->delete_cache();

        ?>

        <div class="wrap">

            <h2><?php _e( 'Quick Finder CMS Cache', 'bl-quick-finder-cms' ); ?>?></h2>

            <?php if( $delete_status ):?>

                <div class="update-nag">
                    <?php _e( 'Cache have been deleted successfully', 'bl-quick-finder-cms' ); ?>
                </div>

            <?php else: ?>

                <div class="update-nag">
                    <?php _e( 'There was an error trying to delete the cache. Please check write permission for the cache folder', 'bl-quick-finder-cms' ); ?>
                </div>

            <?php endif; ?>

        </div>

<?php
    }

    function load_textdomain() {

        load_plugin_textdomain( 'bl-quick-finder-cms', false, dirname( dirname( plugin_basename( __FILE__ ) ) )  . '/langs/' );

    }

    public function add_meta_box_quick_finder_link() {

        add_meta_box('quick_finder_link',
            __("Quick Finder Link", 'bl-quick-finder-cms'),
            array($this, 'render_meta_box_quick_finder_link'),
            'bl-quick-finder' ,
            'side'
        );

    }

    function render_meta_box_quick_finder_link( $post ) {

        global $post;

        $value = get_post_meta( $post->ID, 'quick-finder-link', true );

        echo '<input name="quick-finder-link" type="text" class="large-text ui-autocomplete-input" value="'.$value.'">';

        echo '<p>' . _e( 'Aggiungi il link da associare al quick finder', 'bl-quick-finder-cms' ) . '</p>';

    }

    function save_meta_box_quick_finder_link( $post_id ) {

        if ( ! isset( $_POST['quick-finder-link'] ) )
            return $post_id;

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return $post_id;

        if ( ! current_user_can( 'edit_post', $post_id ) )
            return $post_id;

        $mydata = sanitize_text_field( $_POST['quick-finder-link'] );

        update_post_meta( $post_id, 'quick-finder-link', $mydata );

    }


}