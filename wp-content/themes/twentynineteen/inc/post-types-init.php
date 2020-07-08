<?php

function cptui_register_my_cpts() {

    /**
     * Post Type: Товар.
     */

    $labels = [
        "name" => __( "Товар", "twentynineteen" ),
        "singular_name" => __( "Товары", "twentynineteen" ),
        "menu_name" => __( "Товары", "twentynineteen" ),
        "all_items" => __( "Все товары", "twentynineteen" ),
        "add_new" => __( "Добавить", "twentynineteen" ),
        "add_new_item" => __( "Добавить товар", "twentynineteen" ),
        "edit_item" => __( "Редактировать товар", "twentynineteen" ),
        "new_item" => __( "Новый товар", "twentynineteen" ),
        "view_item" => __( "Просмотреть товар", "twentynineteen" ),
    ];

    $args = [
        "label" => __( "Товар", "twentynineteen" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "product", "with_front" => true ],
        "query_var" => true,
        "supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "author", "page-attributes", "post-formats" ],
    ];

    register_post_type( "product", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


function cptui_register_my_taxes() {

    /**
     * Taxonomy: Тематика.
     */

    $labels = [
        "name" => __( "Тематика", "twentynineteen" ),
        "singular_name" => __( "Тематика", "twentynineteen" ),
    ];

    $args = [
        "label" => __( "Тематика", "twentynineteen" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'subject', 'with_front' => true, ],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "rest_base" => "subject",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => false,
    ];
    register_taxonomy( "subject", [ "product" ], $args );

    /**
     * Taxonomy: Цвет.
     */

    $labels = [
        "name" => __( "Цвет", "twentynineteen" ),
        "singular_name" => __( "Цвет", "twentynineteen" ),
    ];

    $args = [
        "label" => __( "Цвет", "twentynineteen" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'color', 'with_front' => true, ],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "rest_base" => "color",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => false,
    ];
    register_taxonomy( "color", [ "product" ], $args );

    /**
     * Taxonomy: Материал.
     */

    $labels = [
        "name" => __( "Материал", "twentynineteen" ),
        "singular_name" => __( "Материал", "twentynineteen" ),
    ];

    $args = [
        "label" => __( "Материал", "twentynineteen" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'material', 'with_front' => true, ],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "rest_base" => "material",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => false,
    ];
    register_taxonomy( "material", [ "product" ], $args );

    /**
     * Taxonomy: Размер.
     */

    $labels = [
        "name" => __( "Размер", "twentynineteen" ),
        "singular_name" => __( "размер", "twentynineteen" ),
    ];

    $args = [
        "label" => __( "Размер", "twentynineteen" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'size', 'with_front' => true, ],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "rest_base" => "size",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => false,
    ];
    register_taxonomy( "size", [ "product" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

