<?php
function get_term_custom($specs){
    $result = [];
    $args = array(
        'taxonomy'      => array( 'subject'),
        'meta_query'    => array(
            'relation' => 'AND',
            array(
                'key'     => 'popular',
                'value'   => '1',
                'compare' => '=',
            ),
            array(
                'key'     => 'no_sidebar',
                'value'   => '1',
                'compare' => '=',
            ),
        ),
    );
    foreach ($specs as $spec){
        $args['meta_query'][] = array(
            'key'     => 'spec',
            'value'   => $spec,
            'compare' => 'LIKE',
        );
    }
    $terms = get_terms( $args );

    foreach( $terms as $term ){
        $result[]= $term->slug;
    }

    return $result;
}

function get_product($per_page,$specs, $size, $not_in = false){
    $subject = get_term_custom($specs);
    if($not_in){
        $operator = 'NOT IN';
    }else{
        $operator = 'IN';
    }
    $meta_query = array(
        'relation' => 'AND',
        array(
            'key'     => 'sale_price',
            'value'   => '0',
            'compare' => '>',
        ),
        array(
            'key'     => 'sale',
            'value'   => '1',
            'compare' => '!=',
        )
    );

    $args = array(
        'post_type' => 'product',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => $per_page,
        'meta_key' => 'rate',
        'orderby'  => [ 'meta_value_num'=>'DESC' ],
        'meta_query' => $meta_query,
        'tax_query' => [
            'relation' => 'AND',
            [
                'taxonomy' => 'color',
                'field'    => 'slug',
                'terms'    => [ 'blue' ],
                'operator' => $operator,
            ],
            [
                'taxonomy' => 'material',
                'field'    => 'slug',
                'terms'    => [ 'metal' ],
                'operator' => $operator,

            ],
            [
                'taxonomy' => 'size',
                'field'    => 'slug',
                'terms'    => $size,

            ],
            [
                'taxonomy' => 'subject',
                'field'    => 'slug',
                'terms'    => $subject,
            ],
        ]
    );

    return new WP_Query($args);
}

function get_all_product($post_not_in){

    $args = array(
        'post_type' => 'product',
        'order' => 'DESC',
        'posts_per_page' =>15,
        'post__not_in' => $post_not_in,
        'meta_key' => 'rate',
        'orderby'  => [ 'meta_value_num'=>'DESC' ],
    );

    return new WP_Query($args);
}