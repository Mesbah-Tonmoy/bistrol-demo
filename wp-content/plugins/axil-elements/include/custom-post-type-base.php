<?php

class Axil_Register_Custom_Post_Type
{
    public $post_type_name;
    public $post_type_args;
    public $post_type_labels;
    public $post_type_taxos;
    public $post_type_taxos_exits;
    public $post_type_meta_boxes;

    /* Class constructor */
    public function __construct($name, $plural,  $args = array(), $labels = array())
    {
        // Set some important variables self::beautify( $string )
        $this->post_type_name 		= self::uglify($name);
        $this->post_type_plural 	= self::uglify($plural);
        $this->post_type_args 		= $args;
        $this->post_type_labels 	= $labels;
        $this->post_type_taxos		= array();
        $this->post_type_taxos_exits= array();
        $this->post_type_meta_boxes = array();

        // Add action to register the post type, if the post type does not already exist
        if(! post_type_exists($this->post_type_name))
        {
            add_action('init',array(&$this,'register_post_type'));
            add_action('init',array(&$this,'push_taxonomy'));
        }
    }

    /* Method which registers the post type */
    public function register_post_type()
    {
        // Capitilize the words and make it plural
        $name 	= self::beautify($this->post_type_name);
        $plural = self::beautify($this->post_type_plural);

        // We set the default labels based on the post type name and plural. We overwrite them with the given labels.
        $labels = array_merge(
        //Default
            array(
                'name'                  => _x( $plural, 'Post Type General Name', 'axil-elements' ),
                'singular_name'         => _x( $name, 'Post Type Singular Name', 'axil-elements' ),
                'menu_name'             => __( $plural, 'axil-elements' ),
                'name_admin_bar'        => __( $name, 'axil-elements' ),
                'archives'              => __( 'Item Archives', 'axil-elements' ),
                'parent_item_colon'     => __( 'Parent Item:', 'axil-elements' ),
                'all_items'             => __( 'All Items', 'axil-elements' ),
                'add_new_item'          => __( 'Add New Item', 'axil-elements' ),
                'add_new'               => __( 'Add New', 'axil-elements' ),
                'new_item'              => __( 'New Item', 'axil-elements' ),
                'edit_item'             => __( 'Edit Item', 'axil-elements' ),
                'update_item'           => __( 'Update Item', 'axil-elements' ),
                'view_item'             => __( 'View Item', 'axil-elements' ),
                'search_items'          => __( 'Search Item', 'axil-elements' ),
                'not_found'             => __( 'Not found', 'axil-elements' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'axil-elements' ),
                'featured_image'        => __( 'Featured Image', 'axil-elements' ),
                'set_featured_image'    => __( 'Set featured image', 'axil-elements' ),
                'remove_featured_image' => __( 'Remove featured image', 'axil-elements' ),
                'use_featured_image'    => __( 'Use as featured image', 'axil-elements' ),
                'insert_into_item'      => __( 'Insert into item', 'axil-elements' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'axil-elements' ),
                'items_list'            => __( 'Items list', 'axil-elements' ),
                'items_list_navigation' => __( 'Items list navigation', 'axil-elements' ),
                'filter_items_list'     => __( 'Filter items list', 'axil-elements' ),
            ),
            // Given labels
            $this->post_type_labels
        );

        // Same principle as the labels. We set some defaults and overwrite them with the given arguments.
        $args = array_merge(
        // Default
            array(
                'label'                 => $plural,
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 5,
                'menu_icon'   			=> 'dashicons-index-card',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'page',
            ),
            // Given args
            $this->post_type_args
        );

        // Register the post type
        register_post_type($this->post_type_name,$args);
    }

    /* Method to attach the taxonomy to the post type */
    public function add_taxonomy( $name, $plural, $slug, $args = array(),$labels = array())
    {
        if(! empty($slug))
        {
            // We need to know the post type name, so the new taxonomy can be attached to it.
            $post_type_name = $this->post_type_name;

            // Taxonomy properties
            $taxonomy_name		= $slug;
            $taxonomy_labels	= $labels;
            $taxonomy_args		= $args;

            if(! taxonomy_exists($taxonomy_name))
            {
                /* Create taxonomy and attach to the post type */
                $name 	= self::beautify($name);
                $plural = self::beautify($plural);

                // Default labels, overwrite them with the given labels.
                $labels = array_merge(
                //Default
                    array(
                        'name'                       => _x( $plural, 'Taxonomy General Name', 'axil-elements' ),
                        'singular_name'              => _x( $name, 'Taxonomy Singular Name', 'axil-elements' ),
                        'menu_name'                  => __( $plural, 'axil-elements' ),
                        'all_items'                  => __( 'All ' . $name, 'axil-elements' ),
                        'parent_item'                => __( 'Parent Item', 'axil-elements' ),
                        'parent_item_colon'          => __( 'Parent Item:', 'axil-elements' ),
                        'new_item_name'              => __( 'New '. $name .' Name', 'axil-elements' ),
                        'add_new_item'               => __( 'Add New ' . $name, 'axil-elements' ),
                        'edit_item'                  => __( 'Edit ' . $name, 'axil-elements' ),
                        'update_item'                => __( 'Update ' . $name, 'axil-elements' ),
                        'view_item'                  => __( 'View ' . $name, 'axil-elements' ),
                        'separate_items_with_commas' => __( 'Separate items with commas', 'axil-elements' ),
                        'add_or_remove_items'        => __( 'Add or remove items', 'axil-elements' ),
                        'choose_from_most_used'      => __( 'Choose from the most used', 'axil-elements' ),
                        'popular_items'              => __( 'Popular ' . $name, 'axil-elements' ),
                        'search_items'               => __( 'Search ' . $name, 'axil-elements' ),
                        'not_found'                  => __( 'Not Found', 'axil-elements' ),
                        'no_terms'                   => __( 'No ' . $name, 'axil-elements' ),
                        'items_list'                 => __( $name .' list', 'axil-elements' ),
                        'items_list_navigation'      => __( $name .' list navigation', 'axil-elements' ),

                    ),
                    $taxonomy_labels
                );

                // Default arguments, overwritten with the given arguments
                $args = array_merge(
                // Default
                    array(
                        'label'				=> $plural,
                        'labels'			=> $labels,
                        'public'			=> true,
                        'show_ui'			=> true,
                        'show_in_nav_menus'	=> true,
                        '_builtin'			=> false,
                        'hierarchical'      => true,
                        'show_admin_column' => true,
                        'show_tagcloud'     => true
                    ),
                    // Given
                    $taxonomy_args
                );

                $temp = array(
                    'name' 			=> $taxonomy_name,
                    'object_type'	=> $post_type_name,
                    'args' 			=> $args
                );
                array_push($this->post_type_taxos,$temp);

            }else{
                $temp = array(
                    'name' 			=> $taxonomy_name,
                    'object_type'	=> $post_type_name
                );
                array_push($this->post_type_taxos_exits,$temp);
            }
        }
    }

    /* only for under php 5.3 */
    public function push_taxonomy()
    {
        if(NULL != $this->post_type_taxos)
        {
            foreach($this->post_type_taxos as $taxo)
            {
                register_taxonomy($taxo['name'],$taxo['object_type'],$taxo['args']);
            }
        }

        if(NULL != $this->post_type_taxos_exits)
        {
            foreach($this->post_type_taxos_exits as $taxo)
            {
                register_taxonomy_for_object_type($taxo['name'],$taxo['object_type']);
            }
        }
    }

    public static function beautify($string)
    {
        return ucwords(str_replace('-',' ',$string));
    }
    public static function uglify($string)
    {
        return strtolower(str_replace(' ','-',$string));
    }
}

